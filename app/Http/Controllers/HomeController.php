<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;







class HomeController extends Controller
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
        $results = DB::select( DB::raw("SELECT 
        users.id,
        users.name as name,
        users.email as email,
        positions.position_name
        FROM
            users
        JOIN positions ON users.position_id = positions.position_id") );

        return view('home', compact('results'));
    }
    public function create()
    {
        return view('create');

    }

    public function store ()
    {

    }

    public function show($id)
    {
        $text = $id;
        $results = DB::select( DB::raw("SELECT 
        users.id,
        users.name as name,
        users.email as email,
        positions.position_name
        FROM
            users
        JOIN positions ON users.position_id = positions.position_id
        WHERE users.id = $id") );
            $filter = DB::table('users')
            ->select([
                'users.id',
                'users.name as name',
                'users.email as email',
                'positions.position_name'
            ])
            ->leftJoin('positions', 'users.position_id', '=', 'positions.position_id')
            ->where('users.id', $id)
            ->first();
        return view('user',compact('text','results'));
    }

    public function show2($id)
    {
        $filter = DB::table('users')
            ->select([
                'users.id',
                'users.name as name',
                'users.email as email',
                'positions.position_name'
            ])
            ->leftJoin('positions', 'users.position_id', '=', 'positions.position_id')
            ->where('users.id', $id)
            ->first();
        return view('exam',compact('filter'));
    }

}
