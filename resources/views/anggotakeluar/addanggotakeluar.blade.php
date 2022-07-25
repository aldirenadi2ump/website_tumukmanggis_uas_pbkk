@extends('template.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kelola Warga Pindah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active">Tambah Data Anggota Keluar</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <body>

            <h1 class="text-center mb-5 mt-5">Tambah Data Warga Pindah</h1>


            <div class="row ml-2 mr-2">
                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-body">
                            <form action="/insertdata/anggotakeluar" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Warga</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="id_user"
                                                    aria-label="Default select example">
                                                    <option selected>-- Pilih Warga --</option>
                                                    @foreach ($data as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Alasan Pindah</label>
                                            <input type="text" name="alasan" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('alasan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal keluar</label>
                                            <input type="date" name="tanggal_keluar" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Status</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="status_aktif"
                                                    aria-label="Default select example">
                                                    <option selected>-- Pilih Status --</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">NonAktif</option>

                                                </select>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="row justify-content-center">

                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -->
        </body>
    @endsection
