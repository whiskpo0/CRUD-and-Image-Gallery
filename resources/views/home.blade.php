@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="show">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="errMsg"></div>

                <div class="card">
                    <div class="card-body">
                        <form id="form" action="{{ route('album.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="">Name of Album</label>
                                <input type="text" name="album" class="form-control" placeholder="Your album name">  
                            </div>

                            <div class="input-group control-group initial-add-more">
                                <input type="file" name="image[]" class="form-control" id="image">
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn-add-more" type="button">
                                        Add
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="copy" style="display: none; ">
                                <div class="input-group control-group add-more" style="margin-top: 12px;">
                                    <input type="file" name="image[]" class="form-control" id="image">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger remove" type="button">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(e){
        $(".btn-add-more").click(function(){ 
            // alert("added line!"); 
            var html=$(".copy").html(); 
            $('.initial-add-more').after(html); 
        }); 

        $("body").on("click",".remove", function(){ 
            $(this).parents(".control-group").remove()
        }); 
    });     
</script>

<script type="text/javascript">

$(document).ready(function(){    
    $("#form").on('submit', function(e){ 
        e.preventDefault();   

        $.ajax({
            url: '/album', 
            type: "POST", 
            data: new FormData(this),
            contentType: false, 
            cache      : false, 
            processData: false,

            success:function(response){ 
                $('.show').html(response); 
                $("#form")[0].reset();
                $(".errMsg").empty();
            }, 
            error:function(data){ 
                // console.log(data.responseJSON); 
                var error = data.responseJSON; 
                $(".errMsg").empty();
                $.each(error.errors, function(key, value){ 
                    $(".errMsg").append('<p class="text-center text-danger">'+value+'</p>')
                }); 
            }
        }); 
    });
});  
</script>
