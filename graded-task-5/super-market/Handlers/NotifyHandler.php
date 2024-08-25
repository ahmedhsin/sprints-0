<?php

class NotifyHandler
{
    private $session;
    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set_msg($message, $type)
    {
        $this->session['msg'] = [$message, $type];
    }
    public function has_msg()
    {
        return isset($this->session['msg']);
    }
    public function get_msg()
    {
        if(isset($this->session['msg'])){
            $msg = $this->session['msg'];
            unset($this->session['msg']);
            return $msg;
        }
        return null;
    }

    public function display_msg()
    {
        if($this->has_msg()){
            $msg = $this->get_msg();
            echo '<p class="alert alert-'.$msg[1].'">'.$msg[0].'</p>';
        }
    }

}