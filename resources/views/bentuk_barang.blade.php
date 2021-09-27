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
                    <h4>Table Bentuk Barang</h4>
                  </div>
                  <div class="card-body">
                    <div class="table">
                      <table class="table table-md">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Cair</td>
                            <td>
                                <a href="#" class="btn btn-success">Detail</a>
                                <a href="# "class="btn btn-warning">Edit</a>
                                <a href="# "class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Padat</td>
                            <td>
                                <a href="#" class="btn btn-success">Detail</a>
                                <a href="# "class="btn btn-warning">Edit</a>
                                <a href="# "class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
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