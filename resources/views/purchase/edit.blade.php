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
      <form action="/purchase" id="purchase-form">
        @csrf
        @method('put')
        <div class="card">
          <div class="card-header">
            <h4>Form Tambah Purchasing</h4>
          </div>

          <div class="card-body">
            <div class="col-md-6">
              <div class="form-group">
                <label>Faktur</label>
                <!-- <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" placeholder="Faktur..." value="{{ old('id', $purchase->id) }}" required readonly> -->

                <input type="text" class="form-control @error('faktur') is-invalid @enderror" id="faktur" name="faktur" placeholder="Faktur..." value="{{ old('faktur', $purchase->faktur) }}" required autofocus>

                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Supplier</label>

                <select class="form-control select2" name="third_party_id" id="third-party-id" required>
                  <option value="" disabled selected>
                    -- Pilih Supplier --
                  </option>
                  @foreach ($third_parties as $tp)
                  @if (old('third_party_id', $purchase->third_party_id) == $tp->id)
                  <option value="{{ $tp->id }}" selected>
                    {{ $tp->name }}
                  </option>
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

                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $purchase->date) }}" required>

                @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h4>Pembelian Barang</h4>
              </div>

              <div class="card-body">
                <div class="card-title">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#purchase-detail-form-modal" id="add-barang-btn">
                    <i class="fas fa-plus"></i> Tambah barang
                  </a>
                </div>

                <div class="table-responsive">
                  <table class="table table-bordered table-md" id="list-barangs">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kuantitas</th>
                        <th>Harga Satuan</th>
                        <th>Harga Total</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary" id="save-purchase-button">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="purchase-detail-form-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Pembelian Barang</h5>
      </div>

      <form id="purchase-detail-form">
        <div class="modal-body">
          <div class="form-group">
            <label for="id-barang">Nama Barang</label>

            <select class="form-control select2" name="id-barang" id="id-barang" required>
              <option value="" disabled selected>-- Pilih Barang --</option>
              @foreach ($barangs as $barang)
              <option value="{{ $barang->id }}">{{ $barang->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="kuantitas-barang">Kuantitas</label>

            <input type="number" class="form-control" name="kuantitas-barang" id="kuantitas-barang" placeholder="Kuantitas Barang..." min=0 step=1 oninput="updateTotal()" required>
          </div>

          <div class="form-group">
            <label for="harga-satuan-barang">Harga Satuan</label>

            <input type="number" class="form-control" name="harga-satuan-barang" id="harga-satuan-barang" placeholder="Harga Satuan Barang..." min=0 oninput="updateTotal()" required>
          </div>

          <div class="form-group">
            <label for="harga-total-pembelian">Harga Total</label>

            <input type="number" class="form-control" name="harga-total-pembelian" id="harga-total-pembelian" placeholder="Harga Total Barang..." min=0 readonly>
          </div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
          <button class="btn btn-secondary" data-dismiss="modal">
            Tutup
          </button>

          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

<script type='text/javascript'>
  var purchase_details = @json($purchase_details);
  let count_barangs = 0;
  let $list_barangs = $('#list-barangs');
  let purchase_detail_form = document.getElementById('purchase-detail-form');

  $(document).ready(function() {
    $.map(purchase_details, function(barang) {
      barang._id = Math.floor(Math.random() * 1000) + 1;

      $list_barangs.children('tbody').append(`
        <tr id='${barang._id}'>
          <td>${++count_barangs}</td>
          <td>${barang.barang_name}</td>
          <td>${barang.qty}</td>
          <td>${barang.price_unit}</td>
          <td>${barang.price_total}</td>
          <td>
            <button type='button' class="btn btn-warning edit-btn" data-id="${barang._id}">
              Edit
            </button>

            <button type='button' class="btn btn-danger remove-btn" data-id="${barang._id}">
              Hapus
            </button>
          </td>
        </tr>
      `);
    });

    //reset form pembelian barang setiap klik tambah barang baru
    $('#add-barang-btn').on('click', function() {
      $('#append-barang-btn').show();
      $('#update-barang-btn').hide();

      purchase_detail_form.reset();
      purchase_detail_form.onsubmit = function(e) {
        e.preventDefault();
        addBarang();
      };
    });

    $list_barangs.on("click", ".edit-btn", function() {
      $("#append-barang-btn").hide();
      $("#update-barang-btn").show();

      let id = $(this).data('id');
      let index = purchase_details.findIndex(barang => barang._id == id);
      let barang = purchase_details[index];

      $("#id-barang").val(barang.barang_id);
      $("#kuantitas-barang").val(barang.qty);
      $("#harga-satuan-barang").val(barang.price_unit);
      $("#harga-total-pembelian").val(barang.price_total);
      $("#update-barang-btn").data('index', index);
      purchase_detail_form.onsubmit = function(e) {
        e.preventDefault();
        updateBarang(index);
      };

      $("#purchase-detail-form-modal").modal('show');
    });

    //hapus elemen html tr>td barang dari list pembelian dengan cara mengakses tr yang sudah diberikan id ketika proses tambah barang dan mereset penomoran dengan mengguanakan index terbaru elemen html tr ditambah 1
    $list_barangs.on('click', '.remove-btn', function() {
      let _id = $(this).data('id');
      let $rows;
      let $cols;

      $(document.getElementById(_id)).remove();
      count_barangs--;

      purchase_details = purchase_details.filter(barang => barang._id != _id);

      $rows = $list_barangs.find('tbody tr');

      $.each($rows, (index, row) => {
        $cols = $(row).find('td');

        $cols.first().text(index + 1);
      });
    });

    $("#purchase-form").submit(function(event) {
      event.preventDefault();

      $.ajax({
        type: "PUT",
        url: "{{ route('purchase.update', $purchase->id) }}",
        data: {
          _token: $("input[name=_token]").val(),
          purchase: {
            faktur: $("#faktur").val(),
            third_party_id: $("#third-party-id").val(),
            date: $("#date").val()
          },
          barangs: purchase_details
        },
        error: function(xhr) {
          console.error(`${xhr.status}: ${xhr.statusText}`);

          alert(xhr.responseJSON.message);
        },
        success: function(response) {
          alert(response.message); // show response from the php script.

          window.location.href = "/purchase";
        }
      });
    });
  });

  function updateTotal() {
    let total;
    let qty = $("#kuantitas-barang").val();
    let price = $("#harga-satuan-barang").val();

    if (!$.isEmptyObject(qty) && !$.isEmptyObject(price)) {
      total = parseFloat(qty) * parseFloat(price);

      $("#harga-total-pembelian").val(total);
    }
  }

  const addBarang = () => {
    let barang = {
      _id: Math.floor(Math.random() * 1000) + 1,
      barang_id: $("#id-barang").val(),
      name: $("#id-barang option:selected").text(),
      qty: $("#kuantitas-barang").val(),
      price_unit: $("#harga-satuan-barang").val(),
      price_total: $("#harga-total-pembelian").val()
    };

    purchase_details.push(barang);

    $list_barangs.children('tbody').append(`
      <tr id='${barang._id}'>
        <td>${purchase_details.length}</td>
        <td>${barang.name}</td>
        <td>${barang.qty}</td>
        <td>${barang.price_unit}</td>
        <td>${barang.price_total}</td>
        <td>
          <button class="btn btn-warning edit-btn" data-id="${barang._id}">
            Edit
          </button>

          <button class="btn btn-danger remove-btn" data-id="${barang._id}">
            Hapus
          </button>
        </td>
      </tr>
    `);

    $("#purchase-detail-form-modal").modal('hide');
  };

  const updateBarang = index => {
    let $rows = $list_barangs.find('tbody tr');
    let $row = $($rows[index]);
    let cols = $row.find('td');

    purchase_details[index].id = $('#id-barang').val();
    purchase_details[index].name = $('#id-barang option:selected').text();
    purchase_details[index].qty = $('#kuantitas-barang').val();
    purchase_details[index].price_unit = $('#harga-satuan-barang').val();
    purchase_details[index].price_total = $('#harga-total-pembelian').val();

    cols[1].textContent = purchase_details[index].name;
    cols[2].textContent = purchase_details[index].qty;
    cols[3].textContent = purchase_details[index].price_unit;
    cols[4].textContent = purchase_details[index].price_total;

    $('#purchase-detail-form-modal').modal('hide');
  }
</script>
@endsection