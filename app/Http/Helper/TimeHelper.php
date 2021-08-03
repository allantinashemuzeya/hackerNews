<?php

namespace App\Http\Helper;

use Carbon\Carbon;


class TimeHelper
{
    //
    /**
     * @param $time
     * @return mixed
     */
    public function diffInHours($time)
    {
       $time = Carbon::parse($time);
       return $time->diffInHours(Carbon::now());
    }
}
