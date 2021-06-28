<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>Trans Date</td>
                <td>{{ date("d-M-Y", strtotime($transaction->trans_date) ) }}</td>
            </tr>
            <tr>
                <td>Account</td>
                <td>{{ $transaction->account_name }}</td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>{{ $transaction->amount }}</td>
            </tr>
            <tr>
                <td>Expense Type</td>
                <td>{{ $transaction->c_type }}</td>
            </tr>
            <tr>
                <td>Payer</td>
                <td>{{ $transaction->payee_payer }}</td>
            </tr>
            <tr>
                <td>Payment Method</td>
                <td>{{ $transaction->payment_method }}</td>
            </tr>
            <tr>
                <td>Reference</td>
                <td>{{ $transaction->reference }}</td>
            </tr>
            <tr>
                <td>Attachment</td>
                <td>
                    @if($transaction->attachment != "")
                        <a href="{{ asset('frontend/images/transactions/'.$transaction->attachment) }}" target="_blank" class="btn btn-primary">View Attachment</a>
                        @else
                        <label class="label label-warning">
                            <strong>No Atachment Available !</strong>
                        </label>
                        @endif
                </td>
            </tr>
            <tr>
                <td>Note</td>
                <td>{{ $transaction->note }}</td>
            </tr>
        </table>
    </div>
</div>