<?php

namespace App\Http\Controllers;

use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InfoTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InfoTypes::with('infos')->get();
        return view('admin/info_types/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/info_types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InfoTypes::create($request->all());
        return redirect()->route('info_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function show(InfoTypes $InfoTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InfoTypes::find($id);
        return view('admin/info_types/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        InfoTypes::find($id)->update($request->all());
        return redirect()->route('info_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoTypes  $InfoTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = InfoTypes::destroy($id);
        return $result;
    }

    public function indexDataTable()
    {
        $response = InfoTypes::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'info_count' => count($i->infos),
                'created_at' => Carbon::parse($i->created_at)->toDateTimeString(),
                'editBtn' => "<a href='/admin/info_types/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return $data;
    }
}
