<?php include("db.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $job = $_POST['job'];
    $experience = $_POST['experience'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, job, experience) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $job, $experience);
    $stmt->execute();
    echo "<script>window.location.href='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { font-family: Arial; background: #f3f3f3; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 0 10px #ccc; width: 300px; }
        input, textarea { width: 100%; margin: 10px 0; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #0077b5; color: white; padding: 10px; border: none; width: 100%; border-radius: 5px; }
        button:hover { background: #005f8d; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Sign Up</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="job" placeholder="Job Title" required>
        <textarea name="experience" placeholder="Work Experience" required></textarea>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
