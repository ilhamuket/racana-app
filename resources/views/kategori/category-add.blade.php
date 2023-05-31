<!-- category-edit.blade.php -->

@extends('layouts.master')

@section('title')
@lang('translation.Dashboards')
@endsection

@section('content')
    <div class="container">
        <h1>Tambah Category</h1>

        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            @method('POST')

            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>



            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
