@extends('layouts')
@section('title', 'my profile')

@section('content')
    <div class="container">
        <div class="row">
            <h2>My Profile</h2>
        </div>
        <div class="col-md-8">
            <form action="{{ action('App\Http\Controllers\ProfileController@index') }}" method="get">
                <label class="col-md-8">ユーザー名</label>
                
                
            
