<?php
    /**
     * 
     */
    class Login
    {
        public static $tablename = "usuario";
        public static $create_at="NOW()";

    	private $con;

        public $pk_usuario;
        public $nombre;
        public $usuario;
        public $pasword;
        public $email;
        public $aud_anulado;


        function __construct(Connexion $con)
        {
            $this->con=$con;
        }
     //variables
        public function setpkusuario($name)
        {
            $this->pk_usuario=$this->con->real_escape_string($name);
        }
        public function setusuario($name)
        {
            $this->usuario=$this->con->real_escape_string($name);
        }
        public function setnombre($name)
        {
            $this->nombre=$this->con->real_escape_string($name);
        }
       
        public function setpasword($name)
        {
            $this->pasword=$this->con->real_escape_string($name);
        }
        public function setemail($name)
        {
            $this->email=$this->con->real_escape_string($name);
        }
        public function setaudanulado($name)
        {
            $this->aud_anulado=$this->con->real_escape_string($name);
        }


         public function signIn()
        {   $row=$this->getArrayQueryResult();

            if ($this->isAffectedRows()) {
                if ($this->passwordVerify($row['pasword']))
                {
                    return $row;
                }
            }
            return false;

        }
         public function signIn2()
        {   $row2=$this->getArrayQueryResult2();

            if ($this->isAffectedRows()) {
                if ($this->passwordVerify($row2[2]))
                {
                    return $row2;
                }
            }
            return false;

        }
         public function getArrayQueryResult2()
        {
            $query="SELECT * FROM usuario WHERE email='$this->email' and aud_anulado='true'";
             $result=$this->con->query($query);
             return $result->fetch_array(MYSQLI_NUM);

        }

        public function getAllById()
        {
            $query="SELECT * FROM usuario where pk_usuario=$this->pk_usuario";
             $res=$this->con->query($query);
             return $res;
        } 

        public function getArrayQueryResult()
        {
            $query="SELECT * FROM usuario WHERE email='$this->email' or usuario='$this->email' and aud_anulado='true'";
             $result=$this->con->query($query);
             return $result->fetch_array(MYSQLI_ASSOC);

        }
        public function isAffectedRows():bool
        {
             return ($this->con->affected_rows>0);

        }
        public function passwordVerify($password):bool
        {
            return  password_verify($this->pasword,$password);
            //return $this->pasword;
        }

         
        public function getAll()
        {
            $query="SELECT * FROM ".self::$tablename."";
             $res=$this->con->query($query);
             return $res;
        }
        

    }
?>