const navLinks = document.querySelector(".side-menu .links");
const menuOpenBtn = document.getElementById("menu-button");
const menuCloseBtn = document.querySelector(".links .fa-times");

menuOpenBtn.onclick = function() {
    navLinks.id = "active";
}
menuCloseBtn.onclick = function() {
    navLinks.removeAttribute('id');
}

//for smooth scroll to contact

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