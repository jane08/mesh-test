@extends('layouts.master')

@section('title')
   Contact
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}">
@endsection

@section('content')
   @include("includes.info-box")
   <form action="" method="POST" id="contact-post">
        <div class="input-group">
            <label for="name"> Your Name</label>
            <input type="text" name="name" id="name">
        </div>
       <div class="input-group">
           <label for="email"> Your E-email</label>
           <input type="text" name="email" id="email">
       </div>
       <div class="input-group">
           <label for="subject"> Subject</label>
           <input type="text" name="subject" id="subject">
       </div>
       <div class="input-group">
           <label for="message"> Your Message</label>
           <textarea name="message" id="message" cols="30" rows="10"></textarea>
       </div>
       <button type="suubmit" class="btn">Submit</button>
       <input type="hidden" value="{{ Session::token() }}" name="_token">
   </form>
@endsection