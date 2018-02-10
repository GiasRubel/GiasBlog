@extends('vlog.header')
@section('title','serchapi')
@section('body')
    <form method="GET" action="{{ route('user.recipe') }}">
        <input type="text" name="serchapi">
        <input type="submit" value="Serch">
    </form>
 @endsection   