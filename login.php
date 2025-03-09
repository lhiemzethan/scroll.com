<?php
require "service/database.php";
session_start();
$login_message = "";

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.html");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
    $login_message = "Silakan isi semua field!";
    } else {
    try {
        //verifikasi username
        $query_sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        //verifikasi pasword
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["is_login"] = true;
            $_SESSION["username"] = $username;
            header("location: dashboard.html");
        } else {
            header("location: login.html?error=" . urlencode($login_message = "Username atau password salah! Silahkan coba lagi"));
        }
        } catch (Exception $e) {
            header("location: login.html?error=" . urlencode($login_message = "Gagal login: " . $e->getMessage()));
        }
    }
    $conn->close();
    }
?>