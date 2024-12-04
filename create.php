<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];

    $stmt = $conn->prepare("INSERT INTO members (name, email, phone, membership_type) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $membership_type]);

    header("Location: read.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
</head>
<body>
    <h2>Add Member</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Phone: <input type="text" name="phone" required><br>
        Membership Type: <input type="text" name="membership_type" required><br>
        <input type="submit" value="Add Member">
    </form>
</body>
</html>