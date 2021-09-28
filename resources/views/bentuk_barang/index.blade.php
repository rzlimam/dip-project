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
          <a href="/bentuk/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Bentuk Barang
          </a>
        </div>

        <div class="card-header">
          <h4>Table Bentuk Barang</h4>
        </div>

        <div class="card-body">
          <div class="table">
            <table class="table table-md">
              <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>

              @foreach($bentuks as $bentuk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bentuk->kode }}</td>
                <td>{{ $bentuk->nama }}</td>
                <td>
                  <a href="/bentuk/{{$bentuk->id}}/edit" class="btn btn-warning">
                    Edit
                  </a>

                  <form action="/bentuk/{{$bentuk->id}}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Hapus" onclick="return confirm('Anda yakin ingin menghapus {{$bentuk->nama}} dari daftar bentuk barang?')">
                  </form>
                </td>
              </tr>
              @endforeach
            </table>
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