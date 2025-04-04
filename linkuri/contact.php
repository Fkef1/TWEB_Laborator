<?php
$servername = "localhost"; 
$username = "root"; 
$password = "1234"; 
$dbname = "contact"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $conn->real_escape_string($_POST['nume'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $mesaj = $conn->real_escape_string($_POST['mesaj'] ?? '');

   $stmt = $conn->prepare("INSERT INTO users (nume, email, mesaj, data) VALUES (?, ?, ?, NOW())");

if ($stmt) {
    $stmt->bind_param("sss", $nume, $email, $mesaj);
    if ($stmt->execute()) {
        $mesajConfirmare = "Mesajul a fost salvat!";
    } else {
        die("Eroare la salvare: " . $stmt->error);
    }
    $stmt->close();
} else {
    die("Eroare la pregătirea interogării: " . $conn->error);
}
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>

    <header>
        <h1>Contactează-ne</h1>
    </header>

    <nav>
    <a href="http://localhost/site/index.php">Acasă</a>
    <a href="http://localhost/site/obiective.php">Obiective</a>
    <a href="http://localhost/site/planificare.php">Planificare</a>
    <a href="http://localhost/site/contact.php">Contact</a>
    <a href="http://localhost/site/mesaje.php">Mesaje</a>
    </nav>
    
    <main>
        <section>
            <h2>Date de Contact</h2>
            <p>Pentru orice întrebări sau sugestii, nu ezita să ne contactezi folosind informațiile de mai jos:</p>
            <ul class="contact-list">
                <li><strong>Email:</strong> maxim.cuciuc123@gmail.com</li>
                <li><strong>Telefon:</strong> +373 68 667 532</li>
                <li><strong>Adresă:</strong> str. Nicolae Costin 61/2</li>
            </ul>
        </section>

        <section>
            <h2>Formular de Contact</h2>
            <?php if (isset($mesajConfirmare)): ?>
                <p style="color: green;"><?php echo $mesajConfirmare; ?></p>
            <?php endif; ?>

            <form id="contactForm" action="contact.php" method="post">
                <div>
                    <label for="nume">Nume:</label>
                    <input type="text" id="nume" name="nume" required>
                </div>
            
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            
                <div>
                    <label for="mesaj">Mesaj:</label>
                    <textarea id="mesaj" name="mesaj" rows="4" required></textarea>
                </div>
            
                <div>
                    <input type="submit" value="Trimite">
                </div>
            </form>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2025</p>
    </footer>

</body>
</html>
