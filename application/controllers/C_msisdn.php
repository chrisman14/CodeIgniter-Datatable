<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_msisdn extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('MSISDN_model');
    }
 
    function index(){
        $this->load->view('msisdn_view');
    }
 
    function get_data_user()
    {
        $list = $this->MSISDN_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kodebank;
            $row[] = $field->msisdn;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->MSISDN_model->count_all(),
            "recordsFiltered" => $this->MSISDN_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }  
}
        
    /* End of file  C_msisdn.php */
        
                            