@extends('dashboard')

@section('content')
<div class="card">
    <h5 class="card-header">Hoverable rows</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($customers as $customer)
                <tr>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->subscription}}</td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd_{{$customer->id}}" aria-controls="offcanvasEnd_{{$customer->id}}">More...</button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd_{{$customer->id}}" aria-labelledby="offcanvasEndLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">{{$customer->name}}</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                    <h5>Name: {{$customer->name}}</h5>
                                    <h5>Address 1: {{$customer->address1}}</h5>
                                    <h5>Address 2: {{$customer->address2}}</h5>
                                    <h5>State: {{$customer->state}}</h5>
                                    <h5>Postcode: {{$customer->postcode}}</h5>
                                    <h5>Person In Charge(PIC): {{$customer->pic}}</h5>

                                    <h5>Email: {{$customer->email}}</h5>
                                    <h5>Subscription: {{$customer->subscription}}</h5>
                                    <h5>Subscription Start Date: {{$customer->subscription_start_date}}</h5>
                                    <h5>Renewal Date: {{$customer->renewal_date}}</h5>

                                    <!-- Display other customer information -->
                                    <button type="button" class="btn btn-primary mb-2 d-grid w-100" data-bs-dismiss="offcanvas">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection




{{-- <title>Customer List</title>
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
@endsection --}}
