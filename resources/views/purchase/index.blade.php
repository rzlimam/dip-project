@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Purchasing</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Purchasing</a></div>
      <div class="breadcrumb-item">Purchasing</div>
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
          {{-- <button class="btn btn-primary" data-toggle="modal" id="tombol-tambah-satuan-purchase" data-target="#modal-form-satuan-purchase">
            <i class="fas fa-plus"></i> Satuan Purchasing
          </button> --}}
          <a href="/purchase/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Purchasing
          </a>
        </div>

        <div class="card-body">
          <div class="card-title">
            <h4>Table Purchasing</h4>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Faktur</th>
                <th>Supplier</th>
                <th>Total Harga Pembelian</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
              @foreach ($purchases as $purchase)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $purchase->faktur }}</td>
                <td>{{ $purchase->third_party->name }}</td>
                <td>{{ $purchase->total_price }}</td>
                <td>{{ date('d-M-Y', strtotime($purchase->date)) }}</td>
                <td>
                  <a href="/purchase/{{ $purchase->id }}" class="btn btn-warning">
                    Detail
                  </a>

                  <a href="/purchase/{{ $purchase->id }}/edit" class="btn btn-warning">
                    Edit
                  </a>

                  <form action="/purchase/{{ $purchase->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span class="ion ion-trash-b" data-pack="default" data-tags="delete, remove, dump"></span> Hapus</button>
                  </form>
                </td>
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