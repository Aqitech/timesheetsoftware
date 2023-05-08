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
	                  	<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
	                </ol>
              	</nav>
            </div>
        </div>
        <div class="card">
        	<div class="card-header">
        		<h6 class="mb-0">{{ $title }}</h6>
        	</div>
        	<form action="{{ route('store_new_password') }}" method="post">
        	@csrf
	        	<div class="card-body">
	        		<div class="row g-3 mt-3">
	        			<div class="col-md-12">
							<label class="form-label" for="current_password">Current Password</label>
							<input type="password" class="form-control" name="current_password" id="current_password">
							<span id="check_current_password"></span>
						</div>
						<div class="col-md-12">
							<label class="form-label" for="new_password">New Password</label>
							<input type="password" class="form-control" name="new_password">
							@if ($errors->has('new_password'))
							    <li class="list-group-item text-danger">{{ $errors->first('new_password') }}</li>
							@endif
						</div>
						<div class="col-md-12">
							<label class="form-label" for="new_confirm_password">Confirm new Password</label>
							<input type="password" class="form-control" name="new_confirm_password">
							@if ($errors->has('new_confirm_password'))
							    <li class="list-group-item text-danger">{{ $errors->first('new_confirm_password') }}</li>
							@endif
						</div>
	        		</div>
	        	</div>
	        	<div class="card-footer">
	        		<button type="submit" class="btn btn-primary">Change Password</button>
	        		<a href="{{ route('dashboard') }}" class="btn btn-danger">Dashboard</a>
	        	</div>
        	</form>
        </div>
    </div>
    <!-- end page content-->
</div>
@endsection
@section('page-script')
<script>
	$(document).on('keyup','#current_password',function() {
	    let current_password = $("#current_password").val();
	    $.ajax({
	        url:'checkCurrentPassword',
	        type:'GET',
	        data:{current_password:current_password},

	        success:function(response){
	            if (response.status == 404) {
	                $("#check_current_password").html("<em><font color=red> Current Password is incorrect </font></em>");
	            }else{
	                $("#check_current_password").html("<em><font color=green> Current Password is correct </font></em>");
	            }
	        }
	    });
	});
</script>
@endsection