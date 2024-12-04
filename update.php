<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM members WHERE id = ?");
$stmt->execute([$id]);
$member = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];

    $stmt = $conn->prepare("UPDATE members SET name = ?, email = ?, phone = ?, membership_type = ? WHERE id = ?");
    $stmt->execute([$name, $email, $phone, $membership_type, $id]);

    header("Location: read.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
</head>
<body>
    <h2>Edit Member</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?php echo $member['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $member['email']; ?>" required><br>
        Phone: <input type="text" name="phone" value="<?php echo $member['phone']; ?>" required><br>
        Membership Type: <input type="text" name="membership_type" value="<?php echo $member['membership_type']; ?>" required><br>
        <input type="submit" value="Update Member">
    </form>
</body>
</html>