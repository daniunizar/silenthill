@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Residentes</h1>
            <hr/>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    if($residents != null)
                    @foreach($residents as $counter=>resident)
                    <tr>
                        <th scope="row">$counter</th>
                        <td>$resident->name</td>
                        <td>$resident->lastname</td>
                        <td>$resident->dni</td>
                        <td>
                            <a href="{{route('residents.edit', $resident->id)}}"><i class="bi bi-pen" title="Edit"></i></a>
                            <form action="{{route('residents.destroy', $resident)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="bi bi-trash" title="Delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td>No se han encontrado resultados</td></tr>
                    @endif
                </tbody>
            </table>
            <a href="{{route('residents.create')}}"><i class="bi bi-plus-circle" title="New resident"></i></a>
        </div>
    </div>
</div>
@endsection