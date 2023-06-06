<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function addCustomer(Request $request)
{
    $customerData = $request->only([
        'name',
        'address1',
        'address2',
        'state',
        'postcode',
        'pic',
        'email',
        'subscription_start_date',
        'renewal_date',
        'subscription',
    ]);

    // Convert the subscription array to a string
    $customerData['subscription'] = implode(',', $customerData['subscription']);

    // Create a new customer with the submitted data
    $customer = Customer::create([
        'name' => $customerData['name'],
        'address1' => $customerData['address1'],
        'address2' => $customerData['address2'],
        'state' => $customerData['state'],
        'postcode' => $customerData['postcode'],
        'pic' => $customerData['pic'],
        'email' => $customerData['email'],
        'subscription_start_date' => $customerData['subscription_start_date'],
        'renewal_date' => $customerData['renewal_date'],
        'subscription' => $customerData['subscription'],
    ]);

    // Optionally, you can redirect the user to a success page
    return redirect('/dashboard');
}
}
