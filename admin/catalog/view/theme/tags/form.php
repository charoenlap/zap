<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
          <li class="breadcrumb-item"><a href="<?phpe echo route('content'); ?>">ป้าย</a></li>
          <li class="breadcrumb-item active"><?php echo $title; ?> </li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo (isset($id)?$id:'');?>">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="pt-2 px-3"><h3 class="card-title">ภาษา</h3></li>
          <?php $i=0;foreach($language as $val){ ?>
            <li class="nav-item">
              <a class="nav-link <?php echo ($i==0?'active':'');?>" id="custom-tabs-two-tabContent" data-toggle="pill" href="#custom-tabs-<?php echo $val['id'];?>" role="tab" aria-controls="custom-tabs-<?php echo $val['id'];?>" aria-selected="true"><?php echo $val['title']; ?></a>
            </li>
          <?php $i++;} ?>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <?php 
            $i=0;
            foreach($language as $val){ 
              $title  = (isset($tags[$val['id']]['title'])?$tags[$val['id']]['title']:'');
          ?>
          <div class="tab-pane fade  <?php echo ($i==0?'show active':'');?>" id="custom-tabs-<?php echo $val['id'];?>" 
            role="tabpanel" aria-labelledby="custom-tabs-<?php echo $val['id'];?>">
             <div class="row">
              <div class="col-md-12 mb-3">
                <?php $form_title = 'หัวข้อ'; ?>
                <label><?php echo $form_title; ?></label>
                <input type="text" name="title[<?php echo $val['id'];?>]" class="form-control" placeholder="<?php echo $form_title; ?>" value="<?php echo $title; ?>">
              </div>
            </div>
          </div>
          <script>
            $(function () {
              $('#summernote-<?php echo $val['id'];?>').summernote({
                height: 300
              })
            })
          </script>
          <?php $i++;} ?>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- Default box -->
    <div class="card">
      <!-- <div class="card-header">
        <h3 class="card-title">File</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div> -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 text-right">
            <button class="btn btn-primary">บันทึก</button>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </form>
</section>
<!-- /.content -->
