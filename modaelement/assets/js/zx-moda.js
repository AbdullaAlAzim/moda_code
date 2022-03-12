(function ($) {
    "use strict";

    var ModaGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });
        if ($('.wow').length) {
            new WOW({
                offset: 100,
                mobile: true
            }).init()
        }
        jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.moda-sticky-header').addClass('sticky-on')
            } else {
                jQuery('.moda-sticky-header').removeClass('sticky-on')
            }
        });
        $('.moda-icon-lightbox a').on('click', '[data-lightbox]', lity);
        // Js End

    };

    var CDNavMenu = function ($scope, $) {

        $scope.find('.moda-nav-builder').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            $('.str-open_mobile_menu').on("click", function () {
                $('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
            });
            $('.str-open_mobile_menu').on('click', function () {
                $('body').toggleClass('mobile_menu_overlay_on');
            });
            if ($('.str-mobile_menu li.dropdown ul').length) {
                $('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
                $('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
                    $(this).prev('ul').slideToggle(500);
                });
            }
            // Js End
        });

    };


    var Modaheroslider = function ($scope, $) {

        $scope.find('.moda-hero-section').each(function () {
            var settings = $(this).data('moda');
            // Js Start
            $(document).ready(function () {
                var swiper = new Swiper(".moda-hero-wraper", {
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    speed: 500,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination",
                        type: "fraction"
                    },
                    on: {
                        init: function () {
                            $(".swiper-progress-bar").removeClass("animate");
                            $(".swiper-progress-bar").removeClass("active");
                            $(".swiper-progress-bar").eq(0).addClass("animate");
                            $(".swiper-progress-bar").eq(0).addClass("active");
                        },
                        slideChangeTransitionStart: function () {
                            $(".swiper-progress-bar").removeClass("animate");
                            $(".swiper-progress-bar").removeClass("active");
                            $(".swiper-progress-bar").eq(0).addClass("active");
                        },
                        slideChangeTransitionEnd: function () {
                            $(".swiper-progress-bar").eq(0).addClass("animate");
                        }
                    }
                });
                $('.moda-hero-wraper').hover(function () {
                    swiper.autoplay.stop();
                    $('.swiper-progress-bar').removeClass('animate');
                }, function () {
                    swiper.autoplay.start();
                    $('.swiper-progress-bar').addClass('animate');
                });
            });
            // Js End
        });

    };

    var Productpromo = function ($scope, $) {

        $scope.find('.product-fashion-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".mySwiper-one", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            // Js End
        });

    };
    var Modabrand = function ($scope, $) {

        $scope.find('.brand-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".brand-wraper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 5,
                speed: 1000,
                breakpoints: {
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                }
            });
            // Js End
        });

    };
    var Modaheroslider1 = function ($scope, $) {

        $scope.find('.moda-banner-slider').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-electronic-banner", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: "#electronic-banner-next",
                    prevEl: "#electronic-banner-prev",
                },
            });
            // Js End
        });

    };
    var Modaheroslider2 = function ($scope, $) {

        $scope.find('.moda-banner-slider').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-furniture-banner", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
            // Js End
        });

    };
    var Modatestimonial = function ($scope, $) {

        $scope.find('.moda-testimonial-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-testimonial-inner", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: "auto",
                centeredSlides: true,
                spaceBetween: 30,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },
                    100: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                }
            });
            // Js End
        });

    };
    var Modatestimonial1 = function ($scope, $) {

        $scope.find('.moda-furniture-testimonial-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-furniture-testimonial-wraper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 4,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                }
            });
            // Js End
        });

    };
    var Modadiscount = function ($scope, $) {

        $scope.find('.moda-product-discount-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-discount-wrapper", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
            // Js End
        });

    };
    var Modaproductslider = function ($scope, $) {

        $scope.find('.product-category-inner').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".product-area", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 4,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                }
            });
            // Js End
        });

    };
    var Modaproductcategory = function ($scope, $) {

        $scope.find('.moda-categories-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-categories-section-wraper", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 4,
                speed: 1000,
                navigation: {
                    nextEl: "#ctg-next",
                    prevEl: "#ctg-prev",
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    100: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                }
            });
            // Js End
        });

    };
    var Modaproductgrid = function ($scope, $) {

        $scope.find('.moda-product-recently-viewed').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-recent-product-wraper", {
                loop: true,
                spaceBetween: 25,
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: "#product-next",
                    prevEl: "#product-prev",
                },
            });
            // Js End
        });

    };
    var Modaproductgrid3 = function ($scope, $) {

        $scope.find('.moda-flash-sale-today-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-flash-slide-inner", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            // Js End
        });

    };

    var Modaproducttab = function ($scope, $) {

        $scope.find('.moda-furniture-product-featured').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-furniture-product-slider", {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 1,
                observer: true,
                observeParents: true,
                speed: 1000,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            // Js End
        });

    };
    var Modaproducttab1 = function ($scope, $) {

        $scope.find('.moda-product-popular-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var swiper = new Swiper(".moda-tabs-slider-inner", {
                loop: true,
                spaceBetween: 0,
                slidesPerView: 1,
                observer: true,
                observeParents: true,
                speed: 1000,
                navigation: {
                    nextEl: "#tab-next",
                    prevEl: "#tab-prev",
                },
            });
            // Js End
        });

    };
    var ModaComingSoon = function ($scope, $) {

        $scope.find('.moda-coming-soon-section, ' +
            '.moda-flash-sale-today-section, ' +
            '.moda-furnitures-deal-offer-section').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            var time = $('#coming-soon').data('time');
            $('#coming-soon').countdown({
                date: time
            }, function () {
                alert('Time Over!');
            });
            // Js End
        });

    };
    var Modaheadersearch = function ($scope, $) {

        $scope.find('.moda-header-elements').each(function () {
            var settings = $(this).data('moda');

            // Js Start
            $(".searchbtn").click(function (event) {
                event.preventDefault();
                $(this).toggleClass("bg-green");
                $(".fas").toggleClass("color-white");
                $(".wrapper").toggleClass("search-area");
                $(".input").focus().toggleClass("active-width").val('');
                $("section").click(function () {
                    $(".wrapper").removeClass("search-area");
                    $(".searchbtn").removeClass("bg-green");
                });
            });

            $('.open-nav').click(function () {
                $('body').addClass('right-side-nav-activee');
            });
            $('.nav-close-btn, .nav_close, .right-overlaly, .overlaly').click(function () {

                $('body').removeClass('right-side-nav-activee');
            });

            $('.moda-cart-open').click(function (event) {
                event.preventDefault();
                $('body').addClass('moda-cart-activee');
            });
            $('.cart-overlay, .cart-close').click(function (event) {
                event.preventDefault();
                $('body').removeClass('moda-cart-activee');
            });
            // Js End
        });

    };


    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            console.log('Elementor editor mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', ModaGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/nav-builder.default', CDNavMenu);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider1);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider2);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-promo.default', Productpromo);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-brand.default', Modabrand);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-testimonial.default', Modatestimonial);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-testimonial.default', Modatestimonial1);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-promo.default', Modadiscount);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-slider.default', Modaproductslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-category.default', Modaproductcategory);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', Modaproductgrid);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', Modaproductgrid3);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', ModaComingSoon);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-tab.default', Modaproducttab);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-tab.default', Modaproducttab1);
            elementorFrontend.hooks.addAction('frontend/element_ready/header-elements.default', Modaheadersearch);
            elementorFrontend.hooks.addAction('frontend/element_ready/extra-elements.default', ModaComingSoon);

        } else {
            console.log('Elementor frontend mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', ModaGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider1);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-hero-slider.default', Modaheroslider2);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-promo.default', Productpromo);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-brand.default', Modabrand);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-testimonial.default', Modatestimonial);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-testimonial.default', Modatestimonial1);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-promo.default', Modadiscount);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-slider.default', Modaproductslider);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-category.default', Modaproductcategory);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', Modaproductgrid);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', Modaproductgrid3);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-grid.default', ModaComingSoon);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-tab.default', Modaproducttab);
            elementorFrontend.hooks.addAction('frontend/element_ready/moda-product-tab.default', Modaproducttab1);
            elementorFrontend.hooks.addAction('frontend/element_ready/extra-elements.default', ModaComingSoon);

        }
    });
    console.log('addon js loaded');
})(jQuery);