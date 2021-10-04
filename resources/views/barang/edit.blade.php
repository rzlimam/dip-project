@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Bentuk Barang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Barang</a></div>
      <div class="breadcrumb-item">Bentuk</div>
    </div>
  </div>
</section>

<div class="section-header">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Tambah Bentuk Barang</h4>
        </div>

        <div class="card-body">
          <div class="col-md-6">
            <form action="/barang/{{$barang->id}}" method="POST">
              @csrf
              @method('put')
              <div class="form-group">
                <label>Kode</label>

                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $barang->kode) }}" placeholder="Kode barang...">
                @error('kode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Nama</label>

                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $barang->name) }}" placeholder="Nama barang...">
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Bentuk</label>

                <input list="bentukbarang_ids" class="form-control @error('bentukbarang_id') is-invalid @enderror" id="bentukbarang_id" name="bentukbarang_id" value="{{ old('bentukbarang_id', $barang->bentukbarang_id) }}" placeholder="-- Pilih bentuk barang --">

                <datalist id="bentukbarang_ids">
                  @foreach($bentuks as $bentuk)
                  <option value="{{$bentuk->id}}">{{$bentuk->nama}}</option>
                  @endforeach
                </datalist>

                @error('bentukbarang_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Satuan</label>

                <input list="satuanbarang_ids" class="form-control @error('satuanbarang_id') is-invalid @enderror" id="satuanbarang_id" name="satuanbarang_id" value="{{ old('satuanbarang_id', $barang->satuanbarang_id) }}" placeholder="-- Pilih satuan barang --">

                <datalist id="satuanbarang_ids">
                  @foreach($satuans as $satuan)
                  <option value="{{$satuan->id}}">{{$satuan->nama}}</option>
                  @endforeach
                </datalist>

                @error('satuanbarang_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>

        <div class="card-footer text-right">
          <nav class="d-inline-block">

          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection