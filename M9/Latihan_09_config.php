<?php
    $servername = "localhost";
    $username = "root";
    $password = "aldiiis1424";
    $dbname = "db_alumni";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Koneksi Gagal: ".$conn->connect_error);
    }