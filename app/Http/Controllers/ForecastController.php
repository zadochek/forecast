<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForecastRequest;
use App\Models\Forecast;

class ForecastController extends Controller
{
    public function forecastRequest(ForecastRequest $request)
    {
       
        try {
            $url = 'https://api.openweathermap.org/data/2.5/weather?lat=' . $request->lat . '&lon=' . $request->lon . '&lang=ru&units=metric&appid=6f4c2d3d4e6e2e1368c4f30a1f146fa9';
            $result = json_decode(file_get_contents($url), true); 
        } catch (\Exception $e) {
            return back()->withErrors(['api_fail' => 'Ошибка запроса. Попробуйте позже.']);
        }
        
        $forecast = Forecast::create([
            'temp' => $result['main']['temp'],
            'description' => $result['weather'][0]['description']
        ]);

        return view('welcome', compact('result'));
    }
}
