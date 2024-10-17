@extends('layouts.layout')

@section('content')
    <h1 class="mb-4">Edit Tugas</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">Judul:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi:</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Tenggat:</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Mata Pelajaran :</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
