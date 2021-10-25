@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
              <div class="breadcrumb-item">Customer</div>
            </div>
          </div>
    </section>
    <div class="section-header">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Customer</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="/customer/{{ $customer->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                  <label>Nama Customer</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $customer->name) }}" required>
                                  @error('name')
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