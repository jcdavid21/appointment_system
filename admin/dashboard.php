<?php
require_once("../backend/config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Panel</title>
    <!-- DataTables -->
    <link href="../plugins/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../plugins/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="../styles/bootstrap5-min.css" rel="stylesheet" />
    <link href="../styles/card-general.css" rel="stylesheet" />
    <script src="../scripts/sweetalert2.js"></script>
    <script
      src="../scripts/font-awesome.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <!-- Navbar -->
    <?php require_once("./navbar.php"); ?>
    <!-- Sidebar -->
    <div id="layoutSidenav">
      <?php require_once("./sidebar.php"); ?>
      <!-- Content -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <!-- Page indicator -->
            <h1 class="mt-4" id="full_name">Admin Panel</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Appointments</li>
            </ol>

              <div class="card mb-5">
                    <div class="card-header bg-primary pt-3">
                        <div class="text-center">
                            <p class="card-title text-light">Appointment Lists
                        </div>
                    </div>
                    <div class="card-body">
                      <table id="residenceAccounts" class="table table-striped nowrap" style="width:100%">
                        <thead>
                          <tr>
                              <th>Appointment ID</th>
                              <th>Appointment Date</th>
                              <th>Appointment Time</th>
                              <th>Appointment Status</th>
                              <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query = "SELECT ta.*, CONCAT(td.first_name, ' ', td.middle_name, ' ', td.last_name) AS full_name,
                            td.program, td.year_level, td.email, td.contact, td.concern,
                            ts.status_name
                            FROM tbl_appointment ta 
                            INNER JOIN tbl_appointment_details td ON ta.apt_id = td.apt_id
                            INNER JOIN tbl_status ts ON ta.status_id = ts.status_id
                            WHERE ta.status_id = 1;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                              while ($data = $result->fetch_assoc()) {
                          ?>
                          <tr>
                            <td><?php echo $data['apt_id'];?></td>
                            <td><?php echo date('F j, Y', strtotime($data['apt_date']));?></td>
                            <td><?php echo $data['apt_time'];?></td>
                            <td><?php echo $data['status_name'];?></td>
                            <td>
                                <button type="button" class="btn btn-primary" id="<?php echo $data["apt_id"] ?>"  data-bs-toggle="modal" data-bs-target="#residenceAccountDetails<?php echo $data["apt_id"] ?>" data-bs-whatever="@getbootstrap">
                                  <i class="fa-solid fa-eye" style="color: #fcfcfc;"></i>
                                </button>
                                <button type="button" class="btn btn-danger cancelBtn" id="<?php echo $data["apt_id"] ?>" >
                                  <i class="fa-solid fa-x"  style="color: #fcfcfc;"></i>
                                </button>
                            </td>
                          </tr>
                          <div class="modal fade" id="residenceAccountDetails<?php echo $data["apt_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <form method="post">
                                    <div class="mb-3">
                                      <label class="col-form-label">Name</label>
                                      <input type="text" class="form-control updatedName" value="<?php echo $data["full_name"]; ?>" disabled >
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Email</label>
                                      <input type="text" class="form-control updatedPrice" value="<?php echo $data["email"]; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Program</label>
                                      <input type="text" class="form-control updatedPrice" value="<?php echo $data["program"]; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Year Level</label>
                                      <input type="text" class="form-control updatedStocks" value="<?php echo $data["year_level"]; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Contact</label>
                                      <input type="text" class="form-control updatedPrice" value="<?php echo $data["contact"]; ?>"disabled >
                                    </div>
                                    <div class="mb-3">
                                      <label class="col-form-label">Concern</label>
                                      <textarea disabled class="form-control" name="concern" id="concern" cols="20" rows="5"><?php echo  $data["concern"]; ?></textarea>
                                    </div>
                                      
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-primary btn-accept updateResBtn" value="<?php echo $data["apt_id"] ?>" >
                                      Accept
                                  </button>
                                    <button type="button" class="btn btn-secondary " value="<?php echo $data["apt_id"]; ?>" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>

      </main>
    </div>
  </div>
  <script
      src="../scripts/bootstrap.bundle.min.js"
    ></script>
    <script src="../jquery/jquery.js"></script>
    <script src="../scripts/toggle.js"></script>
    <script src="../jquery/modify.js"></script>
    <!-- DataTables Scripts -->
    <script src="../plugins/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/js/dataTables.bootstrap5.min.js"></script>
    <script src="../plugins/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/js/responsive.bootstrap5.min.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="../styles/dataTables.min.css">

    <!-- DataTables Buttons JavaScript -->
    <script src="../scripts/dataTables.js"></script>
    <script src="../scripts/ajax.make.min.js"></script>
    <script src="../scripts/ajax.fonts.js"></script>
    <script src="../scripts/dtBtn.html5.js"></script>
    <script>
        function convertToLowercase(input) {
            input.value = input.value.toLowerCase();
        }
    </script>
    <script>
      $(document).ready(function() {
          $('#residenceAccounts').DataTable({
              responsive: true,
              order: [[0, 'desc']],
          });
      });
</script>

  </body>
</html>
