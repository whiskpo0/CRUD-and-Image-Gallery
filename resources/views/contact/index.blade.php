@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contacts
                    <span class="float-right"><a href="{{ route('contact.create') }}">Create Contact</a></span>
                </div>
            
               <table class="table table-striped">
                   <thead>
                       <th>Name</th>
                       <th>Address</th>
                       <th>Phone</th>
                       <th>Edit</th>    
                       <th>View</th>
                       <th>Delete</th>                       
                   </thead>
                   <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>
                                <a href="{{route('contact.edit',[$contact->id])}}">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('contact.show',[$contact->id])}}">
                                    <button class="btn btn-primary">View</button>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('contact.destroy', [$contact->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach   
                    <tr>

                       </tr>
                   </tbody>
               </table>

            </div>
        </div>
    </div>
</div>
    
@endsection