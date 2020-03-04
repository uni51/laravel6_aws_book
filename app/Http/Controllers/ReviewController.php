<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('review');
    }

    public function store(Request $request)
    {
        $post = $request->all();
        $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'body' => $post['body']];

        Review::insert($data);

        return redirect('/');
    }
}
