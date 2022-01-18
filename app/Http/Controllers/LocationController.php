<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('lezSVK', ['locations' => $locations]);
    }

    public function edit($id)
    {
        $locations = Location::find($id);
        return view('editLokaciu', ['locations' => $locations]);
    }

    public function updateLocation(Request $request, $id)
    {
        if (Auth::id() == 1) {
            $request->validate(['nazov' => 'required', 'text' => 'required', 'obrazok' => 'required', 'lokacia' => 'required']);
            $updating = DB::table('locations')->where('id', $id)->update([
                'nazov' => $request->input('nazov'),
                'obrazok' => $request->input('obrazok'), 'text' => $request->input('text'), 'lokacia' => $request->input('lokacia')
            ]);
        }
        return redirect('lezenie-na-slovensku');
    }

    public function delete($id)
    {

        if (Auth::id() == 1) {
            $delete = DB::table('locations')->where('id', $id)->delete();
        }

        return redirect('lezenie-na-slovensku');
    }

    public function addLocation(Request $request)
    {

        $request->validate([
            'nazov' => 'required',
            'text' => 'required',
            'obrazok' => 'required',
            'lokacia' => 'required',
        ]);

        DB::table('locations')->insert([
            'nazov' => $request->input('nazov'),
            'text' => $request->input('text'),
            'obrazok' => $request->input('obrazok'),
            'lokacia' => $request->input('lokacia'),
        ]);

        return redirect('lezenie-na-slovensku');
    }
}
