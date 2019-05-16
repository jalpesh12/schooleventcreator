@extends('layouts.app')

@section('content')
    <h1>Create Event</h1><br>
    {!! Form::open(['action' => 'EventsController@store', 'method'=> 'POST']) !!}
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventtype', 'Event Type')}}
        {{Form::text('eventtype', '', ['class' => 'form-control', 'placeholder' => 'Event Type'])}}
    </div>
    <div class="form-group">
        {{Form::label('venuename', 'Venue Location')}}
        {{Form::text('venuename', '', ['class' => 'form-control', 'placeholder' => 'Venue Location'])}}
    </div>
    <div class="form-group">
        {{Form::label('eventdatetime', 'Event Date')}}
        {{Form::text('eventdatetime', '', array('id' => 'datepicker','class'=>'timepicker')) }}
        Example format(2019-04-07 04:21:19)
    </div>
    <div class="form-group col-md-4">
            {{ Form::label('organizer', 'Organizer') }}
            {{ Form::select('organizer[]', $organizer, null, ['class'=>'form-control', 'id' => 'participants', 'multiple' => 'multiple']) }}
    </div>
    <div class="form-group col-md-6">
            {{ Form::label('invitees', 'Invitees') }}
            {{ Form::select('invitees[]', $invitees, null, ['class'=>'form-control', 'id' => 'invitees', 'multiple' => 'multiple']) }}
    </div>
        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection