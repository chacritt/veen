<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="staffSearch.php">
  <p>ข้อมูลเจ้าหน้าที่</p>
  <table width="376" border="0">
    <tr>
      <td width="133">รหัสเจ้าหน้าที่ : </td>
      <td width="175"><label for="id"></label>
      <input type="text" name="id" id="id" /></td>
      <td width="46"><input type="submit" name="submit" id="submit" value="ค้นหา" /></td>
    </tr>
    <tr>
      <td>รหัสผ่าน :</td>
      <td colspan="2"><label for="password"></label>
      <input type="text" name="password" id="password" readonly/></td>
    </tr>
    <tr>
      <td>ชื่อ-สกุล :</td>
      <td colspan="2"><label for="name"></label>
      <input type="text" name="name" id="name" readonly/></td>
    </tr>
    <tr>
      <td>ที่อยู่ :</td>
      <td colspan="2"><label for="address"></label>
      <input type="text" name="address" id="address" readonly/></td>
    </tr>
    <tr>
      <td>เบอร์โทรศัพท์ :</td>
      <td colspan="2"><label for="phone"></label>
      <input type="text" name="phone" id="phone" readonly/></td>
    </tr>
  </table>
</form>
<button>เพิ่ม</button>
<button>แก้ไข</button>
<button>ลบ</button>
</body>
</html>