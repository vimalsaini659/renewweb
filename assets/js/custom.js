$(document).ready(function () {

    $(".filter-button").click(function () {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else {
            //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
            //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");

});
(function ($) {
    'use strict'; $('.mean-menu').meanmenu({ meanScreenWidth: "991" }); $(window).on('scroll', function () {
        if ($(this).scrollTop() > 150) { $('.navbar-area').addClass("is-sticky"); }
        else { $('.navbar-area').removeClass("is-sticky"); };
    }); $(window).on('load', function () { $('.preloader-area').fadeOut(); }); $('.odometer').appear(function (e) { var odo = $(".odometer"); odo.each(function () { var countNumber = $(this).attr("data-count"); $(this).html(countNumber); }); }); AOS.init({ disable: function () { var maxWidth = 900; return window.innerWidth < maxWidth; } }); $(".others-option-for-responsive .dot-menu").on("click", function () { $(".others-option-for-responsive .container .container").toggleClass("active"); }); $('.hero-slider').owlCarousel({ loop: true, margin: 0, nav: true, dots: true, items: 1, thumbs: true, thumbsPrerendered: true, autoplay: true, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], }); $('.hero-slider2').owlCarousel({ loop: true, margin: 0, nav: true, dots: false, items: 1, thumbs: false, autoplay: true, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], }); $('.courses-slider').owlCarousel({ loop: true, margin: 30, nav: true, dots: true, thumbs: false, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 3, }, 1200: { items: 3, }, } }); $('.campus-slider').owlCarousel({ loop: true, margin: 30, nav: true, thumbs: false, dots: true, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 2, }, 1200: { items: 2, }, } }); $('.campus-slider2').owlCarousel({ loop: true, margin: 30, nav: true, thumbs: false, dots: false, center: true, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 3, }, 1200: { items: 3, }, } }); $('.events-slider').owlCarousel({ loop: true, margin: 30, nav: true, dots: true, thumbs: false, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 3, }, 1200: { items: 3, }, } }); $('.news-slider').owlCarousel({ loop: true, margin: 30, nav: true, dots: true, thumbs: false, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 3, }, 1200: { items: 3, }, } }); $('.health-care-slider').owlCarousel({ loop: true, margin: 30, nav: true, dots: false, thumbs: false, autoplay: false, smartSpeed: 1000, autoplayHoverPause: true, navText: ['<i class="ri-arrow-left-line"></i>', '<i class="ri-arrow-right-line"></i>',], responsive: { 0: { items: 1, }, 768: { items: 2, }, 992: { items: 3, }, 1200: { items: 3, }, } }); $(document).ready(function () { $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({ disableOn: 100, type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: false, fixedContentPos: false }); }); $(".newsletter-form").validator().on("submit", function (event) { if (event.isDefaultPrevented()) { formErrorSub(); submitMSGSub(false, "Please enter your email correctly."); } else { event.preventDefault(); } }); function callbackFunction(resp) {
        if (resp.result === "success") { formSuccessSub(); }
        else { formErrorSub(); }
    }
    function formSuccessSub() { $(".newsletter-form")[0].reset(); submitMSGSub(true, "Thank you for subscribing!"); setTimeout(function () { $("#validator-newsletter, #validator-newsletter-2").addClass('hide'); }, 4000) }
    function formErrorSub() { $(".newsletter-form").addClass("animated shake"); setTimeout(function () { $(".newsletter-form").removeClass("animated shake"); }, 1000) }
    function submitMSGSub(valid, msg) {
        if (valid) { var msgClasses = "validation-success"; } else { var msgClasses = "validation-danger"; }
        $("#validator-newsletter, #validator-newsletter-2").removeClass().addClass(msgClasses).text(msg);
    }
    $('.input-counter').each(function () {
        var spinner = jQuery(this), input = spinner.find('input[type="text"]'), btnUp = spinner.find('.plus-btn'), btnDown = spinner.find('.minus-btn'), min = input.attr('min'), max = input.attr('max'); btnUp.on('click', function () {
            var oldValue = parseFloat(input.val()); if (oldValue >= max) { var newVal = oldValue; } else { var newVal = oldValue + 1; }
            spinner.find("input").val(newVal); spinner.find("input").trigger("change");
        }); btnDown.on('click', function () {
            var oldValue = parseFloat(input.val()); if (oldValue <= min) { var newVal = oldValue; } else { var newVal = oldValue - 1; }
            spinner.find("input").val(newVal); spinner.find("input").trigger("change");
        });
    }); function makeTimer() {
        var endTime = new Date("September 20, 2025 17:00:00 PDT"); var endTime = (Date.parse(endTime)) / 1000; var now = new Date(); var now = (Date.parse(now) / 1000); var timeLeft = endTime - now; var days = Math.floor(timeLeft / 86400); var hours = Math.floor((timeLeft - (days * 86400)) / 3600); var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60); var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60))); if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        $("#days").html(days + "<span>Days</span>"); $("#hours").html(hours + "<span>Hours</span>"); $("#minutes").html(minutes + "<span>Minutes</span>"); $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function () { makeTimer(); }, 0);
   $(window).on('scroll', function () { var scrolled = $(window).scrollTop(); if (scrolled > 300) $('.go-top').addClass('active'); if (scrolled < 300) $('.go-top').removeClass('active'); }); $('.go-top').on('click', function () { $("html, body").animate({ scrollTop: "0" }, 500); }); try { document.getElementById("year").innerHTML = new Date().getFullYear(); } catch (err) { }
    $('body'); $('body').append("<div class='switch-box'><label id='switch' class='switch'><input type='checkbox' onchange='toggleTheme()' id='slider'><span class='slider round'></span></label></div>");
})(jQuery);
try {
    function setTheme(themeName) { localStorage.setItem('sanu_theme', themeName); document.documentElement.className = themeName; }
    function toggleTheme() { if (localStorage.getItem('sanu_theme') === 'theme-dark') { setTheme('theme-light'); } else { setTheme('theme-dark'); } }
    (function () { if (localStorage.getItem('sanu_theme') === 'theme-dark') { setTheme('theme-dark'); document.getElementById('slider').checked = false; } else { setTheme('theme-light'); document.getElementById('slider').checked = true; } })();
} catch (err) { }