<?php
    require "service/database.php";
    session_start();

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    $register_message = ""; // Tambahkan kode ini untuk mendefinisikan variabel $register_message

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validasi input
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
        $register_message = "Silakan isi semua field!";
    } else {
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
    // Gunakan prepared statement untuk menghindari SQL Injection
    $query_sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query_sql);
    if ($stmt === false) {
        throw new Exception($conn->error);
    }
    $stmt->bind_param("ssss", $fullname, $username, $email, $hashed_password);
    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }
        header("location: reg.html?error=" . urlencode($register_message = "REGISTER BERHASIL, SILAHKAN LOGIN."));

    } catch (Exception $e) {
        header("location: reg.html?error=" . urlencode($register_message = "REGISTER GAGAL, SILAHKAN COBA LAGI !! - " . $e->getMessage()));
    }
    }
    $conn->close();
    }

    // Tampilkan pesan registrasi
    //echo $register_message;
?>
