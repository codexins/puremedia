<?php 
/**
 * puremedia-comments.php
 */

// first stape define comment form..
add_filter('comment_form_default_fields','puremedia_commentform_defult_fields');
function puremedia_commentform_defult_fields($amrcomentform){

  $defultFields['author'] = '<div class="group">
                   <label for="cName">Name <span class="required">*</span></label>
                   <input type="text" value="" size="35" id="cName" name="author">
                    </div>';
  $defultFields['email'] = '<div class="group">
                   <label for="cEmail">Email <span class="required">*</span></label>
                   <input type="text" value="" size="35" id="cEmail" name="email">
                    </div>'; 
  $defultFields['url'] = '<div class="group">
                   <label for="cWebsite">Website</label>
                   <input type="text" value="" size="35" id="cWebsite" name="url">
                    </div>';                          
 
  $defultFields['comment_field'] = '<div class="message group">
                       <label for="cMessage">Message <span class="required">*</span></label>
                       <textarea cols="50" rows="10" id="cMessage" name="comment"></textarea>
                    </div>';          

  return $defultFields;

}


// create Commentro when user loged In...
 add_filter('comment_form_defaults','puremedia_commentor');
 function puremedia_commentor($commentor){

    if( is_user_logged_in() ) {

      $commentor['comment_field'] = '<div class="message group">
                       <label for="cMessage">Message <span class="required">*</span></label>
                       <textarea cols="50" rows="10" id="cMessage" name="cMessage"></textarea>
                    </div>';          
      }
      else{
        $commentor['comment_field'] = '';
      }

      $commentor['comment_notes_before'] = '';

      $commentor['title_reply'] = '';
      $commentor['title_reply_before'] = '';
      $commentor['title_reply_after'] = '';

      $commentor['submit_button'] = '<button class="stroke medium" type="submit">Submit</button>';

    return $commentor;

 }


// Create Comments List and Show all comments..
function puremedian_comment_function($comment, $args, $depth) { ?>
  
    <li id="li-comment-<?php comment_ID(); ?>" class="<?php comment_class( 'depth-1' ); ?>">

        <div class="avatar">
           <img width="50" height="50" alt="" src="<?php echo get_avatar_url(get_the_author_meta('ID') ); ?>" class="avatar">
       </div> <!-- end of avatar -->

       <div class="comment-content">
            <div class="comment-info">
               <cite><?php comment_author(); ?></cite>

               <div class="comment-meta">
                 <time datetime="2014-07-12T23:05" class="comment-time"><?php printf(__('%1$s @ %2$s'), get_comment_date(),  get_comment_time()); ?></time>
                  <span class="sep">/</span>
                  <a href="<?php comment_reply_link( array_merge($args, 
                        array( 'depth' => $depth,
                            'max_depth' => $args['mex_depth'] 
                            )
                            ) ); ?>">Reply</a>
              </div>
          </div> <!-- end of comment-info -->    
          <div class="comment-text">
            <p><?php comment_text() ?></p>
          </div>
        </div> <!-- end of comment-content -->
    </li>


<?php }

  function wpb_move_comment_field_to_bottom( $fields ) {

    $comment_field = $fields['comment'];

    unset( $fields['comment'] );

    $fields['comment'] = $comment_field;

    return $fields;

  }

  add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

