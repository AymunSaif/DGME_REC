@extends('layouts.app')
@section('content')
<form class="" action="{{route('storeCnic')}}" method="POST">
  {{ csrf_field() }}
  <section id="cnicSection" >
      <div class="col-md-3"></div>
      <div class="col-md-6" style="margin-top:20%;">
          <div class="form-group">
              <b style="font-size:20px;">Enter CNIC Number
                  <span style="color:red;font-size:12px;"> (required)</span>
              </b>
              <br>
              <input autocompleteoff type="text" id="cnic" maxlength="15" name="person_cnic" placeholder="xxxxx-xxxxxxx-x" class="form-control" required>
          </div>
      </div>
      <div class="col-md-3"></div>
      <button type="submit" class="btn btn-sm btn-success " style=" margin-left: 43%;width: 200px;font-size:1.5em;"id="basic_info">Next</button>
  </section>
</form>
@endsection
@section('scriptTags')
<script type="text/javascript">
    $('#cnic').keydown(function () {
     //allow  backspace, tab, ctrl+A, escape, carriage return
     if (event.keyCode == 8 || event.keyCode == 9 ||
         event.keyCode == 27 || event.keyCode == 13 ||
         (event.keyCode == 65 && event.ctrlKey === true))
         return;
     // if ((event.keyCode < 48 || event.keyCode > 57))
     //     event.preventDefault();

     var length = $(this).val().length;

     if (length == 5 || length == 13)
         $(this).val($(this).val() + '-');
 });

</script>
@endsection
