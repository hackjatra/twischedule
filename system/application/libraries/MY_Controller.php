<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Site_Controller
 *
 * Extends the default CI Controller class so I can declare special site controllers.
 * Also loads the BackendPro library since if this class is part of the BackendPro system
 *
 * @package         BackendPro
 * @subpackage      Controllers
 */
class Site_Controller extends Controller
{
	var $_container;
	function Site_Controller()
	{
		parent::Controller();

		// Load Base CodeIgniter files
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');

		// Load Base BackendPro files
		$this->load->config('backendpro');
		$this->lang->load('backendpro');
		$this->load->model('base_model');

		// Load site wide modules
		$this->load->module_library('status','status');
		$this->load->module_model('preferences','preference_model','preference');
		$this->load->module_library('page','page');
		$this->load->module_library('auth','userlib');

		// Display page debug messages if needed
		if ($this->preference->item('page_debug'))
		{
			$this->output->enable_profiler(TRUE);
		}

		// Set site meta tags
		//$this->page->set_metatag('name','content',TRUE/FALSE);
		$this->output->set_header('Content-Type: text/html; charset='.config_item('charset'));
		$this->page->set_metatag('content-type','text/html; charset='.config_item('charset'),TRUE);
		$this->page->set_metatag('robots','all');
		$this->page->set_metatag('pragma','cache',TRUE);

		log_message('debug','BackendPro : Site_Controller class loaded');
	}
}

/**
 * Public_Controller
 *
 * Extends the Site_Controller class so I can declare special Public controllers
 *
 * @package        BackendPro
 * @subpackage        Controllers
 */
class Public_Controller extends Site_Controller
{
	function Public_Controller()
	{
		parent::Site_Controller();

		// Set container variable
		$this->_container = $this->config->item('backendpro_template_public') . "container.php";

		// Check whether to show the site offline message
		if( $this->preference->item('maintenance_mode') AND $this->uri->rsegment(1) != 'auth')
		{
			redirect('auth/maintenance','location');
		}

		// Set public meta tags
		//$this->page->set_metatag('name','content',TRUE/FALSE);

		log_message('debug','BackendPro : Public_Controller class loaded');
	}

	/**
	 * Maintenance Message
	 *
	 * Dispaly the maintenance message
	 *
	 * @access public
	 * @return void
	 */
	function maintenance()
	{
		// Display Maintenance message
		$data['header'] = $this->lang->line('backendpro_under_maintenance');
		$data['content'] = "<h3>" . $data['header'] . "</h3>";
		$data['content'] .= "<p>" . $this->preference->item('maintenance_message') . "</p>";
		$data['content'] .= "<p>" . $this->lang->line('backendpro_maintenance_login') . "</p>";
		$this->load->view($this->_container,$data);
	}
}

/**
 * Admin_Controller
 *
 * Extends the Site_Controller class so I can declare special Admin controllers
 *
 * @package            BackendPro
 * @subpackage        Controllers
 */
class Admin_Controller extends Site_Controller
{
	function Admin_Controller()
	{
		parent::Site_Controller();

		// Set base crumb
		$this->page->set_crumb($this->lang->line('backendpro_control_panel'),'admin');

		// Set container variable
		$this->_container = $this->config->item('backendpro_template_admin') . "container.php";

		// Set Pop container variable
		$this->_popup_container = $this->config->item('backendpro_template_admin') . "popup.php";

		// Make sure user is logged in
		check('Control Panel');

		// Check to see if the install path still exists
		if( is_dir('install'))
		{
			flashMsg('warning',$this->lang->line('backendpro_remove_install'));
		}

		// If the system is down display warning
		if($this->preference->item('maintenance_mode'))
		{
			flashMsg('warning',$this->lang->line('backendpro_site_off'));
		}

		// Set private meta tags
		//$this->page->set_metatag('name','content',TRUE/FALSE);
		$this->page->set_metatag('robots','nofollow, noindex');
		$this->page->set_metatag('pragma','nocache',TRUE);

		log_message('debug','BackendPro : Admin_Controller class loaded');
	}
}
/* End of file MY_Controller.php */
/* Location: ./system/application/libraries/MY_Controller.php */