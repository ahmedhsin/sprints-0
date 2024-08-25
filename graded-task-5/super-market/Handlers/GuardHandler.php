<?php

class GuardHandler
{
    private $session;
    public function __construct($session)
    {
        $this->session = $session;

    }

    public function validate($access)
    {
        if (isset($this->session['logged_in'])){
            if ($access == $this->session['type']){
                return;
            }else{
                if ($this->session['type'] == 'admin'){
                    header('Location: dashboard.php');
                }else{
                    header('Location: index.php');
                }
            }
        }else{
            if($access == ''){
                return;
            }
            header('Location: login.php');
        }
    }
}