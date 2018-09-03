
@extends('front-end.layout')
@section('content')
 
<div class="container">
    <div class="row profile">
        @include('front-end.profile-sidebar')
        <div class="col-md-9">
            <div class="profile-content">
               Some user related content goes here...
            </div>
        </div>
    </div>
</div>


@endsection