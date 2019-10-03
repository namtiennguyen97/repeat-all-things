@extends('home')
@section('title','Show all clock List')
@section('content')
    <form method="get" action="{{route('clocks.search')}}">
        <input type="text" name="keyword" placeholder="search name">
        <input type="submit" value="Search">
    </form>

    <form>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Price</th>
                <th>Vendor</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($clock as $key => $value)
                <tr>
                   <td>{{++$key}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->vendor}}</td>
                    <td><a href="{{route('clocks.create', $value->id)}}">create new</a></td>
                    <td><a href="{{route('clocks.edit', $value->id)}}">Edit</a></td>
                </tr>
        </table>
        <a href="{{route('clocks.create')}}">Add new table</a>
        @endforeach
    </form>

    @endsection
