<?php require_once('Connections/db_conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_POST['id'])) {
  $colname_Recordset1 = $_POST['id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="memberSearch.php">
  <p>ข้อมูลสมาชิก</p>
  <table width="360" border="0">
    <tr>
      <td width="134">รหัสนักศึกษา :</td>
      <td width="158"><label for="id"></label>
      <input name="id" type="text" id="id" value="<?php echo $row_Recordset1['id']; ?>" /></td>
      <td width="46"><input type="submit" name="submit" id="submit" value="ค้นหา" /></td>
    </tr>
    <tr>
      <td>รหัสผ่าน :</td>
      <td colspan="2"><label for="password"></label>
      <input name="password" type="password" id="password" value="<?php echo $row_Recordset1['password']; ?>" readonly/></td>
    </tr>
    <tr>
      <td> ชื่อ-สกุล :</td>
      <td colspan="2"><label for="name"></label>
      <input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>กลุ่ม :</td>
      <td colspan="2"><label for="class"></label>
      <input name="class" type="text" id="class" value="<?php echo $row_Recordset1['class']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>ที่อยู่ :</td>
      <td colspan="2"><label for="address"></label>
      <input name="address" type="text" id="address" value="<?php echo $row_Recordset1['address']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>เบอร์โทรศัพท์ :</td>
      <td colspan="2"><label for="phone"></label>
      <input name="phone" type="text" id="phone" value="<?php echo $row_Recordset1['phone']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>ประเภทสมาชิก :</td>
      <td colspan="2"><label for="status"></label>
      <input name="status" type="text" id="status" value="<?php echo $row_Recordset1['status']; ?>" readonly/></td>
    </tr>
  </table>
</form>
<button>เพิ่ม</button>
<button>แก้ไข</button>
<button>ลบ</button>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
