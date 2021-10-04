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
                        <h4>{{ $customer->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    @if (!$customer->phonethirdparty->isEmpty())
                                        <h5>{{ $customer->phonethirdparty->first()->phone }}</h5>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    @if (!$customer->emailthirdparty->isEmpty())
                                        <h5>{{ $customer->emailthirdparty->first()->email }}</h5>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    @if (!$customer->alamatthirdparty->isEmpty())
                                        <h5>{{ $customer->alamatthirdparty->first()->alamat }}</h5>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection