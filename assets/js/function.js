function popUp() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

var prevScrollpos = window.pageYOffset;

window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("top-bar").style.top = "0";
    } else {
        document.getElementById("top-bar").style.top = "-80px";
    }
    prevScrollpos = currentScrollPos;
}