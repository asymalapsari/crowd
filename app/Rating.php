<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model{
    protected $table = 'rating';
    //
    protected $guarded = [];
    public $timestamps = false;
}