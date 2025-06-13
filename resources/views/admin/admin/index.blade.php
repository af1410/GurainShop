@extends('admin.layouts.app')

@section('title', 'Data Admin')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <h2 class="text-center text-primary pt-4 mb-1"><b>Data Admin</b></h2>
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                            <a href="{{ route('admin.admin.print') }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                </svg> Print
                            </a>
                        </div>

                        @if ($message = session('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-hover shadow-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Admin</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $admin->kode_admin }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="post" onsubmit="return confirm('Ingin Menghapus {{ $admin->name }} ?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm ml-1">
                                                    <i class="fas fa-trash"></i>
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
</div>
@endsection
