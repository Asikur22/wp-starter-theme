<?php

// Adds widget: About
class About_Widget extends WP_Widget {
	
	private $widget_fields = array(
		array(
			'label' => 'Title',
			'id'    => 'title',
			'type'  => 'text',
		),
		array(
			'label' => 'Address',
			'id'    => 'address',
			'type'  => 'textarea',
		),
		array(
			'label' => 'Phone 1',
			'id'    => 'phone_one',
			'type'  => 'text',
		),
		array(
			'label' => 'Phone 2',
			'id'    => 'phone_two',
			'type'  => 'text',
		),
		array(
			'label' => 'Email',
			'id'    => 'email',
			'type'  => 'text',
		)
	);
	
	function __construct() {
		$widget_ops = array(
			'classname'   => 'about_widget',
			'description' => 'About Us Widget for Footer Area',
		);
		parent::__construct(
			'gl_about_widget',
			esc_html__( 'About', AA_THEME_SLUG ),
			$widget_ops
		);
	}
	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		if ( empty( $instance ) ) {
			return;
		}
		?>
		<?php if ( ! empty( $instance['title'] ) ) : ?>
			<?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']; ?>
		<?php endif; ?>
		<?php if ( ! empty( $instance['address'] ) ) : ?>
			<div class="footer-address">
				<?php echo wpautop( $instance['address'] ); ?>
			</div>
		<?php endif; ?>
		<div class="footer-phone my-4">
			<?php if ( ! empty( $instance['phone_one'] ) ) : ?>
				<?php echo make_clickable_phone( $instance['phone_one'] ); ?>
			<?php endif; ?>
			<?php if ( ! empty( $instance['phone_two'] ) ) : ?>
				<?php echo make_clickable_phone( $instance['phone_two'] ); ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $instance['email'] ) ) : ?>
			<div class="footer-email">
				<?php echo make_clickable( $instance['email'] ); ?>
			</div>
		<?php endif; ?>
		<?php
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$this->field_generator( $instance );
	}
	
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset( $widget_field['default'] ) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : esc_html__( $default, 'parsec' );
			switch ( $widget_field['type'] ) {
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'], 'parsec' ) . ':</label> ';
					$output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" rows="6" cols="6" autocomplete="off" value="' . esc_attr( $widget_value ) . '">' . $widget_value . '</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'], 'parsec' ) . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . esc_attr( $widget_value ) . '">';
					$output .= '</p>';
			}
		}
		echo $output;
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? strip_tags( $new_instance[ $widget_field['id'] ] ) : '';
			}
		}
		
		return $instance;
	}
}

function register_about_widget() {
	register_widget( 'About_Widget' );
}

add_action( 'widgets_init', 'register_about_widget' );