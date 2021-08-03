<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $casts = [
        'kids' =>'array'
        ];
    /**
     * @var mixed
     */
    private $by;
    /**
     * @var mixed
     */
    private $descendants;
    /**
     * @var mixed
     */
    private $kids;
    /**
     * @var mixed
     */
    private $score;
    /**
     * @var mixed
     */
    private $time;
    /**
     * @var mixed
     */
    private $type;
    /**
     * @var mixed
     */
    private $url;
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed|string
     */
    private $text;
    /**
     * @var mixed|string
     */
    private $itemId;
    /**
     * @var mixed|string
     */
    private $dead;
    /**
     * @var mixed|string
     */
    private $deleted;


}
