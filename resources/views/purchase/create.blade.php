@extends('layouts.main')

@section('container')
<section class="section">
  <div class="section-header">
    <h1>Purchasing</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
      <div class="breadcrumb-item">Purchasing</div>
    </div>
  </div>
</section>

<div class="section-header">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Tambah Purchasing</h4>
        </div>

        <div class="card-body">
          <div class="col-md-6">
            <form action="/purchase" method="POST">
              @csrf
              <div class="form-group">
                <label>Faktur</label>

                <input type="text" class="form-control @error('faktur') is-invalid @enderror" id="faktur" name="faktur" autofocus value="{{ old('faktur') }}" required>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Supplier</label>

                <select class="form-control select2" name="third_party_id">
                  <option value="" disabled selected>
                    -- Pilih Supplier --
                  </option>
                  @foreach ($third_parties as $tp)
                  @if (old('third_party_id') == $tp->id)
                  <option value="{{ $tp->id }}" selected>{{ $tp->name }}</option>
                  @else
                  <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                  @endif
                  @endforeach
                </select>

                @error('third_party_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Tanggal</label>

                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection