<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinyUrl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tinyurl_model', 'tinyurl', TRUE);
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function create()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            return show_404();
        }
        //$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == FALSE) {
            return redirect('/');
        }
        $url = $this->input->post('url');
        $key = $this->tinyurl->key($url);
        $this->load->view('result', array('tinyurl' => site_url('g/'.$key)));
    }

    public function g($key)
    {
        if (! $key) {
            return show_error('oops');
        }
        $url = $this->tinyurl->url($key);
        echo $url;
        if ($url) {
            return redirect($url);
        } else {
            return show_404();
        }
    }
}
