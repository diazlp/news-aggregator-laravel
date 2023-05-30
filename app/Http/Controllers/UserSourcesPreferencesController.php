<?php

namespace App\Http\Controllers;

use App\Models\UserSourcesPreferences;
use Illuminate\Http\Request;

class UserSourcesPreferencesController extends Controller
{
    public function index()
    {
        // Retrieve all user sources preferences
        $preferences = UserSourcesPreferences::all();
        return response()->json($preferences);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'source' => 'required',
        ]);

        // Create a new user sources preference
        $preference = UserSourcesPreferences::create($request->all());
        return response()->json($preference, 201);
    }

    public function show($id)
    {
        // Retrieve a specific user sources preference by ID
        $preference = UserSourcesPreferences::findOrFail($id);
        return response()->json($preference);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'source' => 'required',
        ]);

        // Update the user sources preference
        $preference = UserSourcesPreferences::findOrFail($id);
        $preference->update($request->all());
        return response()->json($preference);
    }

    public function destroy($id)
    {
        // Delete a user sources preference
        $preference = UserSourcesPreferences::findOrFail($id);
        $preference->delete();
        return response()->json(null, 204);
    }
}
