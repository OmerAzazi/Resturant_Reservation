@include('Home.Header')
<br><br>
@if ($reservation->count() > 0)
    {{-- First Part --}}
    @php
        $bookedReservationExists = false;
    @endphp

    @foreach ($reservation as $reservation)
        @if ($reservation->status == 'Booked')
            @php
                $bookedReservationExists = true;
            @endphp

            <div style="padding-left: 50px">
                <h4 style="font-size: 30px; font-family: 'Chalkduster, fantasy'">Your Reservation</h4>
                <div class="row">
                    <div class="col-md-2">
                        <img src="Template/image/booked.jpg" alt="">
                    </div>
                    <div class="col-md-10">
                        <div class="col-md-4">
                            Reservation Name: {{$reservation->name}} <br>
                            Email: {{$reservation->email}} <br>
                            Day: {{$reservation->day}} <br>
                            Created At: {{$reservation->created_at}}
                        </div>
                        <div class="col-md-4">
                            Phone Number: {{$reservation->phone}}  <br>
                            Person Number: {{$reservation->persons}} <br>
                            Hour: {{$reservation->hour}} <br>
                            Reservation Status: {{$reservation->status}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            *Our cancellation policy allows for flexibility, as you have the option to cancel your reservation at any time. However, we kindly request that you provide us with at least a 1-day notice prior to your intended cancellation date.
                            <br>Call us if you want to cancel your reservation +1 (555) 123-4567 Thank you.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@if (!$bookedReservationExists)
{{-- Second Part --}}
<div style="padding-left: 50px">
    <p>* You dont have any rservation at this moment. </p>
    <hr><br>
        <h4 style="font-size:30px;font-family:'Chalkduster, fantasy'">Book Your Table</h4><br>
        <div>
            <div id="error-messages"></div>
        </div><br>
    
        <form id="book-form" style="padding-right: 50px">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <input name="day" type="date" class="form-control" id="day">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <select name="hour" id="hour" class="form-control">
                            <option selected disabled value="">Select hour</option>
                            <option value="10:00 - 12:00">10:00 - 12:00</option>
                            <option value="12:00 - 14:00">12:00 - 14:00</option>
                            <option value="14:00 - 16:00">14:00 - 16:00</option>
                            <option value="16:00 - 18:00">16:00 - 18:00</option>
                            <option value="18:00 - 20:00">18:00 - 20:00</option>
                            <option value="20:00 - 22:00">20:00 - 22:00</option>
                            <option value="22:00 - 00:00">22:00 - 00:00</option>
                        </select>
                    </fieldset>
                </div><br><br><br>
                <div class="col-md-6">
                    <fieldset>
                        <input name="name" type="name" class="form-control" id="name" placeholder="Full name">
                    </fieldset> 
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <input name="email" type="email" class="form-control" id="email" value="{{$email}}" readonly>
                    </fieldset> 
                </div><br><br><br>
                <div class="col-md-6">
                    <fieldset>
                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <select name='persons' id="persons" class="form-control">
                            <option selected disabled value="">How many persons?</option>
                            <option value="1-Person">1 Person</option>
                            <option value="2-Persons">2 Persons</option>
                            <option value="3-Persons">3 Persons</option>
                            <option value="4-Persons">4 Persons</option>
                            <option value="5-Persons">5 Persons</option>
                            <option value="6-Persons">6 Persons</option>
                        </select>
                    </fieldset><br><br>
    
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <button type="submit" class="btn btn-danger form-control">Book Table</button>
                    </fieldset>
                </div>
            </div><br><br>
        </form>
</div>
@endif

@else
    {{-- Second Part --}}
    <div style="padding-left: 50px">
        <p>* You don't have any reservation at this moment.</p>
        <hr><br>
        <h4 style="font-size: 30px; font-family: 'Chalkduster, fantasy'">Book Your Table</h4><br>
        <div>
            <div id="error-messages"></div>
        </div><br>
        <form id="book-form" style="padding-right: 50px">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <input name="day" type="date" class="form-control" id="day">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <select name="hour" id="hour" class="form-control">
                            <option selected disabled value="">Select hour</option>
                            <option value="10:00 - 12:00">10:00 - 12:00</option>
                            <option value="12:00 - 14:00">12:00 - 14:00</option>
                            <option value="14:00 - 16:00">14:00 - 16:00</option>
                            <option value="16:00 - 18:00">16:00 - 18:00</option>
                            <option value="18:00 - 20:00">18:00 - 20:00</option>
                            <option value="20:00 - 22:00">20:00 - 22:00</option>
                            <option value="22:00 - 00:00">22:00 - 00:00</option>
                        </select>
                    </fieldset>
                </div><br><br><br>
                <div class="col-md-6">
                    <fieldset>
                        <input name="name" type="name" class="form-control" id="name" placeholder="Full name">
                    </fieldset> 
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <input name="email" type="email" class="form-control" id="email" value="{{$email}}" readonly>
                    </fieldset> 
                </div><br><br><br>
                <div class="col-md-6">
                    <fieldset>
                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <select name='persons' id="persons" class="form-control">
                            <option selected disabled value="">How many persons?</option>
                            <option value="1-Person">1 Person</option>
                            <option value="2-Persons">2 Persons</option>
                            <option value="3-Persons">3 Persons</option>
                            <option value="4-Persons">4 Persons</option>
                            <option value="5-Persons">5 Persons</option>
                            <option value="6-Persons">6 Persons</option>
                        </select>
                    </fieldset><br><br>
    
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <button type="submit" class="btn btn-danger form-control">Book Table</button>
                    </fieldset>
                </div>
            </div><br><br>
        </form>
    </div>
@endif
<br>
@include('Home.Footer')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#book-form').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
    
            // Reset previous error messages
            $('.error-message').remove();
    
            var formData = $(this).serialize(); // Serialize the form data
    
            $.ajax({
                url: '{{ route('book') }}',
                type: 'POST',
                data: formData,
                success: function(response, status, xhr) {
                    // Handle the successful response
                    console.log('HTTP status code:', xhr.status);
                    console.log('Message:', response.message);
                    // Empty the form fields
                    $('#day').val('');
                    $('#name').val('');
                    $('#phone').val('');
                    $('#book-form select').val('');
                    // Display the success message
                    $('#success-message').text('*The reservation booked successfully');
                    // Redirect to the specified route
                    alert('The reservation booked successfully');
                    window.location.href = '{{ url('BookPage') }}';
                },
                error: function(xhr) {
                    // Handle the error response [To get the error from controller-valdition]
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var errorMessage = '';
                            $.each(messages, function(index, message) {
                            errorMessage += '<p class="error-message">' + message + '</p>';
                        });
                        $('#error-messages').html(errorMessage); // To get the error from validtion and store it the class
                        });
                    }
                    console.log('HTTP status code:', xhr.status);
                    console.log(xhr.responseText);
                    // Optionally, you can show a general error message or perform any other action
                }
            });
        });
    });
    
    </script>
    