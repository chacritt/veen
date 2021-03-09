<?php 
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="backSearch.php">
  <p>ข้อมูลการคืนหนังสือ</p>
  <table width="316" border="0">
    <tr>
      <td width="142">รหัสนักศึกษา :</td>
      <td width="160"><label for="member_id"></label>
      <input type="text" name="member_id" id="member_id" /></td>
      <td width="0"></td>
    </tr>
    <tr>
      <td>รหัสหนังสือ :</td>
      <td><label for="book_id"></label>
      <input type="text" name="book_id" id="book_id" /></td>
      <td></td>
    </tr>
    <tr>
      <td>วันที่คืน :</td>
      <td colspan="2"><label for="back"></label>
      <input type="date" name="back" id="back" value="<?php echo date("Y-m-d"); ?>" /></td>
    </tr>
    <tr>
      <td>ชื่อผู้ให้ยืม :</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>รหัสผู้รับคืน :</td>
      <td><label for="staff_id"></label>
      <input type="text" name="staff_id" id="staff_id"></td>
      <td></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="submit" value="บันทึก" />
  </p>
</form>
</body>
</html>