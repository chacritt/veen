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
  $insertSQL = sprintf("INSERT INTO borrow (member_id, staff_id, book_id, `time`, back) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['member_id'], "text"),
                       GetSQLValueString($_POST['staff_id'], "int"),
                       GetSQLValueString($_POST['book_id'], "text"),
                       GetSQLValueString($_POST['time'], "date"),
                       GetSQLValueString($_POST['back'], "date"));

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
if (isset($_POST['member_id'])) {
  $colname_Recordset1 = $_POST['member_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset1, "text"));
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

$colname_Recordset3 = "-1";
if (isset($_POST['staff_id'])) {
  $colname_Recordset3 = $_POST['staff_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset3 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $db_conn) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_POST['member_id'])) {
  $colname_Recordset4 = $_POST['member_id'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset4 = sprintf("SELECT * FROM member WHERE id = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysql_query($query_Recordset4, $db_conn) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <p>ข้อมูลการยืมหนังสือ</p>
  <table width="522" border="0">
    <tr>
      <td width="155">รหัสนักศึกษา :</td>
      <td width="144"><label for="member_id"></label>
      <input name="member_id" type="text" id="member_id" value="<?php echo $row_Recordset4['id']; ?>"  /></td>
      <td width="209"><?php echo $row_Recordset1['name']; ?></td>
    </tr>
    <tr>
      <td>รหัสหนังสือ :</td>
      <?php if($row_Recordset2['status'] == 0 ) { ?>
      <td><input name="book_id" type="text" id="book_id" value="<?php echo $row_Recordset2['id']; ?>" /></td>
      <td><?php echo $row_Recordset2['name']; ?></td>
      <?php } else if($row_Recordset2['status'] == 1) { ?>
      <td><input name="book_id" type="text" id="book_id" required readonly="readonly" /></td>
      <td><?php echo '*หนังสือเล่มนี้ถูกยืมไปแล้ว'; ?></td>
      <?php } ?>
      <input name="status" type="hidden" id="status" value="1" /></td>
    </tr>
    <tr>
      <td>วันที่ยืม :</td>
      <td colspan="2"><label for="time"></label>
      <input type="date" name="time" id="time"  value="<?php echo date("Y-m-d"); ?>" /></td>
    </tr>
    <tr>
      <td>วันที่ครบกำหนดคืน :</td>
      <?php if($row_Recordset1['status'] == 1 ){ 
	   		$day = 7;
	   } else if($row_Recordset3['status'] == 2 ) { 
	   		$day = 120;
	   } ?>
      <td colspan="2"><?php echo date("d/m/Y",strtotime("+$day day")); ?></td>
      <input type="hidden" id="back" name="back" value="<?php echo date("Y-m-d",strtotime("+$day day")); ?>" />
    </tr>
    <tr>
      <td>รหัสผู้ให้ยืม :</td>
      <td><label for="staff_id"></label>
      <input name="staff_id" type="text" id="staff_id" value="<?php echo $row_Recordset3['id']; ?>" /></td>
      <td><?php echo $row_Recordset3['name']; ?></td>
    </tr>
  </table>
  <p>
      <?php if($row_Recordset2['status'] == 0 ) { ?>
      <input type="submit" name="submit" id="submit" value="บันทึก" />
      <?php } else if($row_Recordset2['status'] == 1) { ?>
      <input type="submit" name="submit" id="submit" value="บันทึก" disabled />
      <?php } ?>
  </p>
  <input type="hidden" name="MM_insert" value="form1" />
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
