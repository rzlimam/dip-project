<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\ThirdParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $purchases = Purchase::orderBy('date', 'desc')->get();

    return view('purchase.index', ['purchases' => $purchases]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $barangs = Barang::orderBy('name')->get();
    $third_parties = ThirdParty::where('kategori_tp_id', 1)->get();

    return view('purchase.create', [
      'third_parties' => $third_parties,
      'barangs' => $barangs,
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
    $barangs = $request->barangs;
    $purchase = $request->purchase;

    DB::beginTransaction();

    try {
      $purchase_id = DB::table('purchases')->insertGetId(array(
        'third_party_id' => $purchase['third_party_id'],
        'date' => $purchase['date'],
        'faktur' => $purchase['faktur'],
        'total_price' => 0,
        "created_by" => 1,
        "created_at" =>  \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now(),
      ));

      $total = 0;

      foreach ($barangs as $barang) {
        DB::table('purchase_details')
          ->insert(array(
            'purchase_id' => $purchase_id,
            'barang_id' => $barang['id'],
            'qty' => $barang['qty'],
            'price_unit' => $barang['price_unit'],
            'price_total' => $barang['price_total'],
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
          ));

        $total += $barang['price_total'];

        DB::update(
          'UPDATE stocks SET qty=qty+?, updated_at=? WHERE barang_id=?',
          [
            (int)$barang['qty'],
            \Carbon\Carbon::now(),
            $barang['id']
          ]
        );
      }

      DB::table('purchases')
        ->where('id', $purchase_id)
        ->update(['total_price' => $total]);

      DB::commit();

      $code = 201;
      $message = 'Berhasil menambahkan data pembelian.';
    } catch (\Exception $e) {
      DB::rollback();

      $code = 500;
      $message = 'Gagal memasukan data pembelian.';
    }

    return response([
      'code' => $code,
      'message' => $message,
    ], $code);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Purchase  $purchase
   * @return \Illuminate\Http\Response
   */
  public function show(Purchase $purchase)
  {
    $purchase_details = PurchaseDetail::where('purchase_id', $purchase->id)->get();

    return view('purchase.show', [
      'purchase' => $purchase,
      'details' => $purchase_details,
    ]);
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
