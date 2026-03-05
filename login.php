<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username dan Password wajib diisi!";
    } else {

        // Cari username di database
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            die("Prepare gagal: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

            // Cek password
            if (password_verify($password, $user['password'])) {

                // Buat session
                $_SESSION['is_logged_in'] = true;
                $_SESSION['username'] = $user['username'];

                // Redirect ke index
                header("Location: index.php");
                exit;

            } else {
                echo "Password salah!";
            }

        } else {
            echo "Username tidak ditemukan!";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<h2>Login</h2>

<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p>Belum punya akun? <a href="register.php">Daftar</a></p>