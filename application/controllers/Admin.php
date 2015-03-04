<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*	Based on instructions found on the CodeIgniter website:
*	https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
*/
class Admin extends Application {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

	 public function index()
	 {
        $this->data['page_title'] = '';
        $this->data['page_body'] = 'admin.php';

///////////////////////////////////////////////////////////////////////////////

        $this->load->helper('html');

///////////////////////////////////////////////////////////////////////////////
        $adDataArray = array(
            array(
                'ID'                => 1,
                'parentCategoryID'  => 0,
                'name'              => 'Pets' ),
            array(
                'ID'                => 2,
                'parentCategoryID'  => 0,
                'name'              => 'Electronics'),
            array(
                'ID'                => 3,
                'parentCategoryID'  => 0,
                'name'              => 'Kitchen'),
            array(
                'ID'                => 4,
                'parentCategoryID'  => 0,
                'name'              => 'Stationary'),
            array(
                'ID'                => 5,
                'parentCategoryID'  => 0,
                'name'              => 'Toiletries'),
            array(
                'ID'                => 6,
                'parentCategoryID'  => 0,
                'name'              => 'Other')
        );

        $adList = array();
        foreach ($adDataArray as $adData)
        {
            $adList[] = anchor(
                '', $adData['name'], 'title="'.$adData['name'].'"');
        }

        $attributes = array();
        $attributes['class'] = 'list-group';
        $attributes['id']    = 'adList';

        $this->data['adlist'] = ul($adList, $attributes);

///////////////////////////////////////////////////////////////////////////////

        $userDataArray = array(
            array(
                'ID'                => 1,
                'parentCategoryID'  => 0,
                'name'              => 'Pets' ),
            array(
                'ID'                => 2,
                'parentCategoryID'  => 0,
                'name'              => 'Electronics'),
            array(
                'ID'                => 3,
                'parentCategoryID'  => 0,
                'name'              => 'Kitchen'),
            array(
                'ID'                => 4,
                'parentCategoryID'  => 0,
                'name'              => 'Stationary'),
            array(
                'ID'                => 5,
                'parentCategoryID'  => 0,
                'name'              => 'Toiletries'),
            array(
                'ID'                => 6,
                'parentCategoryID'  => 0,
                'name'              => 'Other')
        );

        $userList = array();
        foreach ($userDataArray as $userData)
        {
            $userList[] = anchor(
                '', $userData['name'], 'title="'.$userData['name'].'"');
        }

        $attributes = array();
        $attributes['class'] = 'list-group';
        $attributes['id']    = 'userList';

        $this->data['userlist'] = ul($userList, $attributes);

///////////////////////////////////////////////////////////////////////////////
        $this->render();
	 }
}
