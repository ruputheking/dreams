@extends('layouts.backend.main')

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="active">Transaction Request</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default no-export">
            <div class="panel-heading">
                <span class="panel-title">All Requests</span>
            </div>

            <div class="panel-body">
                <div class="content-block box">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Title</th>
                                    <th>Sent By</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $transaction->title }}</td>
                                    <td>{{ $transaction->user_name }}</td>
                                    <td>Rs {{ $transaction->amount }}</td>
                                    <td>
                                        @if ($transaction->status == 0)
                                        <label class="label label-warning">Pending</label>
                                        @endif
                                        @if ($transaction->status == 1)
                                        <label class="label label-danger">Rejected</label>
                                        @endif
                                        @if ($transaction->status == 2)
                                        <label class="label label-success">Verified</label>
                                        @endif

                                    </td>
                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{route('transaction_requests.destroy', $transaction->id)}}" method="post">
                                            <a href="/frontend/images/{{ $transaction->document }}" class="btn btn-secondary btn-xs"><i class="fa fa-file"></i> View File</a>
                                            <a href="{{route('invoices.show', $transaction->invoice_id)}}" data-title="View Invoice" class="btn btn-primary btn-xs ajax-modal"><i class="fa fa-eye"></i> View Invoice</a>
                                            <a href="{{route('transaction_requests.edit', $transaction->id)}}" data-title="Edit Request" class="btn btn-warning btn-xs ajax-modal"><i class="fa fa-edit"></i> Verify</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
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