<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('task.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Berhasil membuat data tugas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $task = Task::where('id', $id)->first();
        $categories = Category::all();
        return view('task.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'type' => 'required|min:3',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric'
        // ], [
        //     'name.required' => 'Nama obat harus diisi!',
        //     'type.required' => 'Tipe obat harus diisi!',
        //     'price.required' => 'Harga obat harus diisi!',
        //     'stock.required' => 'Stok obat harus diisi!',
        //     'name.max' => 'Nama obat maksimal 100 karakter!',
        //     'type.min' => 'Tipe obat minimal 3 karakter!',
        //     'price.numeric' => 'Harga obat harus berupa angka!',
        //     'stock.numeric' => 'Stok obat harus berupa angka!',
        // ]);

        $taskBefore = Task::where('id', $id)->first();
        $proses = $taskBefore->update([
            'title' => $request->title,
            'description' => $request->description,
            // 'status' => $request->status,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
        ]);

        if ($proses) {
            return redirect()->route('tasks.index')->with('success', 'Berhasil mengubah data tugas!');
        } else {
            return redirect()->back()->with('failed', 'Gagal mengubah data tugas!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        // $task->delete();
        // return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');

        $proses = Task::where('id', $id)->delete();

        if ($proses) {
            return redirect()->back()->with('success', 'Berhasil menghapus tugas!');
        } else {
            return redirect()->back()->with('failed', 'Gagal menghapus tugas!');
        }
    }

    public function status($id)
    {
        $task = Task::findOrFail($id);

        if ($task->status === 'pending') {
            $task->status = 'completed';
        } else {
            $task->status = 'pending';
        }

        $task->save();

        return redirect()->route('tasks.index');      

        // Redirect kembali ke halaman daftar tugas dengan pesan sukses
        // if($task) {
        // } else {
        //     return redirect()->route('tasks.index')->with('failed', 'Tugas batal diselesaikan.');
        // }
    }
}
