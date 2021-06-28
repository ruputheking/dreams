@role (['student'])
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-warning text-center">
                            <i class="ti-credit-card"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Total Paid</p>
                            {{ get_option('currency_symbol')." ". decimalPlace($total_paid) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-center">
                            <i class="ti-wallet"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Paid Invoice</p>
                            {{ $paid_invoice }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-info text-center">
                            <i class="ti-wallet"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Unpaid Invoice</p>
                            {{ $unpaid_invoice }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <a href="{{ url('dashboard/message/inbox') }}">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-email"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>{{ ('Unread Inbox') }}</p>
                                {{ count_inbox() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-center">Notice</h4>
            </div>
            <div class="content no-export">
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Notice</th>
                        <th>Created</th>
                        <th class="text-center">View</th>
                    </thead>
                    <tbody>
                        @foreach(get_notices("Student",100) as $notice)
                        <tr>
                            <td>{{ $notice->heading }}</td>
                            <td>{{ date("d M, Y - H:i", strtotime($notice->created_at)) }}</td>
                            <td class="text-center"><a href="{{ route('notices.show', $notice->id) }}" data-title="View Notice" class="btn btn-primary btn-sm ajax-modal">View Notice</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endrole