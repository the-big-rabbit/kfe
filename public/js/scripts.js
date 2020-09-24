/* 
Plugins jquery (utilisables depuis $(selector).function() )

* chargePhoto()
mailto()
resize_img()
apparition()

// Functions raccourcies utiles : 
$.scripts.send() // Requête AJAX avec paramettres
(url,type="GET",data="",function(){})
Ou function = success

$.fancy() avec en paramettres
(data,type="inline",close = false,functio(){})
Où , data peut être un lien vers (image , video ) ou du HTML.
Pour type -> Se référer a doc fancy3.
La fonction charge fancybox s'il n'est pas chargé.
Function() est le callback , une fois que la fancy est affichée.

//////////////////////////////////

Chargement de scripts de façon automatique :

-Font-awesome PRO si les classes suivantes sont trouvées :
.fa,.fab,.far,.fal

-Fancybox si la classe suivante est trouvée : .fancy

- Masonry si .masonry es trouvée

- Superfish si .superfish est trouvé

- Google recaptcha si #g-recaptcha est trouvé




*/


if(typeof(root) === typeof(undefined))
    var root = '/';
/* DEFINITION DES PLUGINS JQUERY */

$.fn.mailto = function(mail){
    var tmail = /^[a-zA-Z0-9]([-_.]?[a-zA-Z0-9])*@[a-zA-Z0-9]([-_.]?[a-zA-Z0-9])*\.([a-z]{2,4})$/;

    if(tmail.test(mail)){
        this.on('click',function(e){
            e.preventDefault();
            window.location.href = 'mailto:'+mail;
        });
    }
};
$.fn.apparition = function(opts){

    let defaults = {
        scrollTop : null,
    };
    if(typeof (opts) != 'undefined'){
        defaults = opts;
    }

    if(defaults.scrollTop == null){
        defaults.scrollTop = $(window).scrollTop() +  $(window).height() * 0.7;
    }

    let regPixels = new RegExp(/.*px$/,'i');
    this.each(function(){
        let ot = $(this).offset().top;

        if($(this).data('offset') != null){

            let offset = $(this).data('offset');
            if(regPixels.text(offset)){
                offset.replace(/(.*)px$/,'$1');
            }
            else{
                offset = $(window).height() * offset;
            }

            if(offset > 100 && $(window).height() < 900){
                offset = 100;

            }
            ot += parseInt(offset);
        }
        if(defaults.scrollTop > ot && $(this).hasClass('hide')){
            $(this).removeClass('hide');
        }
    });
    return this;
};

$.fn.extend({
    setCustomValidity : function(message){
        this[0].setCustomValidity(message);
        return this;
    },
    checkValidity : function(){
        return this[0].checkValidity();
    }
});
/* FIN Definition des plugins Jquery*/


/* Définition du namespace*/
$.scripts ={
    /* Variables */
    fin_charge_photo : false,
    compteur_script_ajax: 0,
    lang : (typeof(lang_get) == "undefined") ? 'fr' : lang_get,
    fichiers_fancy:[
        {
            src: root+"js/lib/fancybox/dist/jquery.fancybox.min.js"
        },
        {
            src: root+"js/lib/fancybox/dist/jquery.fancybox.min.css"
        }
        ],
    /* FIN VARIABLES */
    /* Functions */
    send:function(url,type='GET',data='',fn = function(e){}){

        var content = !(typeof(data) == 'object');

        if(typeof(data) == 'function')
        {
            fn = data;
            data = '';
        }
        if(typeof(type) == 'function'){
            fn = type;
            type = 'GET';
        }
        $.ajax(
            {
                type: type,
                url: url,
                data: data,
                contentType: content,
                processData: content,
                success:function(e){
                    fn(e);
                }
            });
    },
    fancy: function(data,type='inline',close = false,fn = function(e){}){
        var $this = $.scripts;
        /* Variable fonction*/
        if(typeof(close) == 'function'){
            fn = close;
            close = false;
        }
        if(typeof(type) == 'function'){
            fn = type;
            type = 'inline';
        }
        var fancy = function(){
            if(close == true)
                $.fancybox.close();
            $.fancybox.open([{
                src: data,
                type: 'inline',
                opts: {
                    afterShow: function(instance , current){
                        fn(data);
                    }
                }
            }]);
        };

        if($.fn.fancybox)
            fancy();
        else{
            $.scripts.fichiers_fancy[0].callback = fancy;
            scriptLoader.add($.scripts.fichiers_fancy);
            scriptLoader.load();
        }

    }

};


/* FIN DE DEFINITION DU NAMESPACE*/


/*Lancement  des fonctions de base */


/* Debut du chargement des scirpts */
var scripts = new Array() ;

$(function() {

    if($('.fa,.fab,.far,.fal,.fas').length)
    {
        scriptLoader.add({src: root+"js/lib/fontawesome-pro/css/all.min.css",preload:true});
    }

    if($('.fancy').length)
    {
        scriptLoader.add([
            {
                src: root+"js/lib/fancybox/dist/jquery.fancybox.min.css",
                preload:true
            },
            {
                src: root+"js/lib/fancybox/dist/jquery.fancybox.min.js",
                callback: function(){
                    $('.fancy').fancybox();
                }
            }

        ]);

    }
    if($('.masonry').length )
    {
        scriptLoader.add(
            {
                src: root+'js/lib/packery/dist/packery.pkgd.min.js',
                callback: function(){

                    $('.masonry').packery({
                        itemSelector: '.grid-item',
                        percentPosition: true
                    })

                }
            });
    }


    $(window).on('scroll',function(){
        $('.apparition.hide').apparition();
    });

    if($('#g-recaptcha').length ||$('.g-recaptcha').length)
    {
        scriptLoader.add({
            src: "https://www.google.com/recaptcha/api.js?hl="+$.scripts.lang
        })
    }

    $(window).on('load',function (e) {
        setTimeout(function(){
            $('.apparition.hide').apparition();
        },1500)
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50 ) {
                $('.scrolltop:hidden').stop(true, true).fadeIn();
            } else {
                $('.scrolltop').stop(true, true).fadeOut();
            }
        });
        $(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})
    });


    scriptLoader.load();
});
