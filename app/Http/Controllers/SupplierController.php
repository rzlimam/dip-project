<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Models\PhoneThirdParty;
use App\Models\EmailThirdParty;
use App\Models\AlamatThirdParty;
use Illuminate\Http\Request;



class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier.index', [
            'suppliers' => ThirdParty::where('kategori_tp_id', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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

        $validatedData['kategori_tp_id'] = 1;

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

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdParty $supplier)
    {
        //dd($supplier);
        return view('supplier.show', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdParty $supplier)
    {
        return view('supplier.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdParty $supplier)
    {
        $rules = [];
        if ($request->name != $supplier->name) {
            $rules['name'] = 'required|unique:third_parties';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kategori_tp_id'] = 1;

        $tp_id = ThirdParty::where('id', $supplier->id)->update($validatedData);
        //$tp_id = $tp->id;

        if($request->phone != $supplier->phonethirdparty[0]->id){
            $phone = [
                'phone' => $request->phone,
                'third_party_id' => $tp_id
            ];
            dd($supplier->phonethirdparty->first()->id);
            PhoneThirdParty::where('id', $supplier->phonethirdparty->first()->id)
                ->update($phone);
        }

        if($request->email != $supplier->emailthirdparty->id){
            $email = [
                'email' => $request->email,
                'third_party_id' => $tp_id
            ];
            EmailThirdParty::where('id', $supplier->emailthirdparty->first()->id)
                ->update($alamat);
        }

        if($request->alamat != $supplier->alamatthirdparty->id){
            $alamat = [
                'alamat' => strip_tags($request->alamat),
                'third_party_id' => $tp_id
            ];
            AlamatThirdParty::where('id', $supplier->alamatthirdparty->first()->id)
                ->update($alamat);
        }

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdParty  $thirdParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdParty $supplier)
    {
        ThirdParty::destroy($supplier->id);

        return redirect('/supplier')->with('deleted', 'Supplier telah dihapus');
    }
}
