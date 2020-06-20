<?php

namespace App\Http\Controllers;

use App\Model\Country;
use App\Model\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function getAll()
    {
        $data['countries'] = Country::all();
        $data['genres'] = Genre::all();

        return success_response(JsonResponse::HTTP_CREATED, 'Static Data Found', $data);
    }
}
