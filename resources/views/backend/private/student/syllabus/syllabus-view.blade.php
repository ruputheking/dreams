<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped table-bordered" width="100%">
			<tbody>
				<tr>
					<td>Title</td>
					<td>{{$syllabus->title}}</td>
				</tr>
				<tr>
					<td>Description</td>
					<td class="details-td">{!! $syllabus->description !!}</td>
				</tr>
				<tr>
					<td>Class</td>
					<td>{{$syllabus->class_name}}</td>
				</tr>
				<tr>
					<td>File</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{ asset('frontend/images/syllabus/'.$syllabus->file) }}" download>Click to Download</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>