<?php
    require_once("tools.php");
    require_once 'MemberDao.php';
    
    //�α��� ������ ���޵� ���̵�, ��й�ȣ �б�
    $id = requestValue("id");
    $pw = requestValue("pw");
    
    //�α��� ���� �Էµ� ���̵��� ȸ�������� DB���� �б�
    $mdao = new MemberDao();
    $member = $mdao->getMember($id);
    
    //�׷� ���̵� ���� ���ڵ尡 �ְ�, ��й�ȣ�� ������ �α���
    if ($member && $member["pw"] == $pw){
        session_start_if_none();
        $_SESSION["uid"] = $id;
        $_SESSION["uname"] = $member["name"];
        
        //���� �������� ���ư�
        goNow(MAIN_PAGE);
        
    }else
        errorBack("���̵� �Ǵ� ��й�ȣ�� �߸� �Ǿ����ϴ�.");
    
?>