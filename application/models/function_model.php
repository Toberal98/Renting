<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * +-----------------------------------------+
 * |              WEB-INFORMATICA            |
 * |-----------------------------------------|
 * | @subject : Sistema de Venta             |
 * | @owner   : Credi Q                      |
 * |                                         |
 * | @author  : Web-Informatica              |
 * | @package : cqventa                      |
 * | @copy    : Web-Informatica              |
 * +-----------------------------------------+
 * http://web-informatica.com
 * */
class function_model extends CI_Model {

    function enviarMail($datos) {

        $cuerpo = '<table cellspacing="0" callpadding="0"  width="389" height="180" border="0">';
        $cuerpo .= "<tr>";

        if ($datos['tipo'] == "info-car") {

            $from = 'Nuevos CrediQ';
            $subject = 'Solicitud de informacion de vehiculo';

            $cuerpo .= "<th colspan=\"2\">Marca: " . $datos['marca'] . " - Modelo: " . $datos['modelo'] . "</th>";
            $cuerpo .= "<th colspan=\"2\">Opcion: " . $datos['opcion'] . " - Cuota: " . $datos['cuota'] . "</th>";            
            $cuerpo .= "</tr>";
            $cuerpo .= "<tr>";
            $cuerpo .= '<td align="center">
                        <h3>' . $datos['nombre'] . ' </h3>
                        Nombre: ' . $datos['nombre'] . '<br/>
						Telefono: ' . $datos['telefono'] . '<br/>
						Email: ' . $datos['email'] . '<br/><br/>
						Consulta: " ' . $datos['consulta'] . '"<br/>						 
                        </td>';
        }

        $cuerpo .= "</tr>";
        $cuerpo .= "</table>";

        //Email configuracion
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '190.0.230.57',//'correo.crediqinfo.com',
            'smtp_port' => 25,
            'smtp_user' => 'info',
            'smtp_pass' => 'crediq',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => '\r\n',
        );

        //Load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //Set email parameters		
        $this->email->from('info@crediqinfo.com', $from);
        $this->email->to($datos['to']);
        $this->email->cc($datos['cc']);
        $this->email->subject($subject);
        $this->email->message($cuerpo);

        //Send the email
        
        if ($this->email->send()) {
            return TRUE;
        } else {
            show_error($this->email->print_debugger());
            return FALSE;
        }
    }
}
