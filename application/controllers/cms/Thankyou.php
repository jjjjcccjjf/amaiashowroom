<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyou extends Admin_core_controller {


    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $ty = $this->db->from('thankyou')->limit(1)->get()->row();
        $data['heading'] = $ty->heading;
        $data['body'] = $ty->content;
        $this->wrapper('cms/thankyou',$data);
    }

    public function save(){
        $data = $this->input->post();
        $this->db->set([
            'heading' => $data['ty_heading'],
            'content' => $data['ty_content']
        ])->where('id',1)->update('thankyou');

        $this->session->set_flashdata('flash_msg', ['message' => 'Successfully Updated!', 'color' => 'green']);

        return redirect(base_url('cms/thankyou'));
    }

}