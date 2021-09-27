<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(SatuanBarang::all());
        return view('satuan_barang.index', [
            'satuan' => SatuanBarang::where('isActive', 1)->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan_barang.create');
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
            'kode_satuan' => 'required|max:5|unique:satuan_barang',
            'nama_satuan' => 'required'
        ]);

        $validatedData['kode_satuan'] = strtoupper($validatedData['kode_satuan']);
        $validatedData['isActive'] = true;

        SatuanBarang::create($validatedData);

        return redirect('/satuan')->with('success', 'Satuan barang telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanBarang $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanBarang $satuan)
    {
        return view('satuan_barang.edit', [
            'satuan' => $satuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanBarang $satuan)
    {
        $rules = [
            'nama_satuan' => 'required'
        ];

        if($request->kode_satuan != $satuan->kode_satuan) {
            $rules['kode_satuan'] = 'required|max:5|unique:satuan_barang';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kode_satuan'] = strtoupper($request->kode_satuan);
        $validatedData['isActive'] = true;

        SatuanBarang::where('id', $satuan->id)
            ->update($validatedData);

        return redirect('/satuan')->with('success', 'Satuan barang berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanBarang $satuan)
    {   
        //SatuanBarang::destroy($satuan->id);
        $data = SatuanBarang::find($satuan->id);

        $data['isActive'] = false;

        $data->save();

        return redirect('/satuan')->with('deleted', 'Satuan barang telah dihapus');
    }
}
