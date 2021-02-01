<?php 
  class TagsController extends Controller {
  	public function index() {
      $data = array();
      $data['list'] = $this->listTags()['result'];
    	$this->view('tags/tags',$data);
  	}
  	public function list() {
        
  	}
    public function tagsAdd(){
      $data = array();
      if(method_post()){
        $insert = array();
        $data = $_POST;
        $tags = $this->model('tags');
        $result = $tags->add($data);
        if($result['result']=='success'){
          $tags_id = $result['tags_id'];
          // $this->redirect('tags/tagsEdit&id='.$result['tags_id']);
          $this->redirect('tags');
        }
      }else{
        $data['title'] = 'เพิ่มป้าย';
        $data['action'] = 'index.php?route=tags/tagsAdd';
        $data['language'] = $this->model('language')->get()['result'];
        $this->view('tags/form',$data);
      }
    }
  	public function tagsEdit(){
      $data = array();
      $id = get('id');
      if(method_post()){
        $id = post('id');
        $insert = array();
        $data = $_POST;
        $tags = $this->model('tags');
        $result = $tags->edit($data);
        if($result['result']=='success'){
          $this->redirect('tags/tagsEdit&id='.$id.'&result=success');
        }else{
          $this->redirect('tags/tagsEdit&id='.$id.'&result=fail');
        }
      }else{
        $data['title'] = 'แก้ไขป้าย';
        $data['action'] = 'index.php?route=tags/tagsEdit&id='.$id;
        $data['id'] = $id;
        $select = array(
          'id' => $id
        );
        $tags = $this->model('tags')->get($select)['result'];

        $language = $this->model('language')->get()['result'];
        $data['tags'] = array();
        foreach($tags as $val){
          $data['tags'][$val['lang_id']] = $val;
        }
        $data['language'] = $language;
        $this->view('tags/form',$data);
      }
  	}
    public function tagsDelete(){
      $data = array();
      if(method_get()){
        $id = (int)get('id');
        if($id){
          $result_delete = $this->model('tags')->del($id);
          if($result_delete){
             $this->redirect('tags');
          }
        }
        $insert = array();
        $data = $_POST;
        
        $result = $tags->add($data);
        if($result['result']=='success'){
          $this->redirect('tags/tagsEdit&id='.$result['tags_id']);
        }
      }else{
        
      }
    }
    public function listTags($id_category=0,$type=0){
      $tags = $this->model('tags');
      $data = array(
        'lang_id' => DEFAULT_LANGUAGE
      );
      $listTags = $tags->get($data);
      if($type==1){
        echo $this->json($listTags);
      }else{
        return $listTags;
      }
    }
  }
?>