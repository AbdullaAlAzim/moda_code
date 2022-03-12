<?php
echo '
        <div class="container">
            <div class="moda-footer-tags">
                <ul>';
if ($categories) {
    foreach ($categories as $cats) {
        $thumbnail_id = get_term_meta($cats->term_id, 'thumbnail_id', true);
        echo '<li><a class="moda-btn" href="' . get_term_link($cats->slug, $cats->taxonomy) . '">' . $cats->name . '</a></li>';
    }
}
echo '</ul>
            </div>
        </div>';