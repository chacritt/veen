<?php 
date_default_timezone_set("Asia/Bangkok");
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO back (student_id, staff_id, backStaff_id, book_id, `time`, barrowTime) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['member_id'], "text"),
                       GetSQLValueString($_POST['staff_id'], "int"),
                       GetSQLValueString($_POST['backStaff_id'], "int"),
                       GetSQLValueString($_POST['book_id'], "text"),
                       GetSQLValueString($_POST['time'], "date"),
                       GetSQLValueString($_POST['barrowTime'], "date"));

  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($insertSQL, $db_conn) or die(mysql_error());

  $insertGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE book SET status=%s WHERE id=%s",
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['book_id'], "text"));

  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());

  $updateGoTo = "admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_POST['book_id'])) {
  $colname_Recordset1 = $_POST['book_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = sprintf("SELECT * FROM borrow WHERE book_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = "-1";
if (isset($_POST['member_id'])) {
  $totalRows_Recordset1 = $_POST['member_id'];
}
$colname_Recordset1 = "-1";

$colname_Recordset2 = "-1";
if (isset($_POST['staff_id'])) {
  $colname_Recordset2 = $_POST['staff_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset2 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $db_conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_POST['book_id'])) {
  $colname_Recordset3 = $_POST['book_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset3 = sprintf("SELECT * FROM book WHERE id = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $db_conn) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_POST['staff_id'])) {
  $colname_Recordset4 = $_POST['staff_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset4 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $db_conn) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

$colname_Recordset5 = "-1";
if (isset($_POST['member_id'])) {
  $colname_Recordset5 = $_POST['member_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset5 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset5, "text"));
$Recordset5 = mysql_query($query_Recordset5, $db_conn) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);

$colname_Recordset1 = "-1";
if (isset($_POST['book_id'])) {
  $colname_Recordset1 = $_POST['book_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = sprintf("SELECT * FROM borrow WHERE book_id = %s", GetSQLValueString($colname_Recordset1, "text"));
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
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>ข้อมูลการคืนหนังสือ</p>
  <table width="525" border="0">
    <tr>
      <td width="142">รหัสนักศึกษา :</td>
      <td width="160"><label for="member_id"></label>
      <input name="member_id" type="text" id="member_id" value="<?php echo $row_Recordset5['id']; ?>" /></td>
      <td width="209"><?php echo $row_Recordset5['name']; ?></td>
    </tr>
    <tr>
      <td width="142">รหัสหนังสือ :</td>
      <td width="160"><label for="book_id"></label>
      <input name="book_id" type="text" id="book_id" value="<?php echo $row_Recordset3['id']; ?>" /></td>
      <td><?php echo $row_Recordset3['name']; ?></td>
      <input name="bookID" type="hidden" id="bookID" value="<?php echo $row_Recordset3['name']; ?>" />
      <input name="status" type="hidden" id="status" value="0" /></td>
    </tr>
    <tr>
      <td>วันที่คืน :</td>
      <td colspan="2"><label for="back"></label>
      <input type="date" name="time" id="time" value="<?php echo date("Y-m-d"); ?>" /></td>
      <input name="barrowTime" type="hidden" id="barrowTime" value="<?php echo $row_Recordset1['time']; ?>" />
    </tr>
    <tr>
      <td>ชื่อผู้ให้ยืม :</td>
      <td colspan="2"><?php echo $row_Recordset4['name']; ?></td>
       <input name="backStaff_id" type="hidden" id="backStaff_id" value="<?php echo $row_Recordset4['id']; ?>">
    </tr>
    <tr>
      <td>รหัสผู้รับคืน :</td>
      <td><label for="staff_id"></label>
      <input name="staff_id" type="text" id="staff_id" value="<?php echo $row_Recordset2['id']; ?>"></td>
      <td><?php echo $row_Recordset2['name']; ?></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="submit" value="บันทึก" />
  </p>
  <input type="hidden" name="MM_insert" value="form1" />
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);

mysql_free_result($Recordset5);

mysql_free_result($Recordset1);
?>
