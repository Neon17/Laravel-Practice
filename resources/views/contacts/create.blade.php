@extends('layouts.main')

<body>
    <div class="container">


    
    </div>

   @section("content")
   <div class="container py-5">
       
      
    <form method="post" action="{{route('contacts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
            @error('name')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Subject</label>
            <input type="text" name="subject" id="" class="form-control" placeholder="" aria-describedby="helpId">
            @error('subject')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
            @error('message')
                <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

   @endsection
 
    