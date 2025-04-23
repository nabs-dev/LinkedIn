<?php
// File: insert_users.php
include("db.php");
$users = [
    ["Areeba Khan", "areeba@example.com", "pass1", "Designer", "5 years at ABC Studio"],
    ["Zain Ali", "zain@example.com", "pass2", "Developer", "3 years at XYZ Devs"],
    ["Hina Rizvi", "hina@example.com", "pass3", "Marketing Manager", "6 years at BrandPro"],
    ["Asad Raza", "asad@example.com", "pass4", "Project Lead", "4 years at SoftSolutions"],
    ["Sana Sheikh", "sana@example.com", "pass5", "HR Officer", "7 years at HRM Corp"],
    ["Fahad Ahmed", "fahad@example.com", "pass6", "QA Analyst", "3 years at Testers Inc"],
    ["Noor Fatima", "noor@example.com", "pass7", "UX Designer", "5 years at UserFirst"],
    ["Bilal Khan", "bilal@example.com", "pass8", "Full Stack Dev", "4 years at WebWorks"],
    ["Nimra Qureshi", "nimra@example.com", "pass9", "Content Writer", "6 years at WriteNow"],
    ["Owais Malik", "owais@example.com", "pass10", "SEO Expert", "2 years at RankHigh"]
];
foreach ($users as $u) {
    $name = $conn->real_escape_string($u[0]);
    $email = $conn->real_escape_string($u[1]);
    $pass = $conn->real_escape_string($u[2]);
    $job = $conn->real_escape_string($u[3]);
    $exp = $conn->real_escape_string($u[4]);
    $conn->query("INSERT INTO users (name, email, password, job, experience) VALUES ('$name', '$email', '$pass', '$job', '$exp')");
}
echo "<script>alert('10 users inserted!');window.location.href='login.php';</script>";
?>
