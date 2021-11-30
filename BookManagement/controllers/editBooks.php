<?php
class EditBooks extends Controller{
	protected function edit(){
		$viewmodel = new EditModel();
		$this->returnView($viewmodel->edit(), true);
	}
}