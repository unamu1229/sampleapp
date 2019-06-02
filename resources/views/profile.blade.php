@extends('layouts.app')

@section('content')
    @for($i = 0; $i < 10; $i++)
        <input type="checkbox" name="active">
    @endfor
@endsection