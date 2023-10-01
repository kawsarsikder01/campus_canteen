<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CustomerRepository;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;

class CustomerContrller extends Controller
{
    protected $customer;
    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $customers = $this->customer->getAll();
       return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $this->customer->create($request->validated());
        return redirect(route('admin.customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, Customer $customer)
    {
        $this->customer->update($customer->id , $request->validated());
        return redirect(route('admin.customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $this->customer->delete($customer->id);
        redirect(route('admin.customers.index'));
    }
}
