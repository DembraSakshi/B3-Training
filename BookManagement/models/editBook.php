<?php
class EditModel extends Model{
	public function edit(){
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if($get['id'] != NULL || $get['id'] != ''){
				
			if(isset($post['submit'])){

			// Validation
			if($post['book_name'] == '' || $post['author'] == '' || $post['price'] == ''){
				Message::setMsg("Please Fill All Fields!","error");
				// $this->query('SELECT * FROM book WHERE id = :id');
				// $this->bind(':id', $get['id']);
				// return $this->single();
				return;
			}

				$this->query('UPDATE book SET book_name = :book_name, author = :author, price = :price WHERE id = :id');
				$this->bind(':book_name', $post['book_name']);
				$this->bind(':author', $post['author']);
				$this->bind(':price', $post['price']);
				$this->bind(':id', $get['id']);
				$this->execute();

				Message::setMsg('Data successfully updated', 'success');
				header('Location: '. ROOT_PATH);
			}else {
                $this->query('SELECT * FROM book WHERE id = :id');
                $this->bind(':id', $get['id']);
                $row = $this->single();
                if($row){
                    return $row; 
                } else {
                    header('Location: '.ROOT_URL);
                }
            }

	}
}
}