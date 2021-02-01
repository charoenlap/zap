<section class="tags-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tags</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tags</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main tags -->
<section class="tags">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <!-- <h3 class="card-title">Tags</h3> -->

      <div class="card-tools">
        <a class="btn btn-info btn-sm" href="<?php echo route('tags/tagsAdd'); ?>">
          <i class="fas fa-pencil-alt"></i>
          Add
        </a>
      </div>
    </div>
    <div class="card-body p-0">
      <?php //var_dump($list);exit(); ?>
      <table class="table table-striped Tags">
          <thead>
              <tr>
                  <th style="width: 1%">
                      #
                  </th>
                  <th style="">
                      หัวข้อ
                  </th>
                  <th style="width: 8%" class="text-center">
                      Status
                  </th>
                  <th style="width: 250px">
                  </th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1;foreach($list as $val){ ?>
              <tr>
                  <td>
                      <?php echo $i++; ?>
                  </td>
                  <td>
                      <?php echo $val['title']; ?>
                      <br/>
                      <small>
                          <?php echo $val['date_create']; ?>
                      </small>
                  </td>
                  <td class="project-state">
                    <?php if($val['active']==0){ ?>
                      <span class="badge badge-success">เปิด</span>
                    <?php }else{ ?>
                      <span class="badge badge-danger">ซ่อน</span>
                    <?php } ?>
                  </td>
                  <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="<?php echo route('tags/tagsEdit&id='.$val['id']); ?>">
                          <i class="fas fa-pencil-alt"></i>Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="<?php echo route('tags/tagsDelete&id='.$val['id']); ?>">
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
<!-- /.tags