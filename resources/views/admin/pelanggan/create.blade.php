@extends('admin.layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"><b>Tambah Data</b></h3>
                        <form action="{{ route('admin.pelanggan.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('namapelanggan') is-invalid @enderror" name="namapelanggan" id="namapelanggan" placeholder="Masukan Nama Pelanggan">
                                    @error('namapelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('alamatpelanggan') is-invalid @enderror" name="alamatpelanggan" id="alamatpelanggan" placeholder="Masukan Alamat">
                                    @error('alamatpelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">No Telpon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('telppelanggan') is-invalid @enderror" name="telppelanggan" id="telppelanggan" placeholder="Masukan No Telppon">
                                    @error('telppelanggan')
                                    <div class="invalid-feedbatelppelangganck">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan No Telppon">
                                    @error('email')
                                    <div class="invalid-feedbatelpsuplierck">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-primary px-3">
                                        <i class="fa fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <button type="reset" class="btn btn-danger px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                        </svg>
                                        Reset
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success px-3">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                                            <path d="M12 2h-2v3h2z" />
                                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                                        </svg>
                                        Simpan
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection