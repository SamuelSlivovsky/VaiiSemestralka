<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        return view('vybavenie', ['vybavenie' => $equip->where('user_id',  Auth::id())]);
    }


    public function equipAdd()
    {
        return view('addEquip');
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
