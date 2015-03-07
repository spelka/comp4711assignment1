<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package   CodeIgniter
 * @author    EllisLab Dev Team
 * @copyright Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 * @filesource
 */
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

    /* Should remove this because it doesn't make sense for this page to have a default index thing
    public function index()
    {
        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_Management');

        $highestid = $this->users->highest();
        $record = $this->users->get($highestid);

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile');
        $this->data['fname'] = makeTextField('Name:', 'name', $record->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $record->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }
    */
    public function renderForm($id)
    {
        $record = $this->users->get($id);

        $this->data['page_title'] = 'Manage Profile';
        $this->data['page_body'] = 'profile_management';
        $this->data['navbar_activelink'] = base_url('/Profile_Management');

        // Create form fields
        $this->data['fimage'] = makeUploadImageField('Profile picture:', 'imagefile');
        $this->data['fname'] = makeTextField('Name:', 'name', $record->displayname);
        $this->data['foldpassword'] = makePasswordField('Old Password:', 'opswd', '');
        $this->data['fnewpassword'] = makePasswordField('New Password:', 'npswd', '');
        $this->data['fconfirmpassword'] = makePasswordField('Confirm Password:', 'cpswd', '');
        $this->data['femail'] = makeTextField('Email:', 'email', $record->email);
        $this->data['fsubmit'] = makeSubmitButton('Submit', 'Submit');
        $this->data['fcancel'] = makeCancelButton('Cancel');

        $this->render();
    }

    public function user($id)
    {
        if(true)//TODO: Add some way of validation of whether the user is either a ADMIN or the CORRECT user
        {
            $this->renderForm($id);
        }
        else
        {
            //generate some error
        }
    }

    public function confirm()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 999999;
        $config['max_height']    = 999999;

        $this->load->library('upload', $config);

        // upload the image
        echo $this->upload->do_upload('imagefile') ? 'uploaded' : 'failed up upload';
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
