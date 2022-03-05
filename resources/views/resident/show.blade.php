@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-8">
                    <h1>Show Resident {{$resident->name}} {{$resident->lastname}}</h1>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-secondary" href="{{route('residents.index')}}">Back</a>
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
                                <td>{{$resident->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{$resident->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lastname</th>
                                <td>{{$resident->lastname}}</td>
                            </tr>
                            <tr>
                                <th scope="row">DNI</th>
                                <td>{{$resident->dni}}</td>
                            </tr>
                            <tr>
                                <th scope="row">birthdate</th>
                                <td>{{$resident->birthdate}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{$resident->gender_id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{$resident->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last update</th>
                                <td>{{$resident->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection

