// pengambilan data menggunakan JSON
// yang lebih lengkap penggunaan function $.ajax() dan $.getJSON() untuk mempersingkatnya



function tampilkanSemuaMenu(){
    $.getJSON('http://localhost/REST_API/pertemuan_4/pizza-hut/data/pizza.json', function (data){

        // menghilangkan key menu-nya
        let menu = data.menu
        // console.log(menu);

        // jquery perulangan terhadap object
        $.each(menu, function(i, data){

            // perulangan untuk menampilkan data dengan tampilan html card!
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img class="card-img-top" src="pizza-hut/img/pizza/'+ data.gambar +'" alt="'+ data.nama +'"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">'+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>');
        });

        // console.log(data);
    });
}

// default tampilkan semua menu
tampilkanSemuaMenu();

$('.nav-link').on('click', function (){

    // semua class active hilang
    $('.nav-link').removeClass('active');
    // memindahkan atau menambahkan active jika di klik
    $(this).addClass('active');


    // membuat kategori dan mengambil data dari html navbar yang di klik
    let kategori = $(this).html();
    
    // mengubah h1 mejadi kategori yang di klik
    $('h1').html(kategori);

    // menampilkan data allmenu karena kategori allmenu tidak ada di json
    if(kategori=='All Menu'){
        $('#daftar-menu').html('');
        tampilkanSemuaMenu();
        return;
    }

    $.getJSON('http://localhost/REST_API/pertemuan_4/pizza-hut/data/pizza.json', function (data){
        let menu = data.menu;
        
        // variable kosong untuk menampung data dengan perulangan
        let content = '';

        $.each(menu, function(i, data){
            // kondisi untuk menampilkan data sesuai dengan kategori yang di klik
            if(data.kategori==kategori.toLowerCase()){
                content += '<div class="col-md-4"><div class="card mb-3"><img class="card-img-top" src="pizza-hut/img/pizza/'+ data.gambar +'" alt="'+ data.nama +'"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p><h5 class="card-title">'+ data.harga +'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>'
            }
        });

        $('#daftar-menu').html(content);
    });

    

});