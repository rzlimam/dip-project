@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Stok Barang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Stok</a></div>
    </div>
  </div>
</section>

<div class="section-header">
  <div class="row">
    <div class="col-12">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{ session('success') }}
        </div>
      </div>
      @elseif (session()->has('deleted'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{ session('deleted') }}
        </div>
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          {{-- <button class="btn btn-primary" data-toggle="modal" id="tombol-tambah-satuan-barang" data-target="#modal-form-satuan-barang">
            <i class="fas fa-plus"></i> Satuan Barang
          </button> --}}
            <h4>Tabel stok barang</h4>
        </div>

        <div class="card-body">
            <div class="card-title">
                <h6></h6>
            </div>
            {{-- <h6>Table Barang</h6> --}}
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Stok Barang</th>
                    <th>Terakhir Diupdate</th>
                </tr>
                @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stock->barang->name }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->updated_at }}</td>
                <tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">

                </nav>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection