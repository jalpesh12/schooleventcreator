<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Participant;
use App\ParticipantType;
use App\Invitees;
use DB;
use Helper;
use Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            $title = 'Welcome to Sentral Education!!';
        }else{
            $title = 'Welcome '.auth()->user()->name ;
        }
        
        return view('events.index')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get data of the participants who can only be organizer
        $organizer= Participant::getOrganizers();

        //get only participants which are active
        $invitees = Participant::getActiveParticipants();

        //assign to particpants i.e invitees and organizers to the view
        return view('events.create')
                ->with('organizer', $organizer)
                ->with('invitees', $invitees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation happens here
        $this->validate($request, [
            'description' => 'required',
            'eventtype' => 'required',
            'venuename' => 'required',
            'eventdatetime' => 'required',
            'organizer' => 'required',
            'invitees' => 'required',
        ]);

        //get school details i.e source address;
        $schoolDetails = Event::getSchoolDetails(auth()->user()->email);

        //get distance and time
        $distanceTime = Helper::getDistanceTime($schoolDetails, $request);

        // Create Events insert into events Table
        $event = new Event;
        $event->description = $request->input('description');
        $event->eventtype = $request->input('eventtype');
        $event->venue = $request->input('venuename');
        $event->evendatetime = $request->input('eventdatetime');
        $event->distancefromschool = $distanceTime['distance'];
        $event->duration = $distanceTime['duration'];
        $event->save();

        // Insert invitees into invtees table
        Invitees::insertIntoInvitees($event->eventid, $request);

        //render to view
        return redirect('/dashboard')
                ->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventDetails = Event::find($id);
        $inviteeDetails = Invitees::showInviteeDetails($id);

        //render to view
        return view('events.show')
               ->with('event', $eventDetails)
               ->with('inviteesNameList', $inviteeDetails['inviteesNameList'])
               ->with('paymentReceivedList', $inviteeDetails['paymentReceivedList'])
               ->with('attendedList', $inviteeDetails['attendedList']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        // Get data of the participants who can only be organizer
        $organizer= Participant::getOrganizers();

        //get only participants which are active
        $invitees = Participant::getActiveParticipants();

        $inviteeDetails = Invitees::showInviteeDetails($id);

        //render to view
        return view('events.edit')
                ->with('event', $event)
                ->with('organizer', $organizer)
                ->with('invitees', $invitees)
                ->with('invited', $inviteeDetails['inviteesNameList'])
                ->with('paymentReceivedList', $inviteeDetails['paymentReceivedList'])
                ->with('selectedinvitees', $inviteeDetails['selectedinvitees'])
                ->with('selectedPayment', $inviteeDetails['selectedPayment'])
                ->with('selectedAttended', $inviteeDetails['selectedAttended']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation happens here
        $this->validate($request, [
            'description' => 'required',
            'eventtype' => 'required',
            'venuename' => 'required',
            'eventdatetime' => 'required',
            'organizer' => 'required',
            'invitees' => 'required',
        ]);

        //get school details i.e source address;
        $schoolDetails = Event::getSchoolDetails(auth()->user()->email);

        //get distance and time
        $distanceTime = Helper::getDistanceTime($schoolDetails, $request);

        // update event and save into database
        $event = Event::find($id);
        $event->description = $request->input('description');
        $event->eventtype = $request->input('eventtype');
        $event->venue = $request->input('venuename');
        $event->evendatetime = $request->input('eventdatetime');
        $event->distancefromschool = $distanceTime['distance'];
        $event->duration = $distanceTime['duration'];
        $event->save();

        DB::table('invitees')->where('eventid', $event->eventid)->delete();
        
        //update the data into invitees
        Invitees::insertIntoInvitees($event->eventid, $request);
        
        return redirect('/dashboard')->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/dashboard')
                ->with('success', 'Event Deleted Successfully');
    }
}
