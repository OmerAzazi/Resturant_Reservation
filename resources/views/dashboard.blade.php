<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding: 50px">
                    <h1 style="font-weight: bold">Welcome to the Admin Dashboard of our Restaurant Reservation System!</h1><br>
                    <p>Manage and monitor reservations for our restaurant through this intuitive dashboard.</p>
                    <p>Stay organized and in control of table bookings and customer reservations.</p>
                    <p>View and update reservation details to ensure a seamless dining experience.</p>
                    <p>Keep track of reservation statuses, such as booked, confirmed, canceled, or completed.</p>
                    <p>Generate reports and insights based on reservation data to optimize restaurant operations.</p>
                    <p>Communicate with customers and respond to their reservation inquiries promptly.</p>
                    <p>Customize reservation settings and policies to meet your restaurant's specific requirements.</p>
                    <p>Utilize the reservation calendar to effectively manage table availability and seating arrangements.</p>
                    <p>Access analytics and metrics to evaluate reservation trends and plan for peak periods.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
