@extends('layout.main')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">

<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Data Jenis Barang</h5>
  <div class="card-body">
  <a href=""class="btn rounded-pill btn-primary mb-3">Tambah</a>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Jenis Barang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($jenisbarang as $jb)

          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="fw-medium">{{ $loop->iteration }}</span></td>
            <td>{{ $jb->nama_jenis}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
    
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--/ Bordered Table -->

</div>
</div>
@endsection