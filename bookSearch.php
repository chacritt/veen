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
$query_Recordset1 = sprintf("SELECT * FROM book WHERE id = %s", GetSQLValueString($colname_Recordset1, "text"));
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
<form id="form1" name="form1" method="post" action="bookSearch.php">
  <p>ข้อมูลหนังสือ</p>
  <table width="527" border="0">
    <tr>
      <td width="170">รหัสหนังสือ : </td>
      <td width="157"><label for="id"></label>
      <input name="id" type="text" id="id" value="<?php echo $row_Recordset1['id']; ?>" /></td>
      <td width="178"><input type="submit" name="submit" id="submit" value="ค้นหา" /></td>
    </tr>
    <tr>
      <td>ชื่อหนังสือ :</td>
      <td colspan="2"><label for="name"></label>
      <input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>ชื่อผู้แต่ง :</td>
      <td colspan="2"><label for="author"></label>
      <input name="author" type="text" id="author" value="<?php echo $row_Recordset1['author']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>สำนักพิมพ์ :</td>
      <td colspan="2"><label for="publisher"></label>
      <input name="publisher" type="text" id="publisher" value="<?php echo $row_Recordset1['publisher']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>ราคา :</td>
      <td colspan="2"><label for="price"></label>
      <input name="price" type="text" id="price" value="<?php echo $row_Recordset1['price']; ?>" readonly/></td>
    </tr>
    <tr>
      <td>จำนวนวันที่สามารถยืมได้ :</td>
      <td><label for="student"></label>
      <input type="text" name="student" id="student" value="7" readonly/></td>
      <td>วัน (สำหรับนักศึกษา)</td>
    </tr>
    <tr>
      <td>จำนวนวันที่สามารถยืมได้ :</td>
      <td><label for="staff"></label>
      <input type="text" name="staff" id="staff" value="120" readonly/></td>
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
<?php
mysql_free_result($Recordset1);
?>
