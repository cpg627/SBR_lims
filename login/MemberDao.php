<?php
class MemberDao{
        private $db;
        
        public function __construct(){
            try{
                $this->db = new PDO("mysql:host=localhost;dbname=aem_lims", "root", "a12151215");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
}