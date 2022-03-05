@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-8">
                    <h1>Resident</h1>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-success" href="{{route('residents.create')}}">New resident <i class="bi bi-plus-circle" title="New resident"></i></a>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col">
                    <input type="text" id="resident_finder" name="resident_finder" placehorder="Search for DNI, name or lastname">
                </div>
            </div>
            <table class="table table-success table-striped">
                <caption>Total of results: {{$residents->count()}}</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($residents != null)
                    @foreach($residents as $resident)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$resident->dni}}</td>
                        <td>{{$resident->name}}</td>
                        <td>{{$resident->lastname}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('residents.show', $resident->id)}}"><i class="bi bi-person-rolodex" title="Detail"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('residents.edit', $resident->id)}}"><i class="bi bi-pen" title="Edit"></i></a>
                        </td>
                        <td>
                            <form action="{{route('residents.destroy', $resident)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash" title="Delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td>No se han encontrado resultados</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@if(session('created')=='ok')
    @section('js')
        <script>
            Swal.fire({
            title: 'Success!',
            text: 'A new resident has been registered',
            icon: 'success',
            confirmButtonText: 'Cool'
            })
        </script>
    @endsection
@elseif(session('updated')=='ok')
    @section('js')
        <script>
            Swal.fire({
            title: 'Success!',
            text: 'The resident has been updated',
            icon: 'success',
            confirmButtonText: 'Cool'
            })
        </script>
    @endsection
@elseif(session('deleted')=='ok')
    @section('js')
        <script>
            Swal.fire({
            title: 'Success!',
            text: 'The resident has been deleted',
            icon: 'success',
            confirmButtonText: 'Cool'
            })
        </script>
    @endsection
@elseif(session('deleted')=='ko')
    @section('js')
        <script>
            Swal.fire({
            title: 'Error!',
            text: "The resident hasn't been deleted'",
            icon: 'error',
            confirmButtonText: 'Cool'
            })
        </script>
    @endsection
@endif