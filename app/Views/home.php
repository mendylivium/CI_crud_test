
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">COdeIgniter CRUD Test</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Employee - <small>CRUD TEST by ROMMEL</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                        
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="department">
                                    <option value="0">All Department</option>
                                    <?php foreach($departments as $department) { ?>
                                    <option value="<?= array_values($department)[0] ?>"><?= array_values($department)[0] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="position">
                                    <option value="0">All Position</option>
                                    <?php foreach($positions as $position) { ?>
                                    <option value="<?= array_values($position)[0] ?>"><?= array_values($position)[0] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="0">All Status</option>
                                    <option value="Active">Inactive</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Resigned">Resigned</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-sm  btn-block btn-primary" value="Filter"/>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            <div class="col-md-3 mb-3">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-block btn-primary" id="create-btn">
                            + Add User
                        </button>
                    </div>                    
                </div>
                
            </div>
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Employee Code</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Hired Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($employees as $employee){ ?>
                        <tr>
                            <td><span style="color:blue;">G-<?= str_pad($employee['id'],5,'0',STR_PAD_LEFT) ?></span></td>
                            <td><?= $employee['name'] ?></td>
                            <td><?= $employee['department'] ?></td>
                            <td><?= $employee['position'] ?></td>
                            <td><?= date('Y-m-d',strtotime($employee['hired_date'])) ?></td>
                            <td><?= $employee['status'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="load_user('<?= $employee['id'] ?>','<?= $employee['name'] ?>','<?= $employee['position'] ?>','<?= $employee['department'] ?>','<?= $employee['status'] ?>')">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="delete_user(<?= $employee['id'] ?>)">
                                    Delete
                                </button> 
                            </td>
                                
                        </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>

        </div>
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Full Name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" placeholder="Department">
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" placeholder="Position">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" id="submit-btn">Create</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="edit-user">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="edit_name" placeholder="Full Name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="edit_department" placeholder="Department">
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="edit_position" placeholder="Position">
                </div>

                <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="edit_status">
                          <option value="Active">Active</option>
                          <option value="Inactive">Inactive</option>
                          <option value="Resigned">Resigned</option>
                        </select>
                      </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" onclick="edit_user(0)">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Created January 4, 2023 - Test Project</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<script>
    const csrf = ''; 
    let id_to_edit = 0;
    $(function(){
        $('#create-btn').click(function(){
            $('#modal-lg').modal('show');
        });

        $('#submit-btn').click(function(){
            const name          = $('#name').val();
            const department    = $('#department').val();
            const position      = $('#position').val();
            

            $.ajax(
                { 
                    url:'/add-user',
                    method: 'POST',
                    data: {
                        name: name,
                        department: department,
                        position: position
                    },
                    success: function(data,status){
                        alert(data['result'] + ': ' + data['text']);
                        location.reload(true);
                    },
                    error: function(data,status) {
                        data = data.responseJSON;
                        alert(data['result'] + ': ' + data['text']);
                    }
                });

        });

        
    });

    function delete_user(id) {

        if(!confirm("Are you sure")) return;

        $.ajax({
            url: '/delete/' + id,
            method: 'POST',
            success: function(data,status) {
                alert(data['result'] + ': ' + data['text']);
                location.reload(true);
            },
            error: function(data,status) {
                data = data.responseJSON;
                alert(data['result'] + ': ' + data['text']);
            }
        });

    }

    function done_job(id) {

        if(!confirm("Are you sure")) return;

        $.ajax({
            url: '/done/' + id,
            method: 'POST',
            data: {
                _token: csrf,
            },
            success: function(data,status) {
                alert(data['result'] + ': ' + data['text']);
                location.reload(true);
            },
            error: function(data,status) {
                data = data.responseJSON;
                alert(data['result'] + ': ' + data['text']);
            }
        });

    }

    function load_user(id,name,position,department,status) {
        $('#edit_name').val(name);
        $('#edit_department').val(department);
        $('#edit_position').val(position);
        $('#edit_status').val(status);
        id_to_edit = id;
        $('#edit-user').modal('show');
    }   

    function edit_user(){
        const name = $('#edit_name').val();
        const department = $('#edit_department').val();
        const position = $('#edit_position').val();
        const status = $('#edit_status').val();
        

        $.ajax({ 
            url: '/edit/' + id_to_edit,
            method:'POST',
            data: {
                name: name,
                department: department,
                position: position,
                status: status
            },
        success: function(data,status){
            alert(data['result'] + ': ' + data['text']);
            location.reload(true);
        }});
    }
</script>
</html> 