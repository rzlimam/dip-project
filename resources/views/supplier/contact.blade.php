@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Supplier</h1>
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
          <h2>Kontak {{$supplier->name}}</h2>
        </div>

        <div class="card-body">
          <div class="card">
            <div class="card-header">
              <h4>Nomor Telepon</h4>
            </div>

            <div class="card-body">
              <div class="card-title">
                <a href="/supplier/{{$supplier->id}}/phones/create" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Nomor Telepon
                </a>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Nomor</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($supplier->phones as $phone)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $phone->phone }}</td>
                    <td>
                      <a href="/phones/{{ $phone->id }}/edit" class="btn btn-warning">
                        <span class="ion ion-edit"></span> Edit
                      </a>

                      <form action="/phones/{{ $phone->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                          <span class="ion ion-trash-b"></span> Hapus
                        </button>
                      </form>
                    </td>
                  <tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4>Email</h4>
            </div>

            <div class="card-body">
              <div class="card-title">
                <a href="/supplier/{{$supplier->id}}/emails/create" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Email
                </a>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Nomor</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($supplier->emails as $email)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $email->email }}</td>
                    <td>
                      <a href="/email/{{ $email->id }}/edit" class="btn btn-warning">
                        <span class="ion ion-edit"></span> Edit
                      </a>

                      <form action="/email/{{ $email->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                          <span class="ion ion-trash-b"></span> Hapus
                        </button>
                      </form>
                    </td>
                  <tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4>Alamat</h4>
            </div>

            <div class="card-body">
              <div class="card-title">
                <a href="/supplier/{{$supplier->id}}/alamats/create" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Alamat
                </a>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th>Nomor</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($supplier->alamats as $alamat)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alamat->alamat }}</td>
                    <td>
                      <a href="/alamat/{{ $alamat->id }}/edit" class="btn btn-warning">
                        <span class="ion ion-edit"></span> Edit
                      </a>

                      <form action="/alamat/{{ $alamat->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                          <span class="ion ion-trash-b"></span> Hapus
                        </button>
                      </form>
                    </td>
                  <tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection