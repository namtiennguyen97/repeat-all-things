@extends('home')
@section('title','Create new')
@section('content')
    <h1>Create new clock</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
        @endif


    <form method="post" action="{{route('clocks.store')}}">
        @csrf
        Name: <input type="text"  name="name" placeholder="input clock name">
        Price: <input type="text"  name="price" placeholder="Input clock price">
        Vendor: <input type="text"  name="vendor" placeholder="input Vendor name">
        <input type="submit" value="Add">
    </form>
    @endsection;
