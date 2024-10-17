@extends('layouts.layout')

@section('content')
    <h3 class="mb-4">Daftar Mata Pelajaran Baru</h3>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Mata Pelajaran :</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection