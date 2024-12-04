<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM members");
$stmt->execute();
$members = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Members List</title>
</head>
<body>
    <h2>Members List</h2>
    <a href="create.php">Add New Member</a>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership Type</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo $member['id']; ?></td>
            <td><?php echo $member['name']; ?></td>
            <td><?php echo $member['email']; ?></td>
            <td><?php echo $member['phone']; ?></td>
            <td><?php echo $member['membership_type']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $member['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $member['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>