function openForm() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    document.getElementById("loginForm").style.display = "block";
}

function closeForm() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    document.getElementById("loginForm").style.display = "none";
}

function openNav() {
    document.getElementById("top-links").style.display = "flex";
}

//on screen size change to less than 768px, add collapse class to top-links
// on DOM load, check screen size and add collapse class if less than 768px
document.addEventListener("DOMContentLoaded", function(event) {
    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) {
        document.getElementById("top-links").classList.add("collapse");
        document.getElementById("top-links").classList.remove("d-flex");
        document.getElementById("top-links").classList.add("row");
    } else {
        document.getElementById("top-links").classList.remove("collapse");
        document.getElementById("top-links").classList.add("d-flex");
        document.getElementById("top-links").classList.remove("row");
    }
});

//do the same thing when screen size changes
window.addEventListener("resize", function(event) {
    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) {
        document.getElementById("top-links").classList.add("collapse");
        document.getElementById("top-links").classList.remove("d-flex");
        document.getElementById("top-links").classList.add("row");
    } else {
        document.getElementById("top-links").classList.remove("collapse");
        document.getElementById("top-links").classList.add("d-flex");
        document.getElementById("top-links").classList.remove("row");
    }
});