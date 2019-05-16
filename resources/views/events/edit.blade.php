@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-default">Go Back</a>
    <h1>Edit Event</h1>
    {!! Form::open(['action' => ['EventsController@update', $event->eventid], 'method'=> 'POST']) !!}
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $event->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('eventtype', 'Event Type')}}
            {{Form::text('eventtype', $event->eventtype, ['class' => 'form-control', 'placeholder' => 'Event Type'])}}
        </div>
        <div class="form-group">
            {{Form::label('venuename', 'Venue Location')}}
            {{Form::text('venuename', $event->venue, ['class' => 'form-control', 'placeholder' => 'Venue Location'])}}
        </div>
        <div class="form-group">
            {{Form::label('eventdatetime', 'Event Date')}}
            {{Form::text('eventdatetime', $event->evendatetime, array('id' => 'datepicker','class'=>'timepicker')) }}
            Example format(2019-04-07 04:21:19)
        </div>
        <div class="form-group col-md-4">
                {{ Form::label('organizer', 'Organizer') }}
                {{ Form::select('organizer[]', $organizer, ['5','6'], ['class'=>'form-control', 'id' => 'participants', 'multiple' => 'multiple']) }}
        </div>
        <div class="form-group col-md-4">
                {{ Form::label('invitees', 'Invitees') }}
                {{ Form::select('invitees[]', $invitees, $selectedinvitees, ['class'=>'form-control', 'id' => 'invitees', 'multiple' => 'multiple']) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('payment', 'Payment Done or Permission Granted') }}
            {{ Form::select('payment[]', $invited, $selectedPayment, ['class'=>'form-control', 'id' => 'payment', 'multiple' => 'multiple']) }}
        </div>
        <div class="form-group col-md-8">
            {{ Form::label('attended', 'Attended by') }}
            {{ Form::select('attended[]', $paymentReceivedList, $selectedAttended, ['class'=>'form-control', 'id' => 'attended', 'multiple' => 'multiple']) }}
        </div>
        <div class="form-group col-md-4">
            {{Form::hidden('_method', 'PUT')}}
        </div>
         <div class="form-group col-md-6">
            {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
@endsection
