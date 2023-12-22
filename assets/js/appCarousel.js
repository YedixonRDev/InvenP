let DIRECTION = null;
function direction() {
    if (DIRECTION === null) {
        DIRECTION = getComputedStyle(document.body).direction;
    }
    return DIRECTION;
}

function isRTL() {
    return direction() === 'rtl';
}

const productsNewCarousel = () =>{
    const carouselOptions = {
        'grid-4': {
            items: 4,
        },
        'grid-4-sidebar': {
            items: 4,
            responsive: {
                1400: {items: 4},
                1200: {items: 3},
                992: {items: 3, margin: 16},
                768: {items: 3, margin: 16},
                576: {items: 2, margin: 16},
                460: {items: 2, margin: 16},
                0: {items: 1},
            }
        },
        'grid-5': {
            items: 5,
            responsive: {
                1400: {items: 5},
                1200: {items: 4},
                992: {items: 4, margin: 16},
                768: {items: 3, margin: 16},
                576: {items: 2, margin: 16},
                460: {items: 2, margin: 16},
                0: {items: 1},
            }
        },
        'grid-6': {
            items: 6,
            margin: 16,
            responsive: {
                1400: {items: 6},
                1200: {items: 4},
                992: {items: 4, margin: 16},
                768: {items: 3, margin: 16},
                576: {items: 2, margin: 16},
                460: {items: 2, margin: 16},
                0: {items: 1},
            }
        },
        'horizontal': {
            items: 4,
            responsive: {
                1400: {items: 4, margin: 14},
                992: {items: 3, margin: 14},
                768: {items: 2, margin: 14},
                0: {items: 1, margin: 14},
            }
        },
        'horizontal-sidebar': {
            items: 3,
            responsive: {
                1400: {items: 3, margin: 14},
                768: {items: 2, margin: 14},
                0: {items: 1, margin: 14},
            }
        }
    };
    $('.block-products-carousel').each(function() {
        const block = $(this);
        const layout = $(this).data('layout');
        const owlCarousel = $(this).find('.owl-carousel');
        owlCarousel.owlCarousel(Object.assign({}, {
            dots: false,
            margin: 20,
            loop: true,
            rtl: isRTL()
        }, carouselOptions[layout]));
        $(this).find('.section-header__arrow--prev').on('click', function() {
            owlCarousel.trigger('prev.owl.carousel', [500]);
        });
        $(this).find('.section-header__arrow--next').on('click', function() {
            owlCarousel.trigger('next.owl.carousel', [500]);
        });
        let cancelPreviousGroupChange = function() {};
        $(this).find('.section-header__groups-button').on('click', function() {
            const carousel = block.find('.block-products-carousel__carousel');
            if ($(this).is('.section-header__groups-button--active')) {
                return;
            }
            cancelPreviousGroupChange();
            $(this).closest('.section-header__groups').find('.section-header__groups-button').removeClass('section-header__groups-button--active');
            $(this).addClass('section-header__groups-button--active');
            carousel.addClass('block-products-carousel__carousel--loading');

            let timer;
            timer = setTimeout(function() {
                let items = block.find('.owl-carousel .owl-item:not(".cloned") .block-products-carousel__column');
                const itemsArray = items.get();
                const newItemsArray = [];
                while (itemsArray.length > 0) {
                     const randomIndex = Math.floor(Math.random() * itemsArray.length);
                     const randomItem = itemsArray.splice(randomIndex, 1)[0];

                     newItemsArray.push(randomItem);
                 }
                items = $(newItemsArray);

                block.find('.owl-carousel')
                    .trigger('replace.owl.carousel', [items])
                    .trigger('refresh.owl.carousel')
                    .trigger('to.owl.carousel', [0, 0]);
                $('.product-card__action--quickview', block).on('click', function() {
                    quickview.clickHandler.apply(this, arguments);
                });
                carousel.removeClass('block-products-carousel__carousel--loading');
            }, 1000);
            cancelPreviousGroupChange = function() {
                clearTimeout(timer);
                cancelPreviousGroupChange = function() {};
            };
        });
    });
};

const productsPromotionCarousel = ()=>{
    $('.block-sale').each(function() {
        const owlCarousel = $(this).find('.owl-carousel');
        owlCarousel.owlCarousel({
            items: 5,
            dots: true,
            margin: 24,
            loop: true,
            rtl: isRTL(),
            responsive: {
                1400: {items: 5},
                1200: {items: 4},
                992: {items: 4, margin: 16},
                768: {items: 3, margin: 16},
                576: {items: 2, margin: 16},
                460: {items: 2, margin: 16},
                0: {items: 1},
            },
        });
        $(this).find('.block-sale__arrow--prev').on('click', function() {
                owlCarousel.trigger('prev.owl.carousel', [500]);
        });
        $(this).find('.block-sale__arrow--next').on('click', function() {
                owlCarousel.trigger('next.owl.carousel', [500]);
        });
    });
}

const productGalleryCarousel = (element, layout) => {
    layout = layout !== undefined ? layout : 'standard';
    const options = {
        dots: false,
        margin: 10,
        rtl: isRTL(),
    };
    const layoutOptions = {
        'product-sidebar': {
            responsive: {
                1400: {items: 8, margin: 10},
                1200: {items: 6, margin: 10},
                992: {items: 8, margin: 10},
                768: {items: 8, margin: 10},
                576: {items: 6, margin: 10},
                420: {items: 5, margin: 8},
                0: {items: 4, margin: 8}
            },
        },
        'product-full': {
            responsive: {
                1400: {items: 6, margin: 10},
                1200: {items: 5, margin: 8},
                992: {items: 7, margin: 10},
                768: {items: 5, margin: 8},
                576: {items: 6, margin: 8},
                420: {items: 5, margin: 8},
                0: {items: 4, margin: 8}
            }
        },
        quickview: {
            responsive: {
                992: {items: 5},
                520: {items: 6},
                440: {items: 5},
                340: {items: 4},
                0: {items: 3}
            }
        },
    };
    const gallery = $(element);
    const image = gallery.find('.product-gallery__featured .owl-carousel');
    const carousel = gallery.find('.product-gallery__thumbnails .owl-carousel');
    image
        .owlCarousel({items: 1, dots: false, rtl: isRTL()})
        .on('changed.owl.carousel', syncPosition);
    carousel
        .on('initialized.owl.carousel', function () {
            carousel.find('.product-gallery__thumbnails-item').eq(0).addClass('product-gallery__thumbnails-item--active');
        })
        .owlCarousel($.extend({}, options, layoutOptions[layout]));
    carousel.on('click', '.owl-item', function(e){
        e.preventDefault();
        image.data('owl.carousel').to($(this).index(), 300, true);
    });
    gallery.find('.product-gallery__zoom').on('click', function() {
        openPhotoSwipe(image.find('.owl-item.active').index());
    });
    image.on('click', '.owl-item > a', function(event) {
        event.preventDefault();
        openPhotoSwipe($(this).closest('.owl-item').index());
    });
    function getIndexDependOnDir(index) {
        if (isRTL()) {
            return image.find('.owl-item img').length - 1 - index;
        }
        return index;
    }
    function openPhotoSwipe(index) {
        const photoSwipeImages = image.find('.owl-item a').toArray().map(function(element) {
            const img = $(element).find('img')[0];
            const width = $(element).data('width') || img.naturalWidth;
            const height = $(element).data('height') || img.naturalHeight;

            return {
                src: element.href,
                msrc: element.href,
                w: width,
                h: height,
            };
        });

        if (isRTL()) {
            photoSwipeImages.reverse();
        }

        const photoSwipeOptions = {
            getThumbBoundsFn: index => {
                const imageElements = image.find('.owl-item img').toArray();
                const dirDependentIndex = getIndexDependOnDir(index);

                if (!imageElements[dirDependentIndex]) {
                    return null;
                }

                const tag = imageElements[dirDependentIndex];
                const width = tag.naturalWidth;
                const height = tag.naturalHeight;
                const rect = tag.getBoundingClientRect();
                const ration = Math.min(rect.width / width, rect.height / height);
                const fitWidth = width * ration;
                const fitHeight = height * ration;

                return {
                    x: rect.left + (rect.width - fitWidth) / 2 + window.pageXOffset,
                    y: rect.top + (rect.height - fitHeight) / 2 + window.pageYOffset,
                    w: fitWidth,
                };
            },
            index: getIndexDependOnDir(index),
            bgOpacity: .9,
            history: false
        };

    }

    function syncPosition (el) {
        let current = el.item.index;

        carousel
            .find('.product-gallery__thumbnails-item')
            .removeClass('product-gallery__thumbnails-item--active')
            .eq(current)
            .addClass('product-gallery__thumbnails-item--active');
        const onscreen = carousel.find('.owl-item.active').length - 1;
        const start = carousel.find('.owl-item.active').first().index();
        const end = carousel.find('.owl-item.active').last().index();

        if (current > end) {
            carousel.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            carousel.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }
};

const productGalleryCarouselInit = () =>{
    $('.product').each(function () {
        const gallery = $(this).find('.product-gallery');

        if (gallery.length > 0) {
            productGalleryCarousel(gallery[0], gallery.data('layout'));
        }
    });
}