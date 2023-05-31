<!-- category-edit.blade.php -->

@extends('layouts.master')

@section('title')
@lang('translation.Dashboards')
@endsection

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <form method="POST" action="{{ route('category.update', $anggota->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $anggota->name }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $anggota->slug }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $anggota->status }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
