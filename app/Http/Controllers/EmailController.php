<?php

namespace App\Http\Controllers;

use App\Models\EmailThirdParty;
use App\Models\ThirdParty;
use Illuminate\Http\Request;

class EmailController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(ThirdParty $third_party)
  {
    $emails = EmailThirdParty::where('third_party_id', $third_party->id)->get();
    $third_party->emails = $emails;

    return view('emails.index', ['third_party' => $third_party]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(ThirdParty $third_party)
  {
    return view('emails.create', ['third_party' => $third_party]);
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
      'email' => 'required|unique:email_third_parties',
    ]);

    $validated['third_party_id'] = $third_party->id;

    EmailThirdParty::create($validated);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Email berhasil ditambahkan.');
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
   * @param  EmailThirdParty  $email
   * @return \Illuminate\Http\Response
   */
  public function edit(EmailThirdParty $email)
  {
    return view('emails.edit', ['email' => $email]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  EmailThirdParty $email
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, EmailThirdParty $email)
  {
    $rules = [];

    if ($email->email != $request->email) {
      $rules['email'] = 'required|unique:email_third_parties';
    }

    $validated = $request->validate($rules);

    foreach ($validated as $k => $v) {
      $email->$k = $v;
    }

    $email->save();

    $third_party = ThirdParty::find($email->third_party_id);
    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('success', 'Email berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  EmailThirdParty $email
   * @return \Illuminate\Http\Response
   */
  public function destroy(EmailThirdParty $email)
  {
    $third_party = ThirdParty::find($email->third_party_id);
    EmailThirdParty::destroy($email->id);

    $kategori_third_party = strtolower($third_party->kategori->name);
    $redirect_to_url = "$kategori_third_party/$third_party->id/contact";

    return redirect($redirect_to_url)
      ->with('deleted', 'Berhasil menghapus email.');
  }
}
