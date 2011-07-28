<?php

class Tinyurl_model extends CI_Model {
    protected $chars;

    function __construct()
    {
        parent::__construct();
        $this->chars = array();
        //A-Z
        for ($i = 65; $i < 91; $i++) {
            $this->chars[] = chr($i);
        }
        //a-z
        for ($i = 97; $i < 123; $i++) {
            $this->chars[] = chr($i);
        }
        //0-9
        for ($i = 48; $i < 58; $i++) {
            $this->chars[] = chr($i);
        }
    }

    function key($url)
    {
        $this->db->select('key');
        $query = $this->db->get_where('tinyurl', array('url' => $url), 1);
        $key   = '';
        if ($query->num_rows()) {
            $key = $query->row()->key;
        } else {
            $i = 6;
            while ($i > 0) {
                $key .= $this->chars[rand(0, count($this->chars)-1)];
                $i--;
            }
            $this->db->insert('tinyurl', array('key' => $key, 'url' => $url));
        }
        return $key;
    }

    function url($key)
    {
        $this->db->select('url');
        $query = $this->db->get_where('tinyurl', array('key' => $key), 1);
        if ($query->num_rows()) {
            $row = $query->row();
            return $row->url;
        }
    }
}
