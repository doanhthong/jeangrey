/*
//////////

SCROLLING EFFECT

/////////
*/

//jQuery for page scrolling feature - requires jQuery Easing plugin
jQuery(function () {
    jQuery('a.page-scroll').bind('click', function (event) {
        var jQueryanchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
        }, 900, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Cache selectors
var $ = jQuery;
$(document).ready(function () {
    var lastId,
        topMenu = $(".dotstyle-container"),
        topMenuHeight = topMenu.outerHeight() + 15,
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var item = $($(this).attr("href"));
            if (item.length) { return item; }
        });

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    // menuItems.click(function(e){
    //   var href = $(this).attr("href"),
    //       offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
    //   $('html, body').stop().animate({ 
    //       scrollTop: offsetTop
    //   }, 200);
    //   e.preventDefault();
    // });

    // Bind to scroll
    $(window).scroll(function () {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + topMenuHeight;

        // Get id of current scroll item
        var cur = scrollItems.map(function () {
            if ($(this).offset().top < fromTop)
                return this;
        });
        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
        if (id == "")
            id = "echelon-intro";
        if (lastId !== id) {
            lastId = id;
            // Set/remove active class
            menuItems
                .parent().removeClass("current")
                .end().filter("[href='#" + id + "']").parent().addClass("current");

            //Check if this white section, change color of nav
            if ($("#" + id).hasClass("white-section")) {
                $(".dotstyle").find("a").addClass("dotstyle-dark");
            } else {
                $(".dotstyle").find("a").removeClass("dotstyle-dark");

            }
        }
    });
});

