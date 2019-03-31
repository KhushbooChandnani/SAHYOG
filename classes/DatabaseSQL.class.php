<?php 
    class DatabaseSQL{
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;
        public function __construct(){
            $this->host = "localhost";
            $this->username = "Jatin Sumai";
            $this->password = "jatin@99";
            $this->database = "sahyog";
            $this->connectDB();
        }
        
        /*NOTE: PHP does not support OVERLOADING!*/
        
        public function connectionString($host, $username, $password, $database){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        public function connectDB(){
            $this->connection = new mysqli($this->host, $this->username, $this->password);
            
            if(mysqli_connect_error()){
                #if the connection is not successful
                die("<h2 class='text-center'>Connection Failed : " . mysqli_error() . "</h2>");
            }
            
            $db_selected = $this->connection->select_db($this->database);
            if(!$db_selected){
                /*
                # THE FOLLOWING CODE IS DONE FOR DEPLOYING THE OPEN SOURCE PROJECTS
                # IT SHOULD AUTOMATICALLY CREATE DATABASE, TABLES AND DUMMY VALUES
                $query = "CREATE DATABASE classmanagement";
                if(mysqli_query($this->connection, $query)){
                    CREATE THE TABLES
                    INSERT DUMMY VALUES
                }
            */
                //echo "Database Selection Failed";
            }
            else{
             
            }
            //return $this->connection;
        }
        public function query($sql){
            $result = mysqli_query($this->connection,$sql);
            if(!$result){
                die("Query Failed! " .$sql );
            }
            return $result;
        }
        
        public function escape_string(){
            $escaped_string = $this->connection->real_escape_string($string);
            return $escaped_string;
        }
        
        public function getConnection(){
            return $this->connection;
        }
		
		
        function __destruct(){
            
        }


        public function insert($table, $data){
                
                $keys = array_keys($data);
                
                for($i=0;$i<count($keys);$i++){
                    $data[$keys[$i]] = mysqli_real_escape_string($this->connection,$data[$keys[$i]]);
                }
                $columnString = implode(", ", array_keys($data));
                $valueString = "'".implode("', '", array_values($data))."'";
                $sql = "INSERT INTO {$table} ({$columnString}) VALUES ({$valueString})";
                
                $res=$this->query($sql);
                return mysqli_insert_id($this->connection);
        }

        public function select($table , $wheres){
                $query = "Select * from {$table} where $wheres ";
                
                $query = $query . " AND is_deleted = 0";

                return $this->query($query);
        }

        public function selectAll($table){
            $query = "Select * from {$table} WHERE is_deleted = 0";

            $res = $this->query($query);

            if(!$res){
                die("This is not possible");
            }

            return $res;

        }

    }
?>
