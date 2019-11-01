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
function collapsible() {

    var coll = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.children[2];
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
}