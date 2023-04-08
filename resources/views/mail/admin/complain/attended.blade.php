@extends('layouts.mail.app')

@section('content')
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <h2>Hello, {{ $user->name }}</h2>
    <p style="font-size: 12px;">Your complain about {{ $complain->title }} with reffrence <code style="background-color: #eeeeee">{{ $complain->ref }}</code> has been attended. Below is the response from the {{ $complain->office->name }}.</p>
</div>
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <div style="background: #eeeeee; padding: 10px">
        <p style="font-size: 12px;"><b>Subject:</b> {{ $complain->title }}</p>
        <p style="font-size: 12px;"><b>Complain:</b> {{ $complain->complain }}</p>
        <p style="font-size: 12px;"><b>Response: </b>{{ $complain->remarks }}</p>
        <p style="font-size: 12px;"><b>Responded By: </b>{{ $complain->resolvedBy->name }}</p>
        <p style="font-size: 12px;"><b>Responded At: </b>{{ date('F j, Y h:s A', strtotime($complain->updated_at)) }}</p>
    </div>
    <br />
    <small>If the following remarks doesn't satisfy your requirements, please open another complain ticket on the <a href="{{ route('student.overview') }}">main platform.</a></small>
@endsection
