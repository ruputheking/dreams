@extends('layouts.admin')

@section('header')
View Picklist
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">View Picklist</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Type</td>
                        <td>{{ $picklist->type }}</td>
                    </tr>
                    <tr>
                        <td>Value</td>
                        <td>{{ $picklist->value }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection