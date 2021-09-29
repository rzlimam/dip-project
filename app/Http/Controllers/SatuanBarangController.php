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
        return view('satuan_barang.index', [
            'satuan' => SatuanBarang::all()
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
            'kode' => 'required|max:5|unique:satuan_barangs',
            'nama' => 'required'
        ]);

        $validatedData['kode'] = strtoupper($validatedData['kode']);

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
            'nama' => 'required'
        ];

        if ($request->kode != $satuan->kode) {
            $rules['kode'] = 'required|max:5|unique:satuan_barangs';
        }

        $validatedData = $request->validate($rules);

        $validatedData['kode'] = strtoupper($request->kode);

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
        SatuanBarang::destroy($satuan->id);

        return redirect('/satuan')->with('deleted', 'Satuan barang telah dihapus');
    }
}
