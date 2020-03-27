<?php

$object = get_queried_object();
$parent_id = $object->parent;

if ( $parent_id ) {
    echo render_blade('talent_personal');
} else {
    echo render_blade('talent_group');
}