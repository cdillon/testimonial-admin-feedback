<?php
/**
 * Plugin Name: Testimonial Admin Feedback
 * Plugin URI:
 * Description: Admin feedback for Strong Testimonials.
 * Author: Chris Dillon
 * Version: 0.1
 *
 * Author URI: https://strongplugins.com/
 * Text Domain: testimonial-admin-feedback
 * Requires: 3.7 or higher
 * License: GPLv2 or later
 *
 * Copyright 22018 Chris Dillon chris@strongplugins.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Input
 */
function testimonial_admin_feedback_input() {
	global $post;
	$feedback = get_post_meta( $post->ID, 'admin_feedback', true );
	?>
	<tr>
		<th>
			<label for="admin_feedback">Admin Feedback</label>
		</th>
		<td>
			<div class="custom-input">
				<textarea class="custom-input" id="admin_feedback" name="custom[admin_feedback]" style="width: 100%; height: 6em;"><?php echo $feedback; ?></textarea>
			</div>
		</td>
	</tr>
	<?php
}
add_action( 'wpmtst_after_client_fields', 'testimonial_admin_feedback_input' );


/**
 * Output
 */
function testimonial_admin_feedback() {
	global $post;
	$feedback = get_post_meta( $post->ID, 'admin_feedback', true );
	if ( $feedback ) {
		echo '<p>' . $feedback . '</p>';
	}
}
add_action( 'wpmtst_after_testimonial', 'testimonial_admin_feedback' );
