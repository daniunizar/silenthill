@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-8">
                    <h1>Contact</h1>
                </div>
                <div class="col-4 text-end">
                    <a class="btn btn-success" href="{{route('contacts.create')}}">New contact <i class="bi bi-plus-circle" title="New contact"></i></a>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col">
                    <form class="form-inline" action="{{route('contacts.search')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            @if(isset($keyword))
                            <input class="form-control" type="text" id="contact_finder" name="contact_finder" placeholder="Search for DNI, name or lastname" value="{{$keyword}}">
                            @else
                            <input class="form-control" type="text" id="contact_finder" name="contact_finder" placeholder="Search for DNI, name or lastname">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            @if($contacts!=null)
            <table class="table table-success table-striped mt-3">
                <caption>Total of results: {{$contacts->count()}}</caption>
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
                    @if($contacts != null)
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$contact->dni}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->lastname}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('contacts.show', $contact->id)}}"><i class="bi bi-person-rolodex" title="Detail"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('contacts.edit', $contact->id)}}"><i class="bi bi-pen" title="Edit"></i></a>
                        </td>
                        <td>
                            <form id="deletecontactForm" name="deletecontactForm" action="{{route('contacts.destroy', $contact)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="button" onclick="deletecontact()"><i class="bi bi-trash" title="Delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td>No se han encontrado resultados</td></tr>
                    @endif
                </tbody>
            </table>
            @else
                <p>No se han encontrado resultados</p>
            @endif
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function deletecontact(){
       event.preventDefault();
        Swal.fire({
          title: 'Are you sure about delete this contact?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Yes',
          denyButtonText: 'No',
          customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
            denyButton: 'order-3',
          }
        }).then((result) => {
          if (result.isConfirmed) {
            $('#deletecontactForm').submit();
          } else if (result.isDenied) {
            Swal.fire('contact was not deleted', '', 'info')
          }
        })

    }
</script>

    @if(session('created')=='ok')
        <script>
            Swal.fire({
            title: 'Success!',
            text: 'A new contact has been registered',
            icon: 'success',
            confirmButtonText: 'Cool'
            })
        </script>
    @elseif(session('updated')=='ok')
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'The contact has been updated',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
        </script>
    @elseif(session('deleted')=='ok')
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'The contact has been deleted',
                icon: 'success',
                confirmButtonText: 'Cool'
            })
        </script>
    @elseif(session('deleted')=='ko')
        <script>
            Swal.fire({
                title: 'Error!',
                text: "The contact hasn't been deleted'",
                icon: 'error',
                confirmButtonText: 'Cool'
            })
            </script>
    @endif
@endsection