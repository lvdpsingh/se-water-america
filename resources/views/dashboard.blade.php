<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b>{{ __("Submitted Requests: ") }} {{count($service_requests)}}</b><br/><br/>

                    <!--admin-card-view-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Move-In Date</th>
                                <th scope="col">Address Line 1</th>
                                <th scope="col">Address Line 2</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Country</th>
                                <th scope="col">ZipCode</th>
                                <th scope="col">CustomerID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service_requests as $sr)
                            <tr>
                                <td>{{ $sr->id }}</td>
                                <td>{{ $sr->move_in_date }}</td>
                                <td>{{ $sr->address_1 }}</td>
                                <td>{{ $sr->address_2 }}</td>
                                <td>{{ $sr->city }}</td>
                                <td>{{ $sr->state }}</td>
                                <td>{{ $sr->country }}</td>
                                <td>{{ $sr->zipcode }}</td>
                                <td>{{ $sr->customerID }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
