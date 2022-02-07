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

    /**
     * tutorialShow
     *
     * @param  mixed $id
     * @return void
     */
    public function tutorialShow($id)
    {

        $tutorial = Tutorial::find($id);
        return view('tutorial', ['tutorials' => $tutorial]);
    }

    /**
     * tutorialAdd
     *
     * @return void
     */
    public function tutorialAdd()
    {
        return view('addTutorial');
    }

    /**
     * addTutorial
     *
     * @param  mixed $request
     * @return void
     */
    public function addTutorial(Request $request)
    {

        if (Auth::id() == 1) {
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
        }
        return redirect('tutorials');
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {

        if (Auth::id() == 1) {
            $delete = DB::table('tutorials')->where('id', $id)->delete();
        }

        return redirect('tutorials');
    }

    /**
     * updateTutorial
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateTutorial(Request $request, $id)
    {
        if (Auth::id() == 1) {
            $request->validate(['nazov' => 'required', 'text' => 'required', 'video' => 'required', 'kod' => 'required']);
            $updating = DB::table('tutorials')->where('id', $id)->update([
                'nazov' => $request->input('nazov'),
                'video' => $request->input('video'), 'text' => $request->input('text'), 'kod' => $request->input('kod')
            ]);
        }
        return back()->withInput();
    }
}
