@extends('home')
@section('title','Edit Clock')
@section('content')
    <form method="post" action="{{route('clocks.update', $clock->id)}}" >
        @csrf
        <table border="1">
            <tr>
                <td>Name<input type="text" name="name" value="{{$clock->name}}"></td>
                <td>Price<input type="text" name="price" value="{{$clock->price}}"></td>
                <td>Vendor<input type="text" name="vendor" value="{{$clock->vendor}}" ></td>
            </tr>
        </table>
        <input type="submit" value="Update">
        <input type="button" onclick="window.history.go(-1); return false;" value="Cancel">
    </form>
    @endsection
