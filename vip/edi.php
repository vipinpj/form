<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vipin";

// Create connection
$dbc = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $sql = "SELECT * FROM vi WHERE email='" . $name . "'";
    $res = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($res);
    $id = $row['id'];

    if (isset($_POST['submit'])) {
        $sql = "UPDATE vi SET 
                    name='" . $_POST['name'] . "',
                    email='" . $_POST['email'] . "',
                    password='" . $_POST['password'] . "',
                    repassword='" . $_POST['password1'] . "',
                    number='" . $_POST['number'] . "',
                    pname='" . $_POST['pname'] . "',
                    address='" . $_POST['add'] . "'
                WHERE id='" . $id . "'";

        $res = mysqli_query($dbc, $sql);
        if ($res) {
            echo "Profile updated";
            header('Location: log.php');
            exit();
        }
    }
}
?>

<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
<fieldset style="text-align:center;">
    <legend>User Edit</legend>
    <form action="" method="post">
        <center>
            <table>
                <tr>
                    <th><label>Name</label></th>
                    <td><input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Email</label></th>
                    <td><input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Password</label></th>
                    <td><input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Re-enter Password</label></th>
                    <td><input type="password" name="password1" value="<?php echo htmlspecialchars($row['repassword']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Number</label></th>
                    <td><input type="text" name="number" value="<?php echo htmlspecialchars($row['number']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Pname</label></th>
                    <td><input type="text" name="pname" value="<?php echo htmlspecialchars($row['pname']); ?>"></td>
                </tr>
                <tr>
                    <th><label>Address</label></th>
                    <td><textarea cols="20" rows="2" name="add"><?php echo htmlspecialchars($row['address']); ?></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Update"></td>
                    <td><a href="log.php"><button type="button">Logout</button></a></td>
                </tr>
            </table>
        </center>
    </form>
</fieldset>
</body>
</html>
