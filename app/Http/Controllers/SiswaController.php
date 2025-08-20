<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SiswaController extends Controller

{

    public function data(Request $request)
{
    if ($request->ajax()) {
        $data = Siswa::select(['id', 'nama', 'email', 'tanggal_lahir', 'alamat', 'kelas', 'foto']);
        return DataTables::of($data)
            ->addColumn('foto', function ($row) {
                if ($row->foto) {
                    return '<img src="' . asset('storage/' . $row->foto) . '" width="50">';
                }
                return 'Tidak ada';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('siswa.edit', $row->id) . '" class="btn btn-sm btn-warning">Edit</a>
                    <form action="' . route('siswa.destroy', $row->id) . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin?\')">Hapus</button>
                    </form>
                ';
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }
}
    public function index()
    {
        $siswaList = Siswa::all();
        return view('siswa.index', compact('siswaList'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:siswa,email',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable',
            'kelas' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable',
            'kelas' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada foto baru, simpan & hapus yang lama
        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }

            $validated['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
