@extends('layouts.master-layouts')

<style>
    .centered-cell {
        text-align: center;
        vertical-align: middle;
        word-wrap: break-word;
        white-space: normal;
    }
</style>

@section('title')
    @lang('translation.Data_Pendaftar')
@endsection


@section('content')
    

<div class="row">
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Pendaftar</p>
                        <h4 class="mb-0">{{ $total }}</h4>
                    </div>

                    <div class="flex-shrink-0 align-self-center">
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                            <span class="avatar-title">
                                <i class="bx bxs-group font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Pendaftar diterima</p>
                        <h4 class="mb-0">{{ $totalVerif }}</h4>
                    </div>

                    <div class="flex-shrink-0 align-self-center">
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                            <span class="avatar-title">
                                <i class="bx bxs-group font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex justify-content-center justify-content-md-end">
            <a href="{{ route('article.create') }}" class="btn btn-primary mx-2">Tambah Pendaftar</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-buttons" class="table table-bordered dt-responsive w-100 dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nim</th>
                            <th>No Whatsapp</th>
                            <th>Jenis Kelamin</th>
                            <th>Ukuran Baju</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td class="centered-cell">{{ $loop->iteration }}</td>
                                <td class="centered-cell">{{ $value->name }}</td>
                                <td class="centered-cell">{{ $value->email }}</td>
                                <td class="centered-cell">{{ $value->nim }}</td>
                                <td class="centered-cell">{{ $value->no_telepon }}</td>
                                <td class="centered-cell">{{ $value->jenis_kelamin }}</td>
                                <td class="centered-cell">{{ $value->ukuran_baju }}</td>
                                <td class="centered-cell">{{ $value->alamat }}</td>
                                <td class="centered-cell">
                                    {!! ($value->status == 1) ? '<span class="badge badge-pill badge-soft-success font-size-11">Diterima</span>' : '<span class="badge badge-pill badge-soft-danger font-size-11">Belum Diterima</span>' !!}
                                </td>
                                <td class="centered-cell"><img src="{{ $value->image_url }}" alt="Foto" width="100px" height="100px"></td>
                                <td class="centered-cell">
                                    <a href="{{ route('article.show', $value->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ route('article.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                    @if (!$value->status )
                                    <a href="{{ route('article.publish', $value->id) }}"
                                        class="btn btn-success">Terima</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection