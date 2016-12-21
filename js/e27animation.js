$(window).bind('scroll', function () {

    if ($(window).scrollTop() > 150)
        $('#secNav').addClass('nav-down');
    else
        $('#secNav').removeClass('nav-down');
});