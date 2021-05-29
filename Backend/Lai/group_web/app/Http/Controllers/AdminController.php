<?php

namespace App\Http\Controllers;

use App\InfoTypes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function test()
    {
        $response = InfoTypes::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'name' => $i->name,
                'created_at' => $i->created_at
            ];
        }

        $data = ['data' => $data];

        return $data;
    }
}
