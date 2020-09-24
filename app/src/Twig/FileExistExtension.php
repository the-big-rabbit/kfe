<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13/07/2018
 * Time: 14:34
 */

namespace App\Twig;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class FileExistExtension extends AbstractExtension implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getFunctions()
    {
        return array(
          new TwigFunction('file_exist',array($this,'fileExist'))
        );
    }
    public function fileExist($path){
        return file_exists(sprintf('%s/%s',$this->container->getParameter('kernel.project_dir'),$path));
    }
}