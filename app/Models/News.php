<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @param $id
 * @param $date
 * @param $title
 * @param $short_description
 * @param $text
 */
class News extends Model
{
    public $timestamps = false;
    public $fillable = ['title','date','short_description','text'];
}
