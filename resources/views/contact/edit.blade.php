@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                    <div class="col-8">
                        <h1>Edit Contact</h1>
                    </div>
                    <div class="col-4 text-end">
                        <a class="btn btn-secondary" href="{{route('contacts.index')}}">Back</a>
                    </div>
                </div>
            <form action="{{route('contacts.update', $contact->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$contact->name}}">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$contact->lastname}}">
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="{{$contact->dni}}">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{$contact->birthdate}}">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender_id" name="gender_id" class="form-select" aria-label="Default select example">
                        @foreach($genders as $gender)
                            @if($contact->gender_id != $gender->id)
                            <option value="{{$gender->id}}">{{$gender->concept}}</option>
                            @else
                            <option value="{{$gender->id}}" selected>{{$gender->concept}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
@endsection
