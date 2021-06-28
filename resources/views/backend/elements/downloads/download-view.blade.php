@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('downloads.index') }}">Document List</a></li>
<li class="active">View Document</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">View Document</span>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Document Name</td>
                        <td>{{ $download->document_name }}</td>
                    </tr>
                    <tr>
                        <td>Document</td>
                        <td>
                            <a href="/frontend/images/{{ $download->document_file }}" class="btn btn-primary btn-xs" download><i class="fa fa-download"></i> Download</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection