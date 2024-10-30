<?php
// Include the header
include '../includes/header.php';
// Include the database connection
include '../config/db_connection.php';

// Fetch all agents from the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE role = 'agent'");
$stmt->execute();
$agents = $stmt->fetchAll();

?>
    <style>
        h2 {
            display : flex ;
            justify-content : center ;

        }
        table {
            position : relative ;
            border : 2px solid ;
            border-radius : 15px 25px ;
        }
       td {
        display : relative ;
        padding : 5px ;
       }

       #move {
        display : relative ;
        left : 15px ;
       }
    </style>

<div class="agent-list">
    <h2>All Agents</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Bio</th>
                <th>Experience</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agents as $agent): ?>
                <tr>
                    <td><?php echo htmlspecialchars($agent['id']); ?></td>
                    <td><?php echo htmlspecialchars($agent['username']); ?></td>
                    <td><?php echo htmlspecialchars($agent['email']); ?></td>
                    <td><?php echo htmlspecialchars($agent['bio']); ?></td>
                    <td id = "move"><?php echo htmlspecialchars($agent['experience']); ?> years</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
// Include the footer
include '../includes/footer.php';
?>
