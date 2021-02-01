<!-- DataTables -->
<link rel="stylesheet" href="<?php echo BASE_ASSET; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo BASE_ASSET; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Content</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Content</li>
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
        <a class="btn btn-info btn-sm" href="<?php echo route('content/contentAddNew'); ?>">
          <i class="fas fa-pencil-alt"></i>
          Add
        </a>
      </div>
    </div>
    <div class="card-body">
      <?php //var_dump($list);exit(); ?>
      <?php //var_dump($list); ?>
      <table class="table table-striped table-bordered Content" id="myTable">
          <thead>
              <tr>
                  <th style="width: 1%">No.</th>
                  <th style="">หัวข้อ</th>
                  <th>โดย</th>
                  <th style="width: 8%" class="text-center">สถานะ</th>
                  <th style="width: 15%"></th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1;foreach($list as $val){ ?>
              <tr>
                  <td class="text-center"><?php echo $i++; ?></td>
                  <td>
                      <?php echo mb_strimwidth(html_entity_decode($val['title']), 0, 50, "..."); ?>
                      <div>
                        <small><?php echo mb_strimwidth(strip_tags(html_entity_decode($val['detail'])), 0, 100, "..."); ?></small>
                      </div>
                      <br/>
                      <small>
                          <?php echo $val['date_create']; ?>
                      </small>
                  </td>
                  <td><?php echo $val['name'];?></td>
                  <td class="project-state">
                    <?php if($val['active']==0){ ?>
                      <span class="badge badge-success">เปิด</span>
                    <?php }else{ ?>
                      <span class="badge badge-danger">ซ่อน</span>
                    <?php } ?>
                  </td>
                  <td class="project-actions text-center">
                      <a class="btn btn-info btn-sm" href="<?php echo route('content/contentEditNew&id='.$val['id']); ?>">
                          <i class="fas fa-pencil-alt"></i>Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="<?php echo route('content/contentDelete&id='.$val['id']); ?>">
                          <i class="fas fa-trash"></i>Delete
                      </a>
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


<!-- DataTables  & Plugins -->
<script src="<?php echo BASE_ASSET; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_ASSET; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>