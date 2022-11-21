function swapImages() {
    var $active = $("#myGallery .active");
    var $next =
        $("#myGallery .active").next().length > 0
            ? $("#myGallery .active").next()
            : $("#myGallery img:first");
    $active.fadeOut(function () {
        $active.removeClass("active");
        $next.fadeIn().addClass("active");
    });
}

$(document).ready(function () {
    // Run our swapImages() function every 5secs
    setInterval("swapImages()", 5000);
});

//  Aside Ads Banar
function swapImages() {
    var $active = $("#myGalleryAside .active");
    var $next =
        $("#myGalleryAside .active").next().length > 0
            ? $("#myGalleryAside .active").next()
            : $("#myGalleryAside img:first");
    $active.fadeOut(function () {
        $active.removeClass("active");
        $next.fadeIn().addClass("active");
    });
}

$(document).ready(function () {
    // Run our swapImages() function every 5secs
    setInterval("swapImages()", 5000);
});