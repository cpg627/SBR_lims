<?php
class attachedDao {
    private $db;
    
    public function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=aem_lims", "root", "a12151215");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            exit($e->getMessage());
        }
    }
    
    
    //모든 파일정보 변환 (2차원 배열)
    //$sort필드 기준 정렬, $dir는 정렬 방향 (asc/desc)
    public function getFileList($sort, $dir){
        try{
            $query = $this->db->prepare("select * from attached_files order by $sort $dir");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            exit($e->getMessage());
        }
        return $result;
    }
    
    //새 파일 정보를 DB에 추가
    public function addFileInfo($fname, $ftime, $fsize){
        try{
            $sql = "insert into attached_files (fname, ftime, fsize) values (:fname, :ftime, :fsize)";
            $query = $this->db->prepare($sql);
            
            $query->bindValue(":fname", $fname, PDO::PARAM_STR);
            $query->bindValue(":ftime", $ftime, PDO::PARAM_STR);
            $query->bindValue(":fsize", $fsize, PDO::PARAM_INT);
            $query->execute();
                        
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    
    //$num번 파일 정보를 DB에서 삭제하고 그 파일명을 반환
    public function deletFileInfo($num){
        try{
            //삭제할 파일명을 $result에 담아 둠
            $query = $this->db->prepare("select fname from attached_files where num=:num");
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
            $result = $query->fetchColumn();
            
            //지정된 레코드 삭제
            $query = $this->db->prepare("delete from attached_files where num=:num");
            
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
        }catch(PDOException $e){
            exit($e->getMessage());
        }
        
        return $result;
        
    }
}

?>