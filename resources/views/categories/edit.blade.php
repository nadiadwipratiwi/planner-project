@extends('layouts.layout')

@section('content')
    <h1 class="mb-4">Edit Mata Pelajaran</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Mata Pelajaran :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection