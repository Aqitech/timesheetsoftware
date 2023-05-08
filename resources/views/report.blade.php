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
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <form id="searchForm">
                    @csrf
                    <div class="row">
                        @if(Auth::User()->type_id == 1)
                        <div class="col-md-3">
                            <div class="mb-3" data-select2-id="21">
                                <label class="form-label">Select User</label>
                                <select class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" id="selectedUser" name="selectedUser">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                                    @endforeach
                                </select>
                                <p id="selectedUserError" class="text-danger"></p>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="selectedUser" id="selectedUser" value="{{ Auth::User()->id }}">
                        @endif
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">From</label>
                                <input type="text" id="fromDate" class="form-control datepicker" />
                                <p id="fromDateError" class="text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">To</label>
                                <input type="text" id="toDate" class="form-control datepicker" />
                                <p id="toDateError" class="text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="searchResults"></div>
            </div>
        </div>
    </div>
    <!-- end page content-->
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $("#fromDate").on('change', function(){
            var fromDate = $('#fromDate').val();
            if (fromDate !== '') {
                $('#fromDateError').text('');
            }
        });
        $("#toDate").on('change', function(){
            var toDate = $('#toDate').val();
            if (toDate !== '') {
                $('#toDateError').text('');
            }
        });
        $("#selectedUser").on('change', function(){
            var selectedUser = $('#selectedUser').val();
            if (selectedUser !== '') {
                $('#selectedUserError').text('');
            }
        });
        // On Submit function
        $('#searchForm').on('submit', function(event) {
            event.preventDefault();

            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var userId = $('#selectedUser').val();
            var submit = true;
            
            if (fromDate == '') {
                $('#fromDateError').text('Please select from date');
                submit = false;
            }
            if (toDate == '') {
                $('#toDateError').text('Please select to date');
                submit = false;
            }
            if (userId == '') {
                $('#selectedUserError').text('Please select a user');
                submit = false;
            }
            
            if (submit) {
                $.ajax({
                    url: '/user_search',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        fromDate: fromDate,
                        toDate: toDate,
                        userId: userId
                    },
                    success: function(response) {
                        if (response.hasOwnProperty('message')) {
                            displayMessage(response.message);
                        } else {
                            displayResults(response);
                        }
                    }
                });
            }
        });
        function displayResults(data) {
            var resultsHtmlhead = '';
            var resultsHtml = '';
            resultsHtmlhead +=
                '<div class="table-responsive mt-3">' +
                    '<table class="table table-striped table-bordered" id="searchTable">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>Date</th>' +
                                '<th>Day</th>' +
                                data.everyThirtyMin +
                            '</tr>' +
                        '</thead>' +
                    '<tbody>';
                    $.each(data.results, function (index, item) {
                    resultsHtml +=
                        '<tr>' +
                            '<td>' + item.date + '</td>' +
                            '<td>' + item.day + '</td>' +
                            '<td>' + item.first_thirtymin + '</td>' +
                            '<td>' + item.second_thirtymin + '</td>' +
                            '<td>' + item.third_thirtymin + '</td>' +
                            '<td>' + item.fourth_thirtymin + '</td>' +
                            '<td>' + item.fifth_thirtymin + '</td>' +
                            '<td>' + item.sixth_thirtymin + '</td>' +
                            '<td>' + item.seventh_thirtymin + '</td>' +
                            '<td>' + item.eighth_thirtymin + '</td>' +
                            '<td>' + item.nineth_thirtymin + '</td>' +
                            '<td>' + item.tenth_thirtymin + '</td>' +
                            '<td>' + item.eleventh_thirtymin + '</td>' +
                            '<td>' + item.twelveth_thirtymin + '</td>' +
                            '<td>' + item.thirteenth_thirtymin + '</td>' +
                            '<td>' + item.fourteenth_thirtymin + '</td>' +
                            '<td>' + item.fifteenth_thirtymin + '</td>' +
                            '<td>' + item.sixteenth_thirtymin + '</td>' +
                            '<td>' + item.seventieth_thirtymin + '</td>' +
                            '<td>' + item.eighteenth_thirtymin + '</td>' +
                        '</tr>';
                    });
                    resultsHtml += 
                    '</tbody>' +
                '</table>' +
            '</div>';
            $('#searchResults').html(resultsHtmlhead + resultsHtml);
            $('#searchTable').DataTable( {
                dom: 'Bfrtip',
                bFilter: false,
                ordering: false,
                buttons: [
                    'excel'
                ]
            } );
        }
        function displayMessage(message) {
            $('#searchResults').html('<h3 class="fw-bold text-center">' + message + '</h3>');
        }
    });
</script>
@endsection