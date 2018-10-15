@extends('layouts.dashboard')
@section('styletags')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
{{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">
                    <div class="card-body table-striped table-no-bordered table-hover dtr-inline table-full-width">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div >
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.#</th>
                                        <th>Diary Number</th>
                                        <th>Applicant Name</th>
                                        <th>Father Name</th>
                                        <th>CNIC</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Position Applied</th>
                                        <th>Entered By</th>
                                        {{-- <td>Action</td> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                        $i=1;
                                      @endphp
                                      @foreach ($persons as $person)
                                    <tr>
                                        <td><?php print_r($i++); ?></td>
                                        <td>{{$person->diary_num }}</td>
                                        <td><a href="{{route('EditDMC',$person->id)}}">{{$person->name}}</a></td>
                                        <td>{{$person->ApplicantDetail->father_name}}</td>
                                        <td>{{$person->cnic}}</td>
                                        <td>{{$person->email}}</td>
                                        <td>{{$person->ApplicantDetail->cell_num}}</td>
                                        <td>
                                            <ol>
                                                @foreach ($person->ApplicantAppliedFor as $pa)
                                                <li><b style="color:red;"> {{$pa->position_name}} </b> <br></li>
                                                @endforeach
                                                </ol>
                                        </td>
                                        <td>{{$person->User->name}}</td>
                                        {{-- <td><button type="button"  class="btn btn-default modalopen" data-id="{{$person->id}}" data-toggle="modal" data-target="#myModal">Add DMC</button></td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit DMC</h4>
      </div>
      <div class="modal-body">
        <form class="" action="{{route('addDmc')}}" method="post">
          {{ csrf_field() }}
        <input type="hidden" id="person_id" name="person_id" value="">
        <input type="hidden" id="highersubject_id" name="highersubject_id" value="">
        <select class="form-control" name="qualification_type">
          <option value="">Select Qualification</option>
          <option value="bachelor4year">Bachelor 4 Years</option>
          <option value="post_grad">Post Graduate</option>
          <option value="phd">PhD</option>
          <option value="post_doc">Post Doc</option>
        </select>
        <select class="form-control selectpicker"  data-live-search="true" name="highersubject_id">
          <option value="">Select Subject</option>
          @foreach ($subjects as $subject)
            <option value="{{$subject->id}}">{{$subject->subject_name}} - {{$subject->type}}</option>
          @endforeach
        </select>
        <p><input type="date" name="final_dmc_date" class="form-control"></p>
        <p class="pull-right">
          <button type="submit" class="btn btn-sm btn-success">Update</button>
        </p>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('scripttags')
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('.selectpicker').selectpicker();
      $(document).on("click", ".modalopen", function () {
        var person_id = $(this).data('id');
        $("#person_id").val( person_id );
        // As pointed out in comments,
        // it is superfl2uous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
      });

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            if ($tr.hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });
    });
</script>
@endsection
