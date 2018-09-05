@extends('layouts.app')
@section('styletags')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    
    tr:nth-child(even) {
        background-color: #white;
    }
</style>
@endsection
@section('content')
<div class="container">
    <h1 style="text-align:center;color:black; font-weight:bold; background-color:lightgrey;">SUMMARY FORM</h1>
    <table class="table">
        <tr>
            <th>Applicant Number</th>
            <th>CNIC No.</th>
            <th>Picture</th>
        </tr>
        <tr>
            <td>00001</td>
            <td>12345</td>
            <td>xxxxx-xxxxxxx-x</td>

        </tr>
        <table>
            <tr>
                <th>Diary Number</th>
                <th>Name</th>
                <th>Father/Husband Name</th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Religion</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Domicile Province</th>
                <th>Domicile District</th>
                <th>City</th>
                <th>Postal Address</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <th>Cell Number 1</th>
                <th>Cell Number 2</th>
                <th>Phone Number</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </table>
</div>
@endsection