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

$(document).ready(function () {

    let counted = false;

    $(window).on("scroll", function () {

        let sectionTop = $("#statistics").offset().top - window.innerHeight + 100;

        if (!counted && $(window).scrollTop() >= sectionTop) {

            $(".counter").each(function () {

                let $this = $(this);
                let target = parseInt($this.attr("data-target"));

                $({ countNum: 0 }).animate(
                    { countNum: target },
                    {
                        duration: 2000,
                        easing: "swing",
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(target + "+");
                        }
                    }
                );

            });

            counted = true;

        }

    });

});
