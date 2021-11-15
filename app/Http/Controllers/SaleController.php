<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ThirdParty;
use App\Models\Barang;
use App\Models\SaleDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sale.index', ['sales' => Sale::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.create', [
            'third_parties' => ThirdParty::where('kategori_tp_id', 2)->get(),
            'barangs' => Barang::all()
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
        //     'faktur' => 'required|max:255|unique:sales',
        //     'third_party_id' => 'required',
        //     'date' => 'required',
        //   ]);
      
        //   $validated['total_price'] = 0;
        //   $validated['created_by'] = 1;

        //Insert data sale
        $data['faktur'] = $purchase['faktur'];
        $data['third_party_id'] = $purchase['third_party_id'];
        $data['date'] = $purchase['date'];
        $data['total_price'] = 0;
        $data['created_by'] = 1;
        $sale = Sale::create($data);
        $sale_id = $sale->id;

        $total = 0;

        //insert sale detail
        foreach($barangs as $barang){
            $detail['sale_id'] = $sale_id;
            $detail['barang_id'] = $barang['id'];
            $detail['qty'] = $barang['qty'];
            $detail['price_unit'] = $barang['price_unit'];
            $detail['price_total'] = $barang['price_total'];
            SaleDetail::create($detail);

            $total += $detail['price_total'];

            //Update stock
            $stock = Stock::where('id', $detail['barang_id'])->get();
            $stock[0]->qty -= $detail['qty'];

            $xx['barang_id'] = $stock[0]->barang->id;
            $xx['qty'] = $stock[0]->qty;

            Stock::where('id', $detail['barang_id'])->update($xx);
        }

        //update total price sale 
        $data['total_price'] = $total;
        Sale::where('id', $sale_id)->update($data);

          //return redirect('/sale')->with('success', 'Berhasil menambahkan data penjualan.');
        return response()->json([
            'success'=>'Berhasil menambahkan data penjualan.',
            'data' => $request
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
