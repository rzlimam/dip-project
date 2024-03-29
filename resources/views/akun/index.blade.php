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
                  <a href="/satuan/create" class="btn btn-primary">+ Tambah Akun</a>
                </div>
                <div class="card-body">
                  <div class="card-title">
                    <h4>Table Satuan Barang</h4>
                  </div>
                  <div class="table">
                    <table class="table table-md">
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($user as $akun)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $akun->name }}</td>
                          <td>{{ $akun->username }}</td>
                          <td>{{ $akun->email }}</td>
                          <td>{{ $akun->role->name }}</td>
                          <td>
                              <a href="/satuan/{{ $akun->id }}/edit" class="btn btn-warning">Edit</a>
                              <form action="/satuan/{{ $akun->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span class="ion ion-trash-a" data-pack="default" data-tags="delete, remove, dump"></span> Hapus</button>
                              </form>
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