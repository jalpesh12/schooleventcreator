<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantType extends Model
{
    //Table name
    protected $table = 'participanttype';
    //Primary key
    public $primaryKey = 'participanttypeid';
    //Timestamp
    public $timestamps = true;

}
