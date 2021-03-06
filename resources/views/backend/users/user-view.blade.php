@extends('layouts.backend.main')

@section('styles')
<style media="screen">
	.card {
		border-radius: 6px;
		box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
		background-color: #FFFFFF;
		color: #252422;
		margin-bottom: 20px;
		padding: 10px;
		position: relative;
		z-index: 1;
	}

	.card .image {
		width: 100%;
		overflow: hidden;
		height: 260px;
		border-radius: 6px 6px 0 0;
		position: relative;
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}

	.card .image img {
		width: 100%;
	}

	.card .content {
		padding: 15px 15px 10px 15px;
	}

	.card .header {
		padding: 10px;
		margin-bottom: 20px;
	}

	.card .description {
		font-size: 16px;
		color: #66615b;
	}

	.card h6 {
		font-size: 12px;
		margin: 0;
	}

	.card .category,
	.card label {
		font-size: 14px;
		font-weight: 400;
		color: #9A9A9A;
		margin-bottom: 0px;
	}

	.card .category i,
	.card label i {
		font-size: 16px;
	}

	.card label {
		font-size: 15px;
		margin-bottom: 5px;
	}

	.card .title {
		margin: 0;
		color: #252422;
		font-weight: 300;
	}

	.card .avatar {
		width: 50px;
		height: 50px;
		overflow: hidden;
		border-radius: 50%;
		margin-right: 5px;
	}

	.card .footer {
		padding: 0;
		line-height: 30px;
	}

	.card .footer .legend {
		padding: 5px 0;
	}

	.card .footer hr {
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.card .stats {
		color: #a9a9a9;
		font-weight: 300;
	}

	.card .stats i {
		margin-right: 2px;
		min-width: 15px;
		display: inline-block;
	}

	.card .footer div {
		display: inline-block;
	}

	.card .author {
		font-size: 12px;
		font-weight: 600;
		text-transform: uppercase;
	}

	.card .author i {
		font-size: 14px;
	}

	.card.card-separator:after {
		height: 100%;
		right: -15px;
		top: 0;
		width: 1px;
		background-color: #DDDDDD;
		content: "";
		position: absolute;
	}

	.card .ct-chart {
		margin: 30px 0 30px;
		height: 245px;
	}

	.card .table tbody td:first-child,
	.card .table thead th:first-child {
		padding-left: 15px;
	}

	.card .table tbody td:last-child,
	.card .table thead th:last-child {
		padding-right: 15px;
	}

	.card .alert {
		border-radius: 4px;
		position: relative;
	}

	.card .alert.alert-with-icon {
		padding-left: 65px;
	}

	.card .icon-big {
		font-size: 3em;
		min-height: 64px;
	}

	.card .numbers {
		font-size: 1.5em;
		text-align: right;
	}

	.card .numbers p {
		margin: 0;
	}

	.card ul.team-members li {
		padding: 10px 0px;
	}

	.card ul.team-members li:not(:last-child) {
		border-bottom: 1px solid #F1EAE0;
	}

	.card-user .image {
		border-radius: 8px 8px 0 0;
		height: 150px;
		position: relative;
		overflow: hidden;
	}

	.card-user .image img {
		width: 100%;
	}

	.card-user .image-plain {
		height: 0;
		margin-top: 110px;
	}

	.card-user .author {
		text-align: center;
		text-transform: none;
		margin-top: -65px;
	}

	.card-user .author .title {
		color: #403D39;
	}

	.card-user .author .title small {
		color: #ccc5b9;
	}

	.card-user .avatar {
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: relative;
		margin-bottom: 15px;
	}

	.card-user .avatar.border-white {
		border: 5px solid #FFFFFF;
	}

	.card-user .avatar.border-gray {
		border: 5px solid #ccc5b9;
	}

	.card-user .title {
		font-weight: 600;
		line-height: 24px;
	}

	.card-user .description {
		margin-top: 10px;
	}

	/*.card-user .content {
  min-height: 200px; }*/
	.card-user.card-plain .avatar {
		height: 190px;
		width: 190px;
	}

	.card-map .map {
		height: 500px;
		padding-top: 20px;
	}

	.card-map .map>div {
		height: 100%;
	}

	.card-user .footer,
	.card-price .footer {
		padding: 5px 15px 10px;
	}

	.card-user hr,
	.card-price hr {
		margin: 5px 15px;
	}

	.card-plain {
		background-color: transparent;
		box-shadow: none;
		border-radius: 0;
	}

	.card-plain .image {
		border-radius: 4px;
	}

	.social-link {
		text-align: center;
		list-style: none;
		overflow: hidden;
		font-size: 24px;
		padding: 0px;
		margin: 0px;
	}

	.social-link a {
		color: black;
	}

	.social-link a:hover {
		color: #3c8dbc;
	}

	.social-link li {
		display: inline;
		margin: 5px;
	}

	.table>tbody>tr {
		position: relative;
	}
</style>
@endsection

@section('header')
<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">User List</a></li>
<li class="active">User Profile</li>
@endsection

@section('content')
<div class="col-md-12">
	<div class="card card-user">
		<div class="image">
			<img src="{{ asset('frontend/images') }}/background.jpg" alt="..." />
		</div>
		<div class="content">
			<div class="author">
				@if ($user->photo)
				<img class="avatar border-white" src="{{ asset('frontend/images/'.$user->photo ?? 'profile.png') }}" alt="..." />
				@else
				<img class="avatar border-white" src="{{ asset('frontend/images/profile.png') }}" alt="..." />
				@endif
				<h4 class="title">{{$user->user_name}}<br />
					<small>{{$user->user_type}}</small>
				</h4>
			</div>
			<p class="description text-center">
				Name: {{ $user->email }}</br>
				Email: {{ $user->phone }}</br>
			</p>
		</div>
		<hr>
	</div>
</div>
@endsection