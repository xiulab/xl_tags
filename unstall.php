<?php

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$sql = "DROP TABLE IF EXISTS `{$tablepre}xl_tags`";
db_exec($sql);
