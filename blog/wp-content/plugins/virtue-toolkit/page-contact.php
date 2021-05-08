<?php
/**
 * Template Name: Contact
 *
 * @package Kadence Toolkit
 */

global $virtue, $post;
$page_map         = get_post_meta( $post->ID, '_kad_contact_map', true );
$form_math        = get_post_meta( $post->ID, '_kad_contact_form_math', true );
$contactformtitle = get_post_meta( $post->ID, '_kad_contact_form_title', true );
$form             = get_post_meta( $post->ID, '_kad_contact_form', true );
$consent          = apply_filters( 'kadence-virtue-contact-consent', false );

if ( isset( $_POST['submitted'] ) && isset( $_POST['virtue_contact_nounce'] ) ) {
	if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['virtue_contact_nounce'] ) ), 'virtue_contact_nounce_action' ) ) {
		$spam_hook = apply_filters( 'kadence-contact-spam-check', true, $_POST );

		if ( ! $spam_hook ) {
			$has_error  = true;
			$spam_error = __( 'Your post appears to be spam, if this is incorrect please contact the site admnistator.', 'virtue-toolkit' );
		}
		if ( isset( $form_math ) && 'yes' === $form_math ) {
			if ( isset( $_POST['kad_captcha'] ) && isset( $_POST['hval'] ) ) {
				$math_answer = trim( sanitize_text_field( wp_unslash( $_POST['kad_captcha'] ) ) );
				if ( md5( $math_answer ) != sanitize_text_field( wp_unslash( $_POST['hval'] ) ) ) {
					$kad_captcha_error = __( 'Check your math.', 'virtue-toolkit' );
					$has_error         = true;
				}
			} else {
				$kad_captcha_error = __( 'Check your math.', 'virtue-toolkit' );
				$has_error         = true;
			}
		}
		if ( isset( $consent ) && 'true' == $consent ) {
			if ( isset( $_POST['gdpr-consent'] ) ) {
				$gdpr_consent = sanitize_text_field( wp_unslash( $_POST['gdpr-consent'] ) );
				if ( 'on' != $gdpr_consent ) {
					$kad_consent_error = __( 'Please check the box.', 'virtue-toolkit' );
					$has_error         = true;
				}
			} else {
				$kad_consent_error = __( 'Please check the box.', 'virtue-toolkit' );
				$has_error         = true;
			}
		}
		if ( isset( $_POST['contactName'] ) && ! empty( $_POST['contactName'] ) ) {
			$name = trim( sanitize_text_field( wp_unslash( $_POST['contactName'] ) ) );
		} else {
			$name_error = __( 'Please enter your name.', 'virtue-toolkit' );
			$has_error = true;
		}
		if ( ! isset( $_POST['email'] ) || empty( $_POST['email'] ) ) {
			$email_error = __( 'Please enter your email address.', 'virtue-toolkit' );
			$has_error   = true;
		} elseif ( ! is_email( trim( sanitize_text_field( wp_unslash( $_POST['email'] ) ) ) ) ) {
			$email_error = __( 'You entered an invalid email address.', 'virtue-toolkit' );
			$has_error   = true;
		} else {
			$email = trim( sanitize_text_field( wp_unslash( $_POST['email'] ) ) );
		}

		if ( ! isset( $_POST['comments'] ) || empty( $_POST['comments'] ) ) {
			$comment_error = __( 'Please enter a message.', 'virtue-toolkit' );
			$has_error     = true;
		} else {
			$contact_comments = wp_kses_post( wp_unslash( $_POST['comments'] ) );
		}

		if ( ! isset( $has_error ) ) {

			if ( isset( $virtue['contact_email'] ) ) {
				$email_to = $virtue['contact_email'];
			} else {
				$email_to = get_option( 'admin_email' );
			}
			$sitename = get_bloginfo( 'name' );
			$subject  = '[' . $sitename . '  ' . __( 'Contact', 'virtue-toolkit' ) . '] ' . __( 'From ', 'virtue-toolkit' ) . $name;
			$body     = __( 'Name', 'virtue-toolkit' ) . ':' . $name . "\n\n" . 'Email:' . $email . "\n\n" . 'Comments:' . $contact_comments;
			$headers  = 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
			$headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
			$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
			$headers .= 'Reply-To: <' . $email . '>' . "\r\n";

			wp_mail( $email_to, $subject, $body, $headers );
			$email_sent = true;
		}
	}
}

/**
 * @hooked virtue_page_title - 20
 */
do_action( 'virtue_page_title_container' );

if ( 'yes' == $page_map ) {
	$address = get_post_meta( $post->ID, '_kad_contact_address', true );
	$maptype = get_post_meta( $post->ID, '_kad_contact_maptype', true );
	$height  = get_post_meta( $post->ID, '_kad_contact_mapheight', true );
	$mapzoom = get_post_meta( $post->ID, '_kad_contact_zoom', true );
	if ( isset( $virtue['google_map_api'] ) && ! empty( $virtue['google_map_api'] ) ) {
		$gmap_api = $virtue['google_map_api'];
	} else {
		$gmap_api = '';
	}
	if ( ! empty( $height ) ) {
		$mapheight = $height;
	} else {
		$mapheight = 300;
	}
	if ( ! empty( $mapzoom ) ) {
		$zoom = $mapzoom;
	} else {
		$zoom = 15;
	}
	if ( ! empty( $gmap_api ) ) {
		if ( wp_script_is( 'virtue_gmap', 'registered' ) ) {
			wp_enqueue_script( 'virtue_gmap' );
		}
		?>
		<div id="mapheader" class="titleclass">
			<div class="container">
				<div id="map_address" style="height:<?php echo esc_attr( $mapheight ); ?>px; margin-bottom:20px;" class="kt-gmap-js-init" data-maptype="<?php echo esc_attr( $maptype ); ?>" data-mapzoom="<?php echo esc_attr( $zoom ); ?>" data-mapcenter="<?php echo esc_attr( $address ); ?>" data-address1="<?php echo esc_attr( $address ); ?>">
				</div>
			</div><!--container-->
		</div><!--titleclass-->
		<?php
	} else {
		if ( 'TERRAIN' === $maptype ) {
			$maptype = 'p';
		} elseif ( 'HYBRID' === $maptype ) {
			$maptype = 'h';
		} elseif ( 'SATELLITE' === $maptype ) {
			$maptype = 'k';
		} else {
			$maptype = 'm';
		}
		$query_string = 'q=' . rawurlencode( $address ) . '&cid=&t=' . rawurlencode( $maptype ) . '&center=' . rawurlencode( $address );
		echo '<div class="kt-map"><iframe height="' . esc_attr( $mapheight ) . '" style="width:100%; max-width: 100%; border:0;" src="https://maps.google.com/maps?&' . esc_attr( htmlentities( $query_string ) ) . '&output=embed&z=' . esc_attr( $zoom ) . '&iwloc=A&visual_refresh=true"></iframe></div>';

	}
}
?>
<div id="content" class="container">
	<div class="row">
		<div id="main" class="<?php echo ( 'yes' === $form ? 'col-md-6' : 'col-md-12' ); ?>" role="main"> 
			<?php do_action( 'kadence_page_before_content' ); ?>
			<div class="entry-content" itemprop="mainContentOfPage">
				<?php get_template_part( 'templates/content', 'page' ); ?>
			</div>
		</div>
		<?php
		if ( 'yes' === $form ) {
			if ( wp_script_is( 'virtue_contact_validation', 'registered' ) ) {
				wp_enqueue_script( 'virtue_contact_validation' );
			}
		?>
		<div class="contactformcase col-md-6">
			<?php
			$contactformtitle = get_post_meta( $post->ID, '_kad_contact_form_title', true );
			if ( ! empty( $contactformtitle ) ) {
				echo '<h3>' . wp_kses_post( $contactformtitle ) . '</h3>';
			}
			if ( isset( $email_sent ) && true === $email_sent ) {
				do_action( 'kt_contact_email_sent' );
				?>
				<div class="thanks">
					<p><?php esc_html_e( 'Thanks, your email was sent successfully.', 'virtue-toolkit' ); ?></p>
				</div>
			<?php
			} else {

				if ( isset( $has_error ) ) {
					?>
					<p class="error"><?php esc_html_e( 'Sorry, an error occured.', 'virtue-toolkit' ); ?><p>
					<?php
				}
				?>
				<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
					<div class="contactform">
						<p>
							<label for="contactName"><b><?php esc_html_e( 'Name:', 'virtue-toolkit' ); ?></b><span class="contact-required">*</span></label>
							<input type="text" name="contactName" id="contactName" value="<?php echo ( isset( $_POST['contactName'] ) ? esc_attr( wp_kses_post( wp_unslash( $_POST['contactName'] ) ) ) : '' ); ?>" class="required requiredField full" />
							<?php if ( isset( $name_error ) ) { ?>
								<label class="error"><?php esc_html( $name_error ); ?></label>
							<?php } ?>
						</p>
						<p>
							<label for="email"><b><?php esc_html_e( 'Email:', 'virtue-toolkit' ); ?></b><span class="contact-required">*</span></label>
							<input type="text" name="email" id="email" value="<?php echo ( isset( $_POST['email'] ) ? esc_attr( wp_kses_post( wp_unslash( $_POST['email'] ) ) ) : '' ); ?>" class="required requiredField email full" />
							<?php if ( isset( $email_error ) ) { ?>
								<label class="error"><?php echo esc_html( $email_error ); ?></label>
							<?php } ?>
						</p>
						<p><label for="commentsText"><b><?php esc_html_e( 'Message: ', 'virtue-toolkit' ); ?></b><span class="contact-required">*</span></label>
							<textarea name="comments" id="commentsText" rows="10" class="required requiredField"><?php echo ( isset( $_POST['comments'] ) ? esc_textarea( wp_kses_post( wp_unslash( $_POST['comments'] ) ) ) : '' ); ?></textarea>
							<?php if ( isset( $comment_error ) ) { ?>
								<label class="error"><?php echo esc_html( $comment_error ); ?></label>
							<?php } ?>
						</p>
						<?php
						if ( isset( $form_math ) && 'yes' === $form_math ) {
								$one    = wp_rand( 5, 50 );
								$two    = wp_rand( 1, 9 );
								$result = md5( $one + $two );
								?>
								<p>
									<label for="kad_captcha"><b><?php echo esc_html( $one . ' + ' . $two ); ?> = </b><span class="contact-required">*</span></label>
									<input type="text" name="kad_captcha" id="kad_captcha" class="required requiredField kad_captcha kad-quarter" />
									<?php if ( isset( $kad_captcha_error ) ) { ?>
										<label class="error"><?php echo esc_html( $kad_captcha_error ); ?></label>
									<?php } ?>
									<input type="hidden" name="hval" id="hval" value="<?php echo esc_attr( $result ); ?>" />
								</p>
						<?php } ?>
						<?php if ( isset( $consent ) && 'true' === $consent ) { ?>
							<p>
								<input type="checkbox" name="gdpr-consent" id="gdpr-consent" class="required requiredField kad_gdpr-consent" />
								<?php
								if ( isset( $virtue_premium['contact_consent'] ) && ! empty( $virtue_premium['contact_consent'] ) ) {
									$contact_consent_label = $virtue_premium['contact_consent'];
								} else {
									if ( function_exists( 'the_privacy_policy_link' ) ) {
										$privacy_link = get_the_privacy_policy_link();
									}
									if ( ! empty( $privacy_link ) ) {
										// translators: %1$s = privacy page link.
										$contact_consent_label = sprintf( __( 'Please check to consent to our %s.', 'virtue-toolkit' ), $privacy_link );
									} else {
										$contact_consent_label = __( 'Please check to consent to our privacy policy.', 'virtue-toolkit' );
									}
								}
								?>
								<label for="gdpr-consent" class="gdpr-consent-label"><?php echo wp_kses_post( $contact_consent_label ); ?><span class="contact-required">*</span></label>
								<?php if ( isset( $kad_consent_error ) ) { ?>
									<label class="error"><?php echo esc_html( $kad_consent_error ); ?></label>
								<?php } ?>
							</p>
						<?php } ?>
						<?php
						$spam_field = apply_filters( 'kadence-contact-spam-field', null );
						$spam_field = apply_filters( 'kadence_contact_spam_field', $spam_field );
						if ( ! empty( $spam_field ) && is_array( $spam_field ) ) {
							?>
							<p>
								<?php
								if ( isset( $spam_field['label'] ) && ! empty( $spam_field['label'] ) ) {
									echo wp_kses_post( $spam_field['label'] );
								}
								if ( isset( $spam_field['input'] ) && ! empty( $spam_field['input'] ) ) {
									echo wp_kses_post( $spam_field['input'] );
								}

								if ( isset( $spam_error ) ) {
									?>
									<label class="error"><?php echo esc_html( $spam_error ); ?></label>
								<?php } ?>
							</p>
						<?php } ?>
						<p>
							<?php wp_nonce_field( 'virtue_contact_nounce_action', 'virtue_contact_nounce' ); ?>
							<input type="submit" class="kad-btn kad-btn-primary" id="submit" value="<?php esc_attr_e( 'Send Email', 'virtue-toolkit' ); ?>" ></input>
						</p>
					</div><!-- /.contactform-->
					<input type="hidden" name="submitted" id="submitted" value="true" />
				</form>
			<?php
			}
			?>
		</div><!--contactform-->
	<?php } ?>
