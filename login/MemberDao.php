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
        
        //아이디가 $id인 레코드 반환
        public function getMember($id){
            try{
                $query = $this->db->prepare("select * from member where id = :id");
                $query->bindvalue(":id", $id, PDO::PARAM_STR);
                $query->execute();
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            
            return $result;
        }
        
        //회원정보 추가
        
}