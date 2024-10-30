<?php
session_start();
include '../config/db_connection.php';
include '../includes/header.php';

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to apply to become an agent.";
    exit;
}

$user_id = $_SESSION['user_id'];
$bio = $_POST['bio'];
$experience = $_POST['experience'];

try {
    // Update the user's role to "agent"
    $stmt = $pdo->prepare("UPDATE users SET role = 'agent', bio = :bio, experience = :experience WHERE id = :user_id");
    $stmt->execute([
        ':bio' => $bio,
        ':experience' => $experience,
        ':user_id' => $user_id
    ]);
    
    echo "Your application to become an agent has been submitted!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
   
}

?>
