@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Supplier</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>

      <div class="breadcrumb-item">Supplier</div>
    </div>
  </div>
</section>

<div class="section-header">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Edit Alamat</h4>
        </div>

        <div class="card-body">
          <div class="col-md-6">
            <form action="/alamats/{{$alamat->id}}" method="POST">
              @method('put')
              @csrf
              <div class="form-group">
                <label>Alamat</label>

                <div class="input-group">
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $alamat->alamat) }}</textarea>
                </div>

                @error('alamat')
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