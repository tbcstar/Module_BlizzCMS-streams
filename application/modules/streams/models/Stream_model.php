<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stream_model extends CI_Model {

    /**
     * stream_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->load->database('auth', TRUE);
    }

    public function getStreams()
    {
        return $this->db->select('*')->order_by('id', 'ASC')->get('streams');
    }
	public function insertStream($account, $channel, $schedule)
    {
        $data = array(
            'account' => $account,
            'channel' => $channel,
            'schedule' => $schedule
        );

        $this->db->insert('streams', $data);
        return true;
    }
}
