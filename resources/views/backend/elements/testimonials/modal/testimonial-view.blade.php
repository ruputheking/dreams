<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td colspan="2" class="text-center"><img src="/frontend/images/{{ $testimonial->photo }}" width="100" height="100" /></td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>{{ $testimonial->name }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $testimonial->description }}</td>
            </tr>
        </table>
    </div>
</div>