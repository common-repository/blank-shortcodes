<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.virtualbit.it
 * @since      1.0.0
 *
 * @package    Blankcodes
 * @subpackage Blankcodes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blankcodes
 * @subpackage Blankcodes/admin
 * @author     Lucio Crusca <info@virtualbit.it>
 */
class Blankcodes_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
  private $options_group;
  public static $option_codes;
  public static $option_codes_and_content;
  private $plugin_options_slug;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	  $this->options_group = $this->plugin_name . '_options';
    self::$option_codes= $this->options_group . '_shortcodes_to_blankout';
    self::$option_codes_and_content= $this->options_group . '_shortcodes_to_totally_blankout';
	  $this->plugin_options_slug = $this->plugin_name . '-admin-options';
}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blankcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blankcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blankcodes-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blankcodes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blankcodes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blankcodes-admin.js', array( 'jquery' ), $this->version, false );

	}

  public function register_settings() 
  {
    register_setting($this->plugin_options_slug, self::$option_codes);
    register_setting($this->plugin_options_slug, self::$option_codes_and_content);
    add_settings_section($this->plugin_options_slug, "Settings", array($this, "settings_section_title"), $this->plugin_options_slug);
    add_settings_field(self::$option_codes, __('Shortcodes to blank out', 'blankcodes'), array($this, 'show_codes_input'), $this->plugin_options_slug, $this->plugin_options_slug);
    add_settings_field(self::$option_codes_and_content, __('Shortcodes to totally blank out', 'blankcodes'), array($this, 'show_codes_and_content_input'), $this->plugin_options_slug, $this->plugin_options_slug);
  }

  public function menu() 
  {
    add_options_page($this->plugin_options_slug, 'Blank Shortcodes', 'manage_options', $this->plugin_options_slug, array($this, 'show_options'));
  }

  public function settings_section_title() 
  {
  }

  public function show_options() {
    ?>
    <div class="wrap">
      <h2>Blank shortcodes</h2>
      <p>Enter the shortcodes you want to blank out separated by spaces.</p>
      <p>Total blanking means also the shortcode content gets stripped out. Normal blanking only hides the shortcode but keeps the content.</p>
      <form method="post" action="options.php">
    <?php
    settings_fields($this->plugin_options_slug);
    do_settings_sections($this->plugin_options_slug);
    submit_button();
    echo "</form></div>";
  }
  
  public function option($option_name, $default)
  {
    $val = get_option($option_name);
    if (empty($val))
    {
      update_option($option_name, $default);
      return $default;
    }
    return $val;
  }
  
  public function show_input_check($option_name, $default = false)
  {
    $v = $this->option($option_name, $default);
    if (empty($v))
      $v = '';
    else
      $v = 'checked="checked"';
    ?>
    <input type="checkbox" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" <?php echo $v; ?> />
    <?php
  }

  public function show_input_text($option_name, $default = "", $note = "")
  {
    ?>
    <input type="text" id="<?php echo $option_name; ?>" name="<?php echo $option_name; ?>" size="20" value="<?php echo $this->option($option_name, $default); ?>"/>
    <?php if (!empty($note)) echo '<span class="'.$option_name.'">'.$note.'</span>';
  }
  
  public function show_codes_input()
  {
    $this->show_input_text(self::$option_codes);
  }
  
  public function show_codes_and_content_input()
  {
    $this->show_input_text(self::$option_codes_and_content);
  }
}
