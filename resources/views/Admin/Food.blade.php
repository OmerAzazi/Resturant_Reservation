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
                    <a href="{{url('AddFood')}}" class="btn btn-primary">Add Food</a>
                    <form action="{{url('Search')}}" method="GET" class="form-inline">
                      @csrf
                      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </nav>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($food as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$item->Food_name}}</td>
                        <td>${{$item->Food_price}}</td>
                        <td><img src="/Template/img/{{$item->Food_img}}" alt="" style="height: 130px;width:400px"></td>
                        <td>{{$item->Food_description}}</td>
                        <td>{{$item->Food_category}}</td>
                        <td>{{$item->Weekly_featured}}</td>
                        <td><a href="{{url('editFood',$item->id)}}" class="btn btn-info">Edit</a><a href="#" class="btn btn-danger btn-delete" data-id="{{ $item->id }}">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div style="padding-left: 30px;padding-right:30px">
                  <span>
                    {!!$food->withQueryString()->links('pagination::bootstrap-5')!!}
                  </span>  
                  </div><br>
        


            </div>
        </div>
    </div>
</x-app-layout>
<script>
  $(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var foodId = $(this).data('id');
    var row = $(this).closest('tr'); // To get the tr of the ID
    
    $.ajax({
      type: 'DELETE',
      url: '/foodDelete/' + foodId,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (data, textStatus, xhr) {
        console.log('Food deleted successfully. Status Code: ' + xhr.status);
        row.remove(); // Remove the deleted row from the table
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
</script>

