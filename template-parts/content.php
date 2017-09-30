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
                    <span class="meta-sep"><?php _e( '.', 'puremedia' ); ?></span>                             
                    <li><a rel="category tag" title="" href="<?php the_permalink(); ?>"><?php the_category( ', ' )?></a></li>
                    <span class="meta-sep"><?php _e( '.', 'puremedia' ); ?></span>
                    <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
                </ul>
            </div> 
        </header>
        <?php 
        if(has_post_thumbnail()): 
        $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
        $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
            if( is_single() ): ?>  
            <div class="entry-content-media">
                <div class="post-thumb">
                    <img src="<?php the_post_thumbnail_url('puremedia-post-single') ?>" class="img-responsive" <?php printf( '%s', $image_alt ); ?> ">
                </div> 
            </div> <!-- end of post-thumb --> 
        <?php 
            endif; //End if() is_single 
        endif; //End if() post_thumbnail 
        ?>
        <div class="entry-content">
           <p>
            <?php 
            if( ! is_single() ) : 
                the_excerpt(); 
            else : 
                the_content(); 
            endif; ?>
           </p>
        <?php if( is_single() && has_tag()) : ?>
            <p class="tags">
                <span>Tagged in </span>:
                <a href="<?php the_permalink(); ?>"><?php the_tags('Tags: &nbsp;',' ',''); ?></a>
            </p>
       <?php endif; ?>
        </div> <!-- end of entry-content -->
    </article> <!-- /entry -->  