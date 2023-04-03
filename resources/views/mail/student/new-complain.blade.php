@extends('layouts.mail.app')

@section('content')
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <h1>Hello, {{ $complain->user->name }}</h1>
</div>
<center>
    <p>We have recieved Your Complain</p>
</center>
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <div style="background: #eeeeee; padding: 10px">
        <table>
            <tr>
                <td align="center">
                    <p><b>Reffrence</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $complain->ref }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Subject</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $complain->title }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Reg Number</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $complain->student->reg_number }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>To Office</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $complain->office->name }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Status</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $complain->status ? 'Attended' : 'Pending' }}</p>
                </td>
            </tr>
        </table>
    </div>
    <center>
        <a style="margin: 2rem; padding: 10px 20px; color: white; background-color: rgb(15, 151, 230); border-radius: 700px; text-decoration: none" href="{{ route('login') }}">See Complain Status</a>
    </center>
    <br />
@endsection
