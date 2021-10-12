<?php

namespace App\Http\Controllers;

use App\Models\PhoneThirdParty;
use App\Models\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PhoneController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(ThirdParty $third_party)
  {
    $phones = PhoneThirdParty::where('third_party_id', $third_party->id)->get();
    $third_party->phones = $phones;

    return view('phones.index', ['third_party' => $third_party]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(ThirdParty $third_party)
  {
    return view('phones.create', ['third_party' => $third_party]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ThirdParty $third_party, Request $request)
  {
    $validated = $request->validate([
      'phone' => 'required|unique:phone_third_parties',
    ]);

    $validated['third_party_id'] = $third_party->id;

    PhoneThirdParty::create($validated);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Nomor telepon berhasil ditambahkan.');
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(PhoneThirdParty $phone)
  {
    return view('phones.edit', ['phone' => $phone]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  PhoneThirdParty $phone
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PhoneThirdParty $phone)
  {
    $rules = [];

    if ($phone->phone != $request->phone) {
      $rules['phone'] = 'required|unique:phone_third_parties';
    }

    $validated = $request->validate($rules);

    foreach ($validated as $k => $v) {
      $phone->$k = $v;
    }

    $phone->save();

    $third_party = ThirdParty::find($phone->third_party_id);
    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Nomor telepon berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(PhoneThirdParty $phone)
  {
    $third_party = ThirdParty::find($phone->third_party_id);
    PhoneThirdParty::destroy($phone->id);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('deleted', 'Berhasil menghapus nomor telepon.');
  }
}
