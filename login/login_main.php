<?php
    require_once("tools.php");
    
    //����� ���̵�� �̸��� ���� ���� ���� �б�
    session_start_if_none();
    $id = sessionVar("uid");
    $name = sessionVar("uname");
    
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>

<?php if ($id) : //�α��� ������ ���� ��� ?>
<form action="<?= MEMBER_PATH ?>/logout.php" method="post">
	<?= $name ?>�� �α���
	<input type="submit" value="�α׾ƿ�">
	
	<input type="button" value="ȸ������ ����" onclick="location.href='<?=MEMBER_PATH ?>/member_update_form.php'">
</form>

<?php else : //�α��ε��� ���� ������ ���� ��� ?>
<form action="<?= MEMBER_PATH ?>/login.php" method="post">
	���̵� : <input type="text" name="id">&nbsp;&nbsp;
	��й�ȣ : <input type="password" name="pw">
	<input type="submit" value="�α���">
	
	<input type="button" value="ȸ������" onclick="location.href='<?= MEMBER_PATH ?>/member_join_form.php'">
	
</form>
<?php endif?>

</body>

</html>