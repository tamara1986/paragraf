<?php 

class Home extends Controller{
	public function index(){
		$this->data['title'] = 'Unos polisa';
		
		$this->show_view('home');

	}
	public function insurance(){
		$this->data['title'] = 'Home';
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['insurance_form'] == 1){
			
			
        if(isset($_POST['form_data']['other'])){
          $other = $_POST['form_data']['other'];
        } else {
          $other = null;
        }

        $data = [
          'user' => [
            "name" => $_POST['form_data']['user']['name'],
            "birthday" => $_POST['form_data']['user']['birthday'],
            "passport" => $_POST['form_data']['user']['passport'],
            "phone" => $_POST['form_data']['user']['phone'],
            "email" => $_POST['form_data']['user']['email'],
            "dateGo" => $_POST['form_data']['user']['dateGo'],
            "dateBack" => $_POST['form_data']['user']['dateBack'],
            "action" => $_POST['form_data']['user']['action'],
          ],
          'other' => $other,
        ];
      }
      $this->data['content']=PolicyDB::addPolicy($data);
      echo json_encode($this->data['content']);

	}
	
}