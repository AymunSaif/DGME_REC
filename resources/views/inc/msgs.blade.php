
@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endforeach
@endif
@if(session('success'))
<div class="alert alert-success" style="background-color:yellowgreen; color:white;">
    {{session('success')}}
</div>  
@endif

@if(session('error'))
<div class="alert alert-danger">    
    {{session('error')}}
</div>  
@endif
