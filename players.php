<?php
include('inc/db.php');
session_start();
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OnSet Roleplay Web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->

  <!-- Main Sidebar Container -->
<?php include('inc/left.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Players List/Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Players List/Management</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Players</h3>
            </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <?php
            $playershow ='SELECT * FROM accounts ORDER BY id';
            try {
              $request = $bdd->prepare($playershow);
              $request->execute();
              $rowAll = $request->fetchAll();
            } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

            ?>
            <tr>
              <th>ID</th>
              <th>SteamID</th>
              <th>Name</th>
              <th>Cash</th>
              <th>Bank</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ( $rowAll as $row )
            {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['steamid']; ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['cash']; ?> $</td>
              <td><?php echo $row['bank_balance']; ?> $</td>
              <td>
                <?php
                $variable = $row['id'];
                ?>
               <a href="profile.php?id=<?php echo $variable ?>" class="btn btn-primary" role="button">Edit</a>
              </td>
            </tr>
              <?php
            } // fin foreach
            ?>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
       <!-- /.card -->
     </div>
     <!-- /.col -->
   </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

      <!-- /.card -->
  <!-- /.content-wrapper -->

<?php include('inc/foot.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });
    });
</script>
</body>
</html>
