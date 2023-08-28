<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    
    public function create(Request $request)
    {
        $position = DB::table('positions')->select(
            'position_id',
            'position_name'
        )->get();
        return view("create", compact('position'));
    }
    public function update(Request $request)
    {
   
        
        $users = User::find($request->id);
        $old = $users;
        $input = $request->all();
        $users->name = $input['name'];
        $users->email = $input['email'];
        $users->position_id= $input['position'];
        $users->save();


        return redirect(route('home')) ->with ('flash_message','User Update');


    }
    public function delete(Request $request)
    {   
        $usernifo = User::find($request->id);  
        $usernifo->delete();
        $result = [
            'data' => $usernifo
        ];
        return response()->json($result,200);
    }

    public $delete_id;
    
    protected $listener = ['deleteConfirmed'=>'deleteUser'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowerEvent('show-delete-confirmation');

    }

    public function deleteUser()
    {
        $users = User::where('id', $this->delete_id)->first();
        $users->delete(); 

        $this->dispatchBrowerEvent('userDelete');
    }

    public function store (Request $request)
    {
     $users = new  User();
     $input = $request->all();
     $users->name = $input['First_name'];
     $users->email = $input['Email_address'];
     $users->position_id= $input['position'];
     $users->password = $input['password'];
     $users->save();

     return redirect('home');


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
            $position = DB::table('positions')->select(
                'position_id',
                'position_name'
            )->get();
        return view('exam',compact('position','filter'));
    }    
}                