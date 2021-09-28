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
            <form action="/bentuk/{{$bentuk->id}}" method="POST">
              @csrf
              @method('put')
              <div class="form-group">
                <label>Kode</label>

                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $bentuk->kode) }}" placeholder="Kode bentuk barang...">
                @error('kode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Nama</label>

                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $bentuk->nama) }}" placeholder="Nama bentuk barang...">
                @error('nama')
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