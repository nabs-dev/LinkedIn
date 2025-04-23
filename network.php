<?php include("db.php"); session_start(); if (!isset($_SESSION['user_id'])) echo "<script>window.location.href='login.php';</script>"; ?>
<?php
$user_id = $_SESSION['user_id'];
$connected = $conn->query("SELECT user2 FROM connections WHERE user1=$user_id");
$connected_ids = [];
while ($c = $connected->fetch_assoc()) $connected_ids[] = $c['user2'];

$search = isset($_GET['search']) ? $_GET['search'] : '';
$users = $conn->query("SELECT * FROM users WHERE name LIKE '%$search%' AND id != $user_id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Network</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .card { background: white; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 0 5px #ccc; }
        button { padding: 6px 10px; background: #0077b5; color: white; border: none; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>My Network</h2>
    <?php
    while ($row = $users->fetch_assoc()) {
        $id = $row['id'];
        $is_connected = in_array($id, $connected_ids);
        echo "<div class='card'>";
        echo "<strong>{$row['name']}</strong><br>{$row['job']}<br><small>{$row['experience']}</small><br>";
        if (!$is_connected) {
            echo "<button onclick=\"window.location.href='connect.php?connect_id={$id}'\">Connect</button>";
        } else {
            echo "<button disabled>Connected</button>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
