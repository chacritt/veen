<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="bookSearch.php">
  <p>ข้อมูลหนังสือ</p>
  <table width="527" border="0">
    <tr>
      <td width="170">รหัสหนังสือ : </td>
      <td width="157"><label for="id"></label>
      <input type="text" name="id" id="id" /></td>
      <td width="178"><input type="submit" name="submit" id="submit" value="ค้นหา" /></td>
    </tr>
    <tr>
      <td>ชื่อหนังสือ :</td>
      <td colspan="2"><label for="name"></label>
      <input type="text" name="name" id="name" readonly/></td>
    </tr>
    <tr>
      <td>ชื่อผู้แต่ง :</td>
      <td colspan="2"><label for="author"></label>
      <input type="text" name="author" id="author" readonly/></td>
    </tr>
    <tr>
      <td>สำนักพิมพ์ :</td>
      <td colspan="2"><label for="publisher"></label>
      <input type="text" name="publisher" id="publisher" readonly/></td>
    </tr>
    <tr>
      <td>ราคา :</td>
      <td colspan="2"><label for="price"></label>
      <input type="text" name="price" id="price" readonly/></td>
    </tr>
    <tr>
      <td>จำนวนวันที่สามารถยืมได้ :</td>
      <td><label for="student"></label>
      <input type="text" name="student" id="student" readonly/></td>
      <td>วัน (สำหรับนักศึกษา)</td>
    </tr>
    <tr>
      <td>จำนวนวันที่สามารถยืมได้ :</td>
      <td><label for="staff"></label>
      <input type="text" name="staff" id="staff" readonly/></td>
      <td>วัน (สำหรับครูหรือเจ้าหน้าที่)</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<button>เพิ่ม</button>
<button>แก้ไข</button>
<button>ลบ</button>
</body>
</html>