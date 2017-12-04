

            $(document).ready(function () {

                $(window).scroll(function () {
                    if ($(this).scrollTop() > 200) {
                        $('.scrollup').fadeIn();
                    } else {
                        $('.scrollup').fadeOut();
                    }
                });

                $('.scrollup').click(function () {
                    $("html, body").animate({scrollTop: 0}, 600);
                    return false;
                });

                // Single page nav
                $('.tm-main-nav').singlePageNav({
                    'currentClass': "active",
                    offset: 20
                });

                $('.tm-site-name').singlePageNav({
                    'currentClass': "active",
                    offset: 20
                });

                $('.tm-gallery-3').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery: {enabled: true}
                    // other options
                });

//                $(window).scroll(function () {
//                    if ($(this).scrollTop() > 100) {
//                        $('.scrollup').fadeIn();
//                    } else {
//                        $('.scrollup').fadeOut();
//                    }
//                });
//
//                $('.scrollup').click(function () {
//                    $("html, body").animate({scrollTop: 0}, 600);
//                    return false;
//                });
                $('.tm-current-year').text(new Date().getFullYear());
            });