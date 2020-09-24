# Neptune-front



## Installation
Pour l'installer facilement, il vous faut build-essentials et docker.
Le simple appel de cette commande initialisera des containers docker avec tout le nécessaire au fonctionnement d'un nouveau projet (imagick compris).

```bash
make install
```
Ensuite, si les containers ne sont pas lancé d'office (après un reboot par exemple)
```bash
make start
```
Et pour les couper, pour travailler sur un autre projet par exemple 
```bash
make down
```
Si vous n'avez pas build essentials , vous pouvez lancer ces 5 commandes

```bash
	docker-compose up -d 
	docker-compose exec apache symfony composer install --prefer-dist --optimize-autoloader
	docker-compose exec apache composer clear-cache
	docker-compose exec apache symfony console doctrine:migrations:migrate
	docker-compose exec apache symfony console d:f:l
```

## Accéfder au serveur local
Ici vous avez deux possibilités: 

- Soit vous utilisez le serveur web docker mis à votre disposition après l'initialisation du projet : https://localhost:8081
- Soit vous utilisez tout bêtement le serveur local symfony à l'aide de la commande ```symfony server:start ```, dans ce cas , pensez à installer l'autorité de certification symfony pour pouvoir utiliser le https: ```symfony server:ca:install```

Dans les deux cas, le projet est prêt à être développé.

Pour accéder au phpmyadmin du projet: https://localhost:8005 (root:root)
