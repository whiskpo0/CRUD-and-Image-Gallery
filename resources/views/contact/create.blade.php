@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)                       
                        <p>{{ $error }} </p>                        
                    @endforeach
                </div>
                @endif

            <div class="card">
                <div class="card-header">Contacts</div>
            
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="{!! old('name') !!}">                        
                        </div>  
                        <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="" class="form-control" value="{!! old('address') !!}">                        
                        </div>  
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" id="" class="form-control" value="{!! old('phone') !!}">                        
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