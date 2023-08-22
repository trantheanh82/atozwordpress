<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'Gyan_Templates_Manager' ) ) {

	class Gyan_Templates_Manager {

		private static $instance = null;
		protected $option = 'gyan_categories';
		protected $templates_option = 'gyan_templates';
        public static function get_instance() { if ( null == self::$instance ) { self::$instance = new self; }  return self::$instance; }

		public function init() {
			add_action( 'elementor/init', array( $this, 'register_templates_source' ) );
			
			if ( defined( 'Elementor\Api::LIBRARY_OPTION_KEY' ) ) {
				// Add templates to Elementor templates list
				add_filter( 'option_' . Elementor\Api::LIBRARY_OPTION_KEY, array( $this, 'prepend_categories' ) );
			}

            if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.2.8', '>' ) ) {
                add_action( 'elementor/ajax/register_actions', array( $this, 'register_ajax_actions' ), 20 );
            } else {
                add_action( 'wp_ajax_elementor_get_template_data', array( $this, 'force_gyan_template_source' ), 0 );
            }
			
			if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
				add_filter( 'option_' . Elementor\Api::LIBRARY_OPTION_KEY, array( $this, 'prepend_templates' ) );
			}
		}
		
		public function register_templates_source() {
			require GYAN_ADDONS_DIR.'templates_source.php';
			
			$elementor = Elementor\Plugin::instance();
            $elementor->templates_manager->register_source( 'Gyan_Templates_Source' );
		}
		
		public function transient_key() { return $this->option . '_'; }
		public function templates_transient_key() { return $this->templates_option . '_'; }

		public function get_categories() {
			$categories = array('theme blocks');
			return $categories;
		}
		
		public function prepend_categories( $library_data ) {
			$categories = $this->get_categories();
		
			if ( ! empty( $categories ) ) {
		
				if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.3.9', '>' ) ) {
					$library_data['types_data']['block']['categories'] = array_merge( $categories, $library_data['types_data']['block']['categories'] );
				} else {
					$library_data['categories'] = array_merge( $categories, $library_data['categories'] );
				}
		
				return $library_data;
		
			} else {
				return $library_data;
			}
		
		}
		
		public function register_ajax_actions( $ajax ) {
			if ( ! isset( $_REQUEST['actions'] ) ) { return; }

			$actions = json_decode( stripslashes( $_REQUEST['actions'] ), true );
			$data    = false;

			foreach ( $actions as $id => $action_data ) {
				if ( ! isset( $action_data['get_template_data'] ) ) { $data = $action_data; }
			}

			if ( ! $data ) { return; }
			if ( ! isset( $data['data'] ) ) { return; }

			$data = $data['data'];

			if ( empty( $data['template_id'] ) ) { return; }
			if ( false === strpos( $data['template_id'], 'gyan_' ) ) { return; }

			$ajax->register_ajax_action( 'get_template_data', array( $this, 'get_gyan_template_data' ) );
		}

		public function get_gyan_template_data( $args ) {
			$source = Elementor\Plugin::instance()->templates_manager->get_source( 'gyan-templates' );
			$data = $source->get_data( $args );
			return $data;
		}

		public function force_gyan_template_source() {
			if ( empty( $_REQUEST['template_id'] ) ) { return; }
			if ( false === strpos( $_REQUEST['template_id'], 'gyan_' ) ) { return; }
			$_REQUEST['source'] = 'gyan-templates';
		}
		
		public function prepend_templates( $library_data ) {
			$templates = $this->get_templates();
			if ( ! empty( $templates ) ) { $library_data['templates'] = array_merge( $library_data['templates'], $templates ); }
			return $library_data;
		}
					
		public function get_templates() {
		
			$templates = get_transient( $this->templates_transient_key() );

			if ( ! $templates ) {
				$source    = Elementor\Plugin::instance()->templates_manager->get_source( 'gyan-templates' );
				$templates = $source->get_items();

				if ( ! empty( $templates ) ) {

					$templates = array_map( function ( $template ) {

						$template['id']                = $template['template_id'];
						$template['tmpl_created']      = $template['date'];
						$template['tags']              = json_encode( $template['tags'] );
						$template['is_pro']            = $template['isPro'];
						$template['access_level']      = $template['accessLevel'];
						$template['popularity_index']  = $template['popularityIndex'];
						$template['trend_index']       = $template['trendIndex'];
						$template['has_page_settings'] = $template['hasPageSettings'];

						unset( $template['template_id'] );
						unset( $template['date'] );
						unset( $template['isPro'] );
						unset( $template['accessLevel'] );
						unset( $template['popularityIndex'] );
						unset( $template['trendIndex'] );
						unset( $template['hasPageSettings'] );

						return $template;
					}, $templates );

					set_transient( $this->templates_transient_key(), $templates, WEEK_IN_SECONDS );

				} else {
					$templates = array();
				}
			}

			return $templates;
		}
	}

}

if (!function_exists('gyan_templates_manager')) { function gyan_templates_manager() { return Gyan_Templates_Manager::get_instance(); } }