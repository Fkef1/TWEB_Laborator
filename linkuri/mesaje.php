<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "contact";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

$sql = "SELECT id, nume, email, mesaj, data FROM users ORDER BY data DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaje Contact</title>
    <link rel="stylesheet" href="../css/mesaje.css">
</head>
<body>

    <header>
        <h1>Mesaje primite</h1>
    </header>

    <nav>
    <a href="http://localhost/site/index.php">Acasă</a>
    <a href="http://localhost/site/obiective.php">Obiective</a>
    <a href="http://localhost/site/planificare.php">Planificare</a>
    <a href="http://localhost/site/contact.php">Contact</a>
    </nav>

    <main>
        <section>
            <h2>Lista mesajelor</h2>
            <?php if ($result->num_rows > 0): ?>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Email</th>
                        <th>Mesaj</th>
                        <th>Data</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nume']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mesaj']; ?></td>
                            <td><?php echo $row['data']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>Nu există mesaje.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025</p>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
