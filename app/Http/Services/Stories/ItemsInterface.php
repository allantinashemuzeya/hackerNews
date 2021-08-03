<?php


namespace App\Http\Services\Stories;


use Mockery\Matcher\Any;

interface ItemsInterface
{
    public function getAllStories();
    public function getTopStories():void;
    public function getNewStories();
    public function getBestStories():void;

}
