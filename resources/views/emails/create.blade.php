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
          <h4>Form Tambah Email {{$third_party->name}}</h4>
        </div>

        <div class="card-body">
          <div class="col-md-6">
            <form action="{{ route(strtolower($third_party->kategori->name.'.emails.store'), $third_party) }}" method="POST">
              @csrf
              <div class="form-group">
                <label>Alamat Email</label>

                <div class="input-group">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                </div>

                @error('email')
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