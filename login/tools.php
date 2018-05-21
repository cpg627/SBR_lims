<?php
    //ȸ�� ���԰� �α��� ����� ���� ���
    define("MAIN_PAGE", "login_main.php");
    define("MEMBER_PATH", ".");
    
    //������ ���۵��� �ʾ��� ��� ������ �����ϴ� �Լ�
    function session_start_if_none(){
        if(session_status() == PHP_SESSION_NONE)
            session_start();
    }
    
    //GET/POST�� ���޵� ���� �о� ��ȯ�ϴ� �Լ�
    //�ش� ���� ���ǵ��� �ʾ����� �� ���ڿ��� ��ȯ
    function requestValue($name){
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "";    
    }
    
    //���Ǻ��� ���� �о� ��ȯ�ϴ� �Լ�
    //�ش� ���� ���ǵ��� �ʾ����� �� ���ڿ��� ��ȯ
    function sessionVar($name){
        return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
    }
    
    //���õ� URL�� �̵��ϴ� �Լ�
    //�� �Լ� ȣ�� �ڿ� �ִ� �ڵ�� ������� ����
    function goNow($url){
        header("Location: $url");
        exit();
    }
    
    //���â�� ���� �޽����� ����ϰ� ���� �������� ���ư��� �Լ�
    function errorBack($msg){
 ?>
 		<!doctype html>
 		<html>
 		<head>
 			<meta charset="utf-8">
 		</head>
 		<body>
 		
 		<script>
			alert('<?= $msg ?>');
			history.back();
 		</script>
 		
 		</body>

  
<?php 
       exit();
    }
 
 	//���â�� ������ �޽����� ����ϰ�
 	//������ �������� �̵��ϴ� �Լ�
    function okGo($msg, $url){
?>

 		<head>
 			<meta charset="utf-8">
 		</head>
 		<body>
  		
  		<script>
			alert('<?= $msg ?>');
			location.href='<?= $url ?>';
  		</script>
  		
  		</body>
 		</html>
<?php 
        exit();
    }
?>