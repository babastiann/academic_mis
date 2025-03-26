@extends('layouts.index')

@section('content')
<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Manage data Dosen</h3>
                <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Halaman 1</h6>
              </div>
            </div>
            <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Add Row</h4>
                      <a href="{{ route('dosenCreate') }}">
                        <i class="fa fa-plus"></i>
                        Add Data Dosen
                      </a>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Nik</th>
                            <th>Name</th>
                            <th>Birth_date</th>
                            <th>Email</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nik</th>
                            <th>Name</th>
                            <th>Birth_date</th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($mahasiswas as $dosen)
                          <tr>
                            <td>{{ $dosen->nrp }}</td>
                            <td>{{ $dosen->name }}</td>
                            <td>{{ $dosen->birth_date }}</td>
                            <td>{{ $dosen->email }}</td>
                            <td>
                              <div class="form-button-action">
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title="Edit Dosen"
                                  class="btn btn-link btn-primary btn-lg edit-dosen"
                                  data-original-title="Edit Dosen"
                                  data-url="{{ route('mahasiswaEdit', [$dosen->nrp]) }}"
                                >
                                  <i class="fa fa-edit"></i>
                                </button>
                                <form action="{{ route('mahasiswaDelete', [$dosen->nrp]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title="Remove Dosen"
                                  class="btn btn-link btn-danger delete-dosen"
                                  data-original-title="Remove Dosen"
                                >
                                  <i class="fa fa-times"></i>
                                </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>
        </div>
@endsection('content')

@section('ExtraCss')

@endsection

@section('ExtraJs')
<script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
    $(".edit-mahasiswa").click(function() {
      window.location = $(this).data("url");
    });

  $(".delete-mahasiswa").click(function(e) {
    e.preventDefault();
    Swal.fire({
      title:"Are You Sure Wnat to delete this data?",
      showCancelButton:true,
      confirmButtonText:"Yes"
    }).then((result) => {
        if(result.isConfirmed) {
          $(e.target).closest("form").submit()
        }
    })
  });
@if(session('success'))
  $.notify({
    message: "{{ session('success') }}"
  }, {
    delay:5000,
    type:info
  })
@endif
</script>
@endsection
