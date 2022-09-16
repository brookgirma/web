
//removes p tag on header when screen<460
$(document).ready(function(){
    var screenSize=$(window).width();
    if(screenSize< 460){
        $(".header-logo p").hide();
        $(".left-sec .header-p").show();
    }
     
    else{
        $(".header-logo p").show();
        $(".left-sec .header-p").hide();
    }
})
  window.onresize = function() {
    var screenSize=$(window).width();
    if(screenSize< 460){
        $(".header-logo p").hide();
        $(".left-sec .header-p").show();
    }
     
    else{
        $(".header-logo p").show();
        $(".left-sec .header-p").hide();
    }
}


//for smooth scroll on contact us
$(function() {
    $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});


//for side menu
const navLinks = document.querySelector(".side-menu .links");
const menuOpenBtn = document.getElementById("menu-button");
const menuCloseBtn = document.querySelector(".links .fa-times");

menuOpenBtn.onclick = function() {
    navLinks.id = "active";
}
menuCloseBtn.onclick = function() {
    navLinks.removeAttribute('id');
}




//for back to top
var btn=document.getElementById("totopbtn");
window.onscroll=function(){
    scrollfunction()
};

//when the user scrolls down 100px the button will be shown
function scrollfunction(){
    if(document.body.scrollTop>100||document.documentElement.scrollTop>100)
    {
        btn.style.display="block";
    }
    else{
        btn.style.display="none";
    }
}
function totop(){
    document.body.scrollTop=0;
    document.documentElement.scrollTop=0;
}

// for slide show
var myIndex = 0;
$(slider())
      
function slider() {
    const slides = document.getElementsByClassName("mySlides");

    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    myIndex++;

    if (myIndex > slides.length) myIndex = 1;

    slides[myIndex-1].style.display = "block";

    setTimeout(slider, 1500); // Change image every 2 seconds
}

