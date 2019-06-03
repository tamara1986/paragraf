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

	
}