<?php

	class Message{

		public static function setMsg($text,$type){
			if($type == "error")
			{
				$_SESSION['ErrorMsg'] = $text;
			}
			else
			{
				$_SESSION['SuccessMsg'] = $text;
			}
		}

		public static function display()
		{
			if(isset($_SESSION['ErrorMsg'])){
				echo '<div class="alert alert-danger">'.$_SESSION['ErrorMsg'].'</div>';
				unset($_SESSION['ErrorMsg']);
			}

			if(isset($_SESSION['SuccessMsg'])){
				echo '<div class="alert alert-success">'.$_SESSION['SuccessMsg'].'</div>';
				unset($_SESSION['SuccessMsg']);
			}
		}
	}


?>