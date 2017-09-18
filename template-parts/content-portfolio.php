<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package codexin
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
        <header class="entry-header">
            <h1 class="entry-title">
                <a title="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>    
            <div class="entry-meta">
                <ul>
                    <li><?php the_time( 'F d, Y' ); ?></li>
                    <span class="meta-sep">•</span> 
                    <?php 
                    $field_id =  get_the_ID();
                    $term_list = wp_get_post_terms($field_id, 'field');
                    foreach( $term_list as $vterm ) : 
                        echo '<a rel="skills tag" title="" href="#">'. $vterm->name .', ' . '</a>';
                    endforeach;
                    ?>
                    <span class="meta-sep">•</span>
                    <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
                </ul>
            </div> 
        </header>
        <?php 
        if(has_post_thumbnail()): 
            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
        $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"'; ?>  
        <div class="entry-content-media">
            <div class="post-thumb">
                <img src="<?php the_post_thumbnail_url('puremedia-post-single') ?>" class="img-responsive" <?php printf( '%s', $image_alt ); ?> ">
            </div> 
        </div> <!-- end of post-thumb --> 
        <?php 
            endif; 
        ?>
            <div class="entry-content">
             <p>
                <?php the_excerpt(); ?>
            </p>
        </div> <!-- end of entry-content -->
    </article> <!-- /entry -->  