<?php

// app/Http/Controllers/ShiftController.php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Show list of shifts
    public function index()
    {
        $shifts = Shift::all();  // Get all shifts from database
        return view('shifts.index', compact('shifts'));
    }

    // Show form to create a new shift
    public function create()
    {
        return view('shifts.create');
    }

    // Store the newly created shift in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shift_name' => 'required|string|max:50',
            'in_time' => 'nullable|date_format:H:i',
            'out_time' => 'nullable|date_format:H:i',
            'grace_time' => 'nullable|date_format:H:i:s',
        ]);

        $shift = Shift::create($validated);

        return redirect()->route('shifts.index')->with('success', 'Shift created successfully!');
    }

    // Show specific shift details
    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        return view('shifts.show', compact('shift'));
    }

    // Show form to edit an existing shift
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        return view('shifts.edit', compact('shift'));
    }

    // Update the shift data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'shift_name' => 'required|string|max:50',
            'in_time' => 'nullable|date_format:H:i',
            'out_time' => 'nullable|date_format:H:i',
            'grace_time' => 'nullable|date_format:H:i:s',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($validated);

        return redirect()->route('shifts.index')->with('success', 'Shift updated successfully!');
    }

    // Delete a shift
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', 'Shift deleted successfully!');
    }
}
