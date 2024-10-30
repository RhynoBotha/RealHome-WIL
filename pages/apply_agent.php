<?php
session_start();
include '../includes/header.php';
include '../config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to apply to become an agent.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply to Become an Agent</title>
</head>
<body>
    <h2>Apply to Become an Agent</h2>
    <form action="process_apply_agent.php" method="POST">
        <label for="bio">Tell us about yourself:</label><br>
        <textarea name="bio" id="bio" required></textarea><br><br>
        
        <label for="experience">Real Estate Experience (years):</label><br>
        <input type="number" name="experience" id="experience" min="0" required><br><br>
        
        <button type="submit">Submit Application</button>
    </form>
</body>
</html>

<?php include '../includes/footer.php'; ?>
