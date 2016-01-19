<?php
 
class Error extends Controller {
 
    function Error()
    {
        parent::Controller();
    }
 
    function index()
    {
        $this->load->view('error');
    }
}
?>