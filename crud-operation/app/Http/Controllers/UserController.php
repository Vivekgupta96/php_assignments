<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vivek; 


class UserController extends Controller
{
    public function index()
    {
        // Retrieve all records from the 'ravi' table using get()
        $vivekRecords = Vivek::get();

        // Pass the data to the view
        return view('Products.index', ['vivekRecords' => $vivekRecords]);
    }


    public function create(){
        return view('Products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        
     $vivek =new Vivek();
     $vivek -> name=$request->name;
     $vivek -> address=$request->address;
     $vivek->save();
    
     session()->flash('success', 'Product added successfully.');
        return back();
    }
   

    public function update(Request $request, $id)
{
    if ($request->isMethod('patch')) {
        // Update logic for PATCH request
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $vivek = Vivek::findOrFail($id);
        $vivek->update($request->all());

        return response()->json(['message' => 'Record updated successfully']);
    } elseif ($request->isMethod('get')) {
        // Fetch logic for GET request
        $vivek = Vivek::findOrFail($id);

        return response()->json($vivek);
    }

}


public function destroy($id)
{
    try {
        // Find the product by ID
        $vivek = Vivek::findOrFail($id);

        // Delete the product
        $vivek->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Record deleted successfully!');
    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->back()->with('error', 'Error deleting record: ' . $e->getMessage());
    }
}

}