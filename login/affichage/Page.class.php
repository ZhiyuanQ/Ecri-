<?php
	class Page{
		private $page = 1;
		private $maxRows = 0;
		private $pageSize = 0;
		private $maxPage = 0;
		private $url = null;
		private $urlParam = '';
		function __construct($maxRows,$pageSize = 5){
			$this->maxRows = $maxRows;
			$this->pageSize = $pageSize;
			$this->page = isset($_GET['page']) ? $_GET['page'] : 1;
			$this->url = $_SERVER['PHP_SELF'];
			$this->getMaxPage();
			$this->checkPage();
			$this->urlParam();
		}
		private function urlParam(){
			foreach($_GET as $k=>$v){
				if($v != '' && $k != 'page'){
					$this->urlParam .='&'.$k.'='.$v;
				}
			}
			//echo $this->urlParam;
		}
		
		private function getMaxPage(){
			$this->maxPage = ceil($this->maxRows / $this->pageSize);
		}
		//Vérifier la page actuelle
		private function checkPage(){
			if($this->page > $this->maxPage){
				$this->page = $this->maxPage;
			}
			if($this->page < 1){
				$this->page = 1;
			}
		}
		//Sortie numéro de page
		public function showPage(){
			$str = '';
			$str .= 'Page '.$this->page .' / '.$this->maxPage . ' Pages. '.$this->maxRows . ' Données au total&nbsp;&nbsp;';
			$str .='<a href="'.$this->url.'?page=1'.$this->urlParam.'">Début</a>&nbsp;&nbsp;';
			$str .='<a href="'.$this->url.'?page='.($this->page - 1).$this->urlParam.'">Précédent</a>&nbsp;&nbsp;';
			$str .='<a href="'.$this->url.'?page='.($this->page + 1).$this->urlParam.'">Suivant</a>&nbsp;&nbsp;';
			$str .='<a href="'.$this->url.'?page='.($this->maxPage).$this->urlParam.'">Fin</a>&nbsp;&nbsp;';
			return $str;
		}
		//Retour la condition limite de pagination
		public function limit(){
			$num = ($this->page - 1) * $this->pageSize;
			$limit = $num.','.$this->pageSize;
			return $limit;
		}
	}