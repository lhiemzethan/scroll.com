<?php
    session_start();

    // Proses logout
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.html');
    }
?>
