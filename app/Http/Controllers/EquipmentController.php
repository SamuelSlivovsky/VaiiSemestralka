<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equip = Equipment::all();
        return view('vybavenie', ['equipment' => $equip->where('user_id',  Auth::id())]);
    }


    public function equipAdd()
    {
        return view('addEquip');
    }

    public function addEquip(Request $request)
    {

        $request->validate([
            'category' => 'required',
            'nazov' => 'required',
            'znacka' => 'required',
            'pocet' => 'required',
        ]);

        DB::table('equipment')->insert([
            'user_id' => Auth::id(),
            'category' => $request->input('category'),
            'nazov' => $request->input('nazov'),
            'znacka' => $request->input('znacka'),
            'pocet' => $request->input('pocet')
        ]);

        return redirect('vybavenie');
    }

    public function delete($id)
    {
        $delete = DB::table('equipment')->where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect('vybavenie');
    }
}
