<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $rs = $conn->query("SELECT * FROM tblusers WHERE username='" . $username . "' AND password='" . MD5($password) . "'");
    $numrow = $rs->num_rows;
    
    if ($numrow > 0) {
        $row = $rs->fetch_assoc();
        $_SESSION['level'] = $row['level'];
        $_SESSION['name'] = $row['username'];
        $_SESSION['id'] = $row['userid'];

        if ($_SESSION['level'] == 'admin') {
            header('location:../adproceed.php');
        } elseif ($_SESSION['level'] == 'user') {
            header('location:../proceed.php');
        } else {
            $_SESSION['error'] = "Login error";
            header('location:../login.php');
        }
    } else {
        $_SESSION['error'] = "Login error";
        header('location:../login.php');
    }
}
?>