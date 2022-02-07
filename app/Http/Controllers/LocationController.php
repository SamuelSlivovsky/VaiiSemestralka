<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comments = Comment::all()->sortBy('created_at', SORT_REGULAR, true);
        $locations = Locations::all();
        return view('lezSVK', ['locations' => $locations, 'comments' => $comments]);
    }

    public function edit($id)
    {
        $locations = Locations::find($id);
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

        if (Auth::id() == 1) {

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
        }
        return redirect('lezenie-na-slovensku');
    }

    public function addComment(Request $request)
    {

        if (Auth::id() != 0) {
            $request->validate([
                'text' => 'required',
                'locations_id' => 'required',
            ]);

            $user = User::find(Auth::id());
            $comment = new Comment();
            $comment->user_name = $user->name;
            $comment->text = $request->text;
            $comment->locations_id = $request->locations_id;
            $comment->user_id = $user->id;
            $comment->save();
            return response()->json(['success' => 'success'], 200);
        }
    }

    public function deleteComment($id)
    {
        if (Auth::id() != 0) {
            $delete = DB::table('comments')->where('id', $id)->delete();
        }
        return redirect('lezenie-na-slovensku');
    }
}
