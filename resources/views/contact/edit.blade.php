@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Contacts</div>
            
                <form action="{{ route('contact.store', [$contact->id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="{{$contact->name}}">                        
                        </div>  
                        <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" class="form-control" value="{{$contact->address}}">                        
                        </div>  
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" id="" class="form-control" value="{{$contact->phone}}">                        
                        </div>  
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>  
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection