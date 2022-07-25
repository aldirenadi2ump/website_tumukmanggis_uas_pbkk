@extends('template.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Akikah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active">Edit Data Akikah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <body>
            <h1 class="text-center mb-4">Edit Data Akikah</h1>


            <div class="row ml-2 mr-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/akikah/{{ $data->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama_anak" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->nama_anak }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <div class="form-group">
                                        <select class="form-control select2-primary" name="jeniskelamin"
                                            aria-label="Default select example">
                                            <option selected>{{ $data->jeniskelamin }}</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->nama_ayah }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Akikah</label>
                                    <input type="date" name="tgl_akikah" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->tgl_akikah }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Ubah Data</button>
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
