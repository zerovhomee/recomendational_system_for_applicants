<?php

namespace App\Http\Controllers;

use App\Models\Recomendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'text' => $inputData
        ]);

        $prediction = $response->json()['prediction'];
        $data_to_push = ['recomendation' => $prediction];
        $data_to_push += ['user_id' => Auth::id()];
        Recomendation::create($data_to_push);

        return view('result.show', compact('prediction'));

    }
}
