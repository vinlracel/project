<?php
session_start();

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Function to redirect to login if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: log-in.php");
        exit;
    }
}

// Function to redirect to home if already logged in
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header("Location: admin.php");
        exit;
    }
}
?>