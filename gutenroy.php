<?php

/**
 * Plugin name: Gutenroy
 * Plugin author: georgestephanis
 */

add_action( 'enqueue_block_editor_assets', array( 'GS_Gutenroy', 'enqueue_block_editor_assets' ) );

class GS_Gutenroy {

	/**
	 * This is a hacky way to simplify building your first block with only one file. Please
	 * don't do it in production.
	 *
	 * You should enqueue your file normally.  This just suffices to get it loaded in the
	 * footer with other enqueued scripts by adding the actual script as data to a dummy
	 * script stub.
	 */
	static public function enqueue_block_editor_assets() {
		wp_register_script(
			'gs-gutenroy',
			null,
			array( 'wp-blocks', 'wp-element' )
		);
		wp_enqueue_script( 'gs-gutenroy' );

		ob_start();
		self::gs_gutenroy_script();
		$content = ob_get_clean();

		wp_script_add_data( 'gs-gutenroy', 'data', $content );
	}

	/**
	 * This `render_callback` operates similarly to how a Shortcode would get
	 * transformed on display.
	 *
	 * @param $attributes
	 * @return string
	 */
	static public function render_callback( $attributes ) {
		return '<pre>' . print_r( $attributes, true ) . '</pre>';
	}

	/**
	 * This should be in its own .js file.  It's just here for temporary
	 * convenience and simplification while learning.
	 *
	 * The commented out `<script>` tags are just here to trick PHPStorm
	 * into syntax highlighting the contents as javascript.
	 */
	static public function gs_gutenroy_script() {
		?>
		// <script>
			( function( wp ) {
				wp.blocks.registerBlockType( 'gs-gutenroy/hi-roy', {
					/**
					 * Pick a name, any name!
					 */
					title : '<?php echo esc_js( __( 'Hi Roy', 'gs-gutenroy' ) ); ?>',

					/**
					 * The `icon` is by default a dashicon.  Just remove the `dashicons-` prefix.
					 *
					 * @see https://developer.wordpress.org/resource/dashicons/
					 */
					icon : 'businessman',

					/**
					 * Default categories include: `common` `formatting` `layout` `widgets`
					 */
					category : 'common',

					/**
					 * This array describes the attributes of the block that we care about.
					 */
					attributes : {},

					/**
					 * This method generates the edit form for the block in the Gutenberg
					 * Editor, and handles updating the attribute.
					 *
					 * @returns {Array} of {WPElement}s
					 */
					edit : function( props ) {
						/**
						 * This handles the rendering.  We can add more rendered parts to the array
						 * of type `BlockControls` or `InspectorControls` to let us render block
						 * alignment toolbars or extra settings fields in the Block Inspector
						 * respectively.
						 *
						 * They would look something like this:
						 *
						 * ```
						 *     !! props.focus && wp.element.createElement(
						 *         wp.blocks.BlockControls,
						 *         { key : 'controls' },
						 *         wp.element.createElement(
						 *             // stuff
						 *         )
						 *     ),
						 * ```
						 *
						 * The initial `!! props.focus &&` short circuits so that the latter part
						 * of the conditional (that actually builds the relevant controls) never
						 * evaluates unless the block itself has focus.
						 */

						return [
							wp.element.createElement(
								'div',
								{
									key : 'gs-gutenroy/hi-roy/welcome',
									id : 'hi-roy-welcome'
								},
								[
									wp.element.createElement(
										'div',
										{
											key : 'gs-gutenroy/hi-roy/welcome/message',
											className : 'message'
										},
										[
											wp.element.createElement(
												'h1',
												{
													key : 'gs-gutenroy/hi-roy/welcome/message/h1',
													className : 'welcome-title'
												},
												[
													'Have you said ',
													wp.element.createElement(
														'a',
														{
															key : 'gs-gutenroy/hi-roy/welcome/message/h1/a',
															className : 'name scroll-to-say-hi',
															href : '#sayhi'
														},
														'Hi Roy'
													),
													' today?'
												]
											),
											wp.element.createElement(
												'p',
												{
													key : 'gs-gutenroy/hi-roy/welcome/message/p'
												},
												[
													'No day is complete until you\'ve greeted Roy. Thousands of people have said hi to Roy. It\'s easy to join the club.',
													wp.element.createElement(
														'br',
														{
															key: 'gs-gutenroy/hi-roy/welcome/message/p/br',
														}
													),
													wp.element.createElement(
														'a',
														{
															key: 'gs-gutenroy/hi-roy/welcome/message/p/a',
															className: 'scroll-to-say-hi',
															href: '#sayhi'
														},
														'Greet Roy'
													)
												]
											)
										]
									),
									wp.element.createElement(
										'div',
										{
											key : 'gs-gutenroy/hi-roy/welcome/roy-cutout',
											id : 'roy-cutout'
										},
										wp.element.createElement(
											'a',
											{
												href : 'http://roysivan.com/'
											},
											wp.element.createElement(
												'img',
												{
													src : 'https://hiroy.club/assets/images/roy-sivan-cutout.png'
												}
											)
										)
									)
								]
							)
						];
					},

					/**
					 * By returning `null` here, the block is stored as just a html comment,
					 * with no content markup.
					 *
					 * This lets us use `register_block_type()` in PHP to specify a
					 * `render_callback` that gets passed the specified attributes,
					 * similar to how shortcodes work.
					 *
					 * Alternately, we could return either a WPElement or even just a string to save instead.
					 *
					 * @returns {null|WPElement}
					 */
					save : function() {
						return [
							wp.element.createElement(
								'div',
								{
									key : 'gs-gutenroy/hi-roy/welcome',
									id : 'hi-roy-welcome'
								},
								[
									wp.element.createElement(
										'div',
										{
											key : 'gs-gutenroy/hi-roy/welcome/message',
											className : 'message'
										},
										[
											wp.element.createElement(
												'h1',
												{
													key : 'gs-gutenroy/hi-roy/welcome/message/h1',
													className : 'welcome-title'
												},
												[
													'Have you said ',
													wp.element.createElement(
														'a',
														{
															key : 'gs-gutenroy/hi-roy/welcome/message/h1/a',
															className : 'name scroll-to-say-hi',
															href : '#sayhi'
														},
														'Hi Roy'
													),
													' today?'
												]
											),
											wp.element.createElement(
												'p',
												{
													key : 'gs-gutenroy/hi-roy/welcome/message/p'
												},
												[
													'No day is complete until you\'ve greeted Roy. Thousands of people have said hi to Roy. It\'s easy to join the club.',
													wp.element.createElement(
														'br',
														{
															key: 'gs-gutenroy/hi-roy/welcome/message/p/br',
														}
													),
													wp.element.createElement(
														'a',
														{
															key: 'gs-gutenroy/hi-roy/welcome/message/p/a',
															className: 'scroll-to-say-hi',
															href: '#sayhi'
														},
														'Greet Roy'
													)
												]
											)
										]
									),
									wp.element.createElement(
										'div',
										{
											key : 'gs-gutenroy/hi-roy/welcome/roy-cutout',
											id : 'roy-cutout'
										},
										wp.element.createElement(
											'a',
											{
												href : 'http://roysivan.com/'
											},
											wp.element.createElement(
												'img',
												{
													src : 'https://hiroy.club/assets/images/roy-sivan-cutout.png'
												}
											)
										)
									)
								]
							)
						];
					}

				} );
			} )( window.wp );
			// </script>
		<?php
	}
}