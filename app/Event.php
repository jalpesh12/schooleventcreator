<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Table name
    protected $table = 'events';
    //primary key
    public $primaryKey = 'eventid';
    //Timestamp
    public $timestamps = true;

    public static function getSchoolDetails($email){

        return DB::table('users')
            ->where('email', $email)
            ->select('address')
            ->first();
    }
}
