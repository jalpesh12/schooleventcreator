<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //Table name
    protected $table = 'participants';
    //Primary key
    public $primaryKey = 'participantid';
    //Timestamp
    public $timestamps = true;

    public static function getOrganizers()
    {
        $organizer = DB::table('participants')
        ->where('participants.is_active', '1')
        ->where('participanttypename', 'Organizer')
        ->join('participanttype', 'participants.participanttypeid', '=', 'participanttype.participanttypeid')
        ->select('participantname', 'participantid')
        ->get();

        $organizerData = array();
        foreach ($organizer as $key => $value) {
            $organizerData[$value->participantid] = $value->participantname;
        }

        return $organizerData;
    }

    public static function getActiveParticipants()
    {
        $participants = Participant::where('is_active', '1')->get();
        foreach ($participants as $key => $value) {
            $activeParticipant[$value->participantid] = $value->participantname;
        }
        return $activeParticipant;
    }

}
