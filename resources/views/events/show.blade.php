@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-default">Go Back</a>
    <br></br>
    <table class="table table-striped">
            <tr>
                    <th>Event Desc</th>
                    <th>Event Type</th>
                    <th>Event Date</th>
                    <th>Venue Name</th>
                    <th>Distane to Venue</th>
                    <th>Travel Time via Car</th>
            </tr>
                <tr>
                        <td>{{$event->description}}</td>
                        <td>{{$event->eventtype}}</td>
                        <td>{{$event->evendatetime}}</td>
                        <td>{{$event->venue}}</td>
                        <td>{{$event->distancefromschool}}</td>
                        <td>{{$event->duration}}</td>
                </tr>
    </table>
    <br></br>
    <table class="table table-striped">
                <tr>
                        <th>Invited list of Participants Name</th>
                </tr>
                @foreach ($inviteesNameList as $inviteeName)
                        <tr>
                                <td>{{$inviteeName}}</td>
                        </tr>
                @endforeach

    </table>
    <br></br>
    <table class="table table-striped">
                <tr>
                        <th>Payment Received or Permission Granted Participants List</th>
                </tr>
                @foreach ($paymentReceivedList as $paymentReceived)
                        <tr>
                                <td>{{$paymentReceived}}</td>
                        </tr>
                @endforeach

    </table>
    <br></br>
    <table class="table table-striped">
                <tr>
                        <th>Anttended list of participants</th>
                </tr>
                @foreach ($attendedList as $attended)
                        <tr>
                                <td>{{$attended}}</td>
                        </tr>
                @endforeach

    </table>

    <br></br><br></br>
    <a href="/dashboard" class="btn btn-default">Go Back</a>
@endsection