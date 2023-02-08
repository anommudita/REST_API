
function searchMovie(){
    // penggunaan ajax dengan jquery
    // jika menggunakan $.getJSON datanya akan disimpan di url-nya dan data langsung menjadi obejek
    $.ajax({
        url: 'http://www.omdbapi.com/',
        type: 'get',
        dataType:'json',
        data: {
            // key : value!
            'apikey': 'd891a33a',
            // apapun yang diinputkan di search-input akan disimpan di sini
            // s adalah parameter untuk mencari film
            's': $('#search-input').val()
        },
        success : function(result){
            // jika berhassil
            // console.log(result)

            // menghapus semua data yang ada di movie-list
            $('#movie-list').html('');

        
            if(result.Response == "True"){
                // agar langsung mengambil array atau object dari Search dan mudah di looping
                let movies = result.Search;
                $.each(movies, function(i , data){
                    $('#movie-list').append(`
                    
                    <div class=col-md-4>
                        <div class="card mb-4" >
                        <img class="card-img-top" src="`+data.Poster+`" alt="`+data.Tittle+`">
                        <div class="card-body">
                            <h5 class="card-title">`+data.Title+`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+data.Year+`</h6>
                            <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="`+data.imdbID+`">See Details</a>
                        </div>
                        </div>

                    </div>
                    
                    `);
                    // console.log(data);
                });
            }else{
                $('#movie-list').html(`
                <div class="col">
                <h1 class=text-center >`+result.Error+`</h1>
                </div>
                `)
            }
        },
    });


}

// jika di klik tombol search
$('#search-button').on('click', function(){
    searchMovie();
});


// jika di mengklik tombol enter
$('#search-input').on('keyup', function(event){

    // 13 adalah tombol enter
    // keycade.info untuk melihatnya
    if(event.keyCode === 13){
        searchMovie();
    }
   
});



// error karena event bubbling
// karen see-details belum ada di html saat pertama kali di load maka tidak bisa di klik (harus di searching terlebih dahulu)
// cara ngakaninya adalah dengan cara event bubbling
$('#movie-list').on('click', '.see-detail', function(){
    // console.log($(this).data('id'));

    $.ajax({
        url: 'http://www.omdbapi.com/',
        type: 'get',
        dataType:'json',
        data: {
            // key : value!
            'apikey': 'd891a33a',
            'i': $(this).data('id')
        },
        success : function(movie){
            
            if(movie.Response === "True"){
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">\
                                <img src="`+movie.Poster+`" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><h3>`+movie.Title+`</h3></li>
                                        <li class="list-group-item"> Released : `+movie.Released+`</li>
                                        <li class="list-group-item"> Genre : `+movie.Genre+`</li>
                                        <li class="list-group-item"> Director : `+movie.Director+`</li>
                                        <li class="list-group-item"> Actor : `+movie.Actors+`</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                `);
            }
        }
    });
});