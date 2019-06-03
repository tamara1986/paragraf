<?php 

class Policy extends Controller{
	public function index(){
		$this->data['title'] = 'Pregled polisa';
		$this->data['content']=PolicyDB::getAllPolicy();
		$this->show_view('policy');

	}
	public function singlePolicy(){
		if(isset($_POST['form_data']['id'])){
			$id=$_POST['form_data']['id'];
			$this->data['content']=PolicyDB::getSinglePolicy($id);	
		}
	}
	public function sortTable(){
		if(isset($_POST['form_data']['id'])){
			$id=$_POST['form_data']['id'];
			if ($id==2) {
				$this->data['content']=PolicyDB::getSinglePolicySort($id);
			}else{
				$this->data['content']=PolicyDB::getSinglePolicy($id);
			}	
		}

	}

	
}