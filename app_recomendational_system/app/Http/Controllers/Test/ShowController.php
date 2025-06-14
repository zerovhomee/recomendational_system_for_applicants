<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ShowController extends Controller
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
        return view('test.show');
    }

    public function store(){
        $inputData = request()->validate([
            'text' => 'required',
        ]);
        $response = Http::post('http://localhost:5000/predict', [
            'text' => $inputData
        ]);

        return redirect(route('test.index'));
    }
}
