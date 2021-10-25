<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => ThirdParty::where('kategori_tp_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $validatedData['kategori_tp_id'] = 2;

        $tp = ThirdParty::create($validatedData);
        $tp_id = $tp->id;

        if($request->phone){
            $phone = [
                'phone' => $request->phone,
                'third_party_id' => $tp_id
            ];
            PhoneThirdParty::create($phone);
        }

        if($request->email){
            $email = [
                'email' => $request->email,
                'third_party_id' => $tp_id
            ];
            EmailThirdParty::create($email);
        }

        if($request->alamat){
            $alamat = [
                'alamat' => strip_tags($request->alamat),
                'third_party_id' => $tp_id
            ];
            AlamatThirdParty::create($alamat);
        }

        return redirect('/customer')->with('success', 'Customer berhasil ditambahkan');
    }

    public function contact(ThirdParty $customer)
    {
        return view('customer.contact', [
            'customer' => $customer
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdParty $customer)
    {
        //dd($customer);
        return view('customer.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdParty $customer)
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdParty $customer)
    {
        $rules = [];
        if ($request->name != $customer->name) {
            $rules['name'] = 'required|unique:third_parties';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kategori_tp_id'] = 1;

        $tp_id = ThirdParty::where('id', $customer->id)->update($validatedData);
        //$tp_id = $tp->id;

        if($request->phone != $customer->phonethirdparty[0]->id){
            $phone = [
                'phone' => $request->phone,
                'third_party_id' => $tp_id
            ];
            //dd($customer->phonethirdparty->first()->id);
            PhoneThirdParty::where('id', $customer->phonethirdparty->first()->id)
                ->update($phone);
        }

        if($request->email != $customer->emailthirdparty->id){
            $email = [
                'email' => $request->email,
                'third_party_id' => $tp_id
            ];
            EmailThirdParty::where('id', $customer->emailthirdparty->first()->id)
                ->update($alamat);
        }

        if($request->alamat != $customer->alamatthirdparty->id){
            $alamat = [
                'alamat' => strip_tags($request->alamat),
                'third_party_id' => $tp_id
            ];
            AlamatThirdParty::where('id', $customer->alamatthirdparty->first()->id)
                ->update($alamat);
        }

        return redirect('/customer')->with('success', 'Customer berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdParty $customer)
    {
        ThirdParty::destroy($customer->id);

        return redirect('/customer')->with('deleted', 'Customer telah dihapus');
    }
}
