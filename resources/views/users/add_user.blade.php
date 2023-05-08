@extends('layout.master')
@section('content')
<div class="page-content-wrapper">
	<!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $title }}</div>
            <div class="ps-3">
              	<nav aria-label="breadcrumb">
	                <ol class="breadcrumb mb-0 p-0 align-items-center">
	                  	<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><ion-icon name="home-outline"></ion-icon></a>
	                  	</li>
	                  	<li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a>
	                  	</li>
	                  	<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
	                </ol>
              	</nav>
            </div>
        </div>
      	<!--end breadcrumb-->
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ $title }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('store_user') }}" method="post">
					@csrf
					<div class="row g-3 mt-3">
						<div class="col-md-6">
							<label class="form-label" for="name">Name</label>
							<input type="text" class="form-control" name="name">
							@if ($errors->has('name'))
							    <li class="list-group-item text-danger">{{ $errors->first('name') }}</li>
							@endif
						</div>
						<div class="col-md-6">
							<label class="form-label" for="email">Email</label>
							<input type="email" class="form-control" name="email">
							@if ($errors->has('email'))
							    <li class="list-group-item text-danger">{{ $errors->first('email') }}</li>
							@endif
						</div>
					</div>
					<div class="row g-3 mt-3">
						<div class="col-md-6">
							<label class="form-label" for="type_id">User Type</label>
							<select class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" name="type_id">
			                	@foreach($userTypes as $userType)
			                	<option value="{{ $userType->id }}">{{ ucfirst($userType->type) }}</option>
			                	@endforeach
			              	</select>
			              	@if ($errors->has('type_id'))
							    <li class="list-group-item text-danger">{{ $errors->first('type_id') }}</li>
							@endif
						</div>
						<div class="col-md-6">
							<label class="form-label" for="designation">Designation</label>
							<input type="text" class="form-control" name="designation">
							@if ($errors->has('designation'))
							    <li class="list-group-item text-danger">{{ $errors->first('designation') }}</li>
							@endif
						</div>
					</div>
					<div class="row g-3 mt-3">
						<div class="col-md-6">
	                        <label class="form-label" for="start_time">Shift Start</label>
	                        <input type="text" class="form-control timepicker" name="start_time">
	                        @if ($errors->has('start_time'))
							    <li class="list-group-item text-danger">{{ $errors->first('start_time') }}</li>
							@endif
	                    </div>
						<div class="col-md-6">
	                        <label class="form-label" for="end_time">Shift end</label>
	                        <input type="text" class="form-control timepicker" name="end_time">
	                        @if ($errors->has('end_time'))
							    <li class="list-group-item text-danger">{{ $errors->first('end_time') }}</li>
							@endif
	                    </div>
					</div>
			</div>
			<div class="card-footer">
					<button type="submit" class="btn btn-primary">Add User</button>
					<a href="{{ route('users') }}" class="btn btn-danger">Cancel</a>
				</form>
			</div>
		</div>
    </div>
    <!-- end page content-->
</div>
@endsection