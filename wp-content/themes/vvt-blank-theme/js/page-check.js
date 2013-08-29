jQuery(function($)
{
    var pathname = location.href;

    if (pathname === "http://findx.se/find-me/")
    {
        $('.xoxo').css({ display: 'none'});
        $('div#footer').css({ display: 'none'});
        $('.header-banner').css({ display: 'none'});
        $('.menu li').css({ top: '28px'});
    }
    if (pathname === "http://findx.se/find-a-city/")
    {
        $('.xoxo').css({ display: 'none'});
        $('div#footer').css({ display: 'none'});
        $('.header-banner').css({ display: 'none'});
        $('.menu li').css({ top: '28px'});
    }
    if (pathname === "http://findx.se/distance-x/")
    {
       $('.xoxo').css({ display: 'none'});
       $('div#footer').css({ display: 'none'});
       $('.header-banner').css({ display: 'none'});
       $('.menu li').css({ top: '28px'});
    }
    if (pathname === "http://findx.se/about-findx/")
    {
       $('.xoxo').css({ display: 'none'});
       $('div#footer').css({ display: 'none'});
       $('.header-banner').css({ display: 'none'});
       $('.menu li').css({ top: '28px'});
    }
});
