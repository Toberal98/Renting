<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Renting extends CI_Controller{

    function __construct() {

        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('filter_model');
        $this->load->model('function_model');

        //Establece por default al pais El Salvador.
        if (!$this->session->userdata('pais')) {
            $this->session->set_userdata('pais', 1);
        }

        if (!$this->session->userdata('moneda')) {
            $this->data_model->SetMoneda();
        }
    }

    function index(){
        $data['page'] = 'template/public/home';
        $data['moneda'] = $this->session->userdata("moneda");
        $data['cars'] = $this->filter_model->getTopCars("LIMIT 6");
        $this->load->view('template/public/masterpage', $data);
    }

    function informacion(){
        $data['page'] = 'template/public/informacion';
        $this->load->view('template/public/masterpage', $data);
    }

    function particulares(){
        $data['page'] = 'template/public/particulares';
        $this->load->view('template/public/masterpage', $data);
    }

    function flotas(){
        $data['page'] = 'template/public/flota';
        $this->load->view('template/public/masterpage', $data);
    }
    
    function faqs(){
        $data['page'] = 'template/public/faqs';
        $this->load->view('template/public/masterpage', $data);
    }
    
    function contacto(){
        $data['page'] = 'template/public/contacto';
        $this->load->view('template/public/masterpage', $data);
    }

    function catalogo(){
        $data['moneda'] = $this->session->userdata("moneda");
        date_default_timezone_set('America/El_Salvador');

        //$limite = " LIMIT 0, ".$num_cars;
        $limite = "";
        $data['products'] = $this->filter_model->getProducts($limite);
        //Marcas
        $data['marcas'] = $this->data_model->getMarcasExistentes();
        //Categorias
        $data['categorias'] = $this->data_model->getCategories();

        $data['fullscreen'] = true;
        $data['page'] = 'template/public/catalogo';
        $this->load->view('template/public/masterpage', $data);
    }
}
?>