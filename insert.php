<?php
// Get command line arguments from Node.js
$name = $argv[1] ?? '';
$email = $argv[2] ?? '';

// MySQL connection settings
$host = "127.0.0.1"; // use 127.0.0.1 instead of localhost
$dbname = "testdb";
$user = "root";
$pass = "";

// Connect to MySQL using PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8", 
        $user, 
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute insert
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);

    echo "User inserted successfully!";
} catch (PDOException $e) {
    // Show detailed error (useful for debugging)
    echo "Error: " . $e->getMessage();
}
?>
