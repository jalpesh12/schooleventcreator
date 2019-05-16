@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <a href="/events/create" class="btn btn-primary">Create Event</a>
                    <h3>Your Upcoming Events</h3>
                    <table class="table table-striped">
                        @if (count($events) > 0)
                            <tr>
                                    <th>Event Desc</th>
                                    <th>Event Type</th>
                                    <th>Event Date</th>
                                    <th>Venue Name</th>
                                    <th>Distane to Venue</th>
                                    <th>Travel Time via Car</th>
                                    <th>Actions</th>
                                    <th></th>
                                    <th></th>
                            </tr>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->eventtype}}</td>
                                    <td>{{$event->evendatetime}}</td>
                                    <td>{{$event->venue}}</td>
                                    <td>{{$event->distancefromschool}}</td>
                                    <td>{{$event->duration}}</td>


                                    <td><a href="/events/{{$event->eventid}}/edit" class="btn btn-default">Edit</a> </td>
                                    <td><a href="/events/{{$event->eventid}}" class="btn btn-default">Show Details</a> </td>
                                    <td>
                                        {!! Form::open(['action'=> ['EventsController@destroy', $event->eventid], 'method'=>'POST', 'class'=>'pull-right' ]) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                
                            @endforeach
                        @else
                            <p>There are no events</p>
                        @endif
                    </table>
                    {{$events->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
