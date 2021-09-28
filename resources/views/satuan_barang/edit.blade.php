@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Satuan Barang</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Barang</a></div>
              <div class="breadcrumb-item">Satuan</div>
            </div>
          </div>
    </section>
    <div class="section-header">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Satuan Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="/satuan/{{ $satuan->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Kode Satuan</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" autofocus value="{{ old('kode', $satuan->kode) }}">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Satuan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $satuan->nama) }}">
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
                </div>
            </div>
        </div>
    </div>

@endsection