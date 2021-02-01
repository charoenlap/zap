<?php 
  class ContactController extends Controller {
      public function index() {
        $data = array();
        $data['contacts'] = $this->model('contact')->get()['result']; 
        $this->view('contact/contact',$data);
      }
      public function list() {
        
      }
      public function contactView(){
        $data = array();
        $id = get('id');
        $data['contact'] = $this->model('contact')->get($id)['result'][0];
      	$this->view('contact/contactView',$data);
      }
  }
?>