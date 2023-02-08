<?php
// mengambil file data JSON dari folder data ini merupakan function untuk mengambil file JSON di PHP
$data = file_get_contents('pizza-hut/data/pizza.json');
$menu = json_decode($data, true);

// var_dump($menu["menu"][0]["nama"]);


// untuk menimpa agar mudah untuk mengambilnya data dari JSON!
$menu = $menu["menu"];
// echo $menu[0]["nama"];

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="pizza-hut/img/Pizza_Hut_logo.svg">
    <title>Pizza Hut</title>
    <style favi></style>
</head>

<body>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="pizza-hut/img/Pizza_Hut_logo.svg" alt="logo.png" width="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="allmenu.php">All Menu</a>
                    <a class="nav-item nav-link active" href="pizza.php">Pizza</a>
                    <a class="nav-item nav-link active" href="pasta.php">Pasta</a>
                    <a class="nav-item nav-link active" href="nasi.php">Nasi</a>
                    <a class="nav-item nav-link active" href="minuman.php">Minuman</a>

                </div>
            </div>
        </div>
    </nav>

    <!-- end navbar -->

    <!-- Content -->
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>All Menu</h1>
            </div>
        </div>



        <div class="row">
            <?php foreach ($menu as $row) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img class="card-img-top" src="pizza-hut/img/pizza/<?= $row["gambar"]; ?>"
                        alt="<?= $row["nama"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["nama"]; ?></h5>
                        <p class="card-text"><?= $row["deskripsi"]; ?></p>
                        <h5 class="card-title"><?= $row["harga"]; ?></h5>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>





    </div>
    <!-- End Conten -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>