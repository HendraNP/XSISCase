<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use DB;
use App\Customer;
use App\Logs;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use App\Http\Requests\MultipartFormRequest;
use App\Http\Resources\MultipartFormResource;

class MoviesController extends Controller
{
    //1. List of Movie GET /Movies
    public function list()
    {
    	$list = DB::connection('mysql')->table('movies')->where('status', 'active')->get();
        return response()->json($list, 201);
    }

    //2. Detail of Movie GET /Movies/:ID
    public function movie($id)
    {
    	$movie = DB::connection('mysql')->table('movies')->where('movie_id', $id)->first();
        return response()->json($movie, 201);
    }

    //3. Add New Movie POST /Movies
    public function add(Request $request){
        $file = $request->file('image');
        
        $request->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'data' => ['required','json']
        ]);

        $json = json_decode($request->input('data'),true);

        $rules = [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:300'],
            'rating' => ['required', 'numeric']
        ];

        $validator = Validator::make($json, $rules);
        if($validator->passes()){
            $movie_name = $json['title'];
            $movie_description = $json['description'];
            $rating = $json['rating'];
            $imageName = 'img_movie_'.$movie_name.'.'.$file->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $insert = DB::connection('mysql')->table('movies')->insert(['movie_title' => $movie_name, 'movie_description' => $movie_description, 'rating' => $rating,'image' => $imageName,'status' => 'active']);

            $message = 'Data inserted successfully';
            return $message;
        }else{
            $message = 'Movie failed to add, please check the Movie Data';
            return $message;
        }
    }

    //4. Update Movie /PATCH /Movies/:ID
    public function update(Request $request){
        $file = $request->file('image');
        $id = $request->route('id');
        
        $request->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg|max:2048'],
            'data' => ['required','json']
        ]);

        $json = json_decode($request->input('data'),true);

        $rules = [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:300'],
            'rating' => ['required', 'numeric']
        ];

        $validator = Validator::make($json, $rules);
        if($validator->passes()){
            $movie_name = $json['title'];
            $movie_description = $json['description'];
            $rating = $json['rating'];
            $imageName = 'img_movie_'.$movie_name.'.'.$file->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $insert = DB::connection('mysql')->table('movies')->where('movie_id',$id)->update(['movie_title' => $movie_name, 'movie_description' => $movie_description, 'rating' => $rating]);

            $message = 'Data updated successfully';
            return $message;
        }else{
            $message = 'Movie failed to add, please check the Movie Data';
            return $message;
        }
    }

    //5. Delete Movie DELETE /Movies/:ID
    public function delete($id){
    	$delete = DB::connection('mysql')->table('movies')->where('movie_id', $id)->update(['status' => 'inactive']);

    	$message = 'Movie has been set inactive';
    	return $message;
    }
}
