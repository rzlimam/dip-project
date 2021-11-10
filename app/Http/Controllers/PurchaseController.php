<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Purchase;
use App\Models\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // dd(Purchase::all());

    return view('purchase.index', ['purchases' => Purchase::all()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('purchase.create', [
      'third_parties' => ThirdParty::where('kategori_tp_id', 1)->get(),
      'barangs' => Barang::all(),
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
      'faktur' => 'required|max:255|unique:purchases',
      'third_party_id' => 'required',
      'date' => 'required',
    ]);

    $validated['total_price'] = 0;
    $validated['created_by'] = 1;

    Purchase::create($validated);

    return redirect('/purchase')->with('success', 'Berhasil menambahkan purchasing.');
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
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
