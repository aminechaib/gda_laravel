<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');

        // Perform validation
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        // Process data (store in database, etc.)
        return response()->json([
            'received_name' => $name
        ]);
        return redirect()->route('dashboard')->json([  'received_name' => $name
    ]);
    }
}
