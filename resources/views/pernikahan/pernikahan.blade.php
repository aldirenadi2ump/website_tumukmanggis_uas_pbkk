@extends('template.admin')
@push('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pernikahan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Pernikahan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Pernikahan</h5>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (auth()->user()->role == 'admin')
                            <a href="/addpernikahan" type="button" class="btn btn-success">Tambah Data</a>
                        @endif
                        {{-- {{ Session::get('halaman_url') }} --}}
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-auto">
                                <form action="/pernikahan" method="GET">
                                    <input type="search" name="search" id="inputPassword6" class="form-control"
                                        aria-describedby="passwordHelpInline" placeholder="Cari Berdasarkan Nama">
                                </form>
                            </div>




                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">

                                {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif --}}
                                <div class="table-responsive">
                                    <table class="table" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Mempelai Pria</th>
                                                <th scope="col">Nama Mempelai Wanita</th>
                                                <th scope="col">Tanggal Pernikahan</th>
                                                <th scope="col">Tanggal Dibuat</th>
                                                @if (auth()->user()->role == 'admin')
                                                    <th scope="col">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $value)
                                                <tr>
                                                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                                                    <td>{{ $value->nama_pria }}</td>

                                                    <td>{{ $value->nama_wanita }}</td>
                                                    <td>{{ $value->tgl_pernikahan }}</td>

                                                    {{-- <td>{{ $value->created_at->format('D M Y') }}</td> --}}
                                                    <td>{{ $value->created_at->diffForHumans() }}</td>
                                                    @if (auth()->user()->role == 'admin')
                                                        <td>
                                                            <a href="/tampilkandata/pernikahan/{{ $value->id }}"
                                                                class="btn btn-warning">Ubah</a>
                                                            <a href="#" class="btn btn-danger delete"
                                                                data-id="{{ $value->id }}"
                                                                data-nama="{{ $value->nama_pria }}">Hapus</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data->links() }}

                            </div>

                        </div>
                        <!-- /.row -->

                    </div>
                </div>

            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -->
        <script>
            $('.delete').click(function() {
                var akikahid = $(this).attr('data-id');
                var namaid = $(this).attr('data-nama');
                swal({
                        title: "Apakah Kamu Yakin?",
                        text: "Kamu akan menghapus data akikah dengan nama " + namaid + "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/delete/pernikahan/" + akikahid + ""
                            swal("Data berhasil di hapus", {
                                icon: "success",
                            });
                        } else {
                            swal("Data tidak jadi dihapus");
                        }
                    });
            });
        </script>

        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
        </script>
    @endpush
