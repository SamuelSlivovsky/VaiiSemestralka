<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Path::all();
        return view('cesty', ['paths' => $paths->where('user_id',  Auth::id())]);
    }

    public function routeAdd()
    {
        return view('addRoute');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function show(Path $path)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function edit(Path $path)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Path $path)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function destroy(Path $path)
    {
        //
    }

    public function changeTries(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'tries' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'error', 'data' => $validator], 422);
        }

        $path = Path::findOrFail($request->id); // ziskanie udajov
        $path->tries = $request->tries;
        $path->save(); //ulozenie
        return response()->json(['success' => 'success'], 200);
    }

    public function changeAscend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'value' => 'required|string',
        ]);

        if ($validator->fails()) {
            //return response()->json(['error' => 'error', 'data' => $validator->errors()->all()], 422);
            return $validator->errors()->all();
        }

        $path = Path::findOrFail($request->id); // ziskanie udajov
        $path->ascendType = $request->value;
        $path->save(); //ulozenie
        return response()->json(['success' => 'success'], 200);
    }

    public function addRoute(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'difficulty' => 'required',
            'ascendType' => 'required',
            'date' => 'required',
            'tries' => 'required',
        ]);

        DB::table('paths')->insert([
            'name' => $request->input('name'),
            'difficulty' => $request->input('difficulty'),
            'user_id' => Auth::id(),
            'ascendType' => $request->input('ascendType'),
            'date' => $request->input('date'),
            'tries' => $request->input('tries'),
        ]);

        return redirect('cesty');
    }

    public function delete($id)
    {

        $delete = DB::table('paths')->where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect('cesty');
    }
}
