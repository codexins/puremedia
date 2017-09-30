<?php
/**
 * Template part for displaying single portfolio post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package codexin
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>                

        <div class="entry-meta">
            <ul>
                <li><?php the_time( ' F d, Y' ); ?></li>
                <span class="meta-sep"><?php _e( '.', 'puremedia' ); ?></span>                             
                <li>
                    <?php 
                    $field_id =  get_the_ID();
                    $term_list = wp_get_post_terms($field_id, 'field');
                    foreach( $term_list as $vterm ) : 
                        echo '<a rel="skills tag" title="" href="'. $vterm->link .'">'. $vterm->name .', ' . '</a>';
                    endforeach;
                    ?>
                </li>
                <span class="meta-sep"><?php _e( '.', 'puremedia' ); ?></span>
                <li><a rel="client" title="" href="#">
                    <?php 
                    $cname = rwmb_meta( 'codexin_portfolio_client', 'type=text' );
                    echo (!empty($cname)) ? $cname = $cname : '';
                    ?>
                </a></li>
            </ul>
        </div> 

    </header>

    <div class="entry-content">
        <?php
         echo '<p class="lead">' . wp_trim_words( get_the_excerpt(), '30' ). '</p>';
         the_content(); 
        ?>
    </div>

    <div class="entry-content-media">
        <div class="post-thumb">
            <?php 
            $portfolio_thumb = rwmb_meta('codexin_portfolio_thumbnail', 'type=image&size=732x549'); 
            if ( !empty( $portfolio_thumb ) ) :
                foreach ( $portfolio_thumb as $pthumb ) {
                    $pimg = $pthumb['url'];
                    echo '<img src="'. $pimg .'">';
                }

                else : ?>
                    <img src="<?php esc_url( the_post_thumbnail_url() ); ?>" >
            <?php        
            endif;
            ?>
        </div> 
    </div>
    <?php 
    $prev_link = get_previous_posts_link(__('Previous', 'puremedia'));
    $next_link = get_next_posts_link(__('Next', 'puremedia'));
    ?>               
    <div class="pagenav group">
        <?php if( $prev_link ): ?>
            <span class="prev"><a href="#" rel="prev"><?php echo $prev_link; ?></a></span>
        <?php endif; ?>
        <?php if( $next_link ): ?>  
            <span class="next"><a href="#" rel="next"><?php echo $next_link; ?></a></span>
        <?php endif; ?>
    </div> 
</article>  