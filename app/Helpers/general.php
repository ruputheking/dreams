<?php

if ( ! function_exists('get_option')){
	function get_option($name)
	{
		if (get_auth() == 'student' && $name == 'academic_years') {
			$session = \App\Models\StudentSession::where('student_id', get_student_id())->first();
			return $session->session_id;
		}
        $setting = DB::table('settings')->where('name', $name)->get();
        if ( ! $setting->isEmpty() ) {
            return $setting[0]->value;
        }
        return "";
	}
}

// Frontend Testimonial
if (! function_exists('get_testimonial')) {
	function get_testimonial()
	{
		return \App\Models\Testimonial::orderBy('id', 'desc')->get();
	}
}

// Faculty Member
if (! function_exists('get_faculty_members')) {
	function get_faculty_members()
	{
		return \App\Models\FacultyMember::orderBy('id', 'desc')->get();
	}
}

// News Category
if (! function_exists('get_news_categories')) {
	function get_news_categories()
	{
		return \App\Models\Category::orderBy('id', 'asc')->get();
	}
}

// Recent News
if (! function_exists('get_recent_news')) {
	function get_recent_news()
	{
		return \App\Models\Post::with('author', 'category', 'comments')->published()->latestFirst()->filter(request()->only(['term', 'year', 'month']))->take(3)->get();
	}
}

if (! function_exists('get_latest_news')) {
	function get_latest_news()
	{
		return \App\Models\Post::with('author', 'category', 'comments')->published()->latestFirst()->filter(request()->only(['term', 'year', 'month']))->take(8)->get();
	}
}

// Tag News
if (! function_exists('get_news_tags')) {
	function get_news_tags()
	{
		return \App\Models\Tag::orderBy('id', 'desc')->get();
	}
}

// News Comment
if (! function_exists('get_news_comments')) {
	function get_news_comments($value='')
	{
		return \App\Models\Comment::select('*', 'comments.id as id')->whereNull('comment_id')->where('post_id', $value)->orderBy('id', 'desc')->get();
	}
}

if (! function_exists('get_news_comment')) {
	function get_news_comment($post='', $value='')
	{
		return \App\Models\Comment::where('post_id', $post)->where('comment_id', $value)->orderBy('id', 'asc')->get();
	}
}

// Gallery
if (! function_exists('get_gallery_folder')) {
	function get_gallery_folder()
	{
		return \App\Models\Folder::orderBy('id', 'desc')->get();
	}
}

if (! function_exists('get_galleries')) {
	function get_galleries()
	{
		return \App\Models\Gallery::orderBy('id', 'desc')->get();
	}
}

// Notice Comment
if (! function_exists('get_notice_comments')) {
	function get_notice_comments($value='')
	{
		$comment = \App\Models\NoticeComment::select('*', 'notice_comments.id As id')->where('notice_comments.notice_id', $value)->whereNull('notice_comments.notice_comment_id')->orderBy('notice_comments.id', 'desc')->get();
		return $comment;
	}
}

if (! function_exists('get_notice_comment')) {
	function get_notice_comment($notice = '',$value='')
	{
		$comment = \App\Models\NoticeComment::where('notice_id', $notice)->where('notice_comment_id', $value)->orderBy('id', 'asc')->get();
		return $comment;
	}
}

// Number Format
if ( ! function_exists('decimalPlace'))
{
	function decimalPlace($number){
		return number_format((float)$number);
	}
}

// Course Teacher

if (! function_exists('get_course_comments')) {
	function get_course_comments($value='')
	{
		return \App\Models\CourseComment::select('*' ,'course_comments.id as id')->whereNull('comment_id')->where('course_id', $value)->orderBy('id', 'desc')->get();
	}
}

if (! function_exists('get_course_comment')) {
	function get_course_comment($course = '',$comment='')
	{
		$comment = \App\Models\CourseComment::where('course_id', $course)->where('comment_id', $comment)->orderBy('id', 'asc')->get();
		return $comment;
	}
}

// Backend Global Function
if (! function_exists('get_user_notification')) {
	function get_user_notification()
	{
		return \App\Models\Notification::where('user_id', Auth::user()->id)->where('status', 0)->get();
	}
}

if (! function_exists('get_post_comments')) {
	function get_post_comments($value='')
	{
		$post = \App\Models\Post::where('id', $value)->first();
		return $post;
	}
}

if (! function_exists('get_plugins')) {
	function get_plugins()
	{
		return \App\Models\Plugin::orderBy('id', 'desc')->get();
	}
}

if (! function_exists('get_sliders')) {
	function get_sliders()
	{
		return \App\Models\Slider::orderBy('id', 'desc')->get();
	}
}

if ( ! function_exists('object_to_string')){
	function object_to_string($object,$col,$quote = false)
	{
		$string = "";

		foreach($object as $data){
			if($quote == true){
				$string .="'".$data->$col."', ";
			}else{
				$string .=$data->$col.", ";
			}
		}
		$string = substr_replace($string, "", -2);
		return $string;
	}
}

if ( ! function_exists('get_events')){
	function get_events($limit=5)
	{
		$events = \App\Models\Event::limit($limit)->orderBy("id","desc")->get();
	    return $events;
	}
}

if (! function_exists('get_courses')) {
	function get_courses()
	{
		return \App\Models\Course::orderBy('id', 'desc')->get();
	}
}

if (! function_exists('get_recent_courses')) {
	function get_recent_courses()
	{
		return \App\Models\Course::with('comments')->where('status', 1)->orderBy('id', 'desc')->take(3)->get();
	}
}

if (! function_exists('get_course_categories')) {
	function get_course_categories()
	{
		return \App\Models\CourseCategory::orderBy('id', 'desc')->get();
	}
}

// Academic
if ( ! function_exists('sql_escape')){
	function sql_escape($unsafe_str)
	{
		// if (get_magic_quotes_gpc())
		// {
		// 	$unsafe_str = stripslashes($unsafe_str);
		// }
		return $escaped_str = str_replace("'", "", $unsafe_str);
	}
}

if ( ! function_exists('get_option')){
	function get_option($name)
	{
		$setting = DB::table('settings')->where('name', $name)->get();
		if ( ! $setting->isEmpty() ) {
			return $setting[0]->value;
		}
		return "";

	}
}

if ( ! function_exists('create_option')){
	function create_option($table,$value,$display,$selected="",$where=NULL){
		$options = "";
		$condition = "";
		if($where != NULL){
			$condition .= "WHERE ";
			foreach( $where as $key => $v ){
				$condition.=$key."'".$v."' ";
			}
		}

		$query = DB::select("SELECT $value, $display FROM $table $condition");
		foreach($query as $d){
			if( $selected!="" && $selected == $d->$value ){
				$options.="<option value='".$d->$value."' selected='true'>".ucwords($d->$display)."</option>";
			}else{
				$options.="<option value='".$d->$value."'>".ucwords($d->$display)."</option>";
			}
		}

		echo $options;
	}
}

if ( ! function_exists('get_class_name')){
	function get_class_name($id)
	{
		$class = DB::table('courses')->where('id', $id)->get();
	    if ( ! $class->isEmpty() ) {
		   return $class[0]->title;
		}
		return "";

	}
}

if ( ! function_exists('get_section_name')){
	function get_section_name($id)
	{
		$class = DB::table('sections')->where('id', $id)->get();
	    if ( ! $class->isEmpty() ) {
		   return $class[0]->section_name;
		}
		return "";

	}
}

if ( ! function_exists('get_subject_name')){
	function get_subject_name($id)
	{
		$class = DB::table('subjects')->where('id', $id)->get();
	    if ( ! $class->isEmpty() ) {
		   return $class[0]->subject_name;
		}
		return "";

	}
}

if ( ! function_exists('get_academic_year')){
	function get_academic_year($id = "")
	{
		if($id == ""){
			$id = get_option("academic_years");
		}
		$query = DB::table('academic_years')->where('id', $id)->get();
	    if ( ! $query->isEmpty() ) {
		   return $query[0]->year;
		}
		return "";

	}
}

if ( ! function_exists('get_exam')){
	function get_exam($id)
	{
		$class = DB::table('exams')->where('id', $id)->get();
	    if ( ! $class->isEmpty() ) {
		   return $class[0]->name;
		}
		return "";

	}
}

if ( ! function_exists('get_grade')){
	function get_grade($mark)
	{
		$mark = sql_escape($mark);
		$grade = DB::select("SELECT grade_name FROM grades WHERE $mark BETWEEN marks_from AND marks_to");
	    if ( count($grade) >0 ) {
		   return $grade[0]->grade_name;
		}
		return "N/A";

	}
}

if ( ! function_exists('get_point')){
	function get_point($mark)
	{
		$mark = sql_escape($mark);
		$grade = DB::select("SELECT point FROM grades WHERE $mark BETWEEN marks_from AND marks_to");
	    if ( count($grade) >0 ) {
		   return $grade[0]->point;
		}
		return "N/A";

	}
}

if ( ! function_exists('get_final_grade')){
	function get_final_grade($point)
	{
		$point = sql_escape($point);
		$grade = DB::select("SELECT grade_name FROM grades WHERE $point>point OR $point=point limit 1");
	    if ( count($grade) >0 ) {
		   return $grade[0]->grade_name;
		}
		return "N/A";

	}
}

if ( ! function_exists('get_logo')){
	function get_logo()
	{
		$logo = get_option("logo");
		if($logo ==""){
			return asset("frontend/images/logo.png");
		}
		return asset("frontend/images/$logo");
	}
}

if ( ! function_exists('get_table')){
	function get_table($table,$where=NULL)
	{
		$condition = "";
		if($where != NULL){
			$condition .= "WHERE ";
			foreach( $where as $key => $v ){
				$condition.=$key."'".$v."' ";
			}
		}
		$query = DB::select("SELECT * FROM $table $condition");
		return $query;
	}
}

if ( ! function_exists('get_fee_select'))
{

 function get_fee_selectbox($class="",$fee_id=""){
	$select = "<select name='fee_type[]' class='form-control $class'>";
	$select .="<option value=''>".('Select One')."</option>";

	foreach(get_table("fee_types") as $fee_type){
		$selected = $fee_id==$fee_type->id ? "selected" : "";
		$select .="<option value='".$fee_type->id."' $selected>".$fee_type->fee_type."</option>";
	}
	$select .="</select>";
	return $select;
 }

}

if ( ! function_exists('user_count')){
	function user_count($user_type)
	{
	    if($user_type == 'Guardian')
	    {
	        $count = \App\Models\User::select('users.*', 'users.id as id')
						->join('role_user', 'role_user.user_id', '=', 'users.id')
						->join('roles', 'roles.id', '=', 'role_user.role_id')
						->join('parents', 'parents.user_id', '=', 'users.id')
						->where('parents.status', 0)
						->where("roles.display_name",$user_type)
						->selectRaw("COUNT(users.id) as total")
						->first()->total;
	    }else
	    {
	        $count = \App\Models\User::select('users.*', 'users.id as id')
						->join('role_user', 'role_user.user_id', '=', 'users.id')
						->join('roles', 'roles.id', '=', 'role_user.role_id')
						->where("roles.display_name",$user_type)
						->selectRaw("COUNT(users.id) as total")
						->first()->total;
	    }
		
	    return $count;
	}
}

if ( ! function_exists('count_inbox')){
	function count_inbox()
	{
		$user_id = \Auth::user()->id;
		$inbox = DB::select("SELECT COUNT(id) as c FROM user_messages
		WHERE receiver_id='$user_id' AND user_messages.read='n'");
		return $inbox[0]->c;

	}
}

if ( ! function_exists('get_notices')){
	function get_notices($user_type="Website", $limit=5)
	{
		$notices = \App\Models\Notice::join("user_notices","notices.id","user_notices.notice_id")
		                  ->select('notices.*')
						  ->where("user_notices.user_type",$user_type)
						  ->orderBy("notices.id","desc")
						  ->limit($limit)
						  ->get();
	    return $notices;
	}
}

if ( ! function_exists('inbox_items')){
	function inbox_items($limit = 5)
	{
		$messages = \App\Models\Message::join("user_messages","messages.id","=","user_messages.message_id")
                     ->join("users","messages.sender_id","=","users.id")
					 ->select('messages.*','users.user_name as sender','user_messages.read')
					 ->where("receiver_id",\Auth::user()->id)
					 ->where("read","n")
					 ->limit($limit)
		             ->orderBy("messages.id","DESC")->get();

		 return $messages;
	}
}

if ( ! function_exists('get_teacher_id')){
	function get_teacher_id()
	{
		$user_id = \Auth::user()->id;
		$teacher = DB::select("SELECT id FROM teachers
		WHERE author_id='$user_id'");
		return $teacher[0]->id;
	}
}

if ( ! function_exists('get_student_name')){
	function get_student_name($student_id)
	{
		$student = DB::select("SELECT student_name FROM students
		WHERE id='$student_id'");
		return $student[0]->student_name;
	}
}

if ( ! function_exists('get_student_id')){
	function get_student_id()
	{
		$user_id = \Auth::user()->id;
		$student = DB::select("SELECT id FROM students
		WHERE author_id='$user_id'");
		return $student[0]->id;

	}
}

if ( ! function_exists('get_parent_id')){
	function get_parent_id()
	{
		$user_id = \Auth::user()->id;
		$parent = DB::select("SELECT id FROM parents
		WHERE user_id='$user_id'");
		return $parent[0]->id;
	}
}

if(! function_exists('get_children')){
	function get_children($menu_name, $link, $icon){
		$parent_id = App\Models\ParentModel::where('user_id', Auth::User()->id)->first()->id;
		$students = App\Models\Student::where('parent_id',$parent_id)->get();
		$student = App\Models\Student::where('parent_id',$parent_id)->first();
		if(count($students) == 1){
			$active = '';
			if(Request::is($link.'/*')){
				$active = 'class="active"';
			}
			return "<li ".$active.">
						<a href='".URL::to('/').'/'.$link.'/'.$student->id."'>
							<i class='".$icon."'></i>
							".$menu_name."
						</a>
					</li>";
		}else{
			$return = '<li><a href="#"><i class="'.$icon.'"></i>'.$menu_name.'</a><ul>';
			foreach ($students AS $student){
				$active = '';
				if(Request::is($link.'/'.$student->id)){
					$active = 'class="active"';
				}
				$return .= "<li ".$active.">
								<a href='".URL::to('/').'/'.$link.'/'.$student->id."'>
									".$student->student_name."
								</a>
							</li>";
			}
			$return .='</ul><li>';

			return $return;
		}
		return '';
	}
}

if (! function_exists('get_assigned_count') ) {
	function get_assigned_count($assignments)
	{
		$assignment = \App\Models\AssignStudent::where('topic_id', $assignments)->count();
		return $assignment;
	}
}

if (! function_exists('get_auth')) {
	function get_auth()
	{
		if (Auth::user()) {
			return Auth::user()->roles()->first()->name;
		}
	}
}

if ( ! function_exists('create_timezone_option'))
{

 function create_timezone_option($old="") {
  $option = "";
  $timestamp = time();
  foreach(timezone_identifiers_list() as $key => $zone) {
    date_default_timezone_set($zone);
	$selected = $old == $zone ? "selected" : "";
	$option .= '<option value="'. $zone .'"'.$selected.'>'. 'GMT ' . date('P', $timestamp) .' '.$zone.'</option>';
  }
  echo $option;
}

}
