<?php

$mahasiswa = [
    [
        "nama" => "Ida Bagus Anom Mudita",
        "nim" => "2015051038",
        "email" => "anommudita@undiksha.ac.id"
    ],
    [
        "nama" => "Gusmang Ananda",
        "nim" => "2015051078",
        "email" => "gusmangananada@undiksha.ac.id"
    ]
];

// var_dump($mahasiswa);

// jika ditambahkan parameter true maka akan menghasilkan array asosiatif
// jika tidak ditambahkan parameter true maka akan menghasilkan array numerik atau object
$data = json_encode($mahasiswa);
echo $data;