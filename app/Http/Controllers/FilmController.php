<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Model\Film;
use App\Model\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all()->toArray();

        return success_response(JsonResponse::HTTP_CREATED, 'Sucess', $films);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $film = Film::where('slug', $slug)->first();
        return success_response(JsonResponse::HTTP_CREATED, 'Sucess', $film);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        try {
            $data = $request->except(['photo', 'date', 'genre']);

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');

                $imageName = time() . '.' . $request['photo']->getClientOriginalExtension();
                $request->photo->move(public_path('films'), $imageName);

                $data['photo'] = $imageName;

            }

            $data['date'] = date('Y-m-d', strtotime($request->date));
            $data['slug'] = generate_film_slug($request->name);

            DB::beginTransaction();
            $film = Film::create($data);
            DB::commit();

            $array = [];
            foreach ($request->genre as $row):
                array_push($array, [
                    'film_id' => $film->id,
                    'genre_id' => $row
                ]);
            endforeach;

            Genre::insert($array);

            if ($film):
                return success_response(JsonResponse::HTTP_CREATED, 'New film created', $film);
            else:
                error_response(JsonResponse::HTTP_UNPROCESSABLE_ENTITY, 'Film not saved', []);
            endif;
        }
        catch (Exception $error)
        {
            error_response(JsonResponse::HTTP_UNPROCESSABLE_ENTITY, 'Something went wrong', $error);
        }
    }
}
