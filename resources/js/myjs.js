//Navbar Scroll-Sticky:

var navbar = document.getElementById("myNavbar");
var isNavbarFixed = false;
var scrollY = window.scrollY;

function handleScroll() {
  if (scrollY > 0 && !isNavbarFixed) {
    navbar.classList.add("sticky-top")
    isNavbarFixed = true;
  } else if (scrollY <= 0 && isNavbarFixed) {
    navbar.classList.remove("sticky-top");
    isNavbarFixed = false;
  }
}

function animateNavbar() {
  requestAnimationFrame(animateNavbar);
  scrollY = window.scrollY;
  handleScroll();
}

animateNavbar();
