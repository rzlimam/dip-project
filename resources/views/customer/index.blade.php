@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Customer</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Customer</a></div>
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
          <a href="/customer/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Customer
          </a>
        </div>

       
        <div class="card-body">
          <div class="card-title">
            <h4>Table Customer</h4>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Action</th>
              </tr>
              @foreach ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->kategori->name }}</td>
                <td>
                  <a href="/customer/{{ $customer->id }}/contact" class="btn btn-warning">
                    Kontak
                  </a>

                  <a href="/customer/{{ $customer->id }}" class="btn btn-warning">
                    <span class="ion ion-eye" data-pack="default" data-tags="delete, remove, dump"></span> Detail
                  </a>

                  <a href="/customer/{{ $customer->id }}/edit" class="btn btn-warning">
                    <span class="ion ion-edit" data-pack="default" data-tags="delete, remove, dump"></span> Edit
                  </a>
                  <form action="/customer/{{ $customer->id }}" method="POST" class="d-inline">
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