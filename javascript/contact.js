function fadeInContent() {
    document.body.style.opacity = 0;
    let opacity = 0;
    let intervalID = setInterval(() => {
        if (opacity < 1) {
            opacity += 0.05;
            document.body.style.opacity = opacity;
        } else {
            clearInterval(intervalID);
        }
    }, 50);
}
window.onload = fadeInContent;

window.onscroll = function() {
    let btn = document.getElementById("scrollTopBtn");
    if (document.documentElement.scrollTop > 200) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}

document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeCheckbox");
    const textSizeSelect = document.getElementById("textSize");
    const colorThemeSelect = document.getElementById("colorTheme");
    const compactModeToggle = document.getElementById("compactMode");

    if (localStorage.getItem("darkMode") === "enabled") {
        document.body.classList.add("dark-mode");
        darkModeToggle.checked = true;
    }

    if (localStorage.getItem("compactMode") === "true") {
        document.body.classList.add("compact-mode");
        compactModeToggle.checked = true;
    }

    let savedSize = localStorage.getItem("textSize");
    if (savedSize) {
        let fontSize = savedSize === "small" ? "14px" : savedSize === "large" ? "20px" : "16px";
        document.documentElement.style.setProperty("--font-size", fontSize);
        textSizeSelect.value = savedSize;
    }

    let savedColor = localStorage.getItem("colorTheme");
    if (savedColor) {
        document.documentElement.style.setProperty("--main-color", savedColor);
        colorThemeSelect.value = savedColor;
    }

    darkModeToggle.addEventListener("change", function () {
        if (this.checked) {
            document.body.classList.add("dark-mode");
            localStorage.setItem("darkMode", "enabled");
        } else {
            document.body.classList.remove("dark-mode");
            localStorage.setItem("darkMode", "disabled");
        }
    });

    textSizeSelect.addEventListener("change", function() {
        let size = this.value;
        let fontSize = size === "small" ? "14px" : size === "large" ? "20px" : "16px";
        document.documentElement.style.setProperty("--font-size", fontSize);
        localStorage.setItem("textSize", size);
    });

    colorThemeSelect.addEventListener("change", function() {
        let color = this.value;
        document.documentElement.style.setProperty("--main-color", color);
        localStorage.setItem("colorTheme", color);
    });

    compactModeToggle.addEventListener("change", function() {
        document.body.classList.toggle("compact-mode");
        localStorage.setItem("compactMode", document.body.classList.contains("compact-mode"));
    });
});

document.querySelectorAll("nav a").forEach(link => {
    link.addEventListener("mouseover", () => {
        link.style.transition = "0.3s";
        link.style.transform = "scale(1.1)";
    });
    link.addEventListener("mouseout", () => {
        link.style.transform = "scale(1)";
    });
});

document.getElementById("openSidebarBtn").addEventListener("click", function() {
    document.getElementById("sidebar").classList.add("show-sidebar");
});

document.getElementById("closeSidebarBtn").addEventListener("click", function() {
    document.getElementById("sidebar").classList.remove("show-sidebar");
});
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let formData = new FormData(this);

    fetch("process_contact.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messageBox = document.createElement("p");
        messageBox.textContent = data.message;
        messageBox.style.color = data.status === "success" ? "green" : "red";

        document.getElementById("contactForm").appendChild(messageBox);

        if (data.status === "success") {
            document.getElementById("contactForm").reset(); // Golește formularul
        }
    })
    .catch(error => console.error("Eroare:", error));
});
