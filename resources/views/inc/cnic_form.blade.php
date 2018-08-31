
<form id="form" action="{{route('job_form.store')}}" name="form" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
        <h1  style="font-size: 50px; text-align:Center;font-weight:bold;">Hiring Form </h1>

    <div class="col-md-3"></div>
    <div class="col-md-6" style="margin-top:10%;">
        <div class="form-group ">
                <b style="font-size:20px;">Enter CNIC Number <span style="color:red;font-size:12px;">   (required)</span> </b></br>
                <input type="text" id="cnic" maxlength="15" name="cnic" placeholder="xxxxx-xxxxxxx-x" class="form-control" required>
                
            </div>
        </div>
    <div class="col-md-3"></div>
    <button type="submit" class="btn btn-sm btn-success " style=" margin-left: 43%;
            width: 200px;font-size:1.5em;" id="basic_info"> Next</button>  
 
</form>


