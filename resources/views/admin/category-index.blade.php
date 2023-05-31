@extends('layouts.master')

@section('title')
    @lang('translation.Article')
@endsection

@section('content')
    

<div class="row">
    <div class="col-md-4">
        <div class="card mini-stats-wid">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Total Category</p>
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
                        <p class="text-muted fw-medium">Total Category Publish</p>
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
            <a href="{{ route('category.create') }}" class="btn btn-primary mx-2">Tambah Category</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->slug }}</td>
                                <td>
                                    {!! ($value->status == 1) ? '<span class="badge badge-pill badge-soft-success font-size-11">Publish</span>' : '<span class="badge badge-pill badge-soft-danger font-size-11">Belum Publish</span>' !!}
                                </td>
                                
                                <td>
                                    <a href="{{ route('category.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('category.delete', $value->id) }}" class="btn btn-danger">Hapus</a>
                                    @if (!$value->status)
                                    <a href="{{ route('category.publish', $value->id) }}"
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