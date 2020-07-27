$tag_str = param('tag');
$tag_arr = explode(',', $tag_str);

xl_tags_batch_create($tid, $tag_arr);
