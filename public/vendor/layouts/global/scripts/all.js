var CookieConsent=function(){var i=function(){$(".mt-cookie-consent-bar").cookieBar({closeButton:".mt-cookie-consent-btn"})};return{init:function(){i()}}}();App.isAngularJsApp()===!1&&jQuery(document).ready(function(){CookieConsent.init()});var QuickNav=function(){return{init:function(){if($(".quick-nav").length>0){var i=$(".quick-nav");i.each(function(){var i=$(this),a=i.find(".quick-nav-trigger");a.on("click",function(a){a.preventDefault(),i.toggleClass("nav-is-visible")})}),$(document).on("click",function(a){!$(a.target).is(".quick-nav-trigger")&&!$(a.target).is(".quick-nav-trigger span")&&i.removeClass("nav-is-visible")})}}}}();QuickNav.init();var QuickSidebar=function(){var i=function(){$(".dropdown-quick-sidebar-toggler a, .page-quick-sidebar-toggler, .quick-sidebar-toggler").click(function(i){$("body").toggleClass("page-quick-sidebar-open")})},a=function(){var i=$(".page-quick-sidebar-wrapper"),a=i.find(".page-quick-sidebar-chat"),e=function(){var e,t=i.find(".page-quick-sidebar-chat-users");e=i.height()-i.find(".nav-tabs").outerHeight(!0),App.destroySlimScroll(t),t.attr("data-height",e),App.initSlimScroll(t);var n=a.find(".page-quick-sidebar-chat-user-messages"),r=e-a.find(".page-quick-sidebar-chat-user-form").outerHeight(!0);r-=a.find(".page-quick-sidebar-nav").outerHeight(!0),App.destroySlimScroll(n),n.attr("data-height",r),App.initSlimScroll(n)};e(),App.addResizeHandler(e),i.find(".page-quick-sidebar-chat-users .media-list > .media").click(function(){a.addClass("page-quick-sidebar-content-item-shown")}),i.find(".page-quick-sidebar-chat-user .page-quick-sidebar-back-to-list").click(function(){a.removeClass("page-quick-sidebar-content-item-shown")});var t=function(i){i.preventDefault();var e=a.find(".page-quick-sidebar-chat-user-messages"),t=a.find(".page-quick-sidebar-chat-user-form .form-control"),n=t.val();if(0!==n.length){var r=function(i,a,e,t,n){var r="";return r+='<div class="post '+i+'">',r+='<img class="avatar" alt="" src="'+Layout.getLayoutImgPath()+t+'.jpg"/>',r+='<div class="message">',r+='<span class="arrow"></span>',r+='<a href="#" class="name">Bob Nilson</a>&nbsp;',r+='<span class="datetime">'+a+"</span>",r+='<span class="body">',r+=n,r+="</span>",r+="</div>",r+="</div>"},s=new Date,c=r("out",s.getHours()+":"+s.getMinutes(),"Bob Nilson","avatar3",n);c=$(c),e.append(c),e.slimScroll({scrollTo:"1000000px"}),t.val(""),setTimeout(function(){var i=new Date,a=r("in",i.getHours()+":"+i.getMinutes(),"Ella Wong","avatar2","Lorem ipsum doloriam nibh...");a=$(a),e.append(a),e.slimScroll({scrollTo:"1000000px"})},3e3)}};a.find(".page-quick-sidebar-chat-user-form .btn").click(t),a.find(".page-quick-sidebar-chat-user-form .form-control").keypress(function(i){if(13==i.which)return t(i),!1})},e=function(){var i=$(".page-quick-sidebar-wrapper"),a=function(){var a,e=i.find(".page-quick-sidebar-alerts-list");a=i.height()-80-i.find(".nav-justified > .nav-tabs").outerHeight(),App.destroySlimScroll(e),e.attr("data-height",a),App.initSlimScroll(e)};a(),App.addResizeHandler(a)},t=function(){var i=$(".page-quick-sidebar-wrapper"),a=function(){var a,e=i.find(".page-quick-sidebar-settings-list");a=i.height()-80-i.find(".nav-justified > .nav-tabs").outerHeight(),App.destroySlimScroll(e),e.attr("data-height",a),App.initSlimScroll(e)};a(),App.addResizeHandler(a)};return{init:function(){i(),a(),e(),t()}}}();App.isAngularJsApp()===!1&&jQuery(document).ready(function(){QuickSidebar.init()});