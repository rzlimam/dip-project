<?php

namespace App\Http\Controllers;

use App\Models\AlamatThirdParty;
use App\Models\ThirdParty;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(ThirdParty $third_party)
  {
    return view('alamats.create', ['third_party' => $third_party]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  ThirdParty $third_party
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ThirdParty $third_party, Request $request)
  {
    $validated = $request->validate([
      'alamat' => 'required|unique:alamat_third_parties',
    ]);

    $validated['third_party_id'] = $third_party->id;

    AlamatThirdParty::create($validated);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Alamat berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  AlamatThirdParty  $alamat
   * @return \Illuminate\Http\Response
   */
  public function edit(AlamatThirdParty $alamat)
  {
    return view('alamats.edit', ['alamat' => $alamat]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  AlamatThirdParty $alamat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, AlamatThirdParty $alamat)
  {
    $rules = [];

    if ($alamat->alamat != $request->alamat) {
      $rules['alamat'] = 'required|unique:alamat_third_parties';
    }

    $validated = $request->validate($rules);

    foreach ($validated as $k => $v) {
      $alamat->$k = $v;
    }

    $alamat->save();

    $third_party = ThirdParty::find($alamat->third_party_id);
    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Alamat berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  AlamatThirdParty $alamat
   * @return \Illuminate\Http\Response
   */
  public function destroy(AlamatThirdParty $alamat)
  {
    $third_party = ThirdParty::find($alamat->third_party_id);
    AlamatThirdParty::destroy($alamat->id);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('deleted', 'Berhasil menghapus alamat.');
  }
}
