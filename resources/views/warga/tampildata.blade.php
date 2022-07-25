@extends('template.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kelola Warga</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active">Edit Data Warga</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <body>

            <h1 class="text-center mb-5 mt-5">Edit Data Warga</h1>


            <div class="row ml-2 mr-2">
                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-body">
                            <form action="/updatedata/warga/{{ $data->id_user }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Warga</label>
                                            <input type="text" name="nama_warga" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->nama_warga }}">
                                            @error('nama_warga')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Role</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="role"
                                                    aria-label="Default select example">
                                                    <option selected>{{ $data->akun->role }}</option>
                                                    <option value="anggota">Anggota</option>
                                                    <option value="admin">Admin</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->akun->email }}">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tempat_lahir }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tanggal_lahir }}">
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="jeniskelamin"
                                                    aria-label="Default select example">
                                                    <option selected disabled>{{ $data->jeniskelamin }}</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Status</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="status"
                                                    aria-label="Default select example">
                                                    <option selected disabled>{{ $data->status }}</option>
                                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Duda">Duda</option>
                                                    <option value="Janda">Janda</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Pendidikan Terakhir</label>
                                            <div class="form-group">
                                                <select class="form-control select2-primary" name="pendidikan_terakhir"
                                                    aria-label="Default select example">
                                                    <option selected disabled>{{ $data->pendidikan_terakhir }}</option>
                                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                                    <option value="Tamat SD">Tamat SD</option>
                                                    <option value="Tamat SMP">Tamat SMP</option>
                                                    <option value="Tamat SMA">Tamat SMA</option>
                                                    <option value="D3/D4">D3/D4</option>
                                                    <option value="Strata 1">Strata 1</option>
                                                    <option value="Strata 2">Strata 2</option>
                                                    <option value="Strata 3">Strata 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->pekerjaan }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Enter ...">{{ $data->alamat }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                                            <input type="text" name="no_telp" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->no_telp }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Upload Foto</label>
                                            <input type="file" name="foto_warga" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
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
