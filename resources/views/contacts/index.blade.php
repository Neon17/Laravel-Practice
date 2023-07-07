@extends('layouts.main')
<body>
@section("content")
<div class="container">
    <a name="" id="" class="btn btn-primary" href="{{route('contacts.create')}}" role="button">Create</a>
</div>

<div class = "container">
    @include('notify::components.notify')
    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)  
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$contact->name}}</td>
          <td>{{$contact->email}}</td>
          <td>{{$contact->message}}</td>
          <td>
                <a class="btn btn-primary btn-sm " href="{{route('contacts.create')}}" role="button"> Create </a>
                <a class="btn btn-secondary btn-sm " href="{{route('contacts.edit',$contact->id)}}" role="button"> Edit </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog        ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Do you want to delete data?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('contacts.destroy', $contact->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="w-25 mx-auto">
        {{$contacts->links()}}
    </div>
</div>

@endsection
   