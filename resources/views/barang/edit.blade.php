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
          <h4>Form Edit Bentuk Barang</h4>
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

                <select class="form-control select2 @error('bentukbarang_id') is-invalid @enderror" name="bentukbarang_id">
                  <option value="" selected disabled>
                    -- Pilih Bentuk Barang --
                  </option>
                  @foreach ($bentuks as $bentuk)
                  @if (old('bentukbarang_id') == $bentuk->id)
                  <option value="{{ $bentuk->id }}" selected>
                    {{ $bentuk->nama }}
                  </option>
                  @else
                  <option value="{{ $bentuk->id }}" @if ($barang->bentukbarang_id == $bentuk->id )
                    selected
                    @endif
                    >
                    {{ $bentuk->nama }}
                  </option>
                  @endif
                  @endforeach
                </select>

                @error('bentukbarang_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Satuan</label>

                <select class="form-control select2 @error('satuanbarang_id') is-invalid @enderror" name="satuanbarang_id">
                  <option value="" selected disabled>
                    -- Pilih Satuan Barang --
                  </option>
                  @foreach ($satuans as $satuan)
                  @if (old('satuanbarang_id') == $satuan->id)
                  <option value="{{ $satuan->id }}" selected>
                    {{ $satuan->nama }}
                  </option>
                  @else
                  <option value="{{ $satuan->id }}" @if ($barang->satuanbarang_id == $satuan->id )
                    selected
                    @endif>
                    {{ $satuan->nama }}
                  </option>
                  @endif
                  @endforeach
                </select>

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