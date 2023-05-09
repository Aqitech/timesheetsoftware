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
            <div class="ms-auto">
              	<a href="{{ route('add_user') }}" class="btn btn-primary">Add User</a>
            </div>
          	</div>
          	<!--end breadcrumb-->
          	<h6 class="mb-0 text-uppercase">All {{ $title }}</h6>
				<hr/>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="userTable" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>User Type</th>
									<th>Name</th>
									<th>Designation</th>
									<th>Shift Start</th>
									<th>Shift End</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{ ucfirst($user->type->type) }}</td>
									<td>{{ ucfirst($user->name) }}</td>
									<td>{{ ucfirst($user->designation) }}</td>
									<td>{{ $user->start_time }}</td>
									<td>{{ $user->end_time }}</td>
									<td>
										@if($user->status == 'A')
										@php 
											$class1 = 'btn btn-success';
											$class2 = 'lni lni-thumbs-up';
										@endphp
										@else
										@php
											$class1 = 'btn btn-danger';
											$class2 = 'lni lni-thumbs-down';
										@endphp
										@endif
										<a href="{{ route('user_status', ['id' => $user->id]) }}" class="{{ $class1 }}">
											<i class="{{ $class2 }}"></i>
										</a>
									</td>
									<td>
										<div class="d-flex justify-content-evenly">
											<a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn btn-primary">
												<i class="lni lni-pencil"></i>
											</a>
											<a href="javascript:;" userId="{{ $user->id }}" class="btn btn-danger confirmDelete">
												<i class="lni lni-trash"></i>
											</a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>
    <!-- end page content-->
</div>
@endsection
@section('page-script')
<script>
	$(document).ready(function() {
		$('#userTable').DataTable({
			ordering: false,
		});
	});
	$(document).on('click','.confirmDelete', function() {
		var $this = $(this);
    	var userId = $(this).attr('userId');

		swal({
	        title: "Are you sure?",
	        text: "You will not be able to revert this Record!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        cancelButtonClass: "btn-secondary",
	        confirmButtonText: "Yes, Delete it!",
	        cancelButtonText: "No, Cancel Please!",
	        closeOnConfirm: true,
	        closeOnCancel: false
	    },function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/delete_user',
                type: 'POST',
                data: {
                	"_token": "{{ csrf_token() }}",
                	userId: userId
                },
                success:function(response) {
                    if (response.status==true) {
                        $this.closest('tr').css('background-color', 'red').fadeOut('slow');
                        if ($($this.closest('tr').prev()).hasClass("parent")) {
                            $this.closest('tr').prev().css('background-color', 'red').fadeOut('slow');
                        }
                        Notification('success',response.message);
                    }
                },error:function() {
                    alert('Error');
                }
            });   
        }else {
            swal({
               title:'Success', 
               text:'Record not deleted, Your Record is still Save',
               confirmButtonClass: "btn-success", 
               type: "success"
            });
        }
    });
});
</script>
@endsection