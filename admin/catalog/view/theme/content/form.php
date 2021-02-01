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
          <li class="breadcrumb-item"><a href="<?phpe echo route('content'); ?>">เนื้อหา</a></li>
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
              $title  = (isset($content[$val['id']]['title'])?$content[$val['id']]['title']:'');
              $detail = (isset($content[$val['id']]['detail'])?$content[$val['id']]['detail']:'');
          ?>
          <div class="tab-pane fade  <?php echo ($i==0?'show active':'');?>" id="custom-tabs-<?php echo $val['id'];?>" 
            role="tabpanel" aria-labelledby="custom-tabs-<?php echo $val['id'];?>">
             <div class="row">
              <div class="col-md-12 mb-3">
                <?php $form_title = 'หัวข้อ'; ?>
                <label><?php echo $form_title; ?></label>
                <input type="text" name="title[<?php echo $val['id'];?>]" class="form-control"  
                placeholder="<?php echo $form_title; ?>" value='<?php echo htmlspecialchars_decode($title); ?>'>
              </div>
              <div class="col-md-12 mb-3">
                <label>รายละเอียด <?php echo $val['title']; ?></label>
                <textarea id="summernote-<?php echo $val['id'];?>" name="detail[<?php echo $val['id'];?>]"><?php echo htmlspecialchars_decode($detail);?></textarea>
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
      <div class="card-header">
        <h3 class="card-title">ลิงค์วีดีโอ ID Youtube</h3>
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
          <div class="col-md-12 mb-3">
              <input type="text" class="form-control" name="link" value="<?php echo (isset($content_detail[0]['link'])?$content_detail[0]['link']:'');?>" placeholder="Video youtube ID">
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">หมวดหมู่</h3>
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
          <?php 
          if(is_array($tags)){
            foreach($tags as $val){
              $check = '';
              if(isset($checked_tags)){
                $check = (in_array($val['id'],$checked_tags)?'checked':'');
              }
          ?>
            <div class="col-md-4 mb-3">
              <input type="checkbox" name="tags[]" id="tags<?php echo $val['id'];?>" value="<?php echo $val['id'];?>" 
              <?php echo $check;?> > <label for="tags<?php echo $val['id'];?>"><?php echo $val['title']; ?></label>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">รูปภาพปก</h3>
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
            <label>อัพโหลดไฟล์ <span class="text-danger">(1920X1080)</span></label>
            <div><input type="file" name="image_title"></div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="row">
              <div class="col-md-12">
                <label>ไฟล์ที่อัพโหลดแล้ว</label>
              </div>
            </div>
            <div class="row">
              <?php 
                if (isset($image_title)) {
                foreach ($image_title as $key => $value) {  
              ?> 
              <div class="col-md-6 mb-1">
                  <a href="<?php echo route('content/delImgCover&content_id='.(isset($id)?$id:''));?>" class="btn btn-danger"><i class="fas fa-minus"></i> ลบ</a>
                      <?php echo mb_strimwidth(strip_tags($value['name']), 0, 30, "...");?>
              </div>
              <div class="col-md-6 mb-1">
                <img src="../<?php echo $value['path']; ?>" class="w-100">
              </div>
              <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
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
            <label>อัพโหลดไฟล์ <span class="text-danger">แนะนำ 800*500px รูปไม่ควรเกินรูปละ 1 MB</span></label>
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
                      <a href="<?php echo route('content/delImg&id='.$val['id'].'&content_id='.(isset($id)?$id:''));?>" class="btn btn-danger"><i class="fas fa-minus"></i> ลบ</a>
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
<style>
 .form-group.note-form-group.note-group-select-from-files {
  display:none !important;
 }
</style>
