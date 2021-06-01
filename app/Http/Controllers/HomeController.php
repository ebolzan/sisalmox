<?php

namespace App\Http\Controllers;

use App\User;
use App\Warehouse;
use App\Writer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        echo "buceta";
        // die();
        // $this->middleware('auth');
        // $this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin')->except('logout');
        //$this->middleware('guest:writer')->except('logout');
    }

    public function nada()
    {
        echo "nada";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        echo "oi";
        // return view('home');

        $writer = User::find(5);



        $local = Warehouse::create(
            [
                'name' => 'surpla',
                'room' => 'central',
                'block' => 'central',
                'owner' => 'evandro',
                'email' => 'pituca2@gmail.com',
                'phone' => '555555',
            ]
        );

        //$local->created_at = Carbon::now();

        echo $local->id;

        $local->users()->attach($writer);
    }
}
