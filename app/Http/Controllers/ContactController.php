<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(){
        return view('contact', ['title' => 'contact']);
    }
    public function controll()
    {
        return view('contact', [
            'title' => 'My Contact',
            'nama' => 'Andrea Pirlo',
            'kelas' => '11 pplg 2',
            'linkedin' => 'https://www.linkedin.com/in/andrea-pirlo-saputra-ba580530a/',
            'github' => 'https://github.com/Pillows11?tab=repositories',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
