<!-- customerList.blade.php -->

@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>State</th>
                    <th>Postcode</th>
                    <th>PIC</th>
                    <th>Email</th>
                    <th>Subscription</th>
                    <th>Subscription Start Date</th>
                    <th>Renewal Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address1}}</td>
                        <td>{{$customer->address2}}</td>
                        <td>{{$customer->state}}</td>
                        <td>{{$customer->postcode}}</td>
                        <td>{{$customer->pic}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->subscription}}</td>
                        <td>{{$customer->subscription_start_date}}</td>
                        <td>{{$customer->renewal_date}}</td>
                        <td>
                            <!-- Add the delete button here -->
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
