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
    return view('bentuk_barang.index', [
      'bentuks' => BentukBarang::all()
    ]);
  }

  public function create()
  {
    return view('bentuk_barang.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated_data = $request->validate([
      'kode' => 'required|max:5|unique:bentuk_barangs',
      'nama' => 'required'
    ]);

    $validated_data['kode'] = strtoupper($validated_data['kode']);
    $validated_data['is_active'] = true;

    BentukBarang::create($validated_data);

    return redirect('/bentuk')->with('success', 'Berhasil menambahkan bentuk barang.');
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
