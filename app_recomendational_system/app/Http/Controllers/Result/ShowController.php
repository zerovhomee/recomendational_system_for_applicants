<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use App\Models\Recomendation;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $inputData = request()->validate([
            'text' => 'required',
        ]);

        $selectedLanguages = $request->input('languages', []);
        $selectedRoles = $request->input('roles', []);
        $selectedActions = $request->input('actions', []);
        $selectedFilms = $request->input('films', []);

        $data = [
            "Какой язык программирования тебе ближе всего?" => $selectedLanguages,
            "Какую роль тебе комфортнее всего взять в команде?" => $selectedRoles,
            "С кем тебе проще общаться?" => $selectedActions,
            "Что тебе больше всего нравится в фильмах/сериалах о технологиях?" => $selectedFilms,
            'text' => $inputData,
        ];

        $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://localhost:5000/predict', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => $jsonData
        ]);

        $body = $response->getBody()->getContents();

        $data = json_decode($body, true);


        $prediction = $data['prediction'] ?? null;
        $id = 11;
        foreach($prediction as $key => $value){
            Recomendation::updateOrCreate(
                [
                    // Условия поиска дубликатов (без временных меток)
                    'user_id' => Auth::id(),
                    'program' => $key,
                    'speciality_id' => $id
                ],
                [
                    // Данные для обновления/создания
                    'probability' => $value,
                    'user_id' => Auth::id(),
                    'program' => $key,
                    'speciality_id' => $id,
                ]
            );
            $id++;
        }
        arsort($prediction);
        $best_probability = array_slice($prediction, 0, 3, true);

        return view('result.show', compact('best_probability'));

    }
}
