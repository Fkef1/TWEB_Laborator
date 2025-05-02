<?php
header("Content-Type: application/json"); // Setăm header-ul pentru JSON

$servername = "localhost"; 
$username = "root"; 
$password = "1234"; 
$dbname = "contact"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Conexiunea a eșuat: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $conn->real_escape_string($_POST['nume'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $mesaj = $conn->real_escape_string($_POST['mesaj'] ?? '');

    $stmt = $conn->prepare("INSERT INTO users (nume, email, mesaj, data) VALUES (?, ?, ?, NOW())");

    if ($stmt) {
        $stmt->bind_param("sss", $nume, $email, $mesaj);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Mesajul a fost salvat!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Eroare la salvare: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Eroare la pregătirea interogării: " . $conn->error]);
    }
}

$conn->close();
?>
