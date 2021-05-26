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
        die();
        $this->middleware('auth');
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

        $writer = Writer::find(1);
        $local = Warehouse::create(
            [
                'name' => 'surcen',
                'room' => 'central',
                'block' => 'central',
                'owner' => 'evandro',
                'email' => 'ebolzann@gmail.com',
                'phone' => '555555',
            ]
        );

        echo $local->id;

        $local->writers()->attach($writer);
    }
}
