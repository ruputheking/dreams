<div class="panel panel-default">
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