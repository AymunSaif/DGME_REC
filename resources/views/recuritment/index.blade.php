@extends('layouts.dashboard')
@section('content')
<<<<<<< HEAD
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bootstrap-table">
                    <div class="card-body table-full-width">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <th data-field="state" data-checkbox="true" style="text-align:center;"></th>
                                <th data-field="id" class="text-center" style="text-align:center;">Sr.#</th>
                                <th data-field="Diary_Num" data-sortable="true" style="text-align:center;" >Diary Number</th>
                                <th data-field="Applicant_Name" data-sortable="true" style="text-align:center;">Applicant Name</th>
                                <th data-field="CNIC" data-sortable="true" style="text-align:center;">CNIC</th>
                                <th data-field="Gender" data-sortable="true" style="text-align:center;">Gender</th>
                                {{-- <th data-field="Date_Of_Birth" >Date Of Birth</th> --}}
                                <th data-field="Position_Applied" style="text-align:center;">Position Applied</th>
                                <th data-field="Entered_By" data-sortable="true" style="text-align:center;" >Entered By</th>
                                <th style="text-align:center;" data-field="actions" class="td-actions text-right"  data-formatter="operateFormatter"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                    $i=1;
                                    // $i = $persons->perPage() * ($persons->lastPage() - 1)+1;
                                  @endphp
                                  @foreach ($persons as $person)
                                  <tr>
                                    <td></td>
                                      <td><?php print_r($i++); ?></td>
                                      <td>{{$person->diary_num }}</td>
                                      <td>
                                      <a href="{{route('job_form.show',$person->id)}}">{{$person->name}}</a>
                                      </td>
                                      <td>{{$person->cnic}}</td>
                                      <td>{{$person->gender}}</td>
                                      {{-- <td>{{$person->dob}}</td> --}}
                                      <td>
                                          <ol>
                                          @foreach ($person->ApplicantAppliedFor as $pa)
                                          <li><b style="color:red;"> {{$pa->position_name}} </b> <br></li>
                                          @endforeach
                                          </ol>
                                      </td>
                                      <td>{{$person->User->name}}</td>
                              
                                    <td></td>
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
@endsection
@section('scripttags')
<script type="text/javascript">
  var $table = $('#bootstrap-table');

  function operateFormatter(value, row, index) {
      return [
          // '<a rel="tooltip" title="View" class="btn btn-link btn-info table-action view" href="javascript:void(0)">',
          // '<i class="fa fa-image"></i>',
          // '</a>',
          // '<a rel="tooltip" title="Edit" class="btn btn-link btn-warning table-action edit" href="javascript:void(0)">',
          // '<i class="fa fa-edit"></i>',
          // '</a>',
          // '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
          // '<i class="fa fa-remove"></i>',
          // '</a>'
      ].join('');
  }

  $().ready(function() {
      window.operateEvents = {
          'click .view': function(e, value, row, index) {
              info = JSON.stringify(row);

              swal('You click view icon, row: ', info);
              console.log(info);
          },
          'click .edit': function(e, value, row, index) {
              info = JSON.stringify(row);

              swal('You click edit icon, row: ', info);
              console.log(info);
          },
          'click .remove': function(e, value, row, index) {
              console.log(row);
              $table.bootstrapTable('remove', {
                  field: 'id',
                  values: [row.id]
              });
          }
      };

      $table.bootstrapTable({
          toolbar: ".toolbar",
          clickToSelect: true,
          showRefresh: true,
          search: true,
          showToggle: true,
          showColumns: true,
          pagination: true,
          searchAlign: 'left',
          pageSize: 8,
          clickToSelect: false,
          pageList: [8, 10, 25, 50, 100],

          formatShowingRows: function(pageFrom, pageTo, totalRows) {
              //do nothing here, we don't want to show the text "showing x of y from..."
          },
          formatRecordsPerPage: function(pageNumber) {
              return pageNumber + " rows visible";
          },
          icons: {
              refresh: 'fa fa-refresh',
              toggle: 'fa fa-th-list',
              columns: 'fa fa-columns',
              detailOpen: 'fa fa-plus-circle',
              detailClose: 'fa fa-minus-circle'
          }
      });

      //activate the tooltips after the data table is initialized
      $('[rel="tooltip"]').tooltip();

      $(window).resize(function() {
          $table.bootstrapTable('resetView');
      });


  });
</script>
    
@endsection
=======
<div class="row container-fluid" >
    <h1 style="margin-top:15px; margin-bottom:20px;text-align:center; color:black !important;"><b>VIEW RECURITMENTS</b></h1>


    <table class="table table-bordered" style="color:black !important;">
        <tr>
          <th>Sr.#</th>
          <th>Diary Number</th>
            <th>Applicant Name</th>
            <th>CNIC</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Position Applied</th>
            <th>Entered By</th>
        </tr>
        @php
          // $i=1;
          $i = $persons->perPage() * ($persons->currentPage() - 1)+1;
        @endphp
        @foreach ($persons as $person)
        <tr>
            <td><?php print_r($i++); ?></td>
            <td>{{ $person->diary_num }}</td>
            <td>
            <a href="{{route('job_form.show',$person->id)}}">{{$person->name}}</a>
            </td>
            <td>{{$person->cnic}}</td>
            <td>{{$person->gender}}</td>
            <td>{{$person->dob}}</td>
            <td>
                <ol>
                @foreach ($person->ApplicantAppliedFor as $pa)
                <li><b style="color:red;"> {{$pa->position_name}} </b> <br></li>
                @endforeach
                </ol>
        </td>
        <td>{{ $person->User->name }}</td>

        </tr>
        @endforeach
    </table>
 <span class="pull-right">{{$persons->links()}}</span>

</div>
@endsection
>>>>>>> eb80e78341fea4decb54e05ed1ddf337bbb9668d
