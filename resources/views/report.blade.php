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
                        <input type="hidden" id="userId" value="{{ $user->id }}">
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
                        <tbody id="searchResults"></tbody>
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
        // On Submit function
        $('#searchForm').on('submit', function(event) {
            event.preventDefault();

            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var userId = $('#userId').val();
            var submit = true;
            
            if (fromDate == '') {
                $('#fromDateError').text('Please select from date');
                submit = false;
            }
            if (toDate == '') {
                $('#toDateError').text('Please select to date');
                submit = false;
            }
            
            if (submit) {
                $.ajax({
                    url: '/search',
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
        function displayResults(results) {
            if (results.length == 0) {
                $('#searchResults').html('<div>No results found</div>');
            }
            var resultsHtml = '';
            $.each(results, function(index, item) {
                resultsHtml +=  '<tr>' +
                                    '<td>'+ item.date +'</td>' +
                                    '<td>'+ item.day +'</td>' +
                                    '<td>'+ item.first_thirtymin +'</td>' +
                                    '<td>'+ item.second_thirtymin +'</td>' +
                                    '<td>'+ item.third_thirtymin +'</td>' +
                                    '<td>'+ item.fourth_thirtymin +'</td>' +
                                    '<td>'+ item.fifth_thirtymin +'</td>' +
                                    '<td>'+ item.sixth_thirtymin +'</td>' +
                                    '<td>'+ item.seventh_thirtymin +'</td>' +
                                    '<td>'+ item.eighth_thirtymin +'</td>' +
                                    '<td>'+ item.nineth_thirtymin +'</td>' +
                                    '<td>'+ item.tenth_thirtymin +'</td>' +
                                    '<td>'+ item.eleventh_thirtymin +'</td>' +
                                    '<td>'+ item.twelveth_thirtymin +'</td>' +
                                    '<td>'+ item.thirteenth_thirtymin +'</td>' +
                                    '<td>'+ item.fourteenth_thirtymin +'</td>' +
                                    '<td>'+ item.fifteenth_thirtymin +'</td>' +
                                    '<td>'+ item.sixteenth_thirtymin +'</td>' +
                                    '<td>'+ item.seventieth_thirtymin +'</td>' +
                                    '<td>'+ item.eighteenth_thirtymin +'</td>' +
                                '</tr>';
            });
            $('#searchResults').html(resultsHtml);
        }
        function displayMessage(message) {
            $('#searchResults').html('<h3 class="fw-bold">' + message + '</h3>');
        }
    });
</script>
@endsection