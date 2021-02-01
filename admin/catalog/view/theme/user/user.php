<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-12 text-right">
          <a href="<?php echo route('users/userAdd'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped Users">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>User Name</th>
                  <th>Name</th>
                  <th class="text-right">Action</th>
              </tr>
          </thead>
          <tbody>
          		<?php 
          			$i = 1;
          			foreach ($users as $key => $value) { 
          		?>
          		<tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $value['username']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="<?php echo route('users/userView&id=').$value['id']; ?>"><i class="fas fa-folder"></i>View</a>
                      <a class="btn btn-info btn-sm" href="<?php echo route('users/userEdit&id=').$value['id']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                      <!-- <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Delete</a> -->
                  </td>
              	</tr>
              	<?php } ?>
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->