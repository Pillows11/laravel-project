<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('admin.grade.grade-admin', [
            'title' => 'Grade',
            'grades' => $grades->load('students')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grade.create', [
            'title' => 'Create Grade',
            'departements' => Departement::all(),
            'grades' => Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departements,id',
        ]);

        // Simpan data grade ke dalam tabel grades
        $grade = Grade::create([
            'nama' => $validated['name'],
            'departement_id' => $validated['department_id'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/grade-admin')->with('success', 'Grade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::findOrFail($id);

        // Ambil data departments untuk pilihan pada form
        $departements = Departement::all();

        // Tampilkan halaman edit dengan data grade dan departments
        return view('admin.grade.edit', [
            'title' => 'Edit Grade Data',
            'grade' => $grade,
            'departements' => $departements,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departements,id',
        ]);

        // Cari data grade berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Update data grade
        $grade->update([
            'nama' => $validated['name'],
            'departement_id' => $validated['department_id'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/grade-admin')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
