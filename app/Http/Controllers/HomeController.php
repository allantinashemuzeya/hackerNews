<?php

namespace App\Http\Controllers;

use App\Exceptions\CannotSaveToModel;
use App\Http\Services\Stories\ItemsActions;
use App\Models\Story;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\JsonException;

class HomeController extends Controller
{
    //Section
    public function index()
    {
        return view('home', ['stories'=>(new ItemsActions)->getAllStories()]);
    }

    public function jobs()
    {
        return view('jobs', ['stories' =>Story::where('type', 'job')->get()]);
    }

    public function comments(){
        return view('comments', ['comments' =>Story::where('type', 'comment')->get()]);
    }
}

//video


