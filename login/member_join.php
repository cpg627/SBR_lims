<?php
    require_once 'tools.php';
    require_once 'MemberDao.php';
    
    //������ �б�
    $id = requestValue("id");
    $pw = requestValue("pw");
    $name = requestValue("name");
    
    //��� �Է¶��� ä���� �ְ� ��� ���� ���̵� �ƴϸ� ȸ������ �߰�
    $mdao = new MemberDao();
    if($id && $pw && $name){
        if($mdao->getMember($id))
            errorBack("�̹� ������� ���̵� �Դϴ�.");
            else{
                $mdao->insertMember($id, $pw, $name);
                okGo("������ �Ϸ� �Ǿ����ϴ�.", MAIN_PAGE);
            }
    } else
                errorBack("��� �Է¶��� ä���ּ���.");
?>    