<section id="book-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Book Your Table Now</h2>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-12">
                <div class="left-image">
                    <img src="Template/img/book_left_image.jpg"  alt="">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="right-info">
                    <h4>Reservation</h4> <br>
                    <p>
                    Reserve a book at our literary restaurant. Enjoy delicious cuisine while immersing yourself in captivating reads.
                    Join us for a unique gastronomic experience where literature and dining intertwine.</p>
                    @if (Route::has('login'))
                    @auth
                    <div class="primary-button">
                        <a href="{{url('BookPage')}}">Book Now</a>
                    </div>
                    @else
                    <div class="primary-button">
                        <a href="{{route('login')}}">Book Now</a>
                    </div>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>




