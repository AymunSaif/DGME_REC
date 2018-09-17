@extends('layouts.dashboard')
@section('content')
<div class="content" style="background-color:white;">
    <div class="container-fluid">
        <div class="container-fluid" style="margin-top:100px;">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form class="" action="{{route('storeCnic')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="card card-wizard">
                            <div class="card-header">
                            <h3 class="card-title text-center" style="color:black; font-weight:bold; " >HIRING FORM</h3>
                            </div>
                            <div class="card-body ">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 ">
                                                <div class="form-group">
                                                    <label class="control-label" style="color:grey; font-weight:bold; font-size:14px; " >Enter Cnic</label>
                                                    <input autocompleteoff type="text" id="cnic" maxlength="15" name="person_cnic" placeholder="xxxxx-xxxxxxx-x" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-info btn-wd" id="basic_info">Next</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
