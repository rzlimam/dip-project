<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ThirdParty;
use App\Models\Barang;
use App\Models\SaleDetail;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class SaleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('sale.index', ['sales' => Sale::orderBy('date', 'desc')->get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $third_parties = ThirdParty::where('kategori_tp_id', 2)->get();
    $barangs = Barang::orderBy('name')->get();
    $stocks = Stock::all(['barang_id', 'qty']);

    return view('sale.create', [
      'third_parties' => $third_parties,
      'barangs' => $barangs,
      'stocks' => $stocks,
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

    // $validated = $request->validate([
    //   // 'purchase.faktur' => 'required|max:255|unique:sales',
    //   // 'purchase.third_party_id' => 'required',
    //   // 'purchase.date' => 'required',
    //   'barangs.*.id' => 'required',
    //   'barangs.*.qty' => 'required|lte:200',
    // ]);

    // return response()->json([
    //   'message' => $validated,
    // ]);

    //   $validated['total_price'] = 0;
    //   $validated['created_by'] = 1;

    DB::beginTransaction();

    try {
      $sale_id = DB::table('sales')->insertGetId(array(
        'third_party_id' => $purchase['third_party_id'],
        'date' => $purchase['date'],
        'faktur' => $purchase['faktur'],
        'total_price' => 0,
        "created_by" => 1,
        "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
        "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
      ));

      $total = 0;

      foreach ($barangs as $barang) {
        DB::table('sale_details')
          ->insert(array(
            'sale_id' => $sale_id,
            'barang_id' => $barang['id'],
            'qty' => $barang['qty'],
            'price_unit' => $barang['price_unit'],
            'price_total' => $barang['price_total'],
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
          ));

        $total += $barang['price_total'];

        DB::update(
          'update stocks set qty = qty - ?, updated_at = ? where barang_id = ?',
          [(int)$barang['qty'], \Carbon\Carbon::now(), $barang['id']]
        );
      }

      DB::table('sales')
        ->where('id', $sale_id)
        ->update([
          'total_price' => $total
        ]);

      DB::commit();
      $respCode = 200;
      $message = 'Berhasil menambahkan data penjualan.';
      $resp = $request;
    } catch (\Exception $e) {
      DB::rollback();
      $respCode = 201;
      $message = 'Gagal Memasukan data';
      $resp = $e;
    }

    //Insert data sale
    // $data['faktur'] = $purchase['third_party_id'];
    // $data['third_party_id'] = $purchase['third_party_id'];
    // $data['date'] = $purchase['date'];
    // $data['total_price'] = 0;
    // $data['created_by'] = 1;
    // $sale = Sale::create($data);
    // $sale_id = $sale->id;

    // $total = 0;

    //insert sale detail
    // foreach($barangs as $barang){
    //     $detail['sale_id'] = $sale_id;
    //     $detail['barang_id'] = $barang['id'];
    //     $detail['qty'] = $barang['qty'];
    //     $detail['price_unit'] = $barang['price_unit'];
    //     $detail['price_total'] = $barang['price_total'];
    //     SaleDetail::create($detail);

    //     $total += $detail['price_total'];

    //     //Update stock
    //     $stock = Stock::where('id', $detail['barang_id'])->get();
    //     $stock[0]->qty -= $detail['qty'];

    //     $xx['barang_id'] = $stock[0]->barang->id;
    //     $xx['qty'] = $stock[0]->qty;

    //     Stock::where('id', $detail['barang_id'])->update($xx);
    // }

    //update total price sale 
    // $data['total_price'] = $total;
    // Sale::where('id', $sale_id)->update($data);

    //return redirect('/sale')->with('success', 'Berhasil menambahkan data penjualan.');
    return response()->json([
      'respCode' => $respCode,
      'message' => $message,
      'resp' => $resp
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Sale  $sale
   * @return \Illuminate\Http\Response
   */
  public function show(Sale $sale)
  {
    return view('sale.show', [
      'sale' => $sale,
      'details' => SaleDetail::where('sale_id', $sale->id)->get()
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Sale  $sale
   * @return \Illuminate\Http\Response
   */
  public function edit(Sale $sale)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Sale  $sale
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sale $sale)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Sale  $sale
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sale $sale)
  {
    //
  }
}
