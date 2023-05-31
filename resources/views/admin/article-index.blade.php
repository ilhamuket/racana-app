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
    @lang('translation.Data_Article')
@endsection


@section('content')
    

<div class="row">
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Artikel</p>
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
                        <p class="text-muted fw-medium">Total Artikel Publish</p>
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
            <a href="{{ route('article.create') }}" class="btn btn-primary mx-2">Tambah Artikel</a>
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
                            <th>Judul</th>
                            <th>slug</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Dibuat Oleh</th>
                            <th>Status</th>
                            <th>Dilihat</th>
                            <th>Thumnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td class="centered-cell">{{ $loop->iteration }}</td>
                                <td class="centered-cell">{{ $value->name }}</td>
                                <td class="centered-cell">{{ $value->slug }}</td>
                                <td class="centered-cell">{{ \Illuminate\Support\Str::limit(strip_tags($value->description), 25) }}</td>
                                <td class="centered-cell">{{ $value->categories->name }}</td>
                                <td class="centered-cell">{{ $value->createdBy->name }}</td>
                                <td class="centered-cell">
                                    {!! ($value->status == 1) ? '<span class="badge badge-pill badge-soft-success font-size-11">Publish</span>' : '<span class="badge badge-pill badge-soft-danger font-size-11">Belum Publish</span>' !!}
                                </td>
                                <td class="centered-cell">{{ $value->views }}</td>
                                <td class="centered-cell"><img src="{{ $value->image_url }}" alt="Article Image" width="100px" height="100px"></td>
                                <td class="centered-cell">
                                    <a href="{{ route('article.show', $value->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ route('article.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('article.delete', $value->id) }}" class="btn btn-danger">Delete</a>
                                    @if (!$value->status)
                                    <a href="{{ route('article.publish', $value->id) }}"
                                        class="btn btn-success">Publish</a>
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