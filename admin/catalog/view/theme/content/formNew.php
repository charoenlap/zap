
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
  <form action="#" method="POST" enctype="multipart/form-data" id="form-submit">
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
            $title = '';
            foreach($language as $val){ 
              $title  = (isset($content[$val['id']]['title'])?$content[$val['id']]['title']:'');
              $detail = (isset($content[$val['id']]['detail'])?$content[$val['id']]['detail']:'');
              $keyword = (isset($content[$val['id']]['keyword'])?$content[$val['id']]['keyword']:'');
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
              <div class="col-md-12 mb-3">
                <label for="keyword">คีย์เวิดสำหรับ SEO (หากเว้นว่างระบบจะคำนวนคำให้เองอัตโนมัติ)</label>
                <input type="text" name="keyword[<?php echo $val['id'];?>]" class="form-control" id="keyword"  
                placeholder=" ใช้ , คั่น ระหว่างคำ ตัวอย่าง ข่าวบันเทิง,ข่าวล่าสุด" value='<?php echo htmlspecialchars_decode($keyword); ?>'>
              </div>
            </div>
          </div>
          <script>
            $(function () {
              $('#summernote-<?php echo $val['id'];?>').summernote({
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                },
                callbacks: {
                onPaste: function (e) {
                      var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                      e.preventDefault();
                      document.execCommand('insertText', false, bufferText);
                    }
                },
                height: 350,
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
                toolbar: [
                  // [groupName, [list of button]]
                  ['clear',['clear']],
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']],
                  ['insert', ['link', 'picture', 'video']],
                  ['table',['table']]
                ],
                styleTags: [
                  'p',
                      { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                      'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                popover: {
                  image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                  ],
                  link: [
                    ['link', ['linkDialogShow', 'unlink']]
                  ],
                  table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                  ],
                  air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                  ]
                }

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
    <?php if(!empty($id)){ ?>
    <div class="card ">
      <div class="card-header">
        <?php /*<div class="fb-share-button" data-href="<?php echo route('detail&id='.$id.'&text='.$title); ?>" data-layout="button_count" data-size="small">
          <a target="_blank" href="<?php echo route('detail&id='.$id.'&text='.$title); ?>" class="fb-xfbml-parse-ignore">Share</a>*/ ?>
        <!-- <div class="fb-share-button" 
        data-href="<?php echo route('detail&id='.$id.'&text='.$title); ?>" 
        data-layout="button_count">
        </div> -->
        <a href="http://www.facebook.com/share.php?u=<?php echo route('detail&id='.$id); ?>&title=<?php echo urlencode($title); ?>" target="_blank">แชร์ไปยัง Facebook</a>
        <input type="text" class="form-control" value="<?php echo route('detail&id='.$id.'&text='.$title); ?>">
      </div>
    </div>
    <?php } ?>
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
          <div class="col-md-7 mb-3">
            <label>อัพโหลดไฟล์ <span class="text-danger">(1920X1080)</span></label>
            <div><input type="file" name="image_title"></div>
            <ul id="resultListUploadImgTitle"></ul>
          </div>
          <div class="col-md-5 mb-3">
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
          <div class="col-md-7 mb-3">
            <label>อัพโหลดไฟล์ <br><span class="text-danger">แนะนำ 800*500px รูปไม่ควรเกินรูปละ 1 MB</span></label>
            <div><input type="file" name="file[]" multiple></div>
            <ul id="resultListUploadFile"></ul>
          </div>
          <div class="col-md-5 mb-3">
            <div class="row">
              <div class="col-md-12">
                <label>ไฟล์ที่อัพโหลดแล้ว</label>
              </div>
            </div>
            <div class="row">
              <?php 
                if(isset($files)){ 
                  foreach($files as $key => $val){?>
                    <div class="col-md-3 mb-1">
                      <img src="<?php echo MURL;?>img.php?file=2,<?php echo MURL.$val['path'];?>,100,50" alt="">
                    </div>
                    <div class="col-md-9 mb-1">
                      <input type="text" id="myInput_<?php echo $val['id'];?>" value="<?php echo MURL.$val['path'];?>" >
                      <a href="#" onclick="myFunction(<?php echo $val['id'];?>);return false;" class="btn btn-warning btn-xs">คัดลอก</a>
                      <a href="<?php echo MURL.$val['path'];?>" target="_blank" class='btn btn-primary btn-xs'>
                        ดู
                        <?php //echo mb_strimwidth(strip_tags($val['name']), 0, 30, "...");?>
                      </a>
                      <a href="<?php echo route('content/delImg&id='.$val['id'].'&content_id='.(isset($id)?$id:''));?>" class="btn btn-danger btn-xs"><i class="fas fa-minus"></i> ลบ</a>
                    </div>
                    <hr>
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
            <button class="btn btn-primary" id="btn-submit">บันทึก <span id="result_upload_process"></span></button>
            <input type="hidden" id="content_id" name="content_id" value="<?php echo $id; ?>">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </form>
</section>
<!-- /.content -->
<script>
  function myFunction(id) {
  /* Get the text field */
  var copyText = document.getElementById("myInput_"+id);

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
  // $(function(e){
    $(document).on('click','#btn-submit',function(e){
      $(this).addClass('disabled');
      var formData = new FormData($('#form-submit')[0]);
      // $('#form-submit').submit(function(e){
        $.ajax({
          url: '<?php echo $action;;//$action;?>',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          dataType:'json'
        })
        .done(function(json) {
          console.log(json);
          if(json.result == 'success'){
            if(parseInt(json.content_id) > 0){
              var content_id = json.content_id;
              $('#content_id').val(content_id);
              $.ajax({
                url: 'index.php?route=content/listUploadImage',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                dataType:'json'
              })
              .done(function(listUploads) {
                console.log(listUploads);
                formData.append("content_id", content_id);
                var total_file = parseInt(listUploads.count_files);
                var count_file = 0;
                if(total_file==0){
                  window.location = 'index.php?route=content/contentEditNew&id='+content_id;
                }
                if(listUploads.image_title){
                  $('#resultListUploadImgTitle').append('<li id="upload_image_title">'+listUploads.image_title.name+' - '+listUploads.image_title.size+'</li>');
                  $.ajax({
                    url: 'index.php?route=content/uploadImageSingle',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'POST',
                    dataType:'json'
                  })
                  .done(function(resultUploadImage) {
                    console.log(resultUploadImage);
                    if(resultUploadImage.result=='success'){
                      $('#upload_image_title').addClass('text-success');
                      count_file += 1;
                      $('#result_upload_process').text(count_file+'/'+total_file);
                       console.log('Upload img title success');
                      if(parseInt(count_file) == total_file){
                        window.location = 'index.php?route=content/contentEditNew&id='+content_id;
                      }
                    }
                    console.log("success");
                  })
                  .fail(function(a,b,c) {
                    console.log(a);
                    console.log(b);
                    console.log(c);
                    console.log("error");
                  })
                  .always(function() {
                    console.log("complete");
                  });
                  
                }
                if(listUploads.files){
                  $.each(listUploads.files, function(index, val) {
                    var id_files_index = 'upload_image_title_'+listUploads.files[index].key;
                     $('#resultListUploadFile').append('<li id="upload_image_title_'+listUploads.files[index].key+'">'+listUploads.files[index].name+' - '+listUploads.files[index].size+'</li>');
                     formData.append("key", listUploads.files[index].key);
                     $.ajax({
                      url: 'index.php?route=content/uploadImageMuntiple',
                      data: formData,
                      contentType: false,
                      processData: false,
                      cache: false,
                      type: 'POST',
                      dataType:'json'
                    })
                    .done(function(resultUploadImage) {
                      if(resultUploadImage.result=='success'){
                        $('#upload_image_title_'+listUploads.files[index].key).addClass('text-success');
                        count_file += 1;
                        $('#result_upload_process').text(count_file+'/'+total_file);
                        if(parseInt(count_file) == total_file){
                          window.location = 'index.php?route=content/contentEditNew&id='+content_id;
                        }
                      }
                      console.log("success");
                    })
                    .fail(function(a,b,c) {
                      console.log(a);
                      console.log(b);
                      console.log(c);
                      console.log("error");
                    })
                    .always(function() {
                      console.log("complete");
                    });
                  })
                }
                console.log("success");
              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });
            }else{
              console.log('Content id Not found '+json.content_id);
            }
          }
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
        e.preventDefault();
      // });
    });
  // });
</script>
<style>
 .form-group.note-form-group.note-group-select-from-files {
  display:none !important;
 }
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>