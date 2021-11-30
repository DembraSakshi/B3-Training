<?php
class AddModel extends Model{
//	public function Index(){
	// 	$this->query('SELECT * FROM book');
    //     $rows = $this->resultSet();
    //     return $rows;
	// }
	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
		// 	if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
		// 		Messages::setMsg('Please Fill In All Fields', 'error');
		// 		return;
		// 	}


		if($post['book_name'] == '' || $post['author'] == '' || $post['price'] == ''){
			Message::setMsg("Please Fill All Fields!","error");
			return;
		}




			// Insert into MySQL
			$this->query('INSERT INTO book (book_name, author, price) VALUES(:book_name, :author, :price)');
			$this->bind(':book_name', $post['book_name']);
			$this->bind(':author', $post['author']);
			$this->bind(':price', $post['price']);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL);
			}
	    }
		else{
			$post['book_name']=$post['author']=$post['price']=NULL;
			return $post;
		}
	}

	public function delete(){
		// Sanitize
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			$this->query('DELETE FROM book WHERE id = :id');
			$this->bind(':id', $post['id']);
			$this->execute();

			Message::setMsg('Post has been deleted', 'success');
			header('Location: '. ROOT_PATH);
		}else {
			if($get['id'] != NULL || $get['id'] != ''){
				// Fetch post using GET parameter value
				$this->query('SELECT * FROM book WHERE id = :id');
				$this->bind(':id', $get['id']);
				$row = $this->single();
				//if($row > 0)
				if($row){
					return $get['id'];
				} else {
					header('Location: ' . ROOT_PATH);
				}
			} else {
				header('Location: ' . ROOT_PATH);
			}
		}
	}
}

?>