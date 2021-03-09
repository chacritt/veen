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
$query_Recordset1 = sprintf("SELECT * FROM member WHERE id LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
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
<?php if($row_Recordset1['status'] == 2){ ?>
<form id="form1" name="form1" method="post" action="staffSearch.php">
  <p>ข้อมูลเจ้าหน้าที่</p>
  <table width="376" border="0">
    <tr>
      <td width="133">รหัสเจ้าหน้าที่ : </td>
      <td width="175"><label for="id"></label>
      <input name="id" type="text" id="id" value="<?php echo $row_Recordset1['id']; ?>" /></td>
      <td width="46"><input type="submit" name="submit" id="submit" value="ค้นหา" /></td>
    </tr>
    <tr>
      <td>รหัสผ่าน :</td>
      <td colspan="2"><label for="password"></label>
      <input name="password" type="text" id="password" value="<?php echo $row_Recordset1['password']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>ชื่อ-สกุล :</td>
      <td colspan="2"><label for="name"></label>
      <input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" readonly/></td>
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
  </table>
</form>
<?php } else { ?>
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
<?php } ?>
<button>เพิ่ม</button>
<button>แก้ไข</button>
<button>ลบ</button>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
