<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to bottom right, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .container {
        background-color: #ffffffcc;
        padding: 20px 30px 30px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 300px;
    }
    h2 {
        padding-bottom: 10px;
        color: #0277bd;
    }
    a {
        font-size: 17px;
        background-color: transparent;
        border: 1px solid #2196f3;
        padding: 10px;
        color: #2196f3;
        text-transform: uppercase;
        position: relative;
        transition: 0.5s ease;
        cursor: pointer;
        display: block;
        text-decoration: none;
        font-weight: bold;
        margin: 5px 0;
        overflow: hidden;
        z-index: 1;
    }
    a span {
        position: relative;
        z-index: 2;
    }
    a::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 0;
        background-color: #2196f3;
        transition: 0.5s ease;
        z-index: 2;
    }

    a:hover {
        color: white;
        transition-delay: 0.5s;
    }

    a:hover::before {
        width: 100%;
    }

    a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 0;
        width: 100%;
        background-color: #2196f3;
        transition: 0.4s ease;
        z-index: 0;
    }

    a:hover::after {
        height: 100%;
        transition-delay: 0.4s;
    }
</style>
<div class="container">
    <h2>Dashboard</h2>
    <a href="../buku/list.php"><span>Kelola Buku</span></a><br>
    <a href="../peminjaman/list.php"><span>Kelola Peminjaman</span></a><br>
    <a href="../logout.php"><span>Logout</span></a>
</div>