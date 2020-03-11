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

        if ($request->hasFile('image')) {
            // storage/app/public/images配下にファイルをアップロード
            $request->file('image')->store('/public/images');
            $data = [
                'user_id' => \Auth::id(),
                'title' => $post['title'],
                'body' => $post['body'],
                'image' => $request->file('image')->hashName()
            ];
        } else {
            $data = [
                'user_id' => \Auth::id(),
                'title' => $post['title'],
                'body' => $post['body']
            ];
        }

        Review::insert($data);

        return redirect('/');
    }
}
