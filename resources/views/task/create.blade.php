@extends('layouts.layout')

@section('content')
    <h1 class="mb-4">Daftar Tugas Baru</h1>

    <form action="{{ route('tasks.store') }}" method="POST" id="form">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Tugas :</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi :</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Tenggat :</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Mata Pelajaran :</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option selected disabled hidden>Pilih</option>
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
