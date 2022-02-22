<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        // foreach ($customers as $customer) {
        //     dd($customer->name);
        // }
        return view('customers', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [

        $validated = $request->validate([
            'name' => 'required',
            'fund' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->fund = $request->input('fund');
        $customer->created_at = now('PST');
        $customer->updated_at = now('PST');
        $customer->save();

        // Customer::create(request(['name', 'fund', 'created_at', 'updated_at']));

        // return $customer;
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customer_show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer_edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $fund = $request->input('fund');
        $updated_at = now('PST');
        DB::update('UPDATE customers SET name = ?, fund = ?, updated_at = ? WHERE id = ?', [$name, $fund, $updated_at, $id]);

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        $tableName = $customer->gettable();

        DB::statement("ALTER TABLE $tableName AUTO_INCREMENT = ". (count(Customer::all())+1) . ";");

        return redirect('/customers');
    }
}
