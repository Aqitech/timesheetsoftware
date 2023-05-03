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
        		<h6 class="mb-0">{{ ucfirst(Auth::User()->name) }}'s Profile</h6>
        	</div>
        	<div class="card-body">
        		<div class="row g-3 mt-3">
        			<div class="col-md-6">
						<label class="form-label" for="name">Name</label>
						<input type="text" class="form-control" readonly value="{{ ucfirst(Auth::User()->name) }}">
					</div>
					<div class="col-md-6">
						<label class="form-label" for="name">Email</label>
						<input type="email" class="form-control" readonly value="{{ Auth::User()->email }}">
					</div>
        		</div>
        		<div class="row g-3 mt-3">
        			<div class="col-md-6">
						<label class="form-label" for="name">User Type</label>
						<input type="text" class="form-control" readonly value="{{ ucfirst(Auth::User()->type->type) }}">
					</div>
					<div class="col-md-6">
						<label class="form-label" for="name">Designation</label>
						<input type="text" class="form-control" readonly value="{{ Auth::User()->designation }}">
					</div>
        		</div>
        		<div class="row g-3 mt-3">
        			<div class="col-md-6">
						<label class="form-label" for="name">Start Time</label>
						<input type="text" class="form-control" readonly value="{{ Auth::User()->start_time }}">
					</div>
					<div class="col-md-6">
						<label class="form-label" for="name">End Time</label>
						<input type="text" class="form-control" readonly value="{{ Auth::User()->end_time }}">
					</div>
        		</div>
        	</div>
        	<div class="card-footer">
        		<a href="{{ route('dashboard') }}" class="btn btn-danger">Dashboard</a>
        	</div>
        </div>
    </div>
    <!-- end page content-->
</div>
@endsection