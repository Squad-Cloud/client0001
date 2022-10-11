@extends('layouts.super-admin')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 bg-title-left">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ __($pageTitle) }}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 bg-title-right">
            <ol class="breadcrumb">
                <li><a href="{{ route('super-admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">{{ __($pageTitle) }}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/calendar/dist/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}">
    <!--Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/owl.carousel/owl.carousel.min.css') }}">
    <!--Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/owl.carousel/owl.theme.default.css') }}">
    <!--Owl carousel CSS -->

    <style>
        .col-in {
            padding: 0 20px !important;

        }

        .fc-event {
            font-size: 10px !important;
        }
    </style>
@endpush

@section('content')

    <div class="white-box">
        <div class="row dashboard-stats front-dashboard">

            @include('super-admin.dashboard.cron_job_message')
            @include('super-admin.dashboard.update_message')
            @include('super-admin.dashboard.get_started')


            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-info-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> @lang('modules.dashboard.totalCompanies')</span><br>
                            <span class="counter">{{ $totalCompanies }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-success-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> @lang('modules.dashboard.activeCompanies')</span><br>
                            <span class="counter">{{ $activeCompanies }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-danger-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> @lang('modules.dashboard.licenseExpired')</span><br>
                            <span class="counter">{{ $expiredCompanies }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-warning-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> @lang('modules.dashboard.inactiveCompanies')</span><br>
                            <span class="counter">{{ $inactiveCompanies }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-inverse-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> @lang('app.total') @lang('app.menu.packages')</span><br>
                            <span class="counter">{{ $totalPackages }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8">
            <div class="card card-border mb-0 h-100">
										<div class="card-header card-header-action">
                                            <h3 class="box-title">Company Overview</h3>

										</div>
										<div class="card-body">
											<!-- <div class="text-center">
												<div class="d-inline-block">
													<span class="badge-status">
														<span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Direct</span>
													</span>
												</div>
												<div class="d-inline-block ms-3">
													<span class="badge-status">
														<span class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Organic search</span>
													</span>
												</div>
												<div class="d-inline-block ms-3">
													<span class="badge-status">
														<span class="badge bg-primary-light-4 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Referral</span>
													</span>
												</div>
											</div> -->
											<div id="column_chart_2"></div>
											<div class="separator-full mt-5"></div>
											<!-- <div class="flex-grow-1 ms-lg-3">
												<div class="row">
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">Users</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">8.8k</span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 7.5%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">Sessions</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">18.2k</span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 7.2%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">Bounce rate</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">46.2%</span>
															<span class="badge badge-sm badge-soft-danger ms-1">
																<i class="bi bi-arrow-down"></i> 0.2%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6">
														<span class="d-block fw-medium fs-7">Session duration</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">4m 24s</span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 10.8%
															</span>
														</div>
													</div>
												</div>	
											</div> -->
										</div>
									</div>
            </div>
            <div class="col-lg-4">
            <div class="card card-border mb-0  h-100">
										<div class="card-header card-header-action">
											<!-- <h6>Returning Customers</h6> -->
                                            <h3 class="box-title">Total Earning</h3>
										</div>
										<div class="card-body text-center">
											<div id="radial_chart_2"></div>
											<div class="d-inline-block mt-4">
												<div class="mb-4">
													<span class="d-block badge-status lh-1">
														<span class="badge bg-primary badge-indicator badge-indicator-nobdr d-inline-block"></span>
														<span class="badge-label d-inline-block">This Month</span>
													</span>
													<span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">$243.50</span>
												</div>
												<div>
													<span class="badge-status lh-1">
														<span class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">This Year</span>
													</span>
													<span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">$1469</span>
												</div>
											</div>
										</div>
									</div>
            </div>
        
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="white-box">
                    <ul class="list-inline text-center m-t-40">
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color:rgb(13, 219, 228);"></i>@lang('app.earnings')
                            </h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart" style="height: 340px;"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">@lang('modules.superadmin.recentRegisteredCompanies')</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">@lang('app.name')</th>
                                <th class="text-center">@lang('app.email')</th>
                                <th class="text-center">@lang('app.menu.packages')</th>
                                <th class="text-center">@lang('app.date')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recentRegisteredCompanies as $key => $recent)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }} </td>
                                    <td class="text-center">{{ $recent->company_name }} </td>
                                    <td class="text-center">{{ $recent->company_email }} </td>
                                    <td class="text-center">{{ ucwords($recent->package->name) }}
                                        ({{ ucwords($recent->package_type) }})
                                    </td>
                                    <td class="text-center">{{ $recent->created_at->format('M j, Y') }} </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">@lang('messages.noRecordFound')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">@lang('modules.superadmin.recentSubscriptions')</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">@lang('modules.client.companyName')</th>
                                <th class="text-center">@lang('app.menu.packages')</th>
                                <th class="text-center">@lang('app.date')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recentSubscriptions as $key => $recent)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }} </td>
                                    <td class="text-center">{{ $recent->company_name }} </td>
                                    <td class="text-center">{{ ucwords($recent->name) }}
                                        ({{ ucwords($recent->package_type) }})
                                    </td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($recent->paid_on)->format('M j, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">@lang('messages.noRecordFound')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">@lang('modules.superadmin.recentLicenseExpiredCompanies')</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">@lang('modules.client.companyName')</th>
                                <th class="text-center">@lang('app.menu.packages')</th>
                                <th class="text-center">@lang('app.date')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recentExpired as $key => $recent)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }} </td>
                                    <td class="text-center">{{ $recent->company_name }} </td>
                                    <td class="text-center">{{ ucwords($recent->package->name) }}
                                        ({{ ucwords($recent->package_type) }})
                                    </td>
                                    <td class="text-center">{{ $recent->updated_at->format('M j, Y') }} </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">@lang('messages.noRecordFound')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-modal-md in" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModal"
         aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Do you like worksuite? Help us Grow :)</h4>

                </div>
                <div class="modal-body">
                    <div class="note note-info font-14 m-l-5">

                        We hope you love it. If you do, would you mind taking 10 seconds to leave me a short review on
                        codecanyon?
                        <br>
                        This helps us to continue providing great products, and helps potential buyers to make confident
                        decisions.
                        <hr>
                        Thank you in advance for your review and for being a preferred customer.

                        <hr>

                        <p class="text-center">
                            <a href="{{\Froiden\Envato\Functions\EnvatoUpdate::reviewUrl()}}"> <img
                                        src="{{asset('img/review-worksuite.png')}}" alt=""></a>
                            <button type="button" class="btn btn-link" data-dismiss="modal"
                                    onclick="hideReviewModal('closed_permanently_button_pressed')">Hide Pop up
                                permanently
                            </button>
                            <button type="button" class="btn btn-link" data-dismiss="modal"
                                    onclick="hideReviewModal('already_reviewed_button_pressed')">Already Reviewed
                            </button>
                        </p>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{\Froiden\Envato\Functions\EnvatoUpdate::reviewUrl()}}" target="_blank" type="button"
                       class="btn btn-success">Give Review</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('footer-script')

    <script src="{{ asset('plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/morrisjs/morris.js') }}"></script>

    <script src="{{ asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>

    <!-- jQuery for carousel -->
    <script src="{{ asset('plugins/bower_components/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/owl.carousel/owl.custom.js') }}"></script>

    <!--weather icon -->
    <script src="{{ asset('plugins/bower_components/skycons/skycons.js') }}"></script>

    <script src="{{ asset('plugins/bower_components/calendar/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/apexchart/apexcharts.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            var chartData = {!!  $chartData !!};

            Morris.Area({
                element: 'morris-area-chart',
                data: chartData,
                lineColors: ['#01c0c8'],
                xkey: ['month'],
                ykeys: ['amount'],
                labels: ['Earning'],
                pointSize: 0,
                lineWidth: 0,
                resize: true,
                fillOpacity: 0.8,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto',
                parseTime: false
            });

            $('.vcarousel').carousel({
                interval: 3000
            })
        });

        function hidePopUp() {
            $.easyAjax({
                url: '{{route('super-admin.dashboard.stripe-pop-up-close')}}',
                type: "GET",
            })
        }

        $(".counter").counterUp({
            delay: 100,
            time: 1200
        });

    </script>
    <script>
        @if(\Froiden\Envato\Functions\EnvatoUpdate::showReview())
        $(document).ready(function () {
            $('#reviewModal').modal('show');
        })

        function hideReviewModal(type) {
            var url = "{{ route('hide-review-modal',':type') }}";
            url = url.replace(':type', type);

            $.easyAjax({
                url: url,
                type: "GET",
                container: "#reviewModal",
            });
        }
        @endif
    </script>
    <script>
        $(document).ready(function(){
            /*Multiple Chart*/
var options1 = {
    series: [64, 55],
    chart: {
        height: 350,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Total Earning',
                    formatter: function(w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 2490
                    }
                }
            }
        }
    },
    labels: ['This Month', 'This Year'],
};

var chart1 = new ApexCharts(document.querySelector("#radial_chart_2"), options1);
chart1.render();
        })
    </script>

    <script>
        /*Stacked Column*/
var options2 = {
    series: [{
        name: 'Total Companies',
        data: [44, 55, 41, 67, 22, 43]
    }, {
        name: 'License Expired',
        data: [13, 23, 20, 8, 13, 27]
    }, {
        name: 'Inactive Companies',
        data: [11, 17, 15, 15, 21, 14]
    }, {
        name: 'Total Packages',
        data: [21, 7, 25, 13, 22, 8]
    }],
    chart: {
        type: 'bar',
        height: 350,
        stacked: false,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: true
        }
    },
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
            }
        }
    }],
    plotOptions: {
        bar: {
            horizontal: false,
        },
    },
    xaxis: {
        type: 'datetime',
        categories: ['01/01/2022 GMT', '02/01/2022 GMT', '03/01/2022 GMT', '04/01/2022 GMT',
            '05/01/2022 GMT', '06/01/2022 GMT'
        ],
    },
    legend: {
        position: 'right',
        offsetY: -10
    },
    fill: {
        opacity: 1
    }
};
var chart2 = new ApexCharts(document.querySelector("#column_chart_2"), options2);
chart2.render();
    </script>
@endpush