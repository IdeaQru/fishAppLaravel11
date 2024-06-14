<?php

namespace App\Http\Controllers;

use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Laravel 7+ HTTP Client facade

class HomepageController extends Controller
{
    public function dashboard()
    {
        $locations = Location::all(); // Retrieve all locations

        return view('pages.dashboard', compact('locations'));
    }

    public function indexAPI()
    {
        $locations = Location::all(); // Simulate fetching data for API, but usually, this method might just return JSON directly

        return response()->json($locations); // If this method also renders a view sometimes, adjust accordingly.
    }

    public function map()
    {
        return view('pages.map'); // mengasumsikan view Anda berada di dalam folder pages dan bernama dashboard.blade.php
    }

    public function mapUser()
    {
        return view('pages.mapuser'); // mengasumsikan view Anda berada di dalam folder pages dan bernama dashboard.blade.php
    }

    public function showMap()
    {
        $datall = Location::all(); // Fetch all locations from the database

        return response()->json($datall); // If this method also renders a view sometimes, adjust accordingly.
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'release_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:release_date',
        ]);

        $location = new Location();
        $location->lokasi = $request->location;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->status = $request->status;
        $location->release_date = $request->release_date;
        $location->expiry_date = $request->expiry_date;
        $location->save();

        return redirect()->back()->with('success', 'Task has been added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lokasi' => 'required|string|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'status' => 'required',
            'release_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:release_date',
        ]);

        $location = Location::findOrFail($id);
        $location->lokasi = $request->lokasi;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->status = $request->status;
        $location->release_date = $request->release_date;
        $location->expiry_date = $request->expiry_date;
        $location->save();

        return redirect('/dashboard')->with('success', 'Location updated successfully!');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('pages.edit', compact('location'));
    }

    public function delete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect('/dashboard')->with('success', 'Location deleted successfully!');
    }
}
