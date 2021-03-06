<?php
require_once('api.php');
$result = getTimeline($_GET['handle'], (int) $_GET['page'], getUser());

if ($result == NULL) {
    echo "null";
    exit;
}

$libIds = $result[0];
$postGroups = $result[1];

$libs = idsToObjects($libIds, "libraries", "Library");

if (sizeof($libs) > 0)
Library::printActivityContainerHtml(strtotime($libs[0]->date), $libs);

foreach ($postGroups as $postIds) {
    $posts = idsToObjects($postIds, "posts", "Post");
    Post::printActivityContainerHtml(strtotime($posts[0]->date), $posts);
}

function idsToObjects($ids, $table, $class) {
    if (sizeof($ids) == 0)
        return $ids;
    $idsOr = array();
    for ($i = 0; $i < sizeof($ids); $i++) {
        $idsOr[$i] = "id='". $ids[$i] ."' ";
    }
    
    $cond = implode("OR ", $idsOr);
    return loadDBObjects($table, $cond, $class);
}
?>