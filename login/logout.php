<?php
    require_once 'tools.php';
    
    //���Ǻ������� �α��� ���� ����
    session_start_if_none();
    unset($_SESSION["uid"]);
    unset($_SESSION["uname"]);
    
    //���� �������� ���ư�
    goNow(MAIN_PAGE);
?>