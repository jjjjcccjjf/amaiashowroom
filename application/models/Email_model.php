<?php

class Email_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //set email config
        $this->load->library('email');
        $config_mail['protocol'] = getenv('MAIL_PROTOCOL');
        $config_mail['smtp_host'] = getenv('SMTP_HOST');
        $config_mail['smtp_port'] = getenv('SMTP_PORT');
        $config_mail['smtp_timeout'] = '30';
        $config_mail['smtp_user'] = getenv('SMTP_EMAIL');
        $config_mail['smtp_pass'] = getenv('SMTP_PASS');
        $config_mail['charset'] = 'utf-8';
        $config_mail['newline'] = "\r\n";
        $config_mail['wordwrap'] = true;
        $config_mail['mailtype'] = 'html';
        $this->email->initialize($config_mail);
    }

    public function sendTakeSurvey($feedback)
    {

        $this->email->from(getenv('TEST_EMAIL'), getenv('TEST_NAME'));
        $this->email->to($feedback->email_address);
        $link = base_url().'?token=' . urlencode($feedback->token);
        $message = "Please click the link to take the survey! <a href='{$link}'>Take Survey</a>";
        $this->email->subject('Email Test');
        $this->email->message($message);
 
        return $this->email->send();
    }
}
