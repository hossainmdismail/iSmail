///////stiky //////
$(document).ready(function () {
    if ($(window).width() > 992) {
        $(".product_img_scroll, .pro_sticky_info").stick_in_parent();
    }
});

var scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#order-menu',
    offset: 350
})