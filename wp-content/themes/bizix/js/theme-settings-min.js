!function(e){SwmThemeSettings={init:function(){e(".fitVids").fitVids(),this._retinaRatioCookies(),this._goTopScroll(),this._stickyHeader(),this._smoothScroll(),this._listWidgets(),this._sidePanel(),this._subHeaderTitle(),this._stickySidebar(),this._magnificPopup(),this._main_Navigation(),this._dropDownMenu(),this._searchOverlay()},_retinaRatioCookies:function(){var i=window.devicePixelRatio?window.devicePixelRatio:1;if(e.cookie("pixel_ratio")||i>1&&!0===navigator.cookieEnabled&&e.cookie("pixel_ratio",i,{expires:360}),i>1){var a=e(".swm-std-logo"),s=e(a).attr("data-retina"),n=s||"",o=e(".swm-sticky-logo"),t=e(o).attr("data-retina"),r=t||"";n.length&&e(a).attr("src",s),r.length&&e(o).attr("src",t)}},_goTopScroll:function(){var i=!1,a=e("a.swm-go-top-scroll-btn");a.on("click",function(i){e("body,html").animate({scrollTop:"0"},750,"easeOutExpo"),i.preventDefault()}),e(window).scroll(function(){i=!0}),setInterval(function(){i&&(i=!1,e(window).scrollTop()>300?a.fadeIn("fast"):a.fadeOut("fast"))},250)},_stickyHeader:function(){if(e("body").hasClass("swm-stickyOn")){var i=e("#swm-main-nav-holder").data("sticky-hide"),a=i||768;if(e(window).width()>a){var s=0;s=e("#swm-header").innerHeight();if(e(".swm-header-placeholder").length){var n=e(".swm-header-placeholder").data("header-d"),o=e(".swm-header-placeholder").data("header-t"),t=e(".swm-header-placeholder").data("header-m"),r=n;e(window).width()<980?r=o:e(window).width()<768&&(r=t)}e(".swm-topbar-main-container").length&&(s=e(".swm-topbar-main-container").innerHeight()+s),e("body.subHeaderTop").length&&(s=e(".swm-sub-header").innerHeight()+s),e(".swm-header").hasClass("header_2s")&&(s+=67,r=70),e("body").hasClass("swm-l-boxed")&&(s+=e("body").data("boxed-margin"));var l=s,m=e(window).scrollTop(),d=0;e("#wpadminbar").length&&(d=e("#wpadminbar").innerHeight()),e(".swm-header").hasClass("header_2s")?m>l?e("#swm-main-nav-holder").hasClass("sticky-on")||(e("#swm-main-nav-holder").addClass("sticky-on"),e("#swm-main-nav-holder .swm-infostack-menu").css("top",-67).animate({top:d},300),e(".swm-header-placeholder").css("height",r)):e("#swm-main-nav-holder").hasClass("sticky-on")&&(e("#swm-main-nav-holder").removeClass("sticky-on"),e("#swm-main-nav-holder .swm-infostack-menu").css("top",0),e(".swm-header-placeholder").css("height",0)):m>l?e("#swm-main-nav-holder").hasClass("sticky-on")||(e("#swm-main-nav-holder").addClass("sticky-on").css("top",-80).animate({top:d},300),e(".swm-header-placeholder").css("height",r)):e("#swm-main-nav-holder").hasClass("sticky-on")&&(e("#swm-main-nav-holder").removeClass("sticky-on").css("top",0),e(".swm-header-placeholder").css("height",0))}}},_smoothScroll:function(){e("a.smooth-scroll").on("click",function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var i=e(this.hash);if((i=i.length?i:e("[name="+this.hash.slice(1)+"]")).length)return e("html, body").animate({scrollTop:i.offset().top-140},1e3),!1}})},_listWidgets:function(){e(".sidebar,.sidebar .theiaStickySidebar,.footer .swm-f-widget,.swm-sidepanel-wrap").children(".widget_meta,.widget_categories,.widget_pages,.widget_archive,.widget_recent_comments,.widget_recent_entries,.widget_nav_menu,.widget_product_categories,.widget_layered_nav_filters,.archives-link,.widget_rss,.widget_rating_filter,.woocommerce-widget-layered-nav,.widget_gyan_useful_links_wid").addClass("swm-list-widgets")},_sidePanel:function(){var i=e("body"),a={};a.isMobile={Android:function(){return navigator.userAgent.match(/Android/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},any:function(){return a.isMobile.Android()||a.isMobile.BlackBerry()||a.isMobile.iOS()||a.isMobile.Opera()||a.isMobile.Windows()}},e(".swm-sidepanel-trigger").length>0&&i.addClass("swm-sidePanelOn"),e(".swm-sp-icon-box").on("click",function(e){return i.toggleClass("swm-sidepanel-open"),a.isMobile.any()&&i.toggleClass("overflow-hidden"),!1}),e(".swm-sidePanelOn .swm-sidepanel-body-overlay,.swm-sidepanel-close").on("click",function(e){return i.toggleClass("swm-sidepanel-open"),!1});var s=e("#wpadminbar");if(s.length>0){var n=s.height();e("#swm-sidepanel-container").css("top",n)}},_stickySidebar:function(){var i=e("#sidebar.swm-sticky-sidebar");i.length>0&&i.theiaStickySidebar({additionalMarginTop:130})},_subHeaderTitle:function(){if(e("#swm-wrap .header_2_t").length){var i=e(window).width()>768?e(".swm-infostack-header").innerHeight()+67:34;e("#swm-sub-header").css("padding-top",i)}},_magnificPopup:function(){e(".swm-popup-img").magnificPopup({type:"image"}),e(".swm-popup-gallery").magnificPopup({type:"image",gallery:{enabled:!0,tCounter:""},zoom:{enabled:!0,duration:300,easing:"ease-in-out"}}),e(".popup-youtube, .popup-vimeo, .popup-gmaps,.swm-popup-video").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),e(".swm-popup-video-autoplay").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1,iframe:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allow="autoplay"></iframe></div>',patterns:{youtube:{index:"youtube.com/",id:"v=",src:"https://www.youtube.com/embed/%id%?autoplay=1"}}}}),e(".swm-popup-gallery-alt").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.',titleSrc:function(e){return e.el.attr("title")+"<small>by Marsel Van Oosten</small>"}}})},_mobileDropDownMenu:function(i,a,s,n){i=e(i),n=e(n);var o=0;e("#wpadminbar").length&&(o=e("#wpadminbar").innerHeight(),n.css("margin-top",o+"px")),e(a).on("click",function(){var a=e(i);a.hasClass("open")?a.removeClass("open"):a.addClass("open");var s=e("#swm-mobi-nav-overlay-bg");s.hasClass("m_toggle")?s.removeClass("m_toggle"):s.addClass("m_toggle")}),e(".swm-mobi-nav-close").on("click",function(){e(i).removeClass("open"),e("#swm-mobi-nav-overlay-bg").removeClass("m_toggle")}),e("#swm-mobi-nav-overlay-bg").on("click",function(){e(i).removeClass("open"),e("#swm-mobi-nav-overlay-bg").removeClass("m_toggle")}),i.find("li ul").parent().addClass("swm-has-sub-menu"),i.find(".swm-has-sub-menu").prepend('<span class="swm-mini-menu-arrow"></span>'),i.find(".swm-mini-menu-arrow").on("click",function(){e(this).siblings("ul").hasClass("open")?e(this).siblings("ul").removeClass("open").slideUp():e(this).siblings("ul").addClass("open").slideDown(),e(this).hasClass("inactive")?e(this).removeClass("inactive"):e(this).addClass("inactive")})},_main_Navigation:function(){e(".swm-primary-nav-wrap > ul").clone().appendTo("#swm-mobi-nav"),e("#swm-mobi-nav > ul").removeClass("swm-primary-nav"),e("#swm-mobi-nav ul#menu-all-pages > li.megamenu-on > ul > li,#swm-mobi-nav li.megamenu-on > ul > li").css("width","auto"),e("#swm-mobi-nav ul#menu-all-pages > li.megamenu-on > ul ").css({"background-image":"","background-position":""}),e("#swm-mobi-nav").find(".swm-nav_p_meta").remove(),SwmThemeSettings._mobileDropDownMenu("#swm-mobi-nav","#swm-mobi-nav-icon span.swm-mobi-nav-btn-box>span","#swm-mobi-nav > ul","#swm-mobi-nav")},_dropDownMenu:function(){e(".swm-primary-nav > li").hover(function(){var i=e("ul",this);if(i.removeClass("invert"),e(this).hasClass("megamenu-on")||i.css({top:""}),!e(this).hasClass("megamenu-on")){var a=0;e(">ul",this).css("transform")&&(a=parseInt(e(">ul",this).css("transform").split(",")[5])),isNaN(a)&&(a=0);var s=e(window).scrollTop();e("#swm-header").offset().top,e("#swm-header").outerHeight();i.each(function(){var i=e(this),a=i.offset();a.top;a.left-e("#swm-page").offset().left+i.outerWidth()>e("#swm-page").width()&&i.addClass("invert")})}},function(){})},_searchOverlay:function(){e(".swm_searchbox_close").slideUp();var i=!1;e(".swm-header-search span").on("click",function(){0==i?(e(".swm_searchbox_holder, .swm_searchbox_close").slideDown(),e("nav ul li, .btn-open").slideUp(),i=!0):(e(".swm_searchbox_holder, .swm_searchbox_close").slideUp(),e("nav ul li, .btn-open").slideDown(),i=!1)}),e(".swm_searchbox_holder").on("mouseup",function(){e(".swm_searchbox_holder, .swm_searchbox_close").slideUp(),e("nav ul li, .btn-open").slideDown(),i=!1}),e(".swm_overlay_search_box").on("mouseup",function(){return!1})},_universalGridIsotope:function(){e("#swm-item-entries").hasClass("isotope")&&e(".swm-universal-grid-sort").imagesLoaded(function(){e(".swm-universal-grid-sort").isotope({itemSelector:".swm-universal-grid"})})}},e(document).ready(function(){SwmThemeSettings.init()}),e(window).scroll(function(){SwmThemeSettings._stickyHeader()});var i=e(window);e(window).on("load",function(){e(".swm-site-loader").length&&e(".swm-site-loader").slideUp(),SwmThemeSettings._universalGridIsotope(),i.resize(function(){SwmThemeSettings._universalGridIsotope(),SwmThemeSettings._subHeaderTitle(),SwmThemeSettings._stickyHeader()}),window.addEventListener("orientationchange",function(){SwmThemeSettings._universalGridIsotope()}),e("iframe").css("max-width","100%").css("width","100%")})}(jQuery);