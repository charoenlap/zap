<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ad โฆษณา</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ad โฆษณา</li>
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
      <!-- <h3 class="card-title">Content</h3> -->

      <div class="card-tools">
        <!-- <a class="btn btn-info btn-sm" href="<?php echo route('advertising/advertisingAdd'); ?>">
          <i class="fas fa-pencil-alt"></i>
          Add
        </a>  -->
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>หัวข้อ</th>
                  <th>Link</th>
                  <!-- <th class="text-center">Status</th> -->
                  <th width="10%" class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php  
              $i = 1;
              foreach ($list['result'] as $key => $value) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['link']; ?></td>
              <!-- <td class="text-center">
                <?php if($value['active']==0){ ?>
                  <span class="badge badge-success">เปิด</span>
                <?php }else{ ?>
                  <span class="badge badge-danger">ซ่อน</span>
                <?php } ?>
              </td> -->
              <td class="text-center">
                <a href="<?php echo route('advertising/advertisingEdit&id='.$value['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <!-- <a href="<?php echo route('advertising/advertisingDel&id='.$value['id']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
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

