<?php

// mengambil database menggunakan rest-API
$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');


$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();

// mengambil data dari database dan mengubahnya menjadi array asosiatif
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

// mengubah array asosiatif menjadi json
$data = json_encode($mahasiswa);
echo $data;