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
          {{-- <button class="btn btn-primary" data-toggle="modal" id="tombol-tambah-satuan-barang" data-target="#modal-form-satuan-barang">
            <i class="fas fa-plus"></i> Satuan Barang
          </button> --}}
          <a href="/satuan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Satuan
          </a>
        </div>

        <div class="card-body">
          <div class="card-title">
            <h4>Table Satuan Barang</h4>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Kode Satuan</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
              @foreach ($satuan as $unit)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $unit->kode }}</td>
                  <td>{{ $unit->nama }}</td>
                  <td>
                      <a href="/satuan/{{ $unit->id }}/edit" class="btn btn-warning">
                        <span class="ion ion-edit" data-pack="default" data-tags="delete, remove, dump"></span> Edit
                      </a>
                      <form action="/satuan/{{ $unit->id }}" method="POST" class="d-inline">
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

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modal-form-satuan-barang">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Satuan Barang</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="/satuan" id="form-satuan-barang" method="post">
          @csrf
          <input type="hidden" class="form-control" id="form-bentuk-satuan-method" name="_method" value="post" readonly>

          <div class="form-group">
            <label for="kode-barang">Kode</label>

            <input type="text" class="form-control" name="kode_satuan" id="kode_satuan" placeholder="Kode Satuan Barang...">
          </div>

          <div class="form-group">
            <label for="nama-barang">Nama</label>

            <input type="text" class="form-control" name="nama_satuan" id="nama_satuan" placeholder="Nama Satuan Barang...">
          </div>
      </div>

      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Tutup
        </button>

        <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection