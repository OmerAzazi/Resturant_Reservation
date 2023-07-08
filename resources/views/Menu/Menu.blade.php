@include('Home.Header')

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Menus</h1>
                    <p>Delight in artful cuisine. Bold flavors and stunning presentations showcase our mastery of food. Join us for a sensory dining adventure that leaves a lasting impression. Indulge in the extraordinary.</p>
                </div>
            </div>
        </div>
    </section>



    <section class="breakfast-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="breakfast-menu-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="Template/img/breakfast_menu.jpg" alt="Breakfast">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2>Breakfast Menu</h2>
                                <div id="owl-breakfast" class="owl-carousel owl-theme">
                                    @foreach($breakfast as $breakfast)
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="/Template/img/{{$breakfast->Food_img}}" alt="" style="height: 140px">
                                            <div class="price">${{$breakfast->Food_price}}</div>
                                            <div class="text-content">
                                                <h4>{{$breakfast->Food_name}}</h4>
                                                <p>
                                                    {{$breakfast->Food_description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="lunch-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="lunch-menu-content">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Lunch Menu</h2>
                                <div id="owl-lunch" class="owl-carousel owl-theme">
                                    @foreach($lunch as $lunch)
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="/Template/img/{{$lunch->Food_img}}" alt="" style="height: 140px">
                                            <div class="price">${{$lunch->Food_price}}</div>
                                            <div class="text-content">
                                                <h4>{{$lunch->Food_name}}</h4>
                                                <p>{{$lunch->Food_description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="Template/img/lunch_menu.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dinner-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="dinner-menu-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="Template/img/dinner_menu.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2>Dinner Menu</h2>
                                <div id="owl-dinner" class="owl-carousel owl-theme">
                                    @foreach($desert as $desert)
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="/Template/img/{{$desert->Food_img}}" alt="" style="height: 140px">
                                            <div class="price">${{$desert->Food_price}}</div>
                                            <div class="text-content">
                                                <h4>{{$desert->Food_name}}</h4>
                                                <p>{{$desert->Food_description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@include('Home.Footer')