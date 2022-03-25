@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-8">
                    <h1>Show contact {{$contact->name}} {{$contact->lastname}}</h1>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-secondary" href="{{route('contacts.index')}}">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Personal Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Id</th>
                                <td>{{$contact->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{$contact->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lastname</th>
                                <td>{{$contact->lastname}}</td>
                            </tr>
                            <tr>
                                <th scope="row">DNI</th>
                                <td>{{$contact->dni}}</td>
                            </tr>
                            <tr>
                                <th scope="row">birthdate</th>
                                <td>{{$contact->birthdate}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{$contact->gender->concept}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{$contact->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last update</th>
                                <td>{{$contact->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection

