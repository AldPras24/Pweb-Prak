<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            margin: 0;
        }
        .jumbotron-bg {
            background-image:url('images/Header-Home.jpg');
            background-position: center;
            background-size: cover;
            color: white;
            height: 300px;
        }
    </style>
</head>
<body>
    <header class="jumbotron-bg text-black text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Portal Alumni</h1>
            <p class="lead">Alumni biasanya berisi informasi singkat tentang individu yang telah menyelesaikan pendidikan di suatu institusi</p>
        </div>
    </header>
    <div class="container-fluid my-4">
        <div class="row">
                <?php 
                include "Latihan_09_menu.php"; 
                ?>
            <main class="col-md-10">
                <article>
                    <?php
                    extract($_GET);
                    if (isset($menu)){
                        if ($menu == "home") {
                            @include "Latihan_09_home.php";}
                        else if($menu == "about"){
                            @include "Latihan_09_about.php";}
                        else if($menu == "alumni"){
                            @include "Latihan_09_ralumni.php";}
                        else if($menu == "calumni"){
                            @include "Latihan_09_calumni.php";}
                        else if($menu == "ualumni"){
                            @include "Latihan_09_ualumni.php";}
                        else if($menu == "bukutamu"){
                            @include "PostTestM9.php";}
                        else if ($menu == "bursa") { 
                            @include "Latihan_09_bursa.php";}
                        else if ($menu == "search") { 
                            @include "Latihan_09_search.php";
                        }
                        }else{
                            @include "Latihan_09_home.php";
                        }                  
                    ?>
                </article>
            </main>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Website Kami. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>