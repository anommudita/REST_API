// JSON mengambil dari coba.json

//  memanggil dengan ajax dengan menggunakan XMLHttpRequest
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        // data dikembalikan berupa string
    //  json.parse mengubah data dari coba menjadi object
        let mahasiswa = JSON.parse(this.responseText);
        console.log(mahasiswa);
    }
}

// bekerja dengan ajax mengunakan Assynchronous
// mengambil data dari coba.json
xhr.open('GET', 'coba.json', true);
xhr.send();

// data dikembalikan berupa string
