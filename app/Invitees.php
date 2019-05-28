<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Invitees extends Model
{
    //Table name
    protected $table = 'invitees';
    //Primary key
    public $primaryKey = 'inviteeid';
    //Timestamp
    public $timestamps = true;

    public static function insertIntoInvitees($lastEventId, $request)
    {
        $data = array();
        foreach ($request->input('invitees') as $value) {
            $paymentReceived = '0';
            $attended = '0';
            if (is_array($request->input('payment'))) {
                if (in_array($value, $request->input('payment'))) {
                    $paymentReceived = '1';
                }
            }
            if (is_array($request->input('attended'))) {
                if (in_array($value, $request->input('attended'))) {
                    $attended = '1';
                }
            }
            $data[] = array(
                        'eventid'=>$lastEventId, 
                        'participantid' => $value, 
                        'is_payment'=>$paymentReceived, 
                        'is_attended'=>$attended
                    );
        }

        return Invitees::insert($data);
    }

    public static function showInviteeDetails($id)
    {
        $invitees = DB::table('invitees')
        ->where('participants.is_active', '1')
        ->where('eventid', $id)
        ->join('participants', 'participants.participantid', '=', 'invitees.participantid')
        ->select('invitees.participantid','participants.participantname' ,'is_payment', 'is_attended')
        ->get();

        //contains names
        $inviteesNameList = array();
        $paymentReceivedList = array();
        $attendedList = array();

        foreach ($invitees as $key => $value) {
            $inviteesNameList[$value->participantid] = $value->participantname;
            if ($value->is_payment == '1') {
                $paymentReceivedList[$value->participantid] = $value->participantname;
            }
            if ($value->is_attended == '1') {
                $attendedList[$value->participantid] = $value->participantname;
            }
        }

        return array(
            'inviteesNameList' => $inviteesNameList,
            'paymentReceivedList' => $paymentReceivedList,
            'attendedList' => $attendedList,
            'selectedinvitees' => array_keys($inviteesNameList),
            'selectedPayment' => array_keys($paymentReceivedList),
            'selectedAttended' => array_keys($attendedList)
        );
    }

}
