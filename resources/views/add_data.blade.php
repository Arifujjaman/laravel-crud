@extends('layout',['title'=>'Create page'])
 
@section('content')
    <div class="container">
        <a href="{{url('/')}}" class="btn btn-primary my-3">Show Data</a> 
        
        <form action="{{url('/store-data')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="Enter email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <input type="submit" name="" id="" class="btn btn-primary my-3" value="submit" >
        
        </form>
    </div>
    @endsection   