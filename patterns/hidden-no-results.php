<?php
/**
 * Title: Hidden No Results Content
 * Slug: digital-online-courses/hidden-no-results-content
 * Inserter: no
 */
?>
<!-- wp:paragraph -->
<p>
<?php echo esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Message explaining that there are no results returned from a search', 'digital-online-courses' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'digital-online-courses' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'digital-online-courses' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'digital-online-courses' ); ?>","buttonUseIcon":true} /-->
