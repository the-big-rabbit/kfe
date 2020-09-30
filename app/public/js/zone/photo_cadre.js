$(".zone.photo_cadre").each(function () {
    var zone = $(this);
    var slider = new Swiper(zone.find(".content_diapo").eq(0)[0], {
        loop: true,
        speed: 1000,
        centeredSlides: true,
        autoplay: {
            delay: 10000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            init: function () {
                const photos = this.$el[0].querySelectorAll(
                    ".photo:not(.loaded),[data-src]"
                );

                if (LazyLoad !== undefined) {
                    if (LazyLoad.ImageObserver != null) {
                        photos.forEach(function (photo) {
                            LazyLoad.ImageObserver.observe(photo);
                        });
                    } else {
                        photos.forEach(function (photo) {
                            LazyLoad.lazyObjects[lazyImages.length] = photo;
                        });
                    }
                }
            },
        },
    });
});