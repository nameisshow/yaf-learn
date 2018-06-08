<?php
	class db {

		public $db;

		private $type = 'mysql';
		private $host = '127.0.0.1';
		private $dbname = '';
		private $user = 'root';
		private $passwd = 'root';
		private $prefix = '';
		private $dsn = '';

		private $methodArray = [];

		private $table = '';
		private $alias = '';
		private $field = '';
		private $where = '';
		private $or = false;
		private $join = '';
		private $order = '';
		private $group = '';
		private $limit = 0;

		private $operator = [
			'eq'=>'=',
			'neq'=>'!=',
			'gt'=>'>',
			'egt'=>'>='
			'lt'=>'<',
			'elt'=>'<=',
			'like'=>'like',
			'in'=>'in',
			'notin'=>'not in',
		];

		

		public function __construct($host = '127.0.0.1', $dbname = '', $user = 'root', $passwd = '', $prefix = ''){

			$this->host = $host;
			$this->dbname = $dbname;
			$this->user = $user;
			$this->passwd = $passwd;
			$this->prefix = $prefix;
			$type = $this->type;
			$this->dsn = "$type:host=$host;dbname=$dbname";

			try{
				$this->db = new PDO($this->dsn,$this->user,$this->passwd);
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function method(){
			$this->methodArray = [
				'select',
				'find',
				'update',
				'insert',
				'save',
				'del',

				'table',
				'alias',
				'field',
				'where',
				'or',
				'join',
				'order',
				'group',
				'having',
				'limit',
			];
		}


		public function table(string $table){
			$this->table = $this->prefix.$table;
			return $this;
		}

		public function alias(string $alias){
			$this->alias = $alias;
			return $this;
		}

		public function field(string $field){
			if($field == ''){
				$field = '*';
			}
			$this->field = $field;
			return $this;
		}

		public function where(array $where){
			if($this->where){
				if($this->or){
					$this->where = '('.$this->where . ') or ('.$where.')';
					$this->or = false;
				}else{
					$this->where = $this->where . ' and '.$where;
				}
			}
		}

		protected function createWhere(array &$where){
			//['id'=>12]
			//['id'=>['eq',12]]
			//['name'=>['like','%zhang%']]
			//['name'=>['like','%zhang%'],'age'=>['eq',23]]
			//['id'=>['in',[1,2,3,4]]]
			foreach($where as $key=>$val){
				
			}
		}

		protected function whereOpear(){

		}

		public function or(bool $flag){
			$this->or = $flag;
			return $this;
		}

		public function join(string $join, string $type = 'LEFT JOIN '){
			$join = $this->replaceTable($join);
			if($this->join){
				$this->join .= ' '.$type.' '.$join;
			}else{
				$this->join = $type.' '.$join;
			}
			return $this;
		}

		private function replaceTable(string $join){
			preg_match('/_([a-zA-Z0-9_]+)_/', $sql, $match);
			if(!$module){
				return $join;
			}
			$replace = $match[0];
			$table = $match[1];
			return str_replace($replace, $this->prefix.$table, $join);
		}

		public function order(string $order){
			if($this->order){
				$this->order .= ' '.$order;
			}else{
				$this->order = 'ORDER BY '.$order;
			}
			return $this;			
		}

		public function group(string $group){
			$this->group = 'GROUP BY '.$group;
			return $this;
		}

		public function having(string $having){
			if($this->group){
				$this->having = 'HAVING '.$having;
			}
			return $this;
		}

		public function limit($offset,$limit = 0){
			if(!$limit){
				$this->limit = 'LIMIT '.$offset;
			}else{
				$this->limit = 'LIMIT '.$offset.','.$limit;
			}
			return $this;
		}




		public function select(){

		}

		public function find(){
			$sql = 'SELECT %FIELD% FROM %TABLE% %WHERE% %ORDER% %GROUP% %HAVING% LIMIT 1';
		}

		public function update(){

		}

		public function add(){

		}

		public function save(){

		}

		public function del(){

		}

		private function clear(){
			$this->table = '';
			$this->alias = '';
			$this->field = '';
			$this->where = '';
			$this->or = false;
			$this->join = '';
			$this->order = '';
			$this->group = '';
			$this->limit = 0;
		}
	}

	$db = new db('127.0.0.1', 'tp5', 'root', 'root', 'tp_');
	var_dump($db);