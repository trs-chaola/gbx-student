<?php
/*
Plugin Name: Simple Shortcodes
Plugin URI: http://www.designova.net
Description: Plugin to be used with the premium WordPress theme Simple
Author: desgnova Studio
Author URI: http://www.designova.net
Version: 1.0
*/



/*-------------------------------------
 Row 
--------------------------------------*/
function row($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts));
  //Options
  
  $html = '<div class="container-fluid '.$customclass.'">
      <div class="row-fluid">
        <div class="container">
          <div class="row">
            '.do_shortcode($content).'
          </div>
        </div>
      </div>
    </div>';
  return $html; 
}


/*-------------------------------------
 Section
--------------------------------------*/
function section($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts));
  //Options
  
  $html = '<div class="row-fluid '.$customclass.'">'.do_shortcode($content).'</div>';
  return $html; 
}

/*-------------------------------------
 Section
--------------------------------------*/
function large_text($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts));
  //Options
  
  $html = '<div class="large-text '.$customclass.'">'.do_shortcode($content).'</div>';
  return $html; 
}

/*-------------------------------------
 Column 
--------------------------------------*/
function columns($atts, $content = null)
{
  extract(shortcode_atts(array("span" => "4", "customclass" => ''), $atts));
  //Options
  
  if($customclass != '') { $cc = $customclass; } else $cc = '';
  
  //Return content  
  $html = '<div class="span'.$span.' '.$cc.'">
             '.do_shortcode($content).'
           </div>';
  return $html; 
}

/*-------------------------------------
 Section Heading
--------------------------------------*/
function page_heading($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts));
  //Options
  
  if($customclass != '') { $cc = $customclass; } else $cc = '';
  
  //Return content  
  $html = '<div class="main-heading '.$cc.'">'.do_shortcode($content).'</div>';
  return $html; 
}


/*-------------------------------------
 Sub Heading 
--------------------------------------*/
function subheading($atts, $content = null)
{
   extract(shortcode_atts(array("customclass" => ''), $atts));
    if($customclass != '') { $cc = $customclass; } else $cc = '';
     $html = '<h2 class="sub-heading '.$cc.'"><span>'.do_shortcode($content).'</span></h2>';
   return $html;
}

/*-------------------------------------
 Button 
--------------------------------------*/
function button($atts, $content = null)
{
  extract(shortcode_atts(array("url" =>'', "customclass" =>''), $atts));
  
  //Options
  if($url != '')    { $target_url = $url; } else $target_url = '';
  
  $html = '<a href="'.$target_url.'" class="btn btn-simple '.$customclass.'">'.do_shortcode($content).'</a>';
  return $html;
}

function sticky_button($atts, $content = null)
{
  extract(shortcode_atts(array("url" =>'', "txt" =>''), $atts));
  
  //Options
  if($url != '')    { $target_url = $url; } else $target_url = '';
  
  $html = '<a href="'.$target_url.'" class="scroll-link" data-soffset="0">'.do_shortcode($content).'</a>';
  return $html;
}

/*-------------------------------------
 Touch Swiper
--------------------------------------*/
function swiper_wrap($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts)); 

  $html = '<div class="'.$customclass.'">
              <div class="swiper-container">
                <div class="swiper-wrapper">'.do_shortcode($content).'</div>
              </div>
          </div>';
  return $html; 
}

function swiper_slide($atts, $content = null)
{
  extract(shortcode_atts(array("color_code" =>'', "main_title" =>'', "image_url" => '', "sub_title" => ''), $atts)); 

  $html = '<div class="swiper-slide" style="background:'.$color_code.';">
            <h2>'.$main_title.'</h2>
            <img src="'.$image_url.'" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' "/>
            <h3>'.$sub_title.'</h3>
            <p>'.do_shortcode($content).'</p>
          </div>';
  return $html; 
}

/*-------------------------------------
 Animated Promo
--------------------------------------*/
function promo_text($atts, $content = null)
{
  extract(shortcode_atts(array("customclass" => ''), $atts));
  //Options
  
  if($customclass != '') { $cc = $customclass; } else $cc = '';
  
  //Return content  
  $html = '<p class="promo-text '.$cc.'">'.do_shortcode($content).'</p>';
  return $html; 
}

function bold_text($atts, $content = null)
{
   extract(shortcode_atts(array(), $atts));
   $html = '<span>'.do_shortcode($content).'</span>';
   
   return $html;
}


/*-------------------------------------
 Team shortcode 
--------------------------------------*/
function team($atts, $content = null)
{
  global $post;
  extract(shortcode_atts(array("customclass" => ''), $atts));  
  if($customclass != '') { $cc = $customclass; } else $cc = '';
  //Get Team loop
  $html = '';
  $count_slide = 0;
  $loop = new WP_Query( array( 'post_type' => 'team', 'orderby' => 'date', 'order' => 'DESC','paged'=> false, 'posts_per_page' => '-1' ) );
  $html .= '<section id="team-grid" class="'.$cc.'">
              <ul class="grid cs-style-3 clearfix">';
  while ( $loop->have_posts() ) : $loop->the_post();

    $html.='<li>
              <article class="team-block" style="background: '.get_post_meta($post->ID,'member_bg_color',true).'">
                <img class="team-img" src="'.get_post_meta($post->ID,'member_image',true).'" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' " />
                <section class="team-info clearfix" style="background: '.get_post_meta($post->ID,'member_bg_color',true).'">
                  
                  <div class="team-info-content">
                    <h3>'.get_the_title().'</h3>
                    <div class="team-details">
                      <h6>'.get_post_meta($post->ID,'member_designation',true).'</h6>
                      <p>'.get_post_meta($post->ID,'member_description',true).'</p>
                    </div>
                  </div>

                  <div class="team-info-icons">';
                  if(get_post_meta($post->ID,'member_dribble',true) != '')
                    $html.='<div><a href="'.get_post_meta($post->ID,'member_dribble',true).'"><img alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' "  src="'.get_stylesheet_directory_uri().'/images/social/01.png"/></a></div>';
                  if(get_post_meta($post->ID,'member_twitter',true) != '')
                    $html.='<div><a href="'.get_post_meta($post->ID,'member_twitter',true).'"><img alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' "  src="'.get_stylesheet_directory_uri().'/images/social/02.png"/></a></div>';
                  if(get_post_meta($post->ID,'member_fb',true) != '')
                    $html.='<div><a href="'.get_post_meta($post->ID,'member_fb',true).'"><img alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' "  src="'.get_stylesheet_directory_uri().'/images/social/03.png"/></a></div>';
          $html.='</div>

                </section>  
              </article>    
            </li>';

  endwhile;

  $html .= '  </ul>
            </section>';   

  return $html;

}


/*-------------------------------------
 Contact Form 
--------------------------------------*/
function contact_form($atts, $content = null)
{
  
  global $options;
  $options = get_option('simple_wp');
  extract(shortcode_atts(array("customclass" => ''), $atts)); 

  $html = '<article class="contact-panel '.$customclass.'">

                <div class="row-fluid">
                  <article class="span12 text-center">
                      <div id="fname"  class="alert alert-error error ">
                      Name must not be empty
                      </div>
                      <div id="fmail" class="alert alert-error  error ">
                      Please provide a valid email
                      </div>
                      <div id="fmsg" class="alert alert-error  error ">
                      Message should not be empty
                      </div>
                  </article>
                </div>

              <form name="myform" id="contactForm" class="contact-form" action="'.get_stylesheet_directory_uri().'/sendmail.php" enctype="multipart/form-data" method="post"> 
                <input type="hidden" name="receiver" id="receiver" value="'.$options['contact_email'].'" />
                <input type="hidden" id="subject" name="subject" value="Contact form submission from '. get_bloginfo('name').'"/>
                <input type="text" name="website_url" id="website_url" class="contact_web_url" value=""/>
                <div class="row-fluid add-top-small">
                  <article class="span12">
                    <input size="100" type="text" name="name" id="name" placeholder="'.$options['name_placeholder'].'">
                            <input type="text"  size="30" id="email" name="email" placeholder="'.$options['email_placeholder'].'">
                            <textarea  id="msg" rows="3" cols="40" name="message" placeholder="'.$options['message_placeholder'].'"></textarea>
                            <button type="submit" name="submit" id="submit" class="btn btn-simple add-top-half">'.$options['submit_btn_txt'].'</button>
                  </article>
                </div>
              </form>

            </article>';
  return $html;     
}


/*-------------------------------------
 Services 
--------------------------------------*/
function services($atts, $content = null)
{
  
  extract(shortcode_atts(array("customclass" => ''), $atts)); 

  $html = '<section class="service-grid clearfix">
            <ul class="cbp-ig-grid '.$customclass.'">'.do_shortcode($content).'</ul>
          </section>';
  return $html;     
}

/*-------------------------------------
 Services Item
--------------------------------------*/
function service_item($atts, $content = null)
{
  
  extract(shortcode_atts(array("color_code" => '', "background_img_url" => '', "icon_url" => '', "title" => '', "link" => ''), $atts)); 
  $rand_class = rand(5,15);
  $html = '<li data-bg-image="'.$background_img_url.'" style="background-color: '.$color_code.'">
              <a href="'.$link.'">
                  <span class="cbp-ig-icon"><img src="'.$icon_url.'" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').' "/></span>
                  <h3 class="cbp-ig-title">'.$title.'</h3>
                  <span class="cbp-ig-category">'.do_shortcode($content).'</span>
              </a>
          </li>';
  return $html;     
}








/*--------------------------------
 Register the codes
---------------------------------*/
function register_shortcodes()
{
  
  add_shortcode('row', 'row'); 
  add_shortcode('columns', 'columns');
  add_shortcode('section', 'section');
  add_shortcode('large_text', 'large_text');
  add_shortcode('page_heading', 'page_heading');
  add_shortcode('subheading', 'subheading');
  add_shortcode('promo_text', 'promo_text');
  add_shortcode('bold_text', 'bold_text');
  add_shortcode('button', 'button');
  add_shortcode('sticky_button', 'sticky_button');
  add_shortcode('swiper_wrap', 'swiper_wrap');
  add_shortcode('swiper_slide', 'swiper_slide');
  add_shortcode('team', 'team');
  add_shortcode('contact_form', 'contact_form');
  add_shortcode('services', 'services');
  add_shortcode('service_item', 'service_item');
  
}
/*Add to wordpress action*/
add_action('init','register_shortcodes');



function register_button( $buttons ) {
   array_push($buttons,"row");
   array_push($buttons, "|","columns");
   array_push($buttons, "|","section");
   array_push($buttons, "|","large_text");
   array_push($buttons, "|","page_heading");
   array_push($buttons, "|","subheading");
   array_push($buttons, "|","button");
   array_push($buttons, "|","sticky_button");
   array_push($buttons, "|","promo_text");
   array_push($buttons, "|","swiper_wrap");
   array_push($buttons, "|","team");
   array_push($buttons, "|","services");
   array_push($buttons, "|","contact_form");
   
   
  
  return $buttons;
 }

 function add_plugin( $plugin_array ) {
    $plugin_array['shortcodes'] = plugins_url('sc/shortcodes.js' , __FILE__ );
    
   return $plugin_array;
}
function shortcodes_buttons() {
   
     if (!current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
        return;
     }
   
     if (get_user_option('rich_editing') == 'true' ) {
        add_filter( 'mce_external_plugins', 'add_plugin' );
        add_filter( 'mce_buttons_3', 'register_button' );
     }
   }
  add_action('init', 'shortcodes_buttons'); 


?>