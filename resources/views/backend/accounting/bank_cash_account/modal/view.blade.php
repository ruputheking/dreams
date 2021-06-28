<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td>Account Name</td>
                <td>{{ $account->account_name }}</td>
            </tr>
            <tr>
                <td>Opening Balance</td>
                <td>{{ get_option('currency_symbol')." ".$account->opening_balance }}</td>
            </tr>
            <tr>
                <td>Note</td>
                <td>{{ $account->note }}</td>
            </tr>
        </table>
    </div>
</div>