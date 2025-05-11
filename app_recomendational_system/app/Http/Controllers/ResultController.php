<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResultController extends Controller
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

        $inputData = request()->validate([
            'text' => 'required',
        ]);

        $response = Http::post('http://localhost:5000/predict', [
            'features' => $inputData
        ]);

        $prediction = $response->json()['prediction'];
        $prediction = mb_substr($prediction, 23, -3);

        return view('result.show', compact('prediction'));

    }
}
