<?php

namespace App\Http\Controllers\Recomendation;

use App\Http\Controllers\Controller;
use App\Models\Recomendation;
use Illuminate\Support\Facades\Auth;

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
        $recomendations = Auth::user()->recomendations
            ->sortByDesc('probability') // Сортировка коллекции по убыванию
            ->take(3); // Взять первые 3 элемента;

        return view('recommendation.show', compact('recomendations'));
    }
}
