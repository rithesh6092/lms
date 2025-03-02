<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}";
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

     <title>Groviio | Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-logistics-dashboard.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('includes.sidemenu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('includes.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 breadcrumb-wrapper mb-4">
                <span class="text-muted fw-light">Logistics /</span> Dashboard
              </h4>

              <!-- Card Border Shadow -->
              <div class="row">
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">42</h4>
                      </div>
                      <p class="mb-1">On route vehicles</p>
                      <p class="mb-0">
                        <span class="fw-medium me-1">+18.2%</span>
                        <small class="text-muted">than last week</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-error"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">8</h4>
                      </div>
                      <p class="mb-1">Vehicles with errors</p>
                      <p class="mb-0">
                        <span class="fw-medium me-1">-8.7%</span>
                        <small class="text-muted">than last week</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"
                            ><i class="bx bx-git-repo-forked"></i
                          ></span>
                        </div>
                        <h4 class="ms-1 mb-0">27</h4>
                      </div>
                      <p class="mb-1">Deviated from route</p>
                      <p class="mb-0">
                        <span class="fw-medium me-1">+4.3%</span>
                        <small class="text-muted">than last week</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-info"><i class="bx bx-time-five"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">13</h4>
                      </div>
                      <p class="mb-1">Late vehicles</p>
                      <p class="mb-0">
                        <span class="fw-medium me-1">-2.5%</span>
                        <small class="text-muted">than last week</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Card Border Shadow -->
              <div class="row">
                <!-- Vehicles overview -->
                <div class="col-xxl-6 mb-4 order-5 order-xxl-0">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="card-title mb-0">
                        <h5 class="m-0">Vehicles overview</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-none d-lg-flex vehicles-progress-labels mb-3">
                        <div class="vehicles-progress-label on-the-way-text" style="width: 39.7%">On the way</div>
                        <div class="vehicles-progress-label unloading-text" style="width: 28.3%">Unloading</div>
                        <div class="vehicles-progress-label loading-text" style="width: 17.4%">Loading</div>
                        <div class="vehicles-progress-label waiting-text" style="width: 14.6%">Waiting</div>
                      </div>
                      <div class="vehicles-overview-progress progress mb-3" style="height: 46px">
                        <div
                          class="progress-bar fs-big fw-medium text-start bg-body text-body px-1 px-lg-3"
                          role="progressbar"
                          style="width: 39.7%"
                          aria-valuenow="39.7"
                          aria-valuemin="0"
                          aria-valuemax="100">
                          39.7%
                        </div>
                        <div
                          class="progress-bar fs-big fw-medium text-start bg-primary px-1 px-lg-3"
                          role="progressbar"
                          style="width: 28.3%"
                          aria-valuenow="28.3"
                          aria-valuemin="0"
                          aria-valuemax="100">
                          28.3%
                        </div>
                        <div
                          class="progress-bar fs-big fw-medium text-start text-bg-info px-1 px-lg-3"
                          role="progressbar"
                          style="width: 17.4%"
                          aria-valuenow="17.4"
                          aria-valuemin="0"
                          aria-valuemax="100">
                          17.4%
                        </div>
                        <div
                          class="progress-bar fs-big fw-medium text-start bg-gray-900 px-1 px-lg-3"
                          role="progressbar"
                          style="width: 14.6%"
                          aria-valuenow="14.6"
                          aria-valuemin="0"
                          aria-valuemax="100">
                          14.6%
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table">
                          <tbody class="table-border-bottom-0">
                            <tr>
                              <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="me-2">
                                    <i class="bx bxs-truck"></i>
                                  </div>
                                  <h6 class="mb-0 fw-normal">On the way</h6>
                                </div>
                              </td>
                              <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">2hr 10min</h6>
                              </td>
                              <td class="text-end pe-0">
                                <span class="fw-medium">39.7%</span>
                              </td>
                            </tr>
                            <tr>
                              <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="me-2">
                                    <i class="bx bx-down-arrow-circle"></i>
                                  </div>
                                  <h6 class="mb-0 fw-normal">Unloading</h6>
                                </div>
                              </td>
                              <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">3hr 15min</h6>
                              </td>
                              <td class="text-end pe-0">
                                <span class="fw-medium">28.3%</span>
                              </td>
                            </tr>
                            <tr>
                              <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="me-2">
                                    <i class="bx bx-up-arrow-circle"></i>
                                  </div>
                                  <h6 class="mb-0 fw-normal">Loading</h6>
                                </div>
                              </td>
                              <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">1hr 24min</h6>
                              </td>
                              <td class="text-end pe-0">
                                <span class="fw-medium">17.4%</span>
                              </td>
                            </tr>
                            <tr>
                              <td class="w-50 ps-0">
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="me-2">
                                    <i class="bx bx-time-five"></i>
                                  </div>
                                  <h6 class="mb-0 fw-normal">Waiting</h6>
                                </div>
                              </td>
                              <td class="text-end pe-0 text-nowrap">
                                <h6 class="mb-0">5hr 19min</h6>
                              </td>
                              <td class="text-end pe-0">
                                <span class="fw-medium">14.6%</span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Vehicles overview -->
                <!-- Shipment statistics-->
                <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Shipment statistics</h5>
                        <small class="text-muted">Total number of deliveries 23.8k</small>
                      </div>
                      <div class="dropdown">
                        <button
                          type="button"
                          class="btn btn-label-primary dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-expanded="false">
                          January
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="shipmentStatisticsChart"></div>
                    </div>
                  </div>
                </div>
                <!--/ Shipment statistics -->
                <!-- Delivery Performance -->
                <div class="col-lg-6 col-xxl-4 mb-4 order-2 order-xxl-2">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Delivery Performance</h5>
                        <small class="text-muted">12% increase in this month</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="deliveryPerformance"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryPerformance">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-package"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Packages in transit</h6>
                              <small class="text-success fw-normal d-block">
                                <i class="bx bx-chevron-up"></i>
                                25.8%
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">10k</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-truck"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Packages out for delivery</h6>
                              <small class="text-success fw-normal d-block">
                                <i class="bx bx-chevron-up"></i>
                                4.3%
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">5k</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"
                              ><i class="bx bx-check-circle"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Packages delivered</h6>
                              <small class="text-danger fw-normal d-block">
                                <i class="bx bx-chevron-down"></i>
                                12.5
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">15k</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-warning"><i>%</i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Delivery success rate</h6>
                              <small class="text-success fw-normal d-block">
                                <i class="bx bx-chevron-up"></i>
                                35.6%
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">95%</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                              ><i class="bx bx-time-five"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Average delivery time</h6>
                              <small class="text-danger fw-normal d-block">
                                <i class="bx bx-chevron-down"></i>
                                2.15
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">2.5 Days</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-group"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-1 fw-normal">Customer satisfaction</h6>
                              <small class="text-success fw-normal d-block">
                                <i class="bx bx-chevron-up"></i>
                                5.7%
                              </small>
                            </div>
                            <div class="user-progress">
                              <h6 class="mb-0">4.5/5</h6>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Delivery Performance -->
                <!-- Reasons for delivery exceptions -->
                <div class="col-md-6 col-xxl-4 mb-4 order-1 order-xxl-3">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Reasons for delivery exceptions</h5>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="deliveryExceptions"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryExceptions">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="deliveryExceptionsChart"></div>
                    </div>
                  </div>
                </div>
                <!--/ Reasons for delivery exceptions -->
                <!-- Orders by Countries -->
                <div class="col-md-6 col-xxl-4 mb-4 order-0 order-xxl-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Orders by Countries</h5>
                        <small class="text-muted">62 deliveries in progress</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="ordersCountries"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="ordersCountries">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill tabs-line" role="tablist">
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link active"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-new"
                              aria-controls="navs-justified-new"
                              aria-selected="true">
                              New
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-preparing"
                              aria-controls="navs-justified-link-preparing"
                              aria-selected="false">
                              Preparing
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-shipping"
                              aria-controls="navs-justified-link-shipping"
                              aria-selected="false">
                              Shipping
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content border-0 border-top pb-0">
                          <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                            <ul class="timeline">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Barry Schowalter</h6>
                                  <p class="text-muted mb-0">939 Orange, California(CA), 92118</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-1 border-light border-top border-dashed mb-4"></div>
                            <ul class="timeline mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Veronica Herman</h6>
                                  <p class="text-muted mb-0">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Helen Jacobs</h6>
                                  <p class="text-muted mb-0">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                            <ul class="timeline">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Barry Schowalter</h6>
                                  <p class="text-muted mb-0">939 Orange, California(CA), 92118</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-1 border-light border-top border-dashed mb-4"></div>
                            <ul class="timeline mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Veronica Herman</h6>
                                  <p class="text-muted mb-0">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Helen Jacobs</h6>
                                  <p class="text-muted mb-0">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                            <ul class="timeline">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Veronica Herman</h6>
                                  <p class="text-muted mb-0">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Barry Schowalter</h6>
                                  <p class="text-muted mb-0">939 Orange, California(CA), 92118</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-1 border-light border-top border-dashed mb-4"></div>
                            <ul class="timeline mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-success border-0 shadow-none">
                                  <i class="bx bx-check-circle"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-2">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span
                                  class="timeline-indicator-advanced timeline-indicator-primary border-0 shadow-none">
                                  <i class="bx bx-map mt-1"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-2">Helen Jacobs</h6>
                                  <p class="text-muted mb-0">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Orders by Countries -->
                <!-- On route vehicles Table -->
                <div class="col-12 order-5">
                  <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">On route vehicles</h5>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="routeVehicles"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-datatable table-responsive">
                      <table class="dt-route-vehicles table">
                        <thead class="border-top">
                          <tr>
                            <th></th>
                            <th></th>
                            <th>location</th>
                            <th>starting route</th>
                            <th>ending route</th>
                            <th>warnings</th>
                            <th class="w-20">progress</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ On route vehicles Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/app-logistics-dashboard.js') }}"></script>
  </body>
</html>
