@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Penjualan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item">Penjualan</div>
    </div>
  </div>
</section>

<div class="section-header">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Tambah Penjualan</h4>
        </div>

        <div class="card-body">
          <div class="col-md-6">
            <form action="/sale" method="POST">
              @csrf
              <div class="form-group">
                <label>Faktur</label>

                <input type="text" class="form-control @error('faktur') is-invalid @enderror" id="faktur" name="faktur" autofocus value="{{ old('faktur') }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Customer</label>

                <select class="form-control select2" name="third_party_id">
                  <option value="" disabled selected>
                    -- Pilih Customer --
                  </option>
                  @foreach ($third_parties as $tp)
                  @if (old('third_party_id') == $tp->id)
                  <option value="{{ $tp->id }}" selected>{{ $tp->name }}</option>
                  @else
                  <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                  @endif
                  @endforeach
                </select>

                @error('third_party_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Tanggal</label>

                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="card-body">
                <div>
                  <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Tambah Barang</button>
                </div>
                <div class="table">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Barang</th>
                      <th>Quantity</th>
                      <th>Harga</th>
                      <th>Total Harga</th>
                    </tr>
                  </table>
                </div>
              </div>
              

              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="contact-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>Form Barang</h3>
            </div>
            <form id="contactForm" name="contact" role="form" onsubmit="return addBarang()">
                <div class="modal-body">                
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <select class="form-control select2" name="barang_id" id="barang_id">
                          <option value="" disabled selected>
                            -- Pilih Barang --
                          </option>
                          @foreach ($barangs as $barang)
                          @if (old('barang_id') == $barang->id)
                            <option value="{{ $barang->id }}" selected>{{ $barang->name }}</option>
                          @else
                          <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                          @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input id="qty" type="text" name="qty" class="form-control" required onchange="updateTotal()">
                    </div>
                    <div class="form-group">
                        <label for="price_unit">Harga</label>
                        <input id="price_unit" name="price_unit" class="form-control" required onchange="updateTotal()">
                    </div>   
                    <div class="form-group">
                      <label for="price_total">Total Harga</label>
                      <input id="price_total" name="price_total" class="form-control" readonly>
                    </div>                 
                </div>
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  function updateTotal() {
    let qty = document.getElementById("qty").value;
    let price = document.getElementById("price_unit").value;
    let total = document.getElementById("price_total");
    if(qty !== '' && price !== ''){
      total.value = parseFloat(qty)*parseFloat(price);
    }
  }


  let collection = [];

  function addBarang() {
    let dialog = document.getElementById('contact-modal')
    let items = [];

    barang = document.getElementById('barang_id').value;
    qty = document.getElementById('qty').value;
    price = document.getElementById('price_unit').value;
    total = document.getElementById('price_total').value;

    items.push(barang);
    items.push(qty);
    items.push(price);
    items.push(total);
    collection.push(items)
    console.log(collection);

    return false;
  }
</script>

@endsection