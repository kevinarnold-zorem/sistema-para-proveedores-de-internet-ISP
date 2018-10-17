<?php

	class Connexion extends Mysqli
	{	
		private $host;
		private $user;
		private $pass;
		private $db;

		
		public function __construct()
		{	
			$this->host="localhost";
			$this->user="root";
			$this->pass="";
			$this->db="gimax";

			parent::__construct($this->host,$this->user,$this->pass,$this->db);

		}

		public function setCharset ()
		{
			$this->mysql_set_charset("utf8");
		}
	}
