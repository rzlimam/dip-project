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

      @if (session()->has('status'))
      <div class="alert alert-{{session('status')}} alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          {{ session('message') }}
        </div>
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" id="tombol-tambah-bentuk-barang" data-target="#modal-form-bentuk-barang">
            <i class="fas fa-plus"></i> Bentuk Barang
          </button>
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
                  <button class="btn btn-warning" data-toggle="modal" onclick="populate('{{$loop->iteration-1}}')" data-target="#modal-form-bentuk-barang">
                    Edit
                  </button>

                  <form action="/bentuk/{{$bentuk->id}}" method="post" id="form-hapus-bentuk-barang">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" class="btn btn-danger" value="Hapus">
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

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modal-form-bentuk-barang">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Bentuk Barang</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="/bentuk" id="form-bentuk-barang" method="post">
          @csrf
          <input type="hidden" class="form-control" id="form-bentuk-barang-method" name="_method" value="post" readonly>

          <div class="form-group">
            <label for="kode-barang">Kode</label>

            <input type="hidden" class="form-control" name="id" id="id" placeholder="Id Bentuk Barang..." readonly>

            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Bentuk Barang...">
          </div>

          <div class="form-group">
            <label for="nama-barang">Nama</label>

            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Bentuk Barang...">
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

<script>
  const bentuks = <?= $bentuks ?>;
  const tombol_tambah = document.getElementById('tombol-tambah-bentuk-barang');

  tombol_tambah.addEventListener('click', function() {
    document.getElementById('form-bentuk-barang').reset();
    document.getElementById('form-bentuk-barang-method').value = 'post';
    document.getElementById('form-bentuk-barang').action = '/bentuk';
  });

  function populate(index) {
    let bentuk = bentuks[index];

    document.getElementById('form-bentuk-barang-method').value = 'put';
    document.getElementById('form-bentuk-barang').action = `/bentuk/${bentuk.id}`;
    document.getElementById('id').value = bentuk.id;
    document.getElementById('kode').value = bentuk.kode;
    document.getElementById('nama').value = bentuk.nama;
  }
</script>
@endsection