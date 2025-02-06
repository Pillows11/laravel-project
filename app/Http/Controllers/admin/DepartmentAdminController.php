<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement;

class DepartmentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.departement.department-admin', [
            'title' => 'Department',
            'departements' => Departement::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departement.create', [
            'title' => 'Create New Department',
            'departements' => Departement::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        // Simpan data grade ke dalam tabel grades
        $departement = Departement::create([
            'nama' => $validated['name'],
            'descrip' => $validated['desc'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/departements')->with('success', 'Department created successfully.');
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
        $departements = Departement::findOrFail($id);

        // Ambil data departments untuk pilihan pada form
        return view('admin.departement.edit', [
            'title' => 'Edit Department Data',
            'departement' => $departements,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
        ]);

        $department = Departement::findOrFail($id);
        $department->update([
            'nama' => $validated['name'],
            'descrip' => $validated['desc'],
        ]);

        return redirect('/admin/departements')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
