<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View / Manage Requests') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="alert alert-success alert-dismissible fade show text-gray-600"
        >{{ session('success') }}</p>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--                    <b>{{ __("Submitted Requests: ") }} {{count($service_requests)}}</b><br/><br/>--}}

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
                            <th scope="col">Customer</th>
                            {{--                            <th scope="col">CustomerID</th>--}}
                            <th scope="col">Actions</th>
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
                                <td>{{ $sr->customer->name }}</td>
                                {{--                                <td>{{ $sr->customerID }}</td>--}}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/customer/service/edit/'.$sr->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('/customer/service/delete/'.$sr->id) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
