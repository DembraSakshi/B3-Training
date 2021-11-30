<?php
class HomeModel extends Model{
	// public function Index(){
	// 	return;
	// }


	public function Index(){
		 	$this->query('SELECT * FROM book');
		     $rows = $this->resultSet();
		     return $rows;
		}
}

