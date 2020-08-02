<?php

/**
 *
 * File:  tag.php
 * Author: Skiychan <skiychan@outlook.com>
 * Created: 2020/08/02
 */

!defined('DEBUG') and exit('Forbidden');

function thread_find_by_tag($tag)
{
    if ($tag === '') return [];
    $tidres = db_find('xl_tags', ['name' => $tag], [], 1, 1000);
    if (empty($tidres)) return [];

    $tids = array_column($tidres, 'tid');
    $threadlist = db_find('thread', ['tid' => $tids], ['tid' => 1], 1, 1000);
    return $threadlist;

}

$tag = param(1);

$tag === '' || $tag = trim(xn_urldecode($tag));

$threadlist = [];
if ($tag) {
    $threadlist = thread_find_by_tag($tag);
    foreach($threadlist as &$thread) thread_format($thread);
}

//$ajax = true;
if ($ajax) {
    foreach ($threadlist as &$thread) $thread = thread_safe_info($thread);
    message(0, $threadlist);
} else {
    include _include(APP_PATH.'plugin/xl_tags/htm/tag.htm');
}
