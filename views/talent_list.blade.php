<p>Hello list!</p>
@php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => '',
        'parent'                   => '0',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 0,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false 
    );
    $talent_list = get_categories( $args );

    foreach ($talent_list as $talent) {
            $talent_name = $talent->name;
            echo '<p>' . $talent_name . '</p>';
    }
@endphp