@extends('template.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kelola Pernikahan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active">Edit Data Pernikahan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <body>

            <h1 class="text-center mb-5 mt-5">Edit Data Pernikahan</h1>


            <div class="row ml-2 mr-2">
                <div class="col-sm-12">

                    <div class="card">
                        <h2 class="text-center">Pihak Pria</h2>
                        <div class="card-body">
                            <form action="/updatedata/pernikahan/{{ $data->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_pria" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->nama_pria }}">
                                    @error('nama_pria')
                                        <div class="alert
                                        alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tmpat_lahirpria" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->tmpat_lahirpria }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahirpria" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->tgl_lahirpria }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan_pria" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->pekerjaan_pria }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat_pria" rows="3" placeholder="Enter ...">{{ $data->alamat_pria }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Anggota Keluarga Pendamping</label>
                                    <input type="text" name="anggota_pria" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Kosongkan jika tidak ada"
                                        value="{{ $data->anggota_pria }}">
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Akikah</label>
                                            <input type="text" name="tmpatakikah_pria" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tmpatakikah_pria }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Akikah</label>
                                            <input type="date" name="tglakikah_pria" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tglakikah_pria }}">
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Saksi</label>
                                    <input type="text" name="saksi_pria" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->saksi_pria }}">
                                </div>

                                <h2 class="text-center">Pihak Wanita</h2>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_wanita" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->nama_wanita }}">
                                    @error('nama_pria')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tmpat_lahirwanita" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->tmpat_lahirwanita }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahirwanita" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->tgl_lahirwanita }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan_wanita" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->pekerjaan_wanita }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat_wanita" rows="3" placeholder="Enter ...">{{ $data->alamat_wanita }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Anggota Keluarga Pendamping</label>
                                    <input type="text" name="anggota_wanita" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->anggota_wanita }}" placeholder="Kosongkan jika tidak ada">
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Akikah</label>
                                            <input type="text" name="tmpatakikah_wanita" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tmpatakikah_wanita }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Akikah</label>
                                            <input type="date" name="tglakikah_wanita" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $data->tglakikah_wanita }}">
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Saksi</label>
                                    <input type="text" name="saksi_wanita" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->saksi_wanita }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Pernikahan</label>
                                    <input type="text" name="tmpt_pernikahan" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->tmpt_pernikahan }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Pernikahan</label>
                                    <input type="date" name="tgl_pernikahan" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ $data->tgl_pernikahan }}">
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
