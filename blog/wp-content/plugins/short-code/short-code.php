<?php
    /*
    Plugin Name: BK Shortcode Plugin
    Plugin URI: http://bk-ninja.com
    Description: 
    Author: BKNinja
    Version: 1.0
    Author URI: http://bk-ninja.com
    */
?>
<?php
/**
 * Youtube ShortCode
 */
function register_youtube_embed_shortcode($atts) {
    $atts = shortcode_atts (
        array (
            'src'       => '',
        ), $atts );
        $yt_id = bk_core::bk_parse_youtube($atts['src']);
        
        return '
        <div class="video-wrap-sc bk-shortcode">
            <iframe width="1050" height="591" src="http://www.youtube.com/embed/'.$yt_id.'" allowFullScreen ></iframe>
        </div>
        ';

}
add_shortcode('youtube_embed', 'register_youtube_embed_shortcode');

/**
 * Vimeo ShortCode
 */
function register_vimeo_embed_shortcode($atts) {
    $atts = shortcode_atts (
        array (
            'src'       => '',
        ), $atts );
        $vimeo_id = bk_core::bk_parse_vimeo($atts['src']);
        
        return '
        <div class="video-wrap-sc bk-shortcode">            
            <iframe src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
        </div>
        ';    
}
add_shortcode('vimeo_embed', 'register_vimeo_embed_shortcode');

/**
 * GA ShortCode
 */
function register_googleads_shortcode($atts, $content = null) {
    $atts = shortcode_atts (
    array (
        'float'       => '',
    ), $atts );
    if ($atts["float"] != 'right') {
        $float_str = 'bk-float-left';
    }else {
        $float_str = 'bk-float-right';
    }
    return '
    <div class="bkadsense bk-shortcode '.$float_str.'">
        <div class="bkadsense-content">
            '.do_shortcode($content).'
        </div>
    </div>
    ';
}
add_shortcode('bkga', 'register_googleads_shortcode');

/**
 * Haft col ShortCode
 */
function register_onehalfs_shortcode($atts, $content = null) {
    $ret = '';
    $ret = '<div class="bk_onehalfs bk-shortcode clearfix">';
    if (!preg_match_all("/(.?)\[(one_half)\b(.*?)(?:(\/))?\](?:(.+?)\[\/one_half\])?(.?)/s", $content, $matches)) {
		// if content has no accordion
		return do_shortcode($content);
	}else {
		for($i = 0; $i < count($matches[0]); $i++) {
		  $ret .= '<div class="column one_half halfsc">             
                    '.do_shortcode(trim($matches[5][$i])).'
                </div>';
		}
	}
    $ret .= '</div>';
    return $ret;
}
add_shortcode('one_halfs', 'register_onehalfs_shortcode');
/**
 * 1/3 col ShortCode
 */
function register_onethirds_shortcode($atts, $content = null) {
    $ret = '';
    $ret = '<div class="bk_onethirds bk-shortcode clearfix">';
    if (!preg_match_all("/(.?)\[(one_third)\b(.*?)(?:(\/))?\](?:(.+?)\[\/one_third\])?(.?)/s", $content, $matches)) {
		// if content has no accordion
		return do_shortcode($content);
	}else {
		for($i = 0; $i < count($matches[0]); $i++) {
		  $ret .= '<div class="column one_third thirdsc">             
            '.do_shortcode(trim($matches[5][$i])).'
        </div>';
		}
	}
    $ret .= '</div>';
    return $ret;    
}
add_shortcode('one_thirds', 'register_onethirds_shortcode');
/**
 * 1/3 2/3 col ShortCode
 */
function register_twothird_onethird_shortcode($atts, $content = null) {
    $ret = '';
    $ret = '<div class="bk_twothird_onethird bk-shortcode clearfix">';
    if (!preg_match_all("/(.?)\[(two_third)\b(.*?)(?:(\/))?\](?:(.+?)\[\/two_third\])?(.?)/s", $content, $twothird)) {
		// if content has no accordion
		return do_shortcode($content);
	}else {
		  $ret .= '<div class="column two_third thirdsc">             
            '.do_shortcode(trim($twothird[5][0])).'
        </div>';
	}
    if (!preg_match_all("/(.?)\[(one_third)\b(.*?)(?:(\/))?\](?:(.+?)\[\/one_third\])?(.?)/s", $content, $onethird)) {
		// if content has no accordion
		return do_shortcode($content);
	}else {
		  $ret .= '<div class="column one_third thirdsc">             
            '.do_shortcode(trim($onethird[5][0])).'
        </div>';
	}
    $ret .= '</div>';
    return $ret;
}
add_shortcode('twothird_onethird', 'register_twothird_onethird_shortcode');

/**
 * Infor Box ShortCode
 */
function register_infobox_shortcode($atts, $content) {
    $atts = shortcode_atts (
        array (
            'title'       => '',
            'backgroundcolor' => '',
        ), $atts );

        return '
        <div class="bkinfobox bk-shortcode" style="background-color: '.$atts["backgroundcolor"].';">             
            <h3 class="inforbox-title">'.$atts["title"].'</h3>
            <div class="infobox-content">
                '.do_shortcode($content).'
            </div>
        </div>
        ';
}
add_shortcode('bkinfobox', 'register_infobox_shortcode');

/**
 * Accordion ShortCode
 */
function register_accordions_shortcode($atts, $content) {
    $accordion_id = uniqid();
	$ret = '';
    if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		// if content has no accordion
		return do_shortcode($content);
	} else {
		// content has accordions, get title and content
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		// output follow jquery ui accordions
		$ret = '<div class="bk_accordions bk-shortcode" id="accordions-'.$accordion_id.'">';
		$accordion_id++;
		for($i = 0; $i < count($matches[0]); $i++) {
			$ret .= '<h3 class="accordion-trigger">' . $matches[3][$i]['title'] . '</h3><div class="accordion-content">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$ret .= '</div>';
		
		
	}		
	return $ret;
}
add_shortcode('accordions', 'register_accordions_shortcode');

/**
 * Tabs ShortCode
 */
function register_tabs_shortcode($atts, $content) {
    $tab_id = uniqid();
	$ret = '';
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		// if content has no tab
		return do_shortcode($content);
	} else {
		// content has tabs, get title and content
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		// output follow jquery ui tabs
		$ret = '<div class="bk_tabs bk-shortcode" id="bk-tabs-'.$tab_id.'"><ul>';
		$tab_id++;
		for($i = 0; $i < count($matches[0]); $i++) {
			$ret .= '<li><a href="#tabs-'.$i.'"><span>' . $matches[3][$i]['title'] . '</span></a></li>';
		}
		$ret .= '</ul>';
		
	
		for($i = 0; $i < count($matches[0]); $i++) {
			$ret .= '<div id="tabs-'.$i.'">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$ret .= '</div>';
		
		
	}		
	return $ret;
}
add_shortcode('tabs', 'register_tabs_shortcode');

/**
 * Parallax ShortCode
 */
function register_parallax_shortcode($atts) {
    $uid = uniqid();
    $atts = shortcode_atts (
        array (
            'image_url'       => '',
            'url'             => '',
            'title'           => '',
            'text_desc'       => '',
        ), $atts );
        if ($atts['image_url'] !== ''){
            $bg_image = 'background-image: url('.$atts["image_url"].')';
        }
        return '
        <div id="'.$uid.'" class="bkparallaxsc bk-shortcode">         
            <div class="parallaximage" data-type="background" style="'.$bg_image.'"></div>
            <div class="bkparallaxsc-details">
                <div class="inner">
                    <div class="inner-cell">   
                        <div class="innerwrap">     
                            <h3>'.$atts["title"].'</h3>
                            <p>'.$atts["text_desc"].'</p>
                        </div>
                    </div>
                </div>
            </div>
            <a classs="bkparallaxsc-link" href="'.$atts["url"].'"></a> 
        </div>';
}
add_shortcode('bkparallax', 'register_parallax_shortcode');

/**
 * Team ShortCode
 */
function register_bkteam_shortcode($atts) {
    $bkteam_html = '';
    $atts = shortcode_atts (
        array (
            'number'       => '',
            'orderby'     => 'post_count',
            'order'       => 'DESC',
            'item_in_row' => 3
        ), $atts );
    if($atts['item_in_row'] == 4) {
        $bk_col = 'four-item col-md-3 col-sm-4 col-xs-6';
    }else {
        $bk_col = 'three-item col-md-4 col-sm-4 col-xs-6';
    }
    $bkteam = get_users($atts);
    if (!empty($bkteam)) {
        $bkteam_html .= '<div class="bkteamsc bk-shortcode row"><ul class="content">';
        foreach ($bkteam as $member) {
            $bk_author_id = $member->ID;
            $bk_author_social = '';
            $bk_author_url = get_author_posts_url($bk_author_id);
            $bk_author_avatar = get_avatar($bk_author_id, '210');
            $bk_author_email = get_the_author_meta('publicemail', $bk_author_id);
            $bk_author_name = get_the_author_meta('display_name', $bk_author_id);
            $bk_author_tw = get_the_author_meta('twitter', $bk_author_id);
            $bk_author_go = get_the_author_meta('googleplus', $bk_author_id);
            $bk_author_fb = get_the_author_meta('facebook', $bk_author_id);
            $bk_author_yo = get_the_author_meta('youtube', $bk_author_id);
            $bk_author_www = get_the_author_meta('url', $bk_author_id);
            $bk_author_desc = get_the_author_meta('description', $bk_author_id);
            $bk_author_posts = count_user_posts( $bk_author_id ); 
            
            if (($bk_author_email != NULL) || ($bk_author_www != NULL) || ($bk_author_tw != NULL) || ($bk_author_go != NULL) || ($bk_author_fb != NULL) ||($bk_author_yo != NULL)) {$bk_author_social .= '<div class="member-social">';}
                if ($bk_author_email != NULL) { $bk_author_social .= '<a class="bk-tipper-bottom" data-title="Email" href="mailto:'. $bk_author_email.'"><i class="fa fa-envelope " title="'.__('Email', 'bkninja').'"></i></a>'; } 
                if ($bk_author_www != NULL) { $bk_author_social .= ' <a class="bk-tipper-bottom" data-title="Website" href="'. $bk_author_www .'" target="_blank"><i class="fa fa-globe " title="'.__('Website', 'bkninja').'"></i></a> '; } 
                if ($bk_author_tw != NULL) { $bk_author_social .= ' <a class="bk-tipper-bottom" data-title="Twitter" href="//www.twitter.com/'. $bk_author_tw.'" target="_blank" ><i class="fa fa-twitter " title="Twitter"></i></a>'; } 
                if ($bk_author_go != NULL) { $bk_author_social .= ' <a class="bk-tipper-bottom" data-title="Google Plus" href="'. $bk_author_go .'" rel="publisher" target="_blank"><i title="Google+" class="fa fa-google-plus " ></i></a>'; }
                if ($bk_author_fb != NULL) { $bk_author_social .= ' <a class="bk-tipper-bottom" data-title="Facebook" href="'.$bk_author_fb. '" target="_blank" ><i class="fa fa-facebook " title="Facebook"></i></a>'; }
                if ($bk_author_yo != NULL) { $bk_author_social .= ' <a class="bk-tipper-bottom" data-title="Youtube" href="http://www.youtube.com/user/'.$bk_author_yo. '" target="_blank" ><i class="fa fa-youtube " title="Youtube"></i></a>'; }
                if (($bk_author_email != NULL) || ($bk_author_www != NULL) || ($bk_author_go != NULL) || ($bk_author_tw != NULL) || ($bk_author_fb != NULL) ||($bk_author_yo != NULL)) { $bk_author_social .= '</div>';}                          
            if (count_user_posts($member->ID)) {
                $bkteam_html .= '<li class="team-member '.$bk_col.'">';
                $bkteam_html .= '<div class="member-img"><a href="'.$bk_author_url.'">'.$bk_author_avatar.'</a></div>';
                $bkteam_html .= '<div class="member-content">';
                $bkteam_html .= '<div class="member-name"><a href="'.$bk_author_url.'">'.$bk_author_name.'</a></div>';
                $bkteam_html .= '<div class="member-desc">'.$bk_author_desc.'</div>';
                $bkteam_html .= $bk_author_social;
                $bkteam_html .= '</div>';
                $bkteam_html .= '</li>';
            }
        }
        $bkteam_html .= '</ul></div>';
    }
    return $bkteam_html;   
    // prepare arguments
}
add_shortcode('bkteam', 'register_bkteam_shortcode');

/**
 * Author box ShortCode
 */
function register_authorbox_shortcode($atts) {
    $uid = uniqid();
    $authorboxsc_html = '';
    $atts = shortcode_atts (
        array (
            'authorid'       => '',
        ), $atts );
        
    if ($atts['authorid'] !== '') {
        $authorID = $atts['authorid'];
    }else {
        $authorID = get_current_user_id();
    }
    $authorboxsc_html .= '<div class="bk-authorsc bk-shortcode clearfix">';
    $authorboxsc_html .= bk_core::bk_author_details($authorID);
    $authorboxsc_html .= '</div><!-- end bk-authorsc -->';
    return $authorboxsc_html;
        
}
add_shortcode('authorbox', 'register_authorbox_shortcode');

/**
 * Button ShortCode
 */
function register_buttons_shortcode($atts, $content) {
    $ret = '';
    $ret = '<div class="bk_buttons bk-shortcode clearfix">';
    if (!preg_match_all("/(.?)\[(button)\b(.*?)(?:(\/))?\](?:(.+?)\[\/button\])?(.?)/s", $content, $matches)) {
		// if content has no accordion
		return do_shortcode($content);
	}else {
		// content has buttons
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		for($i = 0; $i < count($matches[0]); $i++) {
            $ret .='<a class="buttonsc" style="color: '.$matches[3][$i]['textcolor'].'; background-color: '.$matches[3][$i]['backgroundcolor'].';" href="'. $matches[3][$i]['href'] .'" target="_blank ">'. $matches[3][$i]['name'] .'</a>';
        }
	}
    $ret .= '</div>'; 
    return $ret; 
}
add_shortcode('buttons', 'register_buttons_shortcode');