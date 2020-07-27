//<?php
// 批量添加标签云
function xl_tags_batch_create($tid, $arr, $d = NULL)
{
    $db = $_SERVER['db'];
    $d = $d ? $d : $db;
    if (!$d) return FALSE;

    $new_tag_arr = [];
    foreach ($arr as $value) {
        $new_value = trim($value);
        if ($new_value !== '') {
            $new_tag_arr[] = sprintf("(%d, '%s')", $tid, addslashes($new_value));
        }
    }

    if (empty($new_tag_arr) || count($new_tag_arr) > 5) return FALSE;

    $value_list = implode(',', $new_tag_arr);
    $sqladd = "(`tid`, `name`) VALUES $value_list";

    return db_exec("INSERT INTO {$d->tablepre}xl_tags $sqladd", $d);
}

// 根据 tid 获取标签
function xl_tags_find_by_tid($tid) {
    $arr = db_find('xl_tags', ['tid' => $tid]);
    if ($arr) {
        return $arr;
    }
    return FALSE;
}

// 删除 tid 的标签
function xl_tags_delete_by_tid($tid) {
    return db_delete('xl_tags', ['tid' => $tid]);
}
