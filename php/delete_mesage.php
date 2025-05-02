<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "contact";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if (!$stmt) {
        echo "Eroare la prepare(): " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Eroare la execuție: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inexistent";
}

$conn->close();
?>
