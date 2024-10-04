<?php

namespace App\Http\Controllers;

use App\Models\Karlotbl;
use Illuminate\Http\Request;

class KarlotblController extends Controller
{
    // Display a listing of the resource
    public function index(Request $request)
    {
        // Get the search term from the request
        $search = trim($request->input('search'));

        // If a search term is provided, filter the records
        if ($search) {
            $records = Karlotbl::where('id', 'like', '%' . $search . '%')
                ->orwhereRaw('LOWER(name) like ?', ['%' . strtolower($search) . '%'])
                ->orWhereRaw('LOWER(email) like ?', ['%' . strtolower($search) . '%'])
                ->orWhereRaw('LOWER(motto) like ?', ['%' . strtolower($search) . '%'])
                ->get();
        } else {
            // If no search term, get all records
            $records = Karlotbl::all();
        }

        // Return the view with the records
        return view('karlotbl.index', compact('records'));
    }
////////    
    public function create()
    {
        return view('karlotbl.create'); // Show the form for creating a new record
    }
////////
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:karlotbl,email', // Ensure email is unique
            'motto' => 'required|string|max:255',
        ]);

        // Create a new record in the database
        Karlotbl::create($request->all());

        // Redirect back to the index with a success message
        return redirect()->route('karlotbl.index')->with('success', 'Record added successfully.');
    }
////////
    public function edit($id)
    {
        $record = Karlotbl::findOrFail($id); // Fetch the record by ID
        return view('karlotbl.edit', compact('record')); // Pass the record to the view
    }
////////
    public function update(Request $request, $id)
    {
        // Find the record to update by ID
        $record = Karlotbl::findOrFail($id);

        // Validate request data
        $validatedData = $request->validate([
            'id' => 'required|integer|unique:karlotbl,id,' . $record->id, // Ensure new ID is unique, excluding the current record
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|string|email|max:255',
            'motto' => 'nullable|string|max:255',
        ]);

        // If the ID hasn't changed, simply update other fields
        if ($validatedData['id'] === $record->id) {
            // Update the existing record fields
            $record->name = $validatedData['name'];
            $record->age = $validatedData['age'];
            $record->email = $validatedData['email'];
            $record->motto = $validatedData['motto'];
            $record->save(); // Save the updated record

            return redirect()->route('karlotbl.index')->with('success', 'Record updated successfully.');
        }

        // If the ID has changed, check for existing records with the new ID
        $existingRecord = Karlotbl::withTrashed()->where('id', $validatedData['id'])->first();

        if ($existingRecord && $existingRecord->id !== $record->id) {
            // If a record with the new ID exists, return an error
            return redirect()->back()->withErrors(['id' => 'The new ID already exists. Please choose another one.']);
        }

        // Update the record with the new ID directly without creating a new record
        $record->id = $validatedData['id']; // Update ID
        $record->name = $validatedData['name']; // Update other fields
        $record->age = $validatedData['age'];
        $record->email = $validatedData['email'];
        $record->motto = $validatedData['motto'];
        $record->save(); // Save the updated record with the new ID

        return redirect()->route('karlotbl.index')->with('success', 'Record updated successfully.');
    }
////////
    public function destroy($id)
    {
        $record = Karlotbl::where('id', $id)->firstOrFail(); // Find the record by ID
        $record->delete(); // Soft delete the record

        return redirect()->route('karlotbl.index')->with('success', 'Record deleted successfully.'); // Redirect with success message
    }
}
