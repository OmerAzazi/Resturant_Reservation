   <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Weekly Featured Food</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Breakfast</h2>
                        @foreach($breakfast as $breakfast)
                        <img src="/Template/img/{{$breakfast->Food_img}}" alt="" style="height: 175px">
                        <div class="price">${{$breakfast->Food_price}}</div>
                        <div class="text-content">
                            <h4>{{$breakfast->Food_name}}</h4>
                            <p>{{$breakfast->Food_description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Lunch</h2>
                        @foreach($lunch as $lunch)
                        <img src="/Template/img/{{$lunch->Food_img}}" alt="" style="height: 175px">
                        <div class="price">${{$lunch->Food_price}}</div>
                        <div class="text-content">
                            <h4>{{$lunch->Food_name}}</h4>
                            <p>{{$lunch->Food_description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <h2>Dinner</h2>
                        @foreach($dinner as $dinner)
                        <img src="/Template/img/{{$dinner->Food_img}}" alt="" style="height: 175px">
                        <div class="price">${{$dinner->Food_price}}</div>
                        <div class="text-content">
                            <h4>{{$dinner->Food_name}}</h4>
                            <p>{{$dinner->Food_description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>