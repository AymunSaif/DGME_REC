@extends('layouts.dashboard')
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
                                        <th>CNIC</th>
                                        <th>Gender</th>
                                        <th>Position Applied</th>
                                        <th>Entered By</th>
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
                                        <td><a href="{{route('job_form.show',$person->id)}}">{{$person->name}}</a></td>
                                        <td>{{$person->cnic}}</td>
                                        <td>{{$person->gender}}</td>
                                        <td>
                                            <ol>
                                                @foreach ($person->ApplicantAppliedFor as $pa)
                                                <li><b style="color:red;"> {{$pa->position_name}} </b> <br></li>
                                                @endforeach
                                                </ol>
                                            </td>
                                            <td>{{$person->User->name}}</td>

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

@endsection
@section('scripttags')
<script type="text/javascript">
    $(document).ready(function() {
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
