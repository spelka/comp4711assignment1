<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Profile Management controller
 */
class Profile_Management extends Application {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('formfields');
        $this->load->model('users');
    }

    public function index()
    {
        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_Management');

        $highestid = $this->users->highest();
        $record = $this->users->get($highestid);

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile', true);
        $this->data['fname'] = makeTextField('Name:', 'name', $record->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $record->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }

    public function confirm()
    {
        $config['upload_path']   = './uploads/users';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 999999;
        $config['max_height']    = 999999;

        $this->load->library('upload');
        $this->upload->initialize($config);

        echo $this->upload->do_multi_upload('imagefile') ? 'uploaded' : 'failed up upload';
        echo $this->upload->display_errors();

    // public function do_upload() {

    //     if(!$this->upload->do_upload())
    //     {
    //         $error = array('error' => $this->upload->display_errors());
    //         $this->load->view('upload_form', $error);
    //     }
    //     else
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         $this->load->view('upload_success', $data);
    //     }
    // }
    }
}

/* End of file Profile_Management.php */
/* Location: ./application/controllers/Profile_Management.php */
