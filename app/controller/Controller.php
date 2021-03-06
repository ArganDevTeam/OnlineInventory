<?php 
	class Controller {
		protected function render($view, $render_data = array()) {
			if (!empty($render_data)) {
				extract($render_data);
			}

			include("app/view/header.php");
			
			if (isset($info)) {
				$this->info($info);
			}
			if (isset($alert)) {
				$this->alert($alert);
			}
			if (isset($error)) {
				$this->error($error);
			}

			include("app/view/$view.php");

			if (isset($injection)) {
				$this->inject($injection);
			}
			include("app/view/footer.php");
		}		

		public function auth() {
			if (isset($_SESSION['name'])) {
				return User::exist($_SESSION["name"]);
			}
			return false;
		}

		public function currentUser() {
			$name = $_SESSION["name"];
			return User::getByUsername($name);
		}

		public function checkAction($action) {
			return isset($_POST["action"]) && $_POST["action"] == $action;
		}
	
		public function checkForm($needles) {
			$input = $_POST;
			
			if (!is_array($needles)) {
				$needles = array($needles);
			}

			foreach ($needles as $needle) {
				$found = false;
				foreach ($input as $key => $value) {
					if ($needle == $key) {
						$found = (!is_null($value) && $value != "");
						break;
					}
				}

				if (!$found) {
					return false;
				}
			}

			return true;
		}

		protected function info($msg) {
			echo "<p id='message' class='info' />$msg</p>";
		}

		protected function alert($msg) {
			echo "<p id='message' class='alert' />$msg</p>";
		}

		protected function error($msg) {
			echo "<p id='message' class='error' />$msg</p>";
		}

		protected function inject($injection) {
			$json		= json_encode($injection);
			$snippet	= "<script>injection = JSON.parse('%s');</script>";
			echo sprintf($snippet, $json);	
		}

		public function errorPage($render_data) {
			extract($render_data);
			
			include("app/view/header.php");
			include("app/view/error.php");
			include("app/view/footer.php");
		}
	}
