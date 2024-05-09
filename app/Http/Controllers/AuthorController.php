<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthorController extends BaseController
{

    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        $author = Author::create($validated);

        return response()->json($author, 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        $author->update($validated);

        return response()->json($author);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['message' => 'Author deleted'], 200);
    }



}
