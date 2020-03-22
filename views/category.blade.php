@php
    $categories = get_the_category(); // Get the category information of curent post as array.

    foreach ($categories as $category) {
        //Get the category image.
        $cat_id = $category->cat_ID; // Get cateory ID from category info array.
        $post_id = 'category_'. $cat_id; // Format post_id value to "Category_* (*->category id)" by combine cat_id value with prefix "Category_".
        $cat_imgid = get_field('cat_img', $post_id); // Get saved category image post meta id from custom field table.
        $cat_img = wp_get_attachment_image_src($cat_imgid, 'full')[0]; // Get saved image url with post meta id.

        //Get category name.
        $cat_name = $category->name;

        $cat_description = $category->description;
    }
@endphp

<h1>{{ $cat_name }}</h1>
<img src="{{ $cat_img }}" alt="">
<p>{{ $cat_description }}</p>
