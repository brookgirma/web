// for scroll dispaly nav
const nav=document.querySelector(".navbar")
var lastScroll=window.scrollY;

window.onscroll=function(){

    if(lastScroll<window.scrollY){
        nav.classList.add("nav-hidden")
    }
    else{
        nav.classList.remove("nav-hidden")
    }
    lastScroll=window.scrollY;
}


$(".find").keypress(function(event) {
    if (event.keyCode === 13) {
        $(".search button").click();
    }
});

$(".search button").on("click",function(){
    $(this).fadeTo(300,0.6).fadeTo(300,1) //for search button fade in and out
    higlightSearch($(".find").val())
})

//for highlight
function higlightSearch(searchText){
    if(searchText && searchText!=' '){
        $(".highlight").removeClass("highlight");
        $("a").each(function(index, content){             
            var content = $(content).text();              
            var searchExp = new RegExp(searchText, "ig");  
            var matches = content.match(searchExp);
            if (matches)
            {
                $(this).html(content.replace(searchExp, function(match){
                    return "<span class='highlight'>" + match + "</span>";
                }));
            }       
        }) 
    } 
   else{
     $(".highlight").removeClass("highlight"); 
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


//for search input open and close
const search = document.querySelector(".search")
const searchBtn = document.querySelector(".search .fa-search")


searchBtn.onclick=function(){
    search.classList.toggle("active")

    if(search.classList.contains("active")){
    searchBtn.classList.replace("fa-search","fa-times")
}
    else{
        searchBtn.classList.replace("fa-times","fa-search")
        search.removeAttribute('id')
    }
}


//for side menu open and close
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