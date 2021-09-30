<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BentukBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('barang.index', [
      // 'barangs' => Barang::all()
      'barangs' => Barang::where('isActive', true)->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('barang.create', [
      'bentuks' => BentukBarang::all('id', 'nama'),
      'satuans' => SatuanBarang::all('id', 'nama'),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'kode' => 'required|max:5|unique:barangs',
      'name' => 'required',
      'bentukbarang_id' => 'required',
      'satuanbarang_id' => 'required',
    ]);

    $validated['kode'] = strtoupper($validated['kode']);
    $validated['isActive'] = true;

    Barang::create($validated);

    return redirect('/barang')->with('success', 'Berhasil menambahkan barang barang.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function show(Barang $barang)
  {
    return redirect('/barang');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function edit(Barang $barang)
  {
    return view('barang.edit', [
      'barang' => $barang,
      'bentuks' => BentukBarang::all('id', 'nama'),
      'satuans' => SatuanBarang::all('id', 'nama'),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Barang $barang)
  {
    $rules = [
      'name' => 'required',
      'bentukbarang_id' => 'required',
      'satuanbarang_id' => 'required',
    ];

    if ($barang->kode != $request->kode) {
      $rules['kode'] = 'required|max:5|unique:barangs';
    }

    $validated = $request->validate($rules);

    foreach ($validated as $k => $v) {
      $barang->$k = $v;
    }

    $barang->save();

    return redirect('/barang')
      ->with('success', 'Barang berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Barang  $barang
   * @return \Illuminate\Http\Response
   */
  public function destroy(Barang $barang)
  {
    $barang->isActive = false;

    $barang->save();

    return redirect('/barang')
      ->with('success', 'Berhasil menghapus barang.');
  }
}
