@extends('admin.layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center mb-4 text-primary"><b>Edit Data Admin</b></h3>

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="kode_admin" class="form-label">Kode Admin</label>
                                <input type="text" class="form-control" id="kode_admin" name="kode_admin" value="{{ $admin->kode_admin }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $admin->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.admin.index') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>

                                <button type="reset" class="btn btn-danger">
                                    <i class="bi bi-arrow-repeat"></i> Reset
                                </button>

                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-floppy2-fill"></i> Simpan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
