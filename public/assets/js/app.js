!function(a){"use strict";var e,t=localStorage.getItem("language"),s="en";function n(e){document.getElementById("header-lang-img")&&("en"==e?document.getElementById("header-lang-img").src="assets/images/flags/us.jpg":"sp"==e?document.getElementById("header-lang-img").src="assets/images/flags/spain.jpg":"gr"==e?document.getElementById("header-lang-img").src="assets/images/flags/germany.jpg":"it"==e?document.getElementById("header-lang-img").src="assets/images/flags/italy.jpg":"ru"==e&&(document.getElementById("header-lang-img").src="assets/images/flags/russia.jpg"),localStorage.setItem("language",e),null==(t=localStorage.getItem("language"))&&n(s),a.getJSON("assets/lang/"+t+".json",function(e){a("html").attr("lang",t),a.each(e,function(e,t){"head"===e&&a(document).attr("title",t.title),a("[key='"+e+"']").text(t)})}))}function c(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,a=e.length;t<a;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),null!==e[t].nextElementSibling&&e[t].nextElementSibling.classList.remove("show"))}function r(e){1==a("#light-mode-switch").prop("checked")&&"light-mode-switch"===e?(a("html").removeAttr("dir"),a("#dark-mode-switch").prop("checked",!1),a("#rtl-mode-switch").prop("checked",!1),a("#dark-rtl-mode-switch").prop("checked",!1),a("#bootstrap-style").attr("href","assets/css/bootstrap.min.css"),a("body").attr("data-layout-mode","light"),a("#app-style").attr("href","assets/css/app.min.css"),sessionStorage.setItem("is_visited","light-mode-switch")):1==a("#dark-mode-switch").prop("checked")&&"dark-mode-switch"===e?(a("html").removeAttr("dir"),a("#light-mode-switch").prop("checked",!1),a("#rtl-mode-switch").prop("checked",!1),a("#dark-rtl-mode-switch").prop("checked",!1),a("body").attr("data-layout-mode","dark"),sessionStorage.setItem("is_visited","dark-mode-switch")):1==a("#rtl-mode-switch").prop("checked")&&"rtl-mode-switch"===e?(a("#light-mode-switch").prop("checked",!1),a("#dark-mode-switch").prop("checked",!1),a("#dark-rtl-mode-switch").prop("checked",!1),a("#bootstrap-style").attr("href","assets/css/bootstrap-rtl.min.css"),a("#app-style").attr("href","assets/css/app-rtl.min.css"),a("html").attr("dir","rtl"),a("body").attr("data-layout-mode","light"),sessionStorage.setItem("is_visited","rtl-mode-switch")):1==a("#dark-rtl-mode-switch").prop("checked")&&"dark-rtl-mode-switch"===e&&(a("#light-mode-switch").prop("checked",!1),a("#rtl-mode-switch").prop("checked",!1),a("#dark-mode-switch").prop("checked",!1),a("#bootstrap-style").attr("href","assets/css/bootstrap-rtl.min.css"),a("#app-style").attr("href","assets/css/app-rtl.min.css"),a("html").attr("dir","rtl"),a("body").attr("data-layout-mode","dark"),sessionStorage.setItem("is_visited","dark-rtl-mode-switch"))}function o(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),a("body").removeClass("fullscreen-enable"))}a("#side-menu").metisMenu(),a("#vertical-menu-btn").on("click",function(e){e.preventDefault(),a("body").toggleClass("sidebar-enable"),992<=a(window).width()?a("body").toggleClass("vertical-collpsed"):a("body").removeClass("vertical-collpsed")}),a("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(a(this).addClass("active"),a(this).parent().addClass("mm-active"),a(this).parent().parent().addClass("mm-show"),a(this).parent().parent().prev().addClass("mm-active"),a(this).parent().parent().parent().addClass("mm-active"),a(this).parent().parent().parent().parent().addClass("mm-show"),a(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),a(document).ready(function(){var e;0<a("#sidebar-menu").length&&0<a("#sidebar-menu .mm-active .active").length&&(300<(e=a("#sidebar-menu .mm-active .active").offset().top)&&(e-=300,a(".vertical-menu .simplebar-content-wrapper").animate({scrollTop:e},"slow")))}),a(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(a(this).addClass("active"),a(this).parent().addClass("active"),a(this).parent().parent().addClass("active"),a(this).parent().parent().parent().addClass("active"),a(this).parent().parent().parent().parent().addClass("active"),a(this).parent().parent().parent().parent().parent().addClass("active"),a(this).parent().parent().parent().parent().parent().parent().addClass("active"))}),a('[data-bs-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),a("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",o),document.addEventListener("webkitfullscreenchange",o),document.addEventListener("mozfullscreenchange",o),a(".right-bar-toggle").on("click",function(e){a("body").toggleClass("right-bar-enabled")}),a(document).on("click","body",function(e){0<a(e.target).closest(".right-bar-toggle, .right-bar").length||a("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,a=e.length;t<a;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",c)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),[].slice.call(document.querySelectorAll(".offcanvas")).map(function(e){return new bootstrap.Offcanvas(e)}),window.sessionStorage&&((e=sessionStorage.getItem("is_visited"))?(a(".right-bar input:checkbox").prop("checked",!1),a("#"+e).prop("checked",!0),r(e)):"rtl"===a("html").attr("dir")&&"dark"===a("body").attr("data-layout-mode")?(a("#dark-rtl-mode-switch").prop("checked",!0),a("#light-mode-switch").prop("checked",!1),sessionStorage.setItem("is_visited","dark-rtl-mode-switch"),r(e)):"rtl"===a("html").attr("dir")?(a("#rtl-mode-switch").prop("checked",!0),a("#light-mode-switch").prop("checked",!1),sessionStorage.setItem("is_visited","rtl-mode-switch"),r(e)):"dark"===a("body").attr("data-layout-mode")?(a("#dark-mode-switch").prop("checked",!0),a("#light-mode-switch").prop("checked",!1),sessionStorage.setItem("is_visited","dark-mode-switch"),r(e)):sessionStorage.setItem("is_visited","light-mode-switch")),a("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch").on("change",function(e){r(e.target.id)}),a("#password-addon, #password-addon1").on("click",function(){0<a(this).siblings("input").length&&("password"==a(this).siblings("input").attr("type")?a(this).siblings("input").attr("type","input"):a(this).siblings("input").attr("type","password"))}),null!=t&&t!==s&&n(t),a(".language").on("click",function(e){n(a(this).attr("data-lang"))}),a(window).on("load",function(){a("#status").fadeOut(),a("#preloader").delay(350).fadeOut("slow")}),Waves.init(),a("#checkAll").on("change",function(){a(".table-check .form-check-input").prop("checked",a(this).prop("checked"))}),a(".table-check .form-check-input").change(function(){a(".table-check .form-check-input:checked").length==a(".table-check .form-check-input").length?a("#checkAll").prop("checked",!0):a("#checkAll").prop("checked",!1)})}(jQuery);
/* Template Name: Techwind - Multipurpose Tailwind CSS Landing Page Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 1.8.0
   Created: May 2022
   File Description: Main JS file of the template
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Loader               *
 *     02.  Toggle Menus         *
 *     03.  Menu Active          *
 *     04.  Clickable Menu       *
 *     05.  Menu Sticky          *
 *     06.  Back to top          *
 *     07.  Active Sidebar       *
 *     08.  Feather icon         *
 *     09.  Small Menu           *
 *     10.  Wow Animation JS     *
 *     11.  Contact us           *
 *     12.  Dark & Light Mode    *
 *     13.  LTR & RTL Mode       *
 ================================*/


 window.addEventListener('load', fn, false)

 //  window.onload = function loader() {
 function fn() {
     // Preloader
     if (document.getElementById('preloader')) {
         setTimeout(() => {
             document.getElementById('preloader').style.visibility = 'hidden';
             document.getElementById('preloader').style.opacity = '0';
         }, 350);
     }
     // Menus
     activateMenu();
 }
 
 //Menu
 /*********************/
 /* Toggle Menu */
 /*********************/
 function toggleMenu() {
     document.getElementById('isToggle').classList.toggle('open');
     var isOpen = document.getElementById('navigation')
     if (isOpen.style.display === "block") {
         isOpen.style.display = "none";
     } else {
         isOpen.style.display = "block";
     }
 };
 /*********************/
 /*    Menu Active    */
 /*********************/
 function getClosest(elem, selector) {
 
     // Element.matches() polyfill
     if (!Element.prototype.matches) {
         Element.prototype.matches =
             Element.prototype.matchesSelector ||
             Element.prototype.mozMatchesSelector ||
             Element.prototype.msMatchesSelector ||
             Element.prototype.oMatchesSelector ||
             Element.prototype.webkitMatchesSelector ||
             function (s) {
                 var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                     i = matches.length;
                 while (--i >= 0 && matches.item(i) !== this) {}
                 return i > -1;
             };
     }
 
     // Get the closest matching element
     for (; elem && elem !== document; elem = elem.parentNode) {
         if (elem.matches(selector)) return elem;
     }
     return null;
 
 };
 
 function activateMenu() {
     var menuItems = document.getElementsByClassName("sub-menu-item");
     if (menuItems) {
 
         var matchingMenuItem = null;
         for (var idx = 0; idx < menuItems.length; idx++) {
             if (menuItems[idx].href === window.location.href) {
                 matchingMenuItem = menuItems[idx];
             }
         }
 
         if (matchingMenuItem) {
             matchingMenuItem.classList.add('active');
          
          
             var immediateParent = getClosest(matchingMenuItem, 'li');
       
             if (immediateParent) {
                 immediateParent.classList.add('active');
             }
             
             var parent = getClosest(immediateParent, '.child-menu-item');
             if(parent){
                 parent.classList.add('active');
             }
 
             var parent = getClosest(parent || immediateParent , '.parent-menu-item');
         
             if (parent) {
                 parent.classList.add('active');
 
                 var parentMenuitem = parent.querySelector('.menu-item');
                 if (parentMenuitem) {
                     parentMenuitem.classList.add('active');
                 }
 
                 var parentOfParent = getClosest(parent, '.parent-parent-menu-item');
                 if (parentOfParent) {
                     parentOfParent.classList.add('active');
                 }
             } else {
                 var parentOfParent = getClosest(matchingMenuItem, '.parent-parent-menu-item');
                 if (parentOfParent) {
                     parentOfParent.classList.add('active');
                 }
             }
         }
     }
 }
 /*********************/
 /*  Clickable manu   */
 /*********************/
 if (document.getElementById("navigation")) {
     var elements = document.getElementById("navigation").getElementsByTagName("a");
     for (var i = 0, len = elements.length; i < len; i++) {
         elements[i].onclick = function (elem) {
             if (elem.target.getAttribute("href") === "javascript:void(0)") {
                 var submenu = elem.target.nextElementSibling.nextElementSibling;
                 submenu.classList.toggle('open');
             }
         }
     }
 }
 /*********************/
 /*   Menu Sticky     */
 /*********************/
 function windowScroll() {
     const navbar = document.getElementById("topnav");
     if (navbar != null) {
         if (
             document.body.scrollTop >= 50 ||
             document.documentElement.scrollTop >= 50
         ) {
             navbar.classList.add("nav-sticky");
         } else {
             navbar.classList.remove("nav-sticky");
         }
     }
 }
 
 window.addEventListener('scroll', (ev) => {
     ev.preventDefault();
     windowScroll();
 })
 /*********************/
 /*    Back To TOp    */
 /*********************/
 
 window.onscroll = function () {
     scrollFunction();
 };
 
 function scrollFunction() {
     var mybutton = document.getElementById("back-to-top");
     if(mybutton!=null){
         if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
             mybutton.classList.add("block");
             mybutton.classList.remove("hidden");
         } else {
             mybutton.classList.add("hidden");
             mybutton.classList.remove("block");
         }
     }
 }
 
 function topFunction() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
 }
 
 /*********************/
 /*  Active Sidebar   */
 /*********************/
 (function () {
     var current = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);;
     if (current === "") return;
     var menuItems = document.querySelectorAll('.sidebar-nav a');
     for (var i = 0, len = menuItems.length; i < len; i++) {
         if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
             menuItems[i].parentElement.className += " active";
         }
     }
 })();
 
 /*********************/
 /*   Feather Icons   */
 /*********************/
 feather.replace();
 
 /*********************/
 /*     Small Menu    */
 /*********************/
 try {
     var spy = new Gumshoe('#navmenu-nav a');
 } catch (err) {
 
 }
 
 /*********************/
 /*      WoW Js       */
 /*********************/
 try {
     new WOW().init();
 } catch (error) {
     
 }
 
 /*************************/
 /*      Contact Js       */
 /*************************/
 
 try {
     function validateForm() {
         var name = document.forms["myForm"]["name"].value;
         var email = document.forms["myForm"]["email"].value;
         var subject = document.forms["myForm"]["subject"].value;
         var comments = document.forms["myForm"]["comments"].value;
         document.getElementById("error-msg").style.opacity = 0;
         document.getElementById('error-msg').innerHTML = "";
         if (name == "" || name == null) {
             document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Name*</div>";
             fadeIn();
             return false;
         }
         if (email == "" || email == null) {
             document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Email*</div>";
             fadeIn();
             return false;
         }
         if (subject == "" || subject == null) {
             document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Subject*</div>";
             fadeIn();
             return false;
         }
         if (comments == "" || comments == null) {
             document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Comments*</div>";
             fadeIn();
             return false;
         }
         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function () {
             if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("simple-msg").innerHTML = this.responseText;
                 document.forms["myForm"]["name"].value = "";
                 document.forms["myForm"]["email"].value = "";
                 document.forms["myForm"]["subject"].value = "";
                 document.forms["myForm"]["comments"].value = "";
             }
         };
         xhttp.open("POST", "php/contact.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("name=" + name + "&email=" + email + "&subject=" + subject + "&comments=" + comments);
         return false;
     }
 
     function fadeIn() {
         var fade = document.getElementById("error-msg");
         var opacity = 0;
         var intervalID = setInterval(function () {
             if (opacity < 1) {
                 opacity = opacity + 0.5
                 fade.style.opacity = opacity;
             } else {
                 clearInterval(intervalID);
             }
         }, 200);
     }
 } catch (error) {
     
 }
 
 
 /*********************/
 /* Dark & Light Mode */
 /*********************/
 try {
     function changeTheme(e){
         e.preventDefault()
         const htmlTag = document.getElementsByTagName("html")[0]
         
         if (htmlTag.className.includes("dark")) {
             htmlTag.className = 'light'
         } else {
             htmlTag.className = 'dark'
         }
     }
 
     const switcher = document.getElementById("theme-mode")
     switcher?.addEventListener("click" ,changeTheme )
     
     const chk = document.getElementById('chk');
 
     chk.addEventListener('change',changeTheme);
 } catch (err) {
     
 }
 
 
 /*********************/
 /* LTR & RTL Mode */
 /*********************/
 try{
     const htmlTag = document.getElementsByTagName("html")[0]
     function changeLayout(e){
         e.preventDefault()
         const switcherRtl = document.getElementById("switchRtl")
         if(switcherRtl.innerText === "LTR"){
             htmlTag.dir = "ltr"
         }
         else{
             htmlTag.dir = "rtl"
         }
         
     }
     const switcherRtl = document.getElementById("switchRtl")
     switcherRtl?.addEventListener("click" ,changeLayout )
 }
 catch(err){}