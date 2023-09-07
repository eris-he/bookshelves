function openForm() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    document.getElementById("loginForm").style.display = "block";
}

function closeForm() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    document.getElementById("loginForm").style.display = "none";
    if (!document.getElementById("loginError").hasAttribute("hidden")) {
        document.getElementById("loginError").setAttribute("hidden", true);
    }
}

function openNav() {
    document.getElementById("top-links").style.display = "flex";
}

//do the same thing when screen size changes
window.addEventListener("resize", function(event) {
    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) {
        document.getElementById("top-links").classList.add("collapse");
        document.getElementById("top-links").classList.remove("d-flex");
        document.getElementById("top-links").classList.add("row");
        document.getElementById("navLinks").classList.remove("row");
    } else {
        document.getElementById("top-links").classList.remove("collapse");
        document.getElementById("top-links").classList.add("d-flex");
        document.getElementById("top-links").classList.remove("row");
        document.getElementById("navLinks").classList.add("row");
    }
});


document.addEventListener("DOMContentLoaded", function(event) {
    //on screen size change to less than 768px, add collapse class to top-links
    // on DOM load, check screen size and add collapse class if less than 768px
    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) {
        document.getElementById("top-links").classList.add("collapse");
        document.getElementById("top-links").classList.remove("d-flex");
        document.getElementById("top-links").classList.add("row");
        document.getElementById("navLinks").classList.remove("row");
    } else {
        document.getElementById("top-links").classList.remove("collapse");
        document.getElementById("top-links").classList.add("d-flex");
        document.getElementById("top-links").classList.remove("row");
        document.getElementById("navLinks").classList.add("row");
    }

    // Submit login form
    document.getElementById("adminLogin").addEventListener("submit", function(event) {
        const adminLogin = document.getElementById('adminLogin');
        event.preventDefault();
    
        const formData = new FormData(adminLogin);
    
        fetch('/user/login.php', {
            method: 'POST', 
            body: formData
            })
            .then(response => {
                return response.json()
            })
            .then(data => {
                if (data.status === 'success') {
                    location.reload();                  
                } else {
                    document.getElementById("loginError").removeAttribute("hidden");
                }
                adminLogin.reset();
            })
            .catch(error => {
                document.getElementById("loginError").removeAttribute("hidden");
                console.error('Fetch Error:', error);
                adminLogin.reset();
            });
    });
});
