@extends('layouts.master')

@section('title', 'Home — Twork')

@section('content')

   
    {{-- Ini nanti diganti ama yang benernya --}}
    <h1>Hello My Name is {{Auth::user()->name}} </h1>


@endsection