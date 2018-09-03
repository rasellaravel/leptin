
@extends('front-end.layout')

@section('content')

<form action="{{'pasyeraPayment'}}" method="post">
@csrf
	<input type="submit" name="submit" value="Pay with pasyera">
</form>
@endsection