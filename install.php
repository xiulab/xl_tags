<?php

/**
 * 标签云
 * 插件发布地址:
 * 作者: Skiychan <skiychan@outlook.com>
 */

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$charset = $db->conf['master']['charset'];
$engine = $db->conf['master']['engine'];

$sql = "CREATE TABLE IF NOT EXISTS `{$tablepre}xl_tags` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
    `tid` int(11) NOT NULL COMMENT '主题ID',
    `name` varchar(64) NOT NULL COMMENT '标签名',
    PRIMARY KEY (`id`)
  ) ENGINE={$engine} DEFAULT CHARSET={$charset} COMMENT='标签云'";
db_exec($sql);

$sql = "ALTER TABLE `{$tablepre}xl_tags` ADD UNIQUE( `tid`, `name`)";
db_exec($sql);
