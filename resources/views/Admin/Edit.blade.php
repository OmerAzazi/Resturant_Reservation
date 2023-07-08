<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD Food') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="btn btn-primary">View Food</a>
                </nav>
                <form style="padding-left: 20px;padding-right:200px;padding-top:20px" id="update-food" enctype="multipart/form-data" data-id="{{ $edit->id }}">
                    @csrf
                    <div id="success-message" style="color:green"></div>
                    <div id="error-messages"></div> <br>
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Food Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{$edit->Food_name}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="price" class="col-sm-2 col-form-label">Food Price</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="price" name="price" value="{{$edit->Food_price}}">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Food Description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="description" name="description" value="{{$edit->Food_description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="category">Food Category</label>
                        <div class="col-sm-10">
                            <select id="category" name="category" class="form-control">
                                <option selected>{{$edit->Food_category}}</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="featured">Food Featured</label>
                        <div class="col-sm-10">
                            <select id="featured" name="featured" class="form-control">
                                <option selected>{{$edit->Weekly_featured}}</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Not Weekly">Not Weekly</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Food Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image">
                            <img height="100" width="100" src="/Template/img/{{$edit->Food_img}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="color: black">Update Food</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#update-food').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
    
            // Reset previous error messages
            $('.error-message').remove();
    
            var formData = new FormData(this); // Create a FormData object
            var foodId = "{{ $edit->id }}";
    
            $.ajax({
                url: "{{ route('Edit', ['id' => $edit->id]) }}", // Corrected the route URL
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false, // Important: prevent jQuery from processing the data
                contentType: false, // Important: prevent jQuery from setting the content type
                success: function(response, status, xhr) {
                    // Handle the successful response
                    console.log('HTTP status code:', xhr.status);
                    console.log('Message:', response.message);
                    // Empty the form fields   
                    // Display the success message
                    $('#success-message').text('The Food Updated successfully');
                },
                error: function(xhr) {
                    // Handle the error response
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                errorMessage += '<p class="error-message">' + message + '</p>';
                            });
                        });
                        $('#error-messages').html(errorMessage); // Display the error message
                    }
                    console.log('HTTP status code:', xhr.status);
                    console.log(xhr.responseText);
                    // Optionally, you can show a general error message or perform any other action
                }
            });
        });
    });
</script>
