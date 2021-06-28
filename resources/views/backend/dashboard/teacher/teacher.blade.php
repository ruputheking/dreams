@role('teacher')
<div class="row">
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-warning text-center">
                            <i class="ti-user"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>{{ ('Total Student') }}</p>
                            {{ $total_student }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-center">
                            <i class="ti-ruler-pencil"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>{{ ('My Subject') }}</p>
                            {{ $my_subject_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6">
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
                <table id="example1" class="table table-bordered">
                    <thead>
                        <th>Notice</th>
                        <th>Created</th>
                        <th class="text-center">View</th>
                    </thead>
                    <tbody>
                        @foreach(get_notices("Teacher",100) as $notice)
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