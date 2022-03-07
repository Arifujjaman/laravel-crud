@extends('layout',['title'=>'Show page'])
 
@section('content')
    <div class="container">
    <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a> 
    @if(Session::has('msg'))
        <p class="alert alert-success">{{Session::get('msg')}}</p>
     @endif

     <div class="col-lg-10">
            <form action="{{url('/')}}" method="GET" >
                <div class="form-row">
                    <div class="col-8">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search"
                               value="{{ request('search') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-default">Search</button>

                    </div>
                </div>
            </form>

        </div>

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($showData as $key=>$data)
    <tr>
      <!-- <td>{{$key+1}}</td> -->
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>
        <a href="{{url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{url('/delete-data/'.$data->id)}}"onclick = "return confirm('are you sure to delete?')" class="btn btn-danger">Delete</a>
      </td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
{{$showData->links()}}
</div>
@endsection