@extends('layouts.layout')

@section('content')


<div class="">
    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Buat Tugas Baru</a>
        {{-- <div class="d-flex">
            <input type="text" name="search_medicine" id="" class="form-control"
            placeholder="Cari tugas...">
            <button type="submit" class="btn btn-success ms-2">Cari</button>
        </div> --}}
    </div>
</div>
    {{-- <div class="d-flex justify-content-end align-items-center mb-3">
        <h1>Daftar Tugas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New</a>
    </div> --}}

    @if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Tugas</th>
                <th>Deskripsi</th>
                <th>Tanggal Tenggat</th>
                <th>Status</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tasks) < 1)
                    <tr>
                        <td colspan="7" class="text-center">Data Tugas Kosong</td>
                    </tr>
            @else
                @foreach ($tasks as $index => $task)
                    <tr>
                        <td class="{{ $task->status === 'completed' ? 'text-decoration-line-through' : '' }}">
                            {{ $index+1 }}</td>
                        <td class="{{ $task->status === 'completed' ? 'text-decoration-line-through' : '' }}">
                            {{ $task->title }}
                        </td>
                        <td class="{{ $task->status === 'completed' ? 'text-decoration-line-through' : '' }}">
                            {!! nl2br(e($task->description)) !!}
                        </td>
                        <td class="{{ $task->status === 'completed' ? 'text-decoration-line-through' : '' }}">
                            {{ $task->due_date }}
                        </td>
                        <td>
                            @if ($task->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>{{ $task->category ? $task->category->name : 'No Category' }}</td>
                        <td>

                        <!-- Button untuk menyelesaikan tugas, tetap ada tetapi disabled jika statusnya "completed" -->
                        {{-- <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm" 
                                {{ $task->status === 'completed' ? 'disabled' : '' }}>
                                Tandai Selesai
                            </button>
                        </form> --}}

                        {{-- <td>{{ $task->title }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <span class="badge {{ $task->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                                {{ $task->status }}
                            </span>
                        </td> --}}
                        
                        <form action="{{ route('tasks.status', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            @if ($task->status === 'pending')
                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                            @else
                                <button type="submit" class="btn btn-warning btn-sm">Batal</button>
                            @endif
                        </form>

                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('tasks.delete', $task->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        
                            {{-- @if ($task->status === 'pending')
                            <!-- Button untuk menyelesaikan tugas -->
                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Tandai Selesai</button>
                            </form>
                            @endif --}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
