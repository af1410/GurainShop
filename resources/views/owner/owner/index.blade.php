@extends('owner.layouts.app')

@section('title', 'Data Owner')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">

    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="text-center pt-4 mb-1"><b>Data Owner</b></h2>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <a href="{{ route('owner.owner.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
                                </td>
                                <td class="text-right mr-2">
                                    <a href="{{ route('owner.owner.print') }}" class="btn btn-success mb-3 text-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg> Print
                                    </a>
                                </td>
                            </tr>

                        </table>
                        @if ($message = session('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table mt-2">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Owner</th>
                                    <th>Nama</th>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($owners as $owner)
                                <tr>

                                    <th>{{ $no++ }}</th>
                                    <th>{{ $owner->kode_owner }}</th>
                                    <th>{{ $owner->name }}</th>
                                    <th>{{ $owner->email }}</th>
                                    <th>
                                        <div class="d-flex">
                                            <a href="{{ route('owner.owner.edit', $owner->id) }}" class=" btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <!-- <a href="/owner/owner/{{ $owner->id_owner }}/destroy" onclick="return confirm('Hapus Data Dengan Ownername : {{ $owner->ownername }} ? ');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                            <form action="{{ route('owner.owner.destroy', $owner->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Ingin Menhapus {{ $owner->name }} ?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </th>
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