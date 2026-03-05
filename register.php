<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username dan Password wajib diisi!";
    } else {

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query INSERT
        $query = "INSERT INTO user (username, password) VALUES (?, ?)";

        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            die("Prepare gagal: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
            exit;
        } else {
            echo "Registrasi gagal: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<h2>Registrasi User</h2>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>