<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
     
        $designations = Designation::withCount('employees')->paginate(10);
        return view('designations.index', compact('designations'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('designations.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:50'
        ]);

        Designation::create($request->all());

        return redirect()->route('designations.index')->with('success', 'Designation created successfully!');
    }

    // Display the specified resource
    public function show($id)
    {
        $designation = Designation::findOrFail($id);
        return view('designations.show', compact('designation'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('designations.edit', compact('designation'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required|string|max:50'
        ]);

        $designation = Designation::findOrFail($id);
        $designation->update($request->all());

        return redirect()->route('designations.index')->with('success', 'Designation updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully!');
    }
}
