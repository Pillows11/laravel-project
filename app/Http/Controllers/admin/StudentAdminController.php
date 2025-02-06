<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Grade;

class StudentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Use paginate instead of get
        $students = Student::with(['grade'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama', 'like', '%' . $query . '%')
                    ->orWhere('telepon', 'like', '%' . $query . '%')
                    ->orWhereHas('grade', function ($q) use ($query) {
                        $q->where('nama', 'like', '%' . $query . '%');
                    });
            })
            ->paginate(15); // Fetch 15 students per page

        return view('admin.student.student-admin', [
            'title' => 'Student',
            'students' => $students,
            'searchQuery' => $query
        ]);

        // $students = Student::with('grade')->latest()->get();
        // return view('admin.student.student-admin', [
        //     'title' => 'Students',
        //     'students' => $students
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [
            "title" => "Create New Data",
            'grades' => Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email',
            'telepon'   => 'required|string|max:255',
            'address'    => 'required|string|max:255',
        ]);

        $grade = Grade::find($validated['grade_id']);
        $departement_id = $grade->departement->id; // Mendapatkan department_id dari grade yang dipilih

        // Simpan data student ke dalam tabel students
        Student::create([
            'nama' => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
            'alamat' => $validated['address'],
            'departement_id' => $departement_id, // Menambahkan department_id secara otomatis

        ]);

        // Redirect atau response sukses
        return redirect('/admin/students/')->with('success', 'Student created successfully.');
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
        // Ambil data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Ambil data grades untuk pilihan pada form
        $grades = Grade::all();

        // Tampilkan halaman edit dengan data siswa dan grades
        return view('admin.student.edit', [
            'title' => 'Edit Student Data',
            'student' => $student,
            'grades' => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Validasi data yang dikirimkan
       $validated = $request->validate([
        'name'      => 'required|string|max:255',
        'grade_id'  => 'required|exists:grades,id',
        'email'     => 'required|email|max:255',
        'telepon'   => 'required|string|max:255',
        'address'   => 'required|string|max:255',
    ]);

    // Cari data siswa berdasarkan ID
    $student = Student::findOrFail($id);

    // Update data siswa
    $student->update([
        'nama'     => $validated['name'],
        'grade_id' => $validated['grade_id'],
        'email'    => $validated['email'],
        'telepon'  => $validated['telepon'],
        'alamat'  => $validated['address'],
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student deleted successfully.');
    }
}
