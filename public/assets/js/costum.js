'use strict';

/**
 * element toggle function
 */

const elemToggleFunc = function (elem) { elem.classList.toggle("active"); }


/**
 * add event on element
 */

 const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}




/**
 * toggle navbar
 */
 const navbar = document.querySelector("[data-navbar]");
 const navbarLinks = document.querySelectorAll("[data-nav-link]");
 const navToggler = document.querySelector("[data-nav-toggler]");
 
 const toggleNavbar = function () {
   navbar.classList.toggle("active");
   navToggler.classList.toggle("active");
 }
 
 addEventOnElem(navToggler, "click", toggleNavbar);
 
 const closeNavbar = function () {
   navbar.classList.remove("active");
   navToggler.classList.remove("active");
 }
 
 addEventOnElem(navbarLinks, "click", closeNavbar);


/**
 * dark & light theme toggle
 */

const themeToggleBtn = document.querySelector("[data-theme-btn]");

themeToggleBtn.addEventListener("click", function () {

  elemToggleFunc(themeToggleBtn);

  if (themeToggleBtn.classList.contains("active")) {
    document.body.classList.remove("dark_theme");
    document.body.classList.add("light_theme");

    localStorage.setItem("theme", "light_theme");
  } else {
    document.body.classList.add("dark_theme");
    document.body.classList.remove("light_theme");

    localStorage.setItem("theme", "dark_theme");
  }

});


/**
 * header sticky & go to top
 */

 const header = document.querySelector("[data-header]");
 const goTopBtn = document.querySelector("[data-back-top-btn]");
 
 window.addEventListener("scroll", function () {
 
   if (window.scrollY >= 10) {
     header.classList.add("active");
     goTopBtn.classList.add("active");
   } else {
     header.classList.remove("active");
     goTopBtn.classList.remove("active");
   }
 
 });


/**
 * check & apply last time selected theme from localStorage
 */

if (localStorage.getItem("theme") === "light_theme") {
  themeToggleBtn.classList.add("active");
  document.body.classList.remove("dark_theme");
  document.body.classList.add("light_theme");
} else {
  themeToggleBtn.classList.remove("active");
  document.body.classList.remove("light_theme");
  document.body.classList.add("dark_theme");
}