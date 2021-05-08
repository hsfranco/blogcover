<?php
/**
 * Plugin Name: BK-Ninja: Instagram Widget
 * Plugin URI: http://bk-ninja.com
 * Description: This widget allows to display instagram images.
 * Version: 1.0
 * Author: BK-Ninja
 * Author URI: http://BK-Ninja.com
 *
 */
/**
 * Add function to widgets_init that'll load our widget.
 */
add_action('widgets_init', 'bk_register_instagram_widget');
function bk_register_instagram_widget(){
	register_widget('bk_instagram');
}
class bk_instagram extends WP_Widget {
    
/**
 * Widget setup.
 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-instagram', 'description' => esc_html__('Displays Instagram Gallery.', 'the-rex') );

		/* Create the widget. */
		parent::__construct( 'bk_instagram', esc_html__('*BK: Widget Instagram', 'the-rex'), $widget_ops);
	}
    function widget( $args, $instance ) {
		extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $access_token = apply_filters('instagram_token', $instance['instagram_token']);
    	$amount = apply_filters('image_amount', $instance['image_amount']);
        
        $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
        $json_link .="access_token={$access_token}&count={$amount}";
        $json = file_get_contents($json_link);
        $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
        
        echo $before_widget; 
        if ( $title )
        echo $before_title . $title . $after_title; 
		?>
					
                <ul class="instagram-gallery clearfix">
                    <?php
                        foreach ($obj['data'] as $post){
                            $pic_link = $post['link'];
                            $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                            echo '<li class="instagram-item">';
                                echo "<a class='instagram-popup-link cursor-zoom' href='{$pic_link}' target='_blank'>";
                                  echo "<img class='img-responsive photo-thumb' src='{$pic_src}' alt='instagram-img'>";
                                echo "</a>";
                            echo "</li>";
                        }
                    ?>
                </ul>
        								
        <?php echo $after_widget; ?>
        			 
        <?php }	

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {	
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
      /* Set up some default widget settings. */
      $defaults = array( 'title' => '', 'instagram_token' => '', 'image_amount' => '');
      $instance = wp_parse_args( (array) $instance, $defaults );	

      $title = esc_attr($instance['title']);
			$instagram_token = esc_attr($instance['instagram_token']);
			$amount = esc_attr($instance['image_amount']);	
    ?>
    <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php esc_html_e('[Optional] Title:', 'the-next-mag'); ?></strong></label>
		<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php if( !empty($instance['title']) ) echo esc_attr($instance['title']); ?>" />
	</p>
    <p><label for="<?php echo $this->get_field_id('instagram_token'); ?>"><?php esc_html_e( 'Instagram Token:', 'the-next-mag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('instagram_token'); ?>" name="<?php echo $this->get_field_name('instagram_token'); ?>" type="text" value="<?php echo $instagram_token; ?>" /></label></p>
    <span><?php esc_html_e('Please get the Instagram Token here: ', 'the-rex');?><a target="_blank" href="https://instagram.pixelunion.net/"><?php esc_html_e('Get Instagram Token', 'the-rex');?></a></span>
    <p><label for="<?php echo $this->get_field_id('image_amount'); ?>"><?php esc_html_e( 'Images count:', 'the-next-mag'); ?> <input class="widefat" id="<?php echo $this->get_field_id('image_amount'); ?>" name="<?php echo $this->get_field_name('image_amount'); ?>" type="text" value="<?php echo $amount; ?>" /></label></p>	
			
<?php }

}
?>