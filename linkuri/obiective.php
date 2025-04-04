<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obiective</title>
    <link rel="stylesheet" href="../css/obiective.css">
</head>
<body>

    <header>
        <h1>Obiective Personale și Profesionale</h1>
    </header>

    <nav>
    <a href="http://localhost/site/index.php">Acasă</a>
    <a href="http://localhost/site/obiective.php">Obiective</a>
    <a href="http://localhost/site/planificare.php">Planificare</a>
    <a href="http://localhost/site/contact.php">Contact</a>
    </nav>
    <button id="openSidebarBtn">☰ </button>

    <div id="sidebar">
        <button id="closeSidebarBtn">✖</button>
        <h3>Setări</h3>
    
        <label class="dark-mode-label">
            🌙 Dark Mode
            <label class="switch">
                <input type="checkbox" id="darkModeCheckbox">
                <span class="slider"></span>
            </label>
        </label>
    
        <label for="colorTheme">
            🎨 Culoare Principală:
            <select id="colorTheme">
                <option value="green">Verde</option>
                <option value="blue">Albastru</option>
                <option value="red">Roșu</option>
                <option value="purple">Mov</option>
            </select>
        </label>
    
        <label for="textSize">
            🔠 Mărimea Textului:
            <select id="textSize">
                <option value="small">Mic</option>
                <option value="normal" selected>Normal</option>
                <option value="large">Mare</option>
            </select>
        </label>
    
        <label for="compactMode">
            📏 Mod Compact
            <input type="checkbox" id="compactMode">
        </label>
    </div>
    <main>
        <section>
            <h2>Stabilirea Obiectivelor</h2>
            <p>Stabilirea obiectivelor este esențială pentru a-ți direcționa eforturile și a-ți măsura progresul.</p>
            <img src="../imagini/obiective.jpg" alt="Obiective" class="main-image">
            <p>Aici vei găsi sfaturi despre cum să-ți stabilești obiective SMART și cum să le urmărești eficient.</p>
        </section>

        <section>
            <h3>Exemple de Obiective</h3>
            <ul>
                <li>📚 Învață o nouă abilitate în 3 luni.</li>
                <li>📖 Citește 10 cărți pe an.</li>
                <li>🏆 Finalizează un proiect important la locul de muncă.</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025</p>
    </footer>
    <button id="scrollTopBtn" onclick="scrollToTop()">⬆ Sus</button>

    <script src="../javascript/obiective.js"></script>

</body>
</html>
