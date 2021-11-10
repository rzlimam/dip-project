<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ThirdParty;
use App\Models\Barang;
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
        // foreach($barangs as $barang){
        //     SaleDetail::create($barang);
        // }
        $data = new Sale();
        $data->faktur = $purchase['faktur'];
        $data->third_party = ThirdParty::where('id', 2);
        $data->date = $purchase['date'];
        $data->save();
        //Sale::create($data);
      
          //return redirect('/sale')->with('success', 'Berhasil menambahkan data penjualan.');
        return response()->json([
            'success'=>'Berhasil menambahkan data penjualan.',
            'data' => $data
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
        //
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
