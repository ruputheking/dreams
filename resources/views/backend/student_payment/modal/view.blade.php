<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>{{ ('Invoice Id') }}</td>
                <td>{{ $studentpayment->invoice_id }}</td>
            </tr>
            <tr>
                <td>{{ ('Date') }}</td>
                <td>{{ date('d-M-Y', strtotime($studentpayment->date)) }}</td>
            </tr>
            <tr>
                <td>{{ ('Amount') }}</td>
                <td>{{ get_option('currency_symbol')." ".$studentpayment->amount }}</td>
            </tr>
            <tr>
                <td>{{ ('Note') }}</td>
                <td>{{ $studentpayment->note }}</td>
            </tr>
        </table>
    </div>
</div>