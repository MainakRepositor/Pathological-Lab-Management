<h1>Welcome to <?php echo $_settings->info('name') ?> - Admin Panel</h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-th-list"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Tests</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `test_list` where delete_flag = 0 and status = 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-calendar"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Booked Appointment</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `appointment_list` ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-spinner"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Pending Appointment</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `appointment_list` where status = 0 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Approved Appointment</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `appointment_list` where status in (1,2,3) ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-vial"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Finished Test</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `appointment_list` where status = 6 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Registered Users</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `client_list` ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<hr>
