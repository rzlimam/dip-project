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
                    <a href="#" class="btn btn-primary">+ Tambah Satuan</a>
                  </div>
                  <div class="card-body">
                    <div class="card-title">
                      <h4>Table Satuan Barang</h4>
                    </div>
                    <div class="table">
                      <table class="table table-md">
                        <tr>
                          <th>#</th>
                          <th>Kode Satuan</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                        @foreach ($satuan as $unit => $value)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->kode_satuan }}</td>
                            <td>{{ $value->nama_satuan }}</td>
                            <td>
                                <a href="#" class="btn btn-success">Detail</a>
                                <a href="# "class="btn btn-warning">Edit</a>
                                <a href="# "class="btn btn-danger">Hapus</a>
                            </td>
                          <tr>
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