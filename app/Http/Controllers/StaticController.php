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
        $data['countries'] = Country::select('id', 'name')->get();
        $data['genres'] = Genre::select('id', 'gen_title')->get     ();

        return success_response(JsonResponse::HTTP_CREATED, 'Static Data Found', $data);
    }
}
