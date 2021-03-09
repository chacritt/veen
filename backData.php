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
if (isset($_POST['book_id'])) {
  $colname_Recordset1 = $_POST['book_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = sprintf("SELECT * FROM back WHERE book_id = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_POST['book_id'])) {
  $colname_Recordset2 = $_POST['book_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset2 = sprintf("SELECT * FROM book WHERE id = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $db_conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>กรุณากรอกรหัสผ่านหนังสือที่ต้องการค้นหา : 
    <label for="book_id"></label>
  <input name="book_id" type="text" id="book_id" value="<?php echo $row_Recordset1['book_id']; ?>" />
  <input type="submit" name="submit" id="submit" value="ค้นหา" />
  </p>
  <p>ประวัติการยืม - คืนหนังสือ</p>
  <table width="933" border="0">
    <tr>
      <td colspan="2">รหัสหนังสือ</td>
      <td width="326">ชื่อหนังสือ</td>
      <td width="258">ชื่อผู้แต่ง</td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $row_Recordset2['id']; ?></td>
      <td><?php echo $row_Recordset2['name']; ?></td>
      <td><?php echo $row_Recordset2['author']; ?></td>
    </tr>
    <tr>
      <td width="212">สำนักพิมพ์</td>
      <td width="119">ราคา</td>
      <td>จำนวนวันยืมนักเรียน - นักศึกษา</td>
      <td>จำนวนวันยืมครู - เจ้าหน้าที่</td>
    </tr>
    <tr>
      <td><?php echo $row_Recordset2['publisher']; ?></td>
      <td><?php echo $row_Recordset2['price']; ?></td>
      <td>7</td>
      <td>120</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="1">
    <tr>
      <td>วันที่ยืม</td>
      <td>วันที่คืน</td>
      <td>รหัสผู้ยืม</td>
      <td>รหัสผู้ให้ยืม</td>
      <td>รหัสผู้รับคืน</td>
      
      
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['barrowTime']; ?></td>
        <td><?php echo $row_Recordset1['time']; ?></td>
        <td><?php echo $row_Recordset1['student_id']; ?></td>
        <td><?php echo $row_Recordset1['staff_id']; ?></td>
        <td><?php echo $row_Recordset1['backStaff_id']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
