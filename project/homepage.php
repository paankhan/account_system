<?php
include "dbConfig.php";
include "datafetch.php";
include "datacreate.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Z</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<!-- account A button -->
<div class="modal fade" id="accounta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Saving (A)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="dataupdate.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Account Balance:</label>

            <?php if(mysqli_num_rows($resultA)>0)
                {
                  while ($rowA=mysqli_fetch_assoc($resultA))
                  {
            ?>
            <input type="text" class="form-control" id="recipient-name" value="RM <?php echo $rowA["balance"]?>" disabled>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Amount Transfer to Account B:</label>
            <input type="number" step=".01" min="0.01" max="<?php echo $rowA["balance"]?>" class="form-control" name="transfera">
          </div>
          <?php }} ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submita" class="btn btn-primary">Transfer</button>
      </div> 
    </form>
    </div>
  </div>
</div>

<!-- account b button -->
<div class="modal fade" id="accountb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Goals (B)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="dataupdate.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Account Balance:</label>

            <?php if(mysqli_num_rows($resultB)>0)
                {
                  while ($rowB=mysqli_fetch_assoc($resultB))
                  {
            ?>
            <input type="text" class="form-control" id="recipient-name" value="RM <?php echo $rowB["balance"]?>" disabled>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Amount Transfer to Account A:</label>
            <input type="number" step=".01" min="0.01" max="<?php echo $rowB["balance"]?>" class="form-control" name="transferb">
          </div>
          <?php }} ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submitb" class="btn btn-primary">Transfer</button>
      </div> 
    </form>
    </div>
  </div>
</div>

<!-- create account button -->
<div class="modal fade" id="createaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Investment (c)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="datacreate.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Account name:</label>

            <input type="text" name="createaccount" class="form-control" id="recipient-name" value=" ">
            
          </div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submitc" class="btn btn-primary">Create Account</button>
      </div> 
    </form>
    </div>
  </div>
</div>

<!-- new account button -->
<div class="modal fade" id="newaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fund</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="datacreate.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Amount:</label>

            <input type="number" name="newaccount" class="form-control" id="recipient-name" value=" ">
            
          </div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteaccount">Delete</button>
        <button type="submit" name="addfund" class="btn btn-primary">Add Fund</button>
      </div> 
      <div class="modal-body">
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Transaction History:</label>
          <ul class="list-group">
          <?php if(mysqli_num_rows($result5)>0)
                {
                  while ($row5=mysqli_fetch_assoc($result5))
                  {
          ?>
          <div class="row">
          <div class="col"><li class="list-group-item">RM <?php echo $row5['amount'];?></li></div>
          <div class="col"><li class="list-group-item"><?php echo $row5['date'];?></li></div>
          </div>
          
          <?php
            }}
          ?>
        </ul>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- delete account button -->
<div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p>Are you sure you want to close this account?<br>
                  This remaining balance will transfer to your Savings Account.
            </p>
      </div>
        <div class="modal-footer">
        <form method="post" action="datacreate.php">
        <button type="submit" name="deleteaccount" class="btn btn-success" >Yes</button>
        </form>
        <button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
      </div> 
    </div>
  </div>
</div>


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="homepage.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">

      </li>
      <li class="nav-item">
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../account_system/project/bank1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bank Z</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../account_system/project/tokyo.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ZULFARKHAN</a>
        </div>
      </div>

      
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bank Z</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 50%">
                          Account
                      </th>
                      <th style="width: 40%">
                           Category
                      </th>
                      <th style="width: 500%">
                          Balance
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($result)>0)
                {
                  while ($row=mysqli_fetch_assoc($result))
                  {
                ?>
                  <tr>
                      <td>
                          <a>
                            <?php echo $row["account_name"]?>
                          </a>
                          <br/>
                      </td>
                      <td>
                          <a>
                            <?php echo $row["category"]?>
                          </a>
                          <br/>
                      </td>
                      <td>
                          RM <?php echo $row["balance"]?>
                      </td>
                      <td class="project-actions text-right">
                        
                          <a data-toggle="modal" data-target="<?php if ($row["account_name"]=="Savings"){echo "#accounta";}elseif ($row["account_name"]=="Goals"){echo "#accountb";}else {echo "#newaccount";}?>" data-whatever="@mdo" style="outline: 0;" class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                      </td>
                  </tr>
                  <?php
                    }}
                  ?>

              </tbody>
          </table>
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
       

      <!-- create button -->
      
      <button data-toggle="modal" data-target="#createaccount" data-whatever="@mdo" type="submit" name="create" style="outline: 0;float:right;margin: 30px;"class="btn btn-app bg-warning" <?php if(mysqli_num_rows($result4)>0){echo'disabled';}else{echo '';}?>>
              <i class="fas fa-envelope"></i> Create
      </button>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
