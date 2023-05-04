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
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Time Sheet Details</h5>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                @for ($i = 0; $i < $intervals; $i++)
                                <th>{{ $start->copy()->addMinutes($i * 30)->format('h:i A') }} to {{ $start->copy()->addMinutes(($i + 1) * 30)->format('h:i A') }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($todaySheet->date)) }}</td>
                                <td>{{ $todaySheet->day }}</td>
                                <td>
                                    @if(!$todaySheet->first_thirtymin)
                                    <button name="first_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->first_thirtymin) }}</p>
                                        <button name="first_thirtymin" value="{{ $todaySheet->first_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->second_thirtymin)
                                    <button name="second_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->second_thirtymin) }}</p>
                                        <button name="second_thirtymin" value="{{ $todaySheet->second_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->third_thirtymin)
                                    <button name="third_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->third_thirtymin) }}</p>
                                        <button name="third_thirtymin" value="{{ $todaySheet->third_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->fourth_thirtymin)
                                    <button name="fourth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->fourth_thirtymin) }}</p>
                                        <button name="fourth_thirtymin" value="{{ $todaySheet->fourth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->fifth_thirtymin)
                                    <button name="fifth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->fifth_thirtymin) }}</p>
                                        <button name="fifth_thirtymin" value="{{ $todaySheet->fifth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->sixth_thirtymin)
                                    <button name="sixth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->sixth_thirtymin) }}</p>
                                        <button name="sixth_thirtymin" value="{{ $todaySheet->sixth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->seventh_thirtymin)
                                    <button name="seventh_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->seventh_thirtymin) }}</p>
                                        <button name="seventh_thirtymin" value="{{ $todaySheet->seventh_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->eighth_thirtymin)
                                    <button name="eighth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->eighth_thirtymin) }}</p>
                                        <button name="eighth_thirtymin" value="{{ $todaySheet->eighth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->nineth_thirtymin)
                                    <button name="nineth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->nineth_thirtymin) }}</p>
                                        <button name="nineth_thirtymin" value="{{ $todaySheet->nineth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->tenth_thirtymin)
                                    <button name="tenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->tenth_thirtymin) }}</p>
                                        <button name="tenth_thirtymin" value="{{ $todaySheet->tenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->eleventh_thirtymin)
                                    <button name="eleventh_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->eleventh_thirtymin) }}</p>
                                        <button name="eleventh_thirtymin" value="{{ $todaySheet->eleventh_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->twelveth_thirtymin)
                                    <button name="twelveth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->twelveth_thirtymin) }}</p>
                                        <button name="twelveth_thirtymin" value="{{ $todaySheet->twelveth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->thirteenth_thirtymin)
                                    <button name="thirteenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->thirteenth_thirtymin) }}</p>
                                        <button name="thirteenth_thirtymin" value="{{ $todaySheet->thirteenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->fourteenth_thirtymin)
                                    <button name="fourteenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->fourteenth_thirtymin) }}</p>
                                        <button name="fourteenth_thirtymin" value="{{ $todaySheet->fourteenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->fifteenth_thirtymin)
                                    <button name="fifteenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->fifteenth_thirtymin) }}</p>
                                        <button name="fifteenth_thirtymin" value="{{ $todaySheet->fifteenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->sixteenth_thirtymin)
                                    <button name="sixteenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->sixteenth_thirtymin) }}</p>
                                        <button name="sixteenth_thirtymin" value="{{ $todaySheet->sixteenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->seventieth_thirtymin)
                                    <button name="seventieth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->seventieth_thirtymin) }}</p>
                                        <button name="seventieth_thirtymin" value="{{ $todaySheet->seventieth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if(!$todaySheet->eighteenth_thirtymin)
                                    <button name="eighteenth_thirtymin" type="button" class="btn btn-primary modalButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fadeIn animated bx bx-plus"></i>Add</button>
                                    @else
                                    <div class="d-flex flex-column align-items-center flex-wrap">
                                        <p class="fw-bold">{{ ucfirst($todaySheet->eighteenth_thirtymin) }}</p>
                                        <button name="eighteenth_thirtymin" value="{{ $todaySheet->eighteenth_thirtymin }}" type="button" class="btn btn-primary editmodalButton" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fadeIn animated bx bx-edit"></i>Edit</button>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Start Add Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Half-hourly details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addtimesheet', ['id' => $todaySheet->id]) }}" method="POST">
                        @csrf
                            <div class="col-12 mb-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" name="" id="timesheetField" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Add Modal --}}
        {{-- Start Edit Modal --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Half-hourly details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edittimesheet', ['id' => $todaySheet->id]) }}" method="POST">
                        @csrf
                            <div class="col-12 mb-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" name="" id="edittimesheetField" class="form-control" required value="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Edit Modal --}}
    </div>
    <!-- end page content-->
</div>
@endsection
@section('page-script')
<script>
    $('.modalButton').click(function() { 
        var nameVal = $(this).attr('name');
        $('#timesheetField').attr('name', nameVal);
    });
    $('.editmodalButton').click(function() { 
        var nameVal = $(this).attr('name');
        var editVal = $(this).attr('value');
        $('#edittimesheetField').attr('name', nameVal);
        $('#edittimesheetField').attr('value', editVal);
    });   
</script>
@endsection