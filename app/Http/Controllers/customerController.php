<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function addCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:customers',
            'email' => 'required|email|unique:customers',
            'address1' => 'required',
            'address2' => 'nullable',
            'state' => 'required',
            'postcode' => 'required',
            'pic' => 'required',
            'subscription_start_date' => 'required',
            'renewal_date' => 'required',
            'subscription' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
        return redirect('/customerList');
    }

public function customerList()
{
    $customers = Customer::all();

    return view('customerList', compact('customers'));
}
public function destroy($id)
    {
        // Find the customer record by ID
        $customer = Customer::findOrFail($id);

        // Delete the customer record
        $customer->delete();

        // Redirect back to the customer list page
        return redirect()->route('customers')->with('success', 'Customer deleted successfully');
    }


}
