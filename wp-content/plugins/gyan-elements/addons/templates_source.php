<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( !class_exists( 'Gyan_Templates_Source' ) ) {
    class Gyan_Templates_Source extends Elementor\TemplateLibrary\Source_Base {

    	protected $template_prefix = 'gyan_';
    	public function get_prefix() { return $this->template_prefix; }
    	public function get_id()     { return 'gyan-templates'; }
    	public function get_title()  { return __( 'Gyan Templates', 'gyan-elements' ); }
    	public function register_data() {}
        public function save_item( $template_data )     { return false; }
        public function update_item( $new_data )        { return false; }
        public function delete_template( $template_id ) { return false; }
        public function export_template( $template_id ) { return false; }

    	public function get_items( $args = array() ) {

            // Adding block templates
            // Edit template details in database >> wp_otions -> _transient_gyan_templates_

    		$templates      = array();
            $source         = $this->get_id();
            $type           = 'block';
            $type_page      = 'page';
            $sub_type       = 'theme blocks';
            $sub_type_pages = 'theme pages';

    		$templates_data = array(
                1  => gyan_elementor_templates_list('accordion',                          $this->template_prefix, $source, $type, $sub_type),
                3  => gyan_elementor_templates_list('animated-text',                      $this->template_prefix, $source, $type, $sub_type),
                4  => gyan_elementor_templates_list('countdown',                          $this->template_prefix, $source, $type, $sub_type),
                5  => gyan_elementor_templates_list('counters',                           $this->template_prefix, $source, $type, $sub_type),
                6  => gyan_elementor_templates_list('team',                               $this->template_prefix, $source, $type, $sub_type),
                7  => gyan_elementor_templates_list('image-carousel',                     $this->template_prefix, $source, $type, $sub_type),
                8  => gyan_elementor_templates_list('image-slider',                       $this->template_prefix, $source, $type, $sub_type),
                9  => gyan_elementor_templates_list('infobox',                            $this->template_prefix, $source, $type, $sub_type),
                10 => gyan_elementor_templates_list('mail-chimp',                         $this->template_prefix, $source, $type, $sub_type),

                12 => gyan_elementor_templates_list('pricing-tables',                     $this->template_prefix, $source, $type, $sub_type),
                13 => gyan_elementor_templates_list('service-list',                       $this->template_prefix, $source, $type, $sub_type),
                14 => gyan_elementor_templates_list('services-block',                     $this->template_prefix, $source, $type, $sub_type),
                15 => gyan_elementor_templates_list('services',                           $this->template_prefix, $source, $type, $sub_type),
                16 => gyan_elementor_templates_list('small-info-box',                     $this->template_prefix, $source, $type, $sub_type),
                17 => gyan_elementor_templates_list('table-cake',                         $this->template_prefix, $source, $type, $sub_type),
                18 => gyan_elementor_templates_list('table-cloth-brands',                 $this->template_prefix, $source, $type, $sub_type),
                19 => gyan_elementor_templates_list('table-country-comparison',           $this->template_prefix, $source, $type, $sub_type),
                20 => gyan_elementor_templates_list('table-hosting-plan',                 $this->template_prefix, $source, $type, $sub_type),
                21 => gyan_elementor_templates_list('table-multi-color',                  $this->template_prefix, $source, $type, $sub_type),
                22 => gyan_elementor_templates_list('table-pizza',                        $this->template_prefix, $source, $type, $sub_type),
                23 => gyan_elementor_templates_list('table-standard',                     $this->template_prefix, $source, $type, $sub_type),
                24 => gyan_elementor_templates_list('tabs-slider',                        $this->template_prefix, $source, $type, $sub_type),
                25 => gyan_elementor_templates_list('testimonials',                       $this->template_prefix, $source, $type, $sub_type),
                26 => gyan_elementor_templates_list('video-with-different-poster-images', $this->template_prefix, $source, $type, $sub_type),
                27 => gyan_elementor_templates_list('work-hours',                         $this->template_prefix, $source, $type, $sub_type),

                11 => gyan_elementor_templates_list('pie-chart',                          $this->template_prefix, $source, $type, $sub_type),
                28 => gyan_elementor_templates_list('google-map',                         $this->template_prefix, $source, $type, $sub_type),
                29 => gyan_elementor_templates_list('all-blog-grid',                      $this->template_prefix, $source, $type, $sub_type),

                30 => gyan_elementor_templates_list('about-us',                           $this->template_prefix, $source, $type_page, $sub_type_pages),
                31 => gyan_elementor_templates_list('blog-grid',                          $this->template_prefix, $source, $type_page, $sub_type_pages),
                32 => gyan_elementor_templates_list('gallery',                            $this->template_prefix, $source, $type_page, $sub_type_pages),
                33 => gyan_elementor_templates_list('home-1',                             $this->template_prefix, $source, $type_page, $sub_type_pages),
                34 => gyan_elementor_templates_list('home-2',                             $this->template_prefix, $source, $type_page, $sub_type_pages),
                35 => gyan_elementor_templates_list('home-3',                             $this->template_prefix, $source, $type_page, $sub_type_pages),
                36 => gyan_elementor_templates_list('portfolio-single',                   $this->template_prefix, $source, $type_page, $sub_type_pages),
                37 => gyan_elementor_templates_list('portfolio-style1-2-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                38 => gyan_elementor_templates_list('portfolio-style1-3-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                39 => gyan_elementor_templates_list('portfolio-style1-4-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                40 => gyan_elementor_templates_list('portfolio-style2-2-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                41 => gyan_elementor_templates_list('portfolio-style2-3-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                42 => gyan_elementor_templates_list('portfolio-style2-4-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                43 => gyan_elementor_templates_list('portfolio-style3-2-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                44 => gyan_elementor_templates_list('portfolio-style3-3-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                45 => gyan_elementor_templates_list('portfolio-style3-4-column',          $this->template_prefix, $source, $type_page, $sub_type_pages),
                46 => gyan_elementor_templates_list('service-page-single',                $this->template_prefix, $source, $type_page, $sub_type_pages),
    		);

    		if ( ! empty( $templates_data ) ) {
    			foreach ( $templates_data as $template_data ) {
    				$templates_data['popularityIndex'] = 260;
    				$templates_data['trendIndex'] = 125;

    				$templates[] = $this->get_item( $template_data );
    			}
    		}

    		if ( ! empty( $args ) ) {
    			$templates = wp_list_filter( $templates, $args );
    		}

    		return $templates;
    	}

    	public function get_item( $template_data ) {
            return array(
                'template_id'     => $template_data['template_id'],
                'source'          => 'remote',
                'type'            => $template_data['type'],
                'subtype'         => $template_data['subtype'],
                'title'           => $template_data['title'],
                'thumbnail'       => $template_data['thumbnail'],
                'date'            => $template_data['date'],
                'author'          => $template_data['author'],
                'tags'            => $template_data['keywords'],
                'isPro'           => ( 1 == $template_data['is_pro'] ),
                'popularityIndex' => 260,
                'trendIndex'      => 125,
                'hasPageSettings' => 1,
                'url'             => $template_data['url'],
                'favorite'        => 0,
                'accessLevel'     => 0,
            );
        }

    	public function get_data( array $args, $context = 'display' ) {
    		$url	  = 'https://premiumthemes.in/json/bizix/content/' . $args['template_id'] . '.json'; // check  HTTPS VS HTTP
    		$response = wp_remote_get( $url, array( 'timeout' => 60 ) );
    		$body     = wp_remote_retrieve_body( $response );
    		$body     = json_decode( $body, true );
    		$data     = ! empty( $body['content'] ) ? $body['content'] : false;

    		$result = array();
    		$result['content']       = $this->replace_elements_ids($data);
    		$result['content']       = $this->process_export_import_content( $result['content'], 'on_import' );
    		$result['page_settings'] = array();

    		return $result;
    	}
    }
}