<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function index()
    {
        $data = Data::all();
        return $data;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = new Data ();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->profession = $request->profession;
        $data->save();
        return $data;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Data::where('id', $id)->first();
        $data->name = $request->get('val_1');
        $data->age = $request->get('val_2');
        $data->profession = $request->get('val_3');
        $data->save();
        return $data;
    }

    public function destroy($id)
    {
//        return $id;
        $data = Data::find($id);
        $data->delete();
    }
}
