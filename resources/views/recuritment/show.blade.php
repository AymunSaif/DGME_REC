@extends('layouts.dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">   
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Summary Form</h4>
                    </div>
                    <div class="card-body ">
                        <form method="get" action="/" class="form-horizontal">
                            <div class="row">
                                <label class="col-sm-2 control-label">Custom Checkboxes &amp; radios</label>
                                <div class="col-sm-4 col-sm-offset-1 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox">
                                            <span class="form-check-sign"></span>
                                            Unchecked
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <span class="form-check-sign"></span>
                                            Checked
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <span class="form-check-sign"></span>
                                            Disabled Unchecked
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <span class="form-check-sign"></span>
                                            Disabled Checked
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5 checkbox-radios">
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios1" value="option1">
                                            <span class="form-check-sign"></span>
                                            Radio is off
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios2" value="option2" checked>
                                            <span class="form-check-sign"></span>
                                            Radio is on
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadio1" id="exampleRadios1" value="option1" disabled>
                                            <span class="form-check-sign"></span>
                                            Radio disabled is off
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadio1" id="exampleRadios2" value="option2" checked disabled>
                                            <span class="form-check-sign"></span>
                                            Radio disabled is on
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <label class="col-sm-2 control-label">Input with success</label>
                                <div class="col-sm-10">
                                    <div class="form-group has-success">
                                        <input type="text" class="form-control" value="Success">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Input with error</label>
                                <div class="col-sm-10">
                                    <div class="form-group has-error">
                                        <input type="text" class="form-control" value="Error">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Column sizing</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder=".col-md-3">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder=".col-md-4">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder=".col-md-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection