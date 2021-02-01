<?php  
  $name = (isset($advertising['name'])?$advertising['name']:'');
  $link = (isset($advertising['link'])?$advertising['link']:'');
?>
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
          <li class="breadcrumb-item"><a href="<?phpe echo route('advertising'); ?>">เนื้อหา</a></li>
          <li class="breadcrumb-item active"> <?php echo $title; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo (isset($id)?$id:'');?>">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">รายละเอียด</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
          </div>
          <div class="col-md-12 mb-3">
            <label>Link</label>
            <input type="text" name="link" class="form-control" value="<?php echo $link; ?>">
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">File</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label>อัพโหลดไฟล์
              <?php if ($_GET['id'] <= "6") { ?>
                <span class="text-danger">(ขนาดภาพ 1920X1080)</span>
              <?php }elseif ($_GET['id'] >= "7"){ ?>
                <span class="text-danger">(ขนาดภาพ 1100x300)</span>
              <?php } ?>
            </label>
            <div><input type="file" name="file[]" multiple></div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="row">
              <div class="col-md-12">
                <label>ไฟล์ที่อัพโหลดแล้ว</label>
              </div>
            </div>
            <div class="row">
              
            
              <?php 
                if(isset($files)){ 
                  foreach($files as $key => $val){?>
                    <div class="col-md-12 mb-1">
                      <a href="<?php echo route('advertising/delImg&id='.$val['id'].'&ad_id='.(isset($id)?$id:''));?>" class="btn btn-danger"><i class="fas fa-minus"></i> ลบ</a>
                      <?php echo mb_strimwidth(strip_tags($val['name']), 0, 30, "...");?>
                    </div>
                  <?php 
                  }
                } 
              ?>
              
            </div>
          </div>
        </div>
      </div>
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

