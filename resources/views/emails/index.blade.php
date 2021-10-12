@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Email {{$third_party->name}}</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Supplier</a></div>
      <div class="breadcrumb-item">Email</div>
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
          <a href="emails/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Email
          </a>
        </div>

        <div class="card-body">
          <div class="card-title">
            <h4>Table Supplier</h4>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Nomor</th>
                <th>Action</th>
              </tr>

              @foreach ($third_party->emails as $email)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $email->email }}</td>
                <td>
                  <a href="/emails/{{ $email->id }}/edit" class="btn btn-warning">
                    Edit
                  </a>

                  <form action="/emails/{{ $email->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                      Hapus
                    </button>
                  </form>
                </td>
              <tr>
                @endforeach
            </table>
          </div>

          <div class="card-footer text-right">
            <nav class="d-inline-block"></nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection