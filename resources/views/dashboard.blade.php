@extends('layout.master')
@section('content')
<!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
        </div>
        <!--end breadcrumb-->

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                  <div class="fs-5">
                    <ion-icon name="person-add-outline"></ion-icon>
                  </div>
                  <div>
                    <p class="mb-0">Followers</p>
                  </div>
                  <div class="fs-5 ms-auto">
                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h5 class="mb-0">1,037</h5>
                  </div>
                  <div class="ms-auto" id="chart1"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                  <div class="fs-5">
                    <ion-icon name="heart-outline"></ion-icon>
                  </div>
                  <div>
                    <p class="mb-0">Likes</p>
                  </div>
                  <div class="fs-5 ms-auto">
                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h5 class="mb-0">23,758</h5>
                  </div>
                  <div class="ms-auto" id="chart2"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                  <div class="fs-5">
                    <ion-icon name="chatbox-outline"></ion-icon>
                  </div>
                  <div>
                    <p class="mb-0">Comments</p>
                  </div>
                  <div class="fs-5 ms-auto">
                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h5 class="mb-0">1,139</h5>
                  </div>
                  <div class="ms-auto" id="chart3"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                  <div class="fs-5">
                    <ion-icon name="mail-outline"></ion-icon>
                  </div>
                  <div>
                    <p class="mb-0">Messages</p>
                  </div>
                  <div class="fs-5 ms-auto">
                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h5 class="mb-0">1,037</h5>
                  </div>
                  <div class="ms-auto" id="chart4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->
@endsection