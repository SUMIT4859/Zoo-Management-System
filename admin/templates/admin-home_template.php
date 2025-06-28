<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">



        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Animals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $animal['count_animal'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dog fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Total Job Applications -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Job Applications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jobapplication['total_jobapplication'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-signature fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Available Vacancies</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $vacancy['total_vacancies'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-contract fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		 <!-- Total Events Organized -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Organized Events</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $events['total_events'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
    </div>


    <div class="row">

        <!-- Total Booked Tickets -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tickets Booked</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tickets['total_tickets'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Visitors -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Visitors</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $visitors['total_visitors'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-card fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unreviewed Feedbacks Received -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UnReviewed Feedbacks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $unfeedbacks['total_unfeedbacks'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unreviewed Feedbacks Received -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reviewed Feedbacks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $refeedbacks['total_refeedbacks'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-square fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
     

        <!-- Total System Users -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total System Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalusers['total_users'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-2x text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>