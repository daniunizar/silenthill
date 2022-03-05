@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-8">
                    <h1>New Resident</h1>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-secondary" href="{{route('residents.index')}}">Back</a>
                </div>
            </div>
            <form action="{{route('residents.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                </div>
                <div class="mb-3">
                    <label for="gender_id" class="form-label">Gender</label>
                    <select id="gender_id" name="gender_id" class="form-select" aria-label="Default select example">
                        @foreach($genders as $gender)
                            <option value="{{$gender->id}}">{{$gender->concept}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@if(session('created')=='ko')
    @section('js')
        <script>
            Swal.fire({
            title: 'Error!',
            text: 'A problen ocurred',
            icon: 'error',
            confirmButtonText: 'Cool'
            })
        </script>
    @endsection
@endif