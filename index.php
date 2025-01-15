<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit;
}
?>
