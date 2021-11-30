<?php
class AddBooks extends Controller{
	// protected function Index(){
	// 	$viewmodel = new AddModel();
	// 	$this->returnView($viewmodel->Index(), true);
	// }

	protected function add(){
		$viewmodel = new AddModel();
		$this->returnView($viewmodel->add(), true);
	}


	protected function delete(){
		$viewmodel = new AddModel();
		$this->returnView($viewmodel->delete(), true);
	}
}