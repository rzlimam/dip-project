<?php

namespace App\Http\Controllers;

use App\Models\BentukBarang;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class BentukBarangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('bentuk_barang', [
      'bentuks' => BentukBarang::all()
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
    $request->validate([
      'kode' => 'required|unique:bentuk_barangs',
      'nama' => 'required',
    ]);

    $validated = $request->validated();
    //var_dump($validated);

    $bentuk_barang = new BentukBarang();

    $bentuk_barang->nama = $validated_data['nama'];
    $bentuk_barang->kode = $validated_data['kode'];

    $bentuk_barang->save();

    return redirect('/bentuk')
      ->with('status', 'success')
      ->with('message', 'Berhasil menambahkan bentuk barang.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return redirect('/bentuk');
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
    BentukBarang::where('id', $id)->update([
      'kode' => $request->input('kode'),
      'nama' => $request->input('nama'),
    ]);

    return redirect('/bentuk')
      ->with('status', 'success')
      ->with('message', 'Bentuk barang berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    BentukBarang::destroy($id);

    return redirect('/bentuk')
      ->with('status', 'success')
      ->with('message', 'Berhasil menghapus bentuk barang.');
  }
}
