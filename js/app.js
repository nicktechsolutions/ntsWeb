$(document).ready(function () {

    // Smooth scrolling
    $("a[href^='#']").on("click", function(e){

        e.preventDefault();

        let target = $(this).attr("href");

        $("html, body").animate({
            scrollTop: $(target).offset().top
        }, 800);

    });

});
