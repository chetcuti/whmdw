<?php include($full_server_path . "_includes/auth/session-start.inc.php"); ?>
<?php include($full_server_path . "_includes/auth/login-check.inc.php"); ?>
<?php include($full_server_path . "_includes/top.inc.php"); ?>
<?php include($full_server_path . "_includes/config.inc.php"); ?>
<?php include($full_server_path . "_includes/database.inc.php"); ?>
<html>
<head><?php include($full_server_path . "_includes/head-tags.inc.php"); ?></head>
<body>
<?php include($full_server_path . "_includes/header.inc.php"); ?>
<font class="section_heading"><?=$section_heading?></font><?php include($full_server_path . "_includes/menus/whm.inc.php"); ?>
<BR><BR>

<?php
$sql = "select count(*) as total_count from _dw_whm_accounts";
$result = mysql_query($sql,$connection);
if ($result) {
while ($row = mysql_fetch_object($result)) { $number_of_accounts = number_format($row->total_count); }
?>
<strong>Accounts</strong> (<?=$number_of_accounts?> Accounts)<BR>
<font class="list_marker"><?=$list_marker?></font><a href="list-accounts.php">List Accounts</a>
<?php
} else { 
echo "No accounts exist.";
}
?>
<BR><BR>


<?php
$sql = "select count(*) as total_count from _dw_whm_dns_zones";
$result = mysql_query($sql,$connection);
if ($result) {
while ($row = mysql_fetch_object($result)) { $number_of_dns_zones = number_format($row->total_count); }
$sql = "select count(*) as total_count from _dw_whm_dns_records";
$result = mysql_query($sql,$connection);
while ($row = mysql_fetch_object($result)) { $number_of_dns_records = number_format($row->total_count); }
?>
<strong>DNS</strong> (<?=$number_of_dns_zones?> Zones /  <?=$number_of_dns_records?> Records)<BR>
<font class="list_marker"><?=$list_marker?></font><a href="list-dns-zones.php">List DNS Zones & Records</a>
<?php
} else { 
echo "No DNS zones exist.";
}
?>
<BR><BR>

<BR><strong>Maintenance</strong><BR>
<font class="list_marker"><?=$list_marker?></font><a target="_blank" href="cron/index.php">Rebuild Data Warehouse</a><BR>
Depending on the amount of information stored on your server, this could take a few minutes to complete.<BR><BR>
If you're going to use the DW regularly, you can also setup a cron job to /cron/index.php.

<?php include($full_server_path . "_includes/footer.inc.php"); ?>
</body>
</html>