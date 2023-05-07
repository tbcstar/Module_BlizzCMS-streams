<?php 
/**
 * BlizzCMS
 *
 * @author WoW-CMS
 * @copyright Copyright (c) 2019 - 2022, WoW-CMS (https://wow-cms.com)
 * @license https://opensource.org/licenses/MIT MIT License
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class streams extends BS_Controller
{
    public function __construct()
    {
         parent::__construct();

        is_module_installed('stream', true);

        $this->load->model('stream_model');

        $this->load->language('stream');
    }
    
    public function index()
    {
        require_permission('view.stream');

		$data = [
            'realms' => $this->realm_model->find_all()
        ];
        
		$this->template->title(lang('tv_Streams'), config_item('app_name'));

        $this->template->build('index', $data);
    }
}
