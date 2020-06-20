<?php

use App\Http\Helper\CustomEmailHelper;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

if(! function_exists('success_response'))
{
    function success_response($status, $message, $data)
    {
        return response()->json(['data' => $data, 'errors' => null, 'message' => $message], $status);
    }
}

if(! function_exists('error_response')){
    function error_response($status, $message, $errors)
    {
        throw new HttpResponseException(response()->json(['data' => null, 'errors' => $errors, 'message' => $message], $status));
    }
}

if(! function_exists('generate_film_slug')){
    function generate_film_slug($name){
        $slug = strval(Str::of($name)->slug('_'));

        if(\App\Model\Film::where('slug', $slug)->count() >= 1):
            return $slug . '_' . \App\Model\Film::max('id');
        else:
            return $slug;
        endif;
    }
}
