<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials = Tutorial::all();
        return view('tutorials', ['tutorials' => $tutorials]);
    }

    public function tutorialShow($id)
    {

        $tutorial = Tutorial::find($id);
        return view('tutorial', ['tutorials' => $tutorial]);
    }

    public function tutorialAdd()
    {
        return view('addTutorial');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addTutorial(Request $request)
    {

        $request->validate([
            'nazov' => 'required',
            'text' => 'required',
            'video' => 'required',
            'kod' => 'required',
        ]);

        DB::table('tutorials')->insert([
            'nazov' => $request->input('nazov'),
            'text' => $request->input('text'),
            'video' => $request->input('video'),
            'kod' => $request->input('kod'),
        ]);

        return redirect('tutorials');
    }

    public function delete($id)
    {

        if (Auth::id() == 1) {
            $delete = DB::table('tutorials')->where('id', $id)->delete();
        }

        return redirect('tutorials');
    }

    public function updateTutorial(Request $request, $id)
    {
        if (Auth::id() == 1) {
            $request->validate(['nazov' => 'required', 'text' => 'required', 'video' => 'required', 'kod' => 'required']);
            $updating = DB::table('tutorials')->where('id', $id)->update([
                'nazov' => $request->input('nazov'),
                'video' => $request->input('video'), 'text' => $request->input('text'), 'kod' => $request->input('kod')
            ]);
        }
        return redirect('tutorials');
    }
}
