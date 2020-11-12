! function(a) {
    "use strict";
    var b = {
        initialised: !1,
        version: 1.1,
        mobile: !1,
        responsiveExtra: !1,
        headerClone: !1,
        container: a("#portfolio-item-container"),
        portfolioElAnimation: !0,
        init: function() { if (!this.initialised) { this.initialised = !0, this.checkMobile(), this.checkPlaceholder(), this.fullHeight(), this.menuHover(), this.stickyMenu(), this.responsiveMenu(), this.responsiveMenuExtra(), this.searchInput(), this.itemSizeFix(), this.hoverItemFix(), this.verticalTabHeightFix(), this.filterColorBg(), this.productCarousel(), this.sideBackground(), this.priceSlider(), this.ratings(), this.collapseArrows(), this.owlCarousels(), this.scrollToTopAnimation(), this.scrollToClass(), this.singlePortfolioToScroll(), this.singlePortfolioAffix(), this.filterScrollBar(), this.selectBox(), this.tooltip(), this.popover(), this.countTo(), this.progressBars(), this.registerKnob(), this.prettyPhoto(), this.flickerFeed(), this.parallax(), this.twitterFeed(); var a = this; "function" == typeof imagesLoaded && imagesLoaded(a.container, function() { a.isotopeActivate(), a.isotopeFilter() }) } },
        checkMobile: function() { this.mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? !0 : !1 },
        checkPlaceholder: function() { a.support.placeholder = function() { var a = document.createElement("input"); return "placeholder" in a }(), !a.support.placeholder && a.fn.placeholder && a("input, textarea").placeholder() },
        fullHeight: function() {
            var b = a(window).height();
            a(".full-height").each(function() {
                var c = a(this);
                if (c.hasClass("home-full-height")) {
                    var d = a("#header").height(),
                        e = b - d;
                    c.css("height", e)
                } else c.css("height", b)
            })
        },
        stickyMenu: function() {
            if (a(window).width() > 979) {
                var b = this,
                    c = a("#sticky-header");
                if (!b.headerClone) {
                    var d = a('[data-clone="sticky"]').clone(!0);
                    c.append(d).find("#responsive-nav").remove(), b.headerClone = !0
                }
                a.fn.waypoint && a('[data-fixed="fixed"]').waypoint("sticky", { stuckClass: "fixed", offset: -400 })
            }
        },
        destroyStickyHeader: function() { a.fn.waypoint && a(window).width() < 980 && a('[data-fixed="fixed"]').waypoint("unsticky") },
        menuHover: function() { a.fn.hoverIntent && a("ul.menu").hoverIntent({ over: function() { a(this).addClass("active") }, out: function() { a(this).removeClass("active") }, selector: "li", timeout: 145, interval: 55 }) },
        responsiveMenu: function() {
            var b = a("#header").find(".menu").clone(!0).removeClass("menu clearfix").addClass("responsive-menu"),
                c = a("#header").find("#responsive-menu-container");
            c.append(b), c.find("li, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-6, .col-md-2, .col-md-3, .col-md-4, .col-md-6").each(function() {
                var b = a(this);
                b.hasClass("megamenu-container") && b.removeClass("megamenu-container"), b.has("ul, .megamenu").prepend('<span class="menu-btn-wrapper"><span class="menu-btn"></span></span>')
            }), a(".menu-btn-wrapper").on("click", function(b) {
                var c = a(this);
                c.hasClass("active") ? a(this).closest("li, div").removeClass("open").end().removeClass("active").siblings("ul, .megamenu").slideUp("800") : a(this).closest("li, div").addClass("open").end().addClass("active").siblings("ul, .megamenu").slideDown("800"), b.preventDefault()
            }), a("#responsive-btn").on("click", function(b) {
                var c = a(this),
                    d = a("#responsive-menu-container");
                c.hasClass("active") ? d.slideUp(300, function() { c.removeClass("active") }) : d.slideDown(300, function() { c.addClass("active") }), b.preventDefault()
            })
        },
        responsiveMenuExtra: function() {
            var b = this;
            if (a("#header").hasClass("header1") && a(window).width() <= 767 && !b.responsiveExtra) {
                var c = a("#responsive-menu-container"),
                    d = a("#header").find(".search-container").clone(!0),
                    e = a("#header").find(".user-dropdown").clone(!0),
                    f = a("#header").find(".cart-dropdown").clone(!0);
                c.prepend(d).append(f, e), b.responsiveExtra = !0
            } else {
                if (!(a(window).width() > 767 && b.responsiveExtra)) return;
                var c = a("#responsive-menu-container");
                c.find(".search-container").remove(), c.find(".user-dropdown").remove(), c.find(".cart-dropdown").remove(), b.responsiveExtra = !1
            }
        },
        itemSizeFix: function() {
            var b = a("#content"),
                c = b.find(".product");
            c.each(function() {
                var b = a(this);
                b.hasClass("product2") || (b.width() <= 220 ? b.find(".product-add-btn").addClass("responsive") : b.find(".product-add-btn").removeClass("responsive"))
            })
        },
        hoverItemFix: function() {
            a(".product.product2").on("mouseover", function() {
                var b = a(this);
                b.width() <= 220 && b.find(".product-add-btn").addClass("responsive")
            }).on("mouseleave", function() { a(this).find(".product-add-btn").removeClass("responsive") })
        },
        verticalTabFixFunc: function() {
            if (!(a(window).width() <= 767)) {
                var b = a(this),
                    c = b.find(".tab-content"),
                    d = c.outerHeight(),
                    e = b.find(".nav.nav-tabs").find("li"),
                    f = e.length,
                    g = d / f;
                e.find("a").css({ height: g + 1, "line-height": g + "px" })
            }
        },
        verticalTabHeightFix: function() {
            var b = this;
            a(".tab-container").each(function() { b.verticalTabFixFunc.call(this) })
        },
        searchInput: function() {
            var b = a(".search-form");
            a(".header-search-btn, .search-close-btn").on("click", function(a) { b.hasClass("active") ? b.removeClass("active") : b.addClass("active"), a.preventDefault() })
        },
        filterColorBg: function() {
            a(".filter-color-box").each(function() {
                var b = a(this),
                    c = b.data("bgcolor");
                b.css("background-color", c)
            })
        },
        twitterFeed: function() { a.fn.tweet && a(".twitter-top-widget").length && a(".twitter-top-widget").tweet({ modpath: "./js/twitter/", avatar_size: 32, count: 2, username: "eternalfriend38", loading_text: "searching twitter...", join_text: "", retweets: !1, template: '<div class="tweet_top clearfix">{avatar}<span>@{user}</span></div>{text}{time}' }), a.fn.tweet && a(".twitter-widget").length && a(".twitter-widget").tweet({ modpath: "./js/twitter/", avatar_size: "", count: 2, query: "themeforest", loading_text: "searching twitter...", join_text: "", retweets: !1, template: "{text}{time}" }) },
        productCarousel: function() {
            if (a.fn.bxSlider) {
                var b = this;
                a(".product-single-carousel").bxSlider({ slideWidth: 600, minSlides: 1, maxSlides: 1, pager: !1, onSliderLoad: function() { b.resizeproductCarousel() } })
            }
        },
        resizeproductCarousel: function() {
            var b = a(".bx-viewport").height();
            a(".bx-viewport").closest(".carousel-container").css("height", b), a(window).width() > 767 && a(".sidebg").height(b - 1)
        },
        sideBackground: function() {
            if (a(".sidebg").length && a(window).width() > 767) {
                var b = a(window).width(),
                    c = a("#product-single-container").find(".container").width(),
                    d = (b - c) / 2;
                a(".sidebg").width(d), a(window).width() > 767 && a(window).width() < 992 && (a(".sidebg.middle").width(c / 2), a(".sidebg.middle").hasClass("left") && a(".sidebg.middle.left").css("left", d))
            }
        },
        priceSlider: function() { a.fn.noUiSlider && a("#price-range").noUiSlider({ range: [0, 800], start: [120, 640], handles: 2, connect: !0, serialization: { to: [a("#price-range-low"), a("#price-range-high")] } }) },
        ratings: function() {
            a.each(a(".ratings-result"), function() {
                var b = a(this),
                    c = b.closest(".ratings").width(),
                    d = a(this).data("result"),
                    e = c / 100 * d;
                a(this).css("width", e)
            })
        },
        collapseArrows: function() {
            a(".panel").each(function() {
                var b = a(this),
                    c = b.find(".accordion-btn"),
                    d = b.find(".accordion-body");
                c.length && d.on("shown.bs.collapse", function() { c.hasClass("open") || c.addClass("open") }).on("hidden.bs.collapse", function() { c.hasClass("open") && c.removeClass("open") })
            }), a(".category-widget-btn").on("click", function(b) {
                var c = a(this),
                    d = c.closest("li");
                d.hasClass("open") ? d.find("ul").slideUp(400, function() { d.removeClass("open") }) : d.find("ul").slideDown(400, function() { d.addClass("open") }), b.preventDefault()
            })
        },
        checkSupport: function(a, b) { return a.length && b ? !0 : !1 },
        owlCarousels: function() {
            function b() {
                var b = this.currentItem;
                a(".slider-thumb-nav.owl-carousel").find(".owl-item").removeClass("active").eq(b).addClass("active"), void 0 !== a(".slider-thumb-nav.owl-carousel").data("owlCarousel") && c(b)
            }

            function c(a) {
                var b, c = J.data("owlCarousel").owl.visibleItems,
                    d = a,
                    e = !1;
                for (b in c) d === c[b] && (e = !0);
                e === !1 ? d > c[c.length - 1] ? J.trigger("owl.goTo", d - c.length + 2) : (d - 1 === -1 && (d = 0), J.trigger("owl.goTo", d)) : d === c[c.length - 1] ? J.trigger("owl.goTo", c[1]) : d === c[0] && J.trigger("owl.goTo", d - 1)
            }
            var d = this,
                e = a(".owl-carousel.products-section-carousel");
            d.checkSupport(e, a.fn.owlCarousel) && e.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var f = a(".owl-carousel.brands-carousel");
            d.checkSupport(f, a.fn.owlCarousel) && f.owlCarousel({ items: 6, itemsDesktop: [1199, 5], itemsDesktopSmall: [979, 4], itemsTablet: [768, 3], itemsMobile: [479, 2], slideSpeed: 600, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, autoHeight: !0 });
            var g = a(".owl-carousel.blog-posts-carousel");
            d.checkSupport(g, a.fn.owlCarousel) && g.owlCarousel({ items: 2, itemsDesktop: [1199, 2], itemsDesktopSmall: [979, 2], itemsTablet: [768, 1], itemsMobile: [479, 1], slideSpeed: 600, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, autoHeight: !0 });
            var h = a(".owl-carousel.new-arrivals-carousel");
            d.checkSupport(h, a.fn.owlCarousel) && h.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var i = a(".owl-carousel.top-bestsellers-carousel");
            d.checkSupport(i, a.fn.owlCarousel) && i.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var j = a(".owl-carousel.tab-arrivals-carousel");
            d.checkSupport(j, a.fn.owlCarousel) && j.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var k = a(".owl-carousel.tab-bestsellers-carousel");
            d.checkSupport(k, a.fn.owlCarousel) && k.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 11e3, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var l = a(".owl-carousel.tab-featured-carousel");
            d.checkSupport(l, a.fn.owlCarousel) && l.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 12e3, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var m = a(".owl-carousel.top-rated-carousel");
            d.checkSupport(m, a.fn.owlCarousel) && m.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var n = a(".owl-carousel.product-slider");
            d.checkSupport(n, a.fn.owlCarousel) && n.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 500, paginationSpeed: 500, autoPlay: 8800, singleItem: !0, mouseDrag: !0, autoHeight: !1, transitionStyle: "fade" });
            var o = a(".owl-carousel.from-theblog-small");
            d.checkSupport(o, a.fn.owlCarousel) && o.owlCarousel({ items: 3, itemsDesktop: [1199, 3], itemsDesktopSmall: [979, 2], itemsTablet: [768, 1], itemsMobile: [479, 1], slideSpeed: 600, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, autoHeight: !0 });
            var p = a(".owl-carousel.footer-popular-slider");
            d.checkSupport(p, a.fn.owlCarousel) && p.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 500, paginationSpeed: 500, autoPlay: 11e3, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var q = a(".owl-carousel.footer-favorite-slider");
            d.checkSupport(q, a.fn.owlCarousel) && q.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 500, paginationSpeed: 500, autoPlay: 13e3, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var r = a(".owl-carousel.footer-specials-slider");
            d.checkSupport(r, a.fn.owlCarousel) && r.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 500, paginationSpeed: 500, autoPlay: 12e3, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var s = a(".owl-carousel.from-theblog-wide");
            d.checkSupport(s, a.fn.owlCarousel) && s.owlCarousel({ items: 2, itemsDesktop: [1199, 2], itemsDesktopSmall: [979, 2], itemsTablet: [768, 1], itemsMobile: [479, 1], slideSpeed: 600, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, autoHeight: !1 });
            var t = a(".owl-carousel.footer-toprated-slider");
            d.checkSupport(t, a.fn.owlCarousel) && t.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 500, paginationSpeed: 500, autoPlay: 1e4, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var u = a(".owl-carousel.popular-slider");
            d.checkSupport(u, a.fn.owlCarousel) && u.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 7200, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var v = a(".owl-carousel.specials-slider");
            d.checkSupport(v, a.fn.owlCarousel) && v.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 7200, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade", afterInit: function() { d.itemSizeFix() } });
            var w = a(".owl-carousel.category-banner-slider");
            d.checkSupport(w, a.fn.owlCarousel) && w.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 9e3, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "goDown" });
            var x = a(".owl-carousel.bestsellers-slider");
            d.checkSupport(x, a.fn.owlCarousel) && x.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 7200, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var y = a(".owl-carousel.bestsellers-carousel");
            d.checkSupport(y, a.fn.owlCarousel) && y.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var z = a(".owl-carousel.about-banner-slider");
            d.checkSupport(z, a.fn.owlCarousel) && z.owlCarousel({ navigation: !1, pagination: !0, slideSpeed: 400, paginationSpeed: 400, autoPlay: 8400, singleItem: !0, mouseDrag: !0, autoHeight: !1, transitionStyle: "backSlide" });
            var A = a(".owl-carousel.testimonials-slider");
            d.checkSupport(A, a.fn.owlCarousel) && A.owlCarousel({ navigation: !0, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 9600, singleItem: !0, mouseDrag: !0, autoHeight: !1, transitionStyle: "backSlide" });
            var B = a(".team-member-carousel.owl-carousel");
            d.checkSupport(B, a.fn.owlCarousel) && B.owlCarousel({ items: 2, itemsDesktop: [1199, 2], itemsDesktopSmall: [979, 1], itemsTablet: [768, 1], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 12e3, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !0 });
            var C = a(".latest-projects.owl-carousel");
            d.checkSupport(C, a.fn.owlCarousel) && C.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 1e4, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !0 });
            var D = a(".owl-carousel.latest-posts-slider");
            d.checkSupport(D, a.fn.owlCarousel) && D.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 400, paginationSpeed: 400, autoPlay: 7200, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var E = a(".owl-carousel.popular-posts-slider");
            d.checkSupport(E, a.fn.owlCarousel) && E.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 600, paginationSpeed: 400, autoPlay: 9e3, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var F = a(".owl-carousel.comments-slider");
            d.checkSupport(F, a.fn.owlCarousel) && F.owlCarousel({ navigation: !0, navigationText: !1, pagination: !1, slideSpeed: 600, paginationSpeed: 400, autoPlay: 1e4, singleItem: !0, mouseDrag: !0, autoHeight: !0, transitionStyle: "fade" });
            var G = a(".related-posts-carousel.owl-carousel");
            d.checkSupport(G, a.fn.owlCarousel) && G.owlCarousel({ items: 3, itemsDesktop: [1199, 3], itemsDesktopSmall: [979, 2], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 8e3, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !1 });
            var H = a(".purchased-items-slider.owl-carousel");
            d.checkSupport(H, a.fn.owlCarousel) && H.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 8e3, stopOnHover: !0, navigation: !1, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !0 });
            var I = a(".single-portfolio-slider.owl-carousel");
            d.checkSupport(I, a.fn.owlCarousel) && I.owlCarousel({ singleItem: !0, slideSpeed: 400, autoPlay: 8800, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !0, transitionStyle: "goDown", afterAction: b, responsiveRefreshRate: 200 });
            var J = a(".slider-thumb-nav.owl-carousel");
            d.checkSupport(J, a.fn.owlCarousel) && J.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 4], itemsTablet: [768, 3], itemsMobile: [479, 2], slideSpeed: 400, autoPlay: 11e3, stopOnHover: !0, navigation: !1, pagination: !1, responsive: !0, mouseDrag: !0, autoHeight: !1, responsiveRefreshRate: 100, afterInit: function(a) { a.find(".owl-item").eq(0).addClass("active") } }), a(".slider-thumb-nav.owl-carousel").on("click", ".owl-item", function(b) {
                b.preventDefault();
                var c = a(this).data("owlItem");
                I.trigger("owl.goTo", c)
            });
            var K = a(".related-projects.owl-carousel");
            d.checkSupport(K, a.fn.owlCarousel) && K.owlCarousel({ items: 4, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsMobile: [479, 1], slideSpeed: 400, autoPlay: 11e3, stopOnHover: !0, navigation: !0, pagination: !1, responsive: !0, mouseDrag: !1, autoHeight: !0 })
        },
        scrollTopBtnAppear: function() {
            var b = a(window).scrollTop(),
                c = a("#scroll-top");
            b >= 300 ? c.addClass("fixed") : c.removeClass("fixed")
        },
        scrollToAnimation: function(b, c, d) {
            var e = a(this).attr("href"),
                f = !1;
            if (a(e).length) var g = a(e),
                h = c ? g.offset().top + c : g.offset().top;
            else {
                if ("#header" !== e && "#top" !== e && "#wrapper" !== e) return;
                h = 0, f = !0
            }(e || f) && (a("html, body").animate({ scrollTop: h }, b || 1200), d.preventDefault())
        },
        scrollToTopAnimation: function() {
            var b = this;
            a("#scroll-top").on("click", function(a) { b.scrollToAnimation.call(this, 1200, 0, a) })
        },
        scrollToClass: function() {
            var b = this;
            a(".scrollto, .section-btn").on("click", function(a) { b.scrollToAnimation.call(this, 1200, 0, a) })
        },
        singlePortfolioToScroll: function() {
            var b = this;
            a("#slider-thumbs").find("a").on("click", function(c) {
                {
                    var d = a(this),
                        e = d.attr("href");
                    a("#slider-thumb"), a(e).position().top
                }
                d.siblings().removeClass("active").end().addClass("active"), b.scrollToAnimation.call(this, 1200, 0, c)
            })
        },
        singlePortfolioAffix: function() {
            a("#slider-thumbs").affix({
                offset: {
                    top: function() { var b = a("#header").outerHeight(!0); return this.top = b + 83 },
                    bottom: function() {
                        var b = a(".single-portfolio-media-container").outerHeight(!0),
                            c = a("#content").outerHeight(!0),
                            d = a("#footer").outerHeight(!0),
                            e = c - b + d;
                        return this.bottom = e
                    }
                }
            })
        },
        filterScrollBar: function() {
            var b = a(".category-filter-list.jscrollpane"),
                c = function(a) {
                    var b = a.height();
                    b > 300 && (a.css("height", 300), a.jScrollPane({ showArrows: !1 }))
                };
            a.each(b, function() {
                var b = a(this);
                c(b)
            }), a("#category-filter").find(".collapse").on("shown.bs.collapse", function() {
                var b = a(this).find(".category-filter-list.jscrollpane");
                c(b)
            })
        },
        fixfilterScrollBar: function() {
            a(".category-filter-list.jscrollpane").each(function() {
                var b, c = a(this).data("jsp");
                b || (b = setTimeout(function() { c && c.reinitialise(), b = null }, 50))
            })
        },
        selectBox: function() { a.fn.selectbox && a(".selectbox").selectbox({ effect: "fade" }) },
        tooltip: function() { a.fn.tooltip && a(".add-tooltip").tooltip() },
        popover: function() { a.fn.popover && a(".add-popover").popover({ trigger: "focus" }) },
        countTo: function() {
            a.fn.countTo ? a.fn.waypoint ? a(".count").waypoint(function() { a(this).countTo() }, { offset: function() { return a(window).height() - 100 }, triggerOnce: !0 }) : a(".count").countTo() : a(".count").each(function() {
                var b = a(this),
                    c = b.data("to");
                b.text(c)
            })
        },
        progressBars: function() {
            var b = this;
            a.fn.waypoint ? a(".progress-animate").waypoint(function() {
                if (a(this).hasClass("circle-progress")) b.animateKnob();
                else {
                    var c = a(this),
                        d = a(this).data("width"),
                        e = c.find(".progress-text");
                    c.css({ width: d + "%" }, 400), setTimeout(function() { e.fadeIn(400, function() { c.removeClass("progress-animate") }) }, 100)
                }
            }, { offset: function() { return a(window).height() - 10 } }) : a(".progress-animate").each(function() {
                var b = a(this),
                    c = a(this).data("width"),
                    d = b.find(".progress-text");
                b.css({ width: c + "%" }, 400), d.fadeIn(500)
            })
        },
        registerKnob: function() { a.fn.knob && a(".knob").knob({ bgColor: "#fff" }) },
        animateKnob: function() {
            a.fn.knob && a(".knob").each(function() {
                var b = a(this),
                    c = b.closest(".progress-animate"),
                    d = b.data("animateto"),
                    e = b.data("animatespeed");
                b.animate({ value: d }, { duration: e, easing: "swing", progress: function() { b.val(Math.round(this.value)).trigger("change") }, complete: function() { c.removeClass("progress-animate") } })
            })
        },
        scrollAnimations: function() { "function" == typeof WOW && new WOW({ boxClass: "wow", animateClass: "animated", offset: 0 }).init() },
        prettyPhoto: function() { a.fn.prettyPhoto && a("a[data-rel^='prettyPhoto']").prettyPhoto({ hook: "data-rel", animation_speed: "fast", slideshow: 6e3, autoplay_slideshow: !0, show_title: !1, deeplinking: !1, social_tools: "", overlay_gallery: !0, theme: "light_square" }) },
        flickerFeed: function() { a.fn.jflickrfeed && a("ul.flickr-widget").jflickrfeed({ limit: 6, qstrings: { id: "52617155@N08" }, itemTemplate: '<li><a href="{{image}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>' }) },
        parallax: function() {!b.mobile && a.fn.stellar && a(window).stellar({ horizontalOffset: 0, horizontalScrolling: !1 }), b.mobile && a(".parallax").css("background-attachment", "initial") },
        isotopeActivate: function() {
            if (a.fn.isotope) {
                var b = this.container,
                    c = b.data("layoutmode");
                b.isotope({ itemSelector: ".portfolio-item", layoutMode: c ? c : "masonry", transitionDuration: 0 })
            }
        },
        isotopeReinit: function() { a.fn.isotope && (this.container.isotope("destroy"), this.isotopeActivate()) },
        isotopeFilter: function() {
            var b = this,
                c = a("#portfolio-filter");
            c.find("a").on("click", function(d) {
                var e = a(this),
                    f = e.attr("data-filter"),
                    g = b.container.data("animationclass"),
                    h = g ? g : "fadeInUp";
                c.find(".active").removeClass("active"), b.container.find(".portfolio-item").removeClass("animate-item " + h), b.container.isotope({ filter: f, transitionDuration: "0.9s" }), e.closest("li").addClass("active"), d.preventDefault()
            })
        },
        elementsAnimate: function() {
            var b = this.container.data("animationclass"),
                c = b ? b : "fadeInUp";
            return this.portfolioElAnimation ? void this.container.find(".animate-item").each(function() {
                var b = a(this),
                    d = b.data("animate-time");
                setTimeout(function() { b.addClass("animated " + c) }, d)
            }) : void this.container.find(".animate-item").removeClass("animate-item")
        }
    };
    b.init(), a(window).on("load", function() { b.elementsAnimate(), b.scrollAnimations() }), a(window).on("scroll", function() { b.scrollTopBtnAppear() }), a.event.special.debouncedresize ? a(window).on("debouncedresize", function() { b.fullHeight(), b.destroyStickyHeader(), b.responsiveMenuExtra(), b.isotopeReinit(), b.verticalTabHeightFix(), b.itemSizeFix(), b.sideBackground(), b.resizeproductCarousel() }) : a(window).on("resize", function() { b.fullHeight(), b.destroyStickyHeader(), b.responsiveMenuExtra(), b.isotopeReinit(), b.verticalTabHeightFix(), b.itemSizeFix(), b.sideBackground(), b.resizeproductCarousel() }), a('a[data-toggle="tab"]').on("shown.bs.tab", function(c) {
        var d = a(c.target),
            e = d.closest(".tab-container");
        b.verticalTabFixFunc.call(e)
    }), a('a[data-toggle="tab"]').on("shown.bs.tab", function() { b.itemSizeFix() }), a("#quick-view-modal").on("shown.bs.modal", function() {
        var b = a(window).height();
        a(this).find(".modal-dialog").css({ "max-height": b - 80, "margin-top": 40 }), a(window).trigger("resize")
    })
}(jQuery);