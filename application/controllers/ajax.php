<?php


include 'ChromePHP.php';
ChromePhp::log('Hello console!');
ChromePhp::log($_SERVER);
ChromePhp::warn('something went wrong!');

/*
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
*/


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
class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('filter_model');
        $this->load->model('data_model');
        $this->load->model('Secure_model');
        $this->load->model('Savedata_model');
        $this->load->model('function_model');
        $this->load->library('session');
        $this->load->library('ImageUploader');
        $this->load->library('prestamo');
    }

    function index() {
        var_dump(extension_loaded('curl'));
    }

    function calcCuotaCompra(){
        $precio = $this->input->post('precio');
        $tasa = $this->input->post('tasa');
        $plazo = $this->input->post('plazo');
        $recargo = $this->input->post('recargo');
        $prima = $this->input->post('prima');

        $valor_financiar = $precio - (($prima/100)*$precio);

        if(empty($recargo)){
            $recargo_cal=0;
        }
        $recargo_cal = ($recargo/100) * $precio;

        // Creamos el objeto préstamo y le decimos que queremos una exactitud de 10 dígitos después de la coma.
        $prestamo = new Prestamo(10);
        // Configuramos el valor que pedimos de préstamo.
        $prestamo->setCapital($valor_financiar);
        $prestamo->setTasaInteres($tasa / 100 / 12);

        // CAAR .- Se agrego un recargo a la cuota que corresponde al GPS - 20170809
        $prestamo->setRecargo($recargo_cal);
        $cuota = $prestamo->calcCuota($plazo);
        $cuota_con_iva = number_format((float) ($cuota * 1.13), 2, '.', '');
        echo $cuota_con_iva;
    }

    function calcCuotaRenting(){
        $valor_res = $this->input->post('residual');
        $valor_veh = $this->input->post('precio');
        $int_anual =  $this->input->post('tasa');
        $nper = $this->input->post('plazo');
        $mant_total = $this->input->post('mantenimiento');
        $i_men = ($int_anual / 100)/12;
        //Se cambio para ser menual y no divido por nper
        //$mante_mensual = $mant_total / $nper;
        $mante_mensual = $mant_total;
        $tipo_mante =  $this->input->post('tipo_mante');
        $adminis = $this->input->post('administrativo');
        //Se agregaro nuevos cargos 18/09/2019
        $cargo_gps = $this->input->post('gps');
        $cargo_seguro = $this->input->post('seguro');

        $renting = 0;
        $renting = ($valor_veh-(($valor_res/pow((1+$i_men),$nper))))/((1-(1/pow((1+$i_men),$nper)))/($i_men));

        if($tipo_mante == "porcentaje"){
            $adminis = $valor_veh * ($adminis/100);
        }
        //Se suman nuevos cargos 18/09/2019
        $rentingconIva = ($renting + $mante_mensual + $adminis + $cargo_gps + $cargo_seguro) * 1.13;
        $rentingconIva = number_format((float) $rentingconIva, 2, '.', '');
        echo $rentingconIva;
    }

    function dothums($img_info) {//usado para lista y bloques en resultados de busqueda
        if($img_info = explode("-", $img_info)) {
            /* BEGIN IW */
            $url = "http://www.usadoscrediq.com/public/images/no_disponible.jpg";

            if (count($img_info) > 1) {
                list($id_auto, $vista_actual) = $img_info;

                $datos = $this->data_model->getDataWhere(array(
                    'codigo_vehiculo' => $id_auto
                ), 'imagenes');

                if (count($datos) > 0) {
                  switch ($vista_actual) {
                      case '2':
                          $desired_width = 60;
                          $desired_height = 40;
                      break;
                      case '3':
                          $desired_width = 99;
                          $desired_height = 77;
                      break;
                      default:
                          $desired_width = 204;
                          $desired_height = 137;
                      break;
                  }

                  $url = $this->imageuploader
                      ->doCarResizedImage(
                          $datos[0],
                          $desired_width,
                          $desired_height
                      );
                }
            }
            header("Location: $url");
            /* END IW */
        }
    }

    //Luis Flores - Datasoft
    function comprobarEmail(){
        $result = $this->Secure_model->checkEmail($this->input->post('correo'));
        if($result){
            echo "false";
        }else{
            echo "true";
        }
    }

        //Luis Flores - Datasoft
    function comprobarEmailNuevoActual(){
        $nuevo = $this->input->post('correo');
        $actual = $this->input->post('actual');
        if($nuevo == $actual){
            echo "true";
        }else{
            $result = $this->Secure_model->checkEmail($this->input->post('correo'));
            if($result){
                echo "false";
            }else{
                echo "true";
            }
        }
    }

    function interaccionAnonima() {

      $username = 'b42866a9-56d4-3d8d-920d-0dcd8c38f4f6';//usuario para logueo en WS
  		$password = 'WXi4nWzJCIYq1oKNbQ#8fr7Vvh';//Password para logue en WS
  		$url = "https://oauthasservices-d48d16b03.us2.hana.ondemand.com/oauth2/api/v1/token?grant_type=client_credentials";
  		$curl = curl_init();// Abre la conexion
  		curl_setopt($curl, CURLOPT_POST, true); //en caso sea post
  		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  		curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
  		curl_setopt($curl, CURLOPT_URL, $url);
  		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  		$result = curl_exec($curl);
  		if (curl_errno($curl)) {
  			throw new Exception(curl_error($curl));
  		}
  		curl_close($curl);
  		$obj  = json_decode($result);
  		$token = $obj->access_token;
  		 echo '<script> console.log('.$token.') </script>';
      $id = $_POST['id'];
      $this->db->select('Area_Marketing');
      $this->db->from('cq_marca');
      $this->db->join('cq_automovil', 'cq_marca.id_marca = cq_automovil.marca');
      $this->db->where('id_automovil', $id);
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      $Area_Marketing = null;
      foreach ($resultado as $row)
      {
        $Area_Marketing = $row->Area_Marketing;
      }
      $this->db->select('cq_modelo.productID AS ID');
      $this->db->from('cq_automovil');
      $this->db->join('cq_modelo','cq_automovil.modelo = cq_modelo.id_modelo');
      $this->db->where('id_automovil',$id);
      $consultas = $this->db->get();
      $variable = $consultas->result();
      $ProductId = NULL;

       foreach ($variable as $rows) {
         $ProductId = $rows->ID;
        }


		$params =
		'{
          "InteractionIsAnonymous": "TRUE",
          "CommunicationMedium": "WEB",
          "InteractionType": "WEB_ITEM_VIEW",
          "InteractionTimeStampUTC": "'.gmdate("Y-m-d\TH:i:s").'",
          "InteractionSourceObjectType": "WEBGQ",
          "InteractionSourceObject": "WEBGQ",
          "MarketingArea": "'.$Area_Marketing.'",
          "CampaignID": "",
          "MarketingLocationOrigin": "",
          "MarketingLocation": "",
          "DigitalAccountType": "",
          "DigitalAccount": "",
          "MKT_AgreementOrigin": "",
          "MKT_AgreementExternalID": "",
          "CampaignContent": null,
          "InteractionWeightingFactor": null,
          "InteractionSentimentValue": null,
          "InteractionStatus": "",
          "InteractionReason": "",
          "InteractionLanguage": "ES",
          "InteractionAmount": "",
          "InteractionCurrency": "USD",
          "InteractionLatitude": "",
          "InteractionLongitude": "",
          "SpatialReferenceSystem": "",
          "DeviceType": "MOBILE",
          "InteractionDeviceName": "",
          "SourceSystemType": "COMMERCE",
          "SourceSystem": "HC121",
          "InteractionSourceObjectAddlID": "",
          "InteractionSourceObjectStatus": "",
          "InteractionSourceDataURL": "",
          "InteractionSourceTimeStampUTC": null,
          "CampaignContentLinkURL": "",
          "CampaignContentLinkName": "",
          "ReferralSource": "",
          "ReferralSourceCategory": "",
          "InteractionContentSubject": "",
          "InteractionContent": "",
            "InteractionProduct": {
                "InteractionProducts": [
                    {
                        "ProductOrigin": "SAP_ERP_MATNR",
                        "Product": "'.$ProductId.'",
                        "InteractionProdWeightingFactor": "1",
                        "InteractionProductSentimentVal": "1",
                        "InteractionProductAmount": "",
                        "InteractionProductQuantity": "1",
                        "InteractionProductUfnit": "ST",
                        "ProductRecommendationModelType": "",
                        "ProductRecommendationScenario": null,
                        "InteractionProductStatus": "",
                        "InteractionProductReason": "",
                        "InteractionSourceItemNumber": null
                    }
                ]
            }
        }';

		$query = http_build_query($params);

		$request_headers=array(
		  'Content-type: application/json',
		  'Content-Length: ' . strlen($params),
		  'InteractionType: Interactions',
		  'Authorization: Bearer ' . $token
		);

		$handle1=curl_init();
		$api_url='https://e5728-iflmap.hcisbt.us2.hana.ondemand.com/http/Web/MKT/Interactions';

		curl_setopt_array(
			$handle1,
			array(
					CURLOPT_URL=>$api_url,
					CURLOPT_POST=>true,
					CURLOPT_RETURNTRANSFER=>true,
					CURLOPT_POSTFIELDS =>$params,
					CURLOPT_HTTPHEADER=>$request_headers,
					CURLOPT_XOAUTH2_BEARER=>$token,
					CURLOPT_HEADER=>false
			)
		);

		$datos=curl_exec($handle1);
		curl_close($handle1);
		 echo '<script> console.log('.$datos.'); </script>';
     // echo $datos;
  }


  //trama consentimiento
  function TramaConsentimiento($id,$renting,$marca,$modelo,$nombre,$ciudad,$telefono,$email){
    $username = 'b42866a9-56d4-3d8d-920d-0dcd8c38f4f6';//usuario para logueo en WS
    $password = 'WXi4nWzJCIYq1oKNbQ#8fr7Vvh';//Password para logue en WS
    $url = "https://oauthasservices-d48d16b03.us2.hana.ondemand.com/oauth2/api/v1/token?grant_type=client_credentials";
    $curl = curl_init();// Abre la conexion
    curl_setopt($curl, CURLOPT_POST, true); //en caso sea post
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    if (curl_errno($curl)) {
      throw new Exception(curl_error($curl));
    }
    curl_close($curl);
    $obj  = json_decode($result);
    $token = $obj->access_token;
    // echo '<script> console.log('.$token.') </script>';
    $this->db->select('cq_marca.nombre as Marca');
    $this->db->select('cq_pais.nombre as Pais');
    $this->db->from('cq_automovil');
    $this->db->join('cq_marca', 'cq_automovil.marca = cq_marca.id_marca');
    $this->db->join('cq_pais','cq_automovil.pais = cq_pais.id_pais');
    $this->db->where('id_automovil', $id);
    $consulta = $this->db->get();
    $resultado = $consulta->result();
    $marca = NULL;
    $pais = NULL;
    $comparacionCelular = "(\+503|00503|503)?[ -]*(6|7)[ -]*([0-9][ -]*){8}";
    $telefonoMovil = NULL;
    $telefonoFijo = NULL;

    if(preg_match($telefono,$comparacionCelular)==TRUE){
        $telefonoMovil = $telefono;
    }else{
      $telefonoFijo = $telefono;
    }

    //obtenemos la marca y el pais
    foreach ($resultado as $row)
        {
        $marca = $row->Marca;
        $pais = $row->Pais;
        }
      //obtenemos el area marketing
        $this->db->select('Area_Marketing');
        $this->db->from('cq_marca');
        $this->db->join('cq_automovil', 'cq_marca.id_marca = cq_automovil.marca');
        $this->db->where('id_automovil', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        $Area_Marketing = NULL;
    foreach ($resultado as $row)
            {
                $Area_Marketing = $row->Area_Marketing;
            }


          //obtenemos el producto id
          $this->db->select('cq_modelo.productID AS ID');
          $this->db->from('cq_automovil');
          $this->db->join('cq_modelo','cq_automovil.modelo = cq_modelo.id_modelo');
          $this->db->where('id_automovil',$id);
          $resultado = $this->db->get();

          $ProductId = NULL;

          foreach ($resultado->result() as $rows) {
            $ProductId = $rows->ID;
          }
          //obtener el monto del vehiculo

          $this->db->select('valor_vehiculo');
          $this->db->from('renting_auto');
          $this->db->where('id_automovil', $id);
          $resultado = $this->db->get();

          $monto = NULL;

          foreach ($resultado->result() as $rows) {
              $monto = $rows->valor_vehiculo;
          }

  $params =
  '{
          "WebsiteName": "'.$marca.'_'.$pais.'",
          "ContactID":"'.$nombre.'",
          "ContactOrigin": "WEBGQ",
          "ContactOriginData": {
              "OriginDataLastChgUTCDateTime": "'.gmdate("Y-m-d\TH:i:s").'",
              "CityName": "",
              "Country": "'.$this->session->userdata('pais').'",
              "EmailAddress": "'.$email.'",
              "FirstName": "",
              "LastName": "",
              "FullName": "'.$nombre.'",
              "GenderCode": "",
              "AddressHouseNumber": "",
              "IsConsumer": true,
              "IsContactPerson": false,
              "Language": "ES",
              "MaritalStatus": "",
              "MaritalStatusName": "",
              "MobileNumber": "'.$telefonoMovil.'",
              "IsObsolete": false,
              "PhoneNumber": "'.$telefonoFijo.'",
              "ContactPostalCode": "",
              "AddressRegion": "",
              "StreetName": ""
          },
          "MarketingPermissions": {
                  "MarketingPermission": [
                  {
                      "ContactPermissionID": "'.$email.'",
                      "ContactPermissionOrigin": "EMAIL",
                      "MarketingArea": "'.$Area_Marketing.'",
                      "CommunicationMedium": "WEB",
                      "CommunicationCategory": "",
                      "ContactPermission": "Y",
                      "PermissionUTCDateTime": "'.gmdate("Y-m-d\TH:i:s").'",
                      "CommunicationDirection": null,
                      "PermissionSourceObject": null,
                      "PermissionSourceObjectType": null,
                      "PermissionSourceSystem": null,
                      "PermissionSourceSystemType": null,
                      "PermissionSourceDataURL": null,
                      "PermissionSourceCommMedium": " WEB ",
                      "IsConfirmationRequired": false
                  }
              ]
          }
      }';

  $query = http_build_query($params);

  $request_headers=array(
    'Content-type: application/json',
    'Content-Length: '.strlen($params),
    'InteractionType: Interactions',
    'Authorization: Bearer '.$token
  );

  $curl=curl_init();
  $api_url='https://e5728-iflmap.hcisbt.us2.hana.ondemand.com/http/Web/MKT/Interactions';

  curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL=>$api_url,
        CURLOPT_POST=>true,
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER=>$request_headers,
        CURLOPT_XOAUTH2_BEARER=>$token,
        CURLOPT_HEADER=>false

    )
  );

  $data=curl_exec($curl);
  curl_close($curl);

  //siguiente proceso
  $tramaInteraccion =
  '{
                  "InteractionContactOrigin": "WEBGQ",
                  "InteractionContactId": "'.$nombre.'",
                  "CommunicationMedium": "WEB",
                  "InteractionType": "COTIZACION",
                  "InteractionTimeStampUTC": "",
                  "InteractionSourceObjectType": "WEBGQ",
                  "InteractionSourceObject": "WEBGQ",
                  "MarketingArea": "'.$Area_Marketing.'",
                  "CampaignID": "",
                  "MarketingLocationOrigin": "",
                  "MarketingLocation": "",
                  "DigitalAccountType": "",
                  "DigitalAccount": "",
                  "MKT_AgreementOrigin": "",
                  "MKT_AgreementExternalID": "",
                  "CampaignContent": null,
                  "InteractionWeightingFactor": null,
                  "InteractionSentimentValue": null,
                  "InteractionStatus": "",
                  "InteractionReason": "",
                  "InteractionLanguage": "ES",
                  "InteractionAmount": "",
                  "InteractionCurrency": "USD",
                  "InteractionLatitude": "",
                  "InteractionLongitude": "",
                  "SpatialReferenceSystem": "",
                  "DeviceType": "DESKTOP",
                  "InteractionDeviceName": "",
                  "SourceSystemType": "WEBGQ",
                  "SourceSystem": "WEBGQ",
                  "InteractionSourceObjectAddlID": "",
                  "InteractionSourceObjectStatus": "",
                  "InteractionSourceDataURL": "'.current_url().'",
                  "InteractionSourceTimeStampUTC": null,
                  "CampaignContentLinkURL": "",
                  "CampaignContentLinkName": "",
                  "ReferralSource": "",
                  "ReferralSourceCategory": "",
                  "InteractionContentSubject": "",
                  "InteractionContent": "",
                  "InteractionProduct": {
                          "InteractionProducts": [{
                                     "ProductOrigin": "'.$modelo.'",
                                     "Product": "'.$ProductId.'",
                                     "InteractionProdWeightingFactor": "1",
                                     "InteractionProductSentimentVal": "1",
                                     "InteractionProductAmount": "'.$monto.'",
                                     "InteractionProductQuantity": "1",
                                     "InteractionProductUnit": "ST",
                                     "ProductRecommendationModelType": "",
                                     "ProductRecommendationScenario": null,
                                     "InteractionProductStatus": "",
                                     "InteractionProductReason": "",
                                     "InteractionSourceItemNumber": null
                              },{"ProductOrigin": "SAP_ERP_MATNR",
                                     "Product": "B4S6K361B G G560",
                                     "InteractionProdWeightingFactor": "1",
                                     "InteractionProductSentimentVal": "1",
                                     "InteractionProductAmount": "18200.00",
                                     "InteractionProductQuantity": "1",
                                     "InteractionProductUnit": "ST",
                                     "ProductRecommendationModelType": "",
                                     "ProductRecommendationScenario": null,
                                     "InteractionProductStatus": "",
                                     "InteractionProductReason": "",
                                     "InteractionSourceItemNumber": null
                              }]
                  }
              }';

  $query = http_build_query($tramaInteraccion);

  $request_headers=array(
    'Content-type: application/json',
    'Content-Length: '.strlen($tramaInteraccion),
    'InteractionType: Interactions',
    'Authorization: Bearer '.$token
  );

  $curl=curl_init();
  $api_url='https://e5728-iflmap.hcisbt.us2.hana.ondemand.com/http/Web/MKT/Interactions';

  curl_setopt_array(
  $curl,
    array(

        CURLOPT_URL => $api_url,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER =>true,
        CURLOPT_POSTFIELDS => $tramaInteraccion,
        CURLOPT_HTTPHEADER => $request_headers,
        CURLOPT_XOAUTH2_BEARER=> $token,
        CURLOPT_HEADER=>false
    )
  );

    $res=curl_exec($curl);
    curl_close($curl);

    session_start();
    $_SESSION['data'] = $data;
    $_SESSION['res'] = $res;

}

//consentimiento contactenos
  function interaccionContacto($email, $nombre, $telefono, $pais) {
    //obtenemos fecha, hora y microsegundos

    $datetime = new DateTime();
    $date = $datetime->format(DateTime::ATOM);

    //obtenemos el Pais

    $this->db->select('codigo');
    $this->db->from('cq_pais');
    $this->db->where('id_pais', $pais);
    $consulta = $this->db->get();

    foreach ($consulta->result() as $row)
    {
      $codigo = $row->codigo;
    }

    //decidimos por el $telefono

    $comparacionCelular = "(\+503|00503|503)?[ -](6|7)[ -]([0-9][ -]*){8}";
    $telefonoMovil = NULL;
    $telefonoFijo = NULL;

    if(preg_match($telefono,$comparacionCelular)==TRUE){
        $telefonoMovil = $telefono;
    }else{
        $telefonoFijo = $telefono;
    }

  //Autorizacion de credenciales
      $curl = curl_init();
      $username = "b42866a9-56d4-3d8d-920d-0dcd8c38f4f6";
      $password = "WXi4nWzJCIYq1oKNbQ#8fr7Vvh";
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://oauthasservices-d48d16b03.us2.hana.ondemand.com/oauth2/api/v1/token?grant_type=client_credentials",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPAUTH => CURLAUTH_ANY,
        CURLOPT_USERPWD => $username . ":" . $password,
        CURLOPT_HTTPHEADER => "Content-Type: application/json",
      ));

      $response = json_decode(curl_exec($curl));

      curl_close($curl);
      $token = $response->{'access_token'};

      //Autorizacion de token
      $curl = curl_init();
      $json = array(
        "WebsiteName" => "Marca - Pais",
        "ContactID" => $nombre,
        "ContactOrigin" => "WEBGQ",
        "ContactOriginData" => array(
            "OriginDataLastChgUTCDateTime" => $date,
            "CityName" => "",
            "Country" => $codigo,
            "EmailAddress" => $email,
            "FirstName" => "",
            "LastName" => "",
            "FullName" => $nombre,
            "GenderCode" => "",
            "AddressHouseNumber" => "",
            "IsConsumer" => true,
            "IsContactPerson" => false,
            "Language" => "ES",
            "MaritalStatus" => "",
            "MaritalStatusName" => "",
            "MobileNumber" => $telefonoMovil,
            "IsObsolete" => false,
            "PhoneNumber" => $telefonoFijo,
            "ContactPostalCode" => "",
            "AddressRegion" => "",
            "StreetName" => ""
        ),
        "MarketingPermissions" => array(
                "MarketingPermission" => [
                array(
                    "ContactPermissionID" =>  $email,
                    "ContactPermissionOrigin" => "EMAIL",
                    "MarketingArea" => "area de marketing",
                    "CommunicationMedium" => "WEB",
                    "CommunicationCategory" => "",
                    "ContactPermission" => "Y",
                    "PermissionUTCDateTime" => $date,
                    "CommunicationDirection" => null,
                    "PermissionSourceObject" => null,
                    "PermissionSourceObjectType" => null,
                    "PermissionSourceSystem" => null,
                    "PermissionSourceSystemType" => null,
                    "PermissionSourceDataURL" => null,
                    "PermissionSourceCommMedium" => "WEB",
                    "IsConfirmationRequired" => false
                )
            ]
        )
    );
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://e5728-iflmap.hcisbt.us2.hana.ondemand.com/http/Web/MKT/Interactions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HEADER => false,
        CURLOPT_POSTFIELDS => json_encode($json),
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer ".$token,
          "Content-Type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      curl_close($curl);

      //Trama interaccion
      $tramaInteraccion =
      '{
                      "InteractionContactOrigin": "WEBGQ",
                      "InteractionContactId": "'.$nombre.'",
                      "CommunicationMedium": "WEB",
                      "InteractionType": "COTIZACION",
                      "InteractionTimeStampUTC": "'.$date.'",
                      "InteractionSourceObjectType": "WEBGQ",
                      "InteractionSourceObject": "WEBGQ",
                      "MarketingArea": "GQGLOBAL",
                      "CampaignID": "",
                      "MarketingLocationOrigin": "",
                      "MarketingLocation": "",
                      "DigitalAccountType": "",
                      "DigitalAccount": "",
                      "MKT_AgreementOrigin": "",
                      "MKT_AgreementExternalID": "",
                      "CampaignContent": null,
                      "InteractionWeightingFactor": null,
                      "InteractionSentimentValue": null,
                      "InteractionStatus": "",
                      "InteractionReason": "",
                      "InteractionLanguage": "ES",
                      "InteractionAmount": "",
                      "InteractionCurrency": "USD",
                      "InteractionLatitude": "",
                      "InteractionLongitude": "",
                      "SpatialReferenceSystem": "",
                      "DeviceType": "DESKTOP",
                      "InteractionDeviceName": "",
                      "SourceSystemType": "WEBGQ",
                      "SourceSystem": "WEBGQ",
                      "InteractionSourceObjectAddlID": "",
                      "InteractionSourceObjectStatus": "",
                      "InteractionSourceDataURL": "'.current_url().'",
                      "InteractionSourceTimeStampUTC": null,
                      "CampaignContentLinkURL": "",
                      "CampaignContentLinkName": "",
                      "ReferralSource": "",
                      "ReferralSourceCategory": "",
                      "InteractionContentSubject": "",
                      "InteractionContent": "",
                      "InteractionProduct": {
                              "InteractionProducts": [{
                                         "ProductOrigin": "SAP_ERP_MATNR",
                                         "Product": "",
                                         "InteractionProdWeightingFactor": "1",
                                         "InteractionProductSentimentVal": "1",
                                         "InteractionProductAmount": "",
                                         "InteractionProductQuantity": "1",
                                         "InteractionProductUnit": "ST",
                                         "ProductRecommendationModelType": "",
                                         "ProductRecommendationScenario": null,
                                         "InteractionProductStatus": "",
                                         "InteractionProductReason": "",
                                         "InteractionSourceItemNumber": null
                                  },{"ProductOrigin": "SAP_ERP_MATNR",
                                         "Product": "B4S6K361B G G560",
                                         "InteractionProdWeightingFactor": "1",
                                         "InteractionProductSentimentVal": "1",
                                         "InteractionProductAmount": "18200.00",
                                         "InteractionProductQuantity": "1",
                                         "InteractionProductUnit": "ST",
                                         "ProductRecommendationModelType": "",
                                         "ProductRecommendationScenario": null,
                                         "InteractionProductStatus": "",
                                         "InteractionProductReason": "",
                                         "InteractionSourceItemNumber": null
                                  }]
                      }
                  }';

      $request_headers=array(
        'Content-type: application/json',
        'Content-Length: '.strlen($tramaInteraccion),
        'InteractionType: Interactions',
        'Authorization: Bearer '.$token
      );

      $curl=curl_init();
      $api_url='https://e5728-iflmap.hcisbt.us2.hana.ondemand.com/http/Web/MKT/Interactions';

      curl_setopt_array(
      $curl,
        array(

            CURLOPT_URL => $api_url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER =>true,
            CURLOPT_POSTFIELDS => $tramaInteraccion,
            CURLOPT_HTTPHEADER => $request_headers,
            CURLOPT_XOAUTH2_BEARER=> $token,
            CURLOPT_HEADER=>false
        )
      );

      $res=curl_exec($curl);
      curl_close($curl);
      //
      // echo $response;
      // echo $res;

      session_start();
      $_SESSION['data'] = $res;
      $_SESSION['res'] = $response;

    }


    function setname_imagen($image) {

        $file = $this->input->post('archivo');

        $this->session->set_userdata($image, $file);

        echo $image;
    }

    function checkEmail() {

        $email = $this->input->post('email');
        if ($this->Secure_model->checkEmail($email)) {
            echo '<span class="cabin_naranjas">El email que intenta registrar ya existe, por favor intente con otro! </span>';
        }
    }

    function checkEmail_up() {

        $email = $this->input->post('email');
        if ($this->Secure_model->checkEmail($email) and $email != $this->session->userdata('user_email')) {
            echo '<span class="cabin_naranjas">El email que intenta registrar ya existe, por favor intente con otro! </span>';
        }
    }

    /*enviar solicitud*/
    function enviarMail()
    {
        $auto = $this->input->post('auto');
        $opcion = $this->input->post('opcion');
        $name = $this->input->post('name');
        $dui = $this->input->post('dui');
        $email = utf8_encode($this->input->post('email'));
        $phone = $this->input->post('phone');
        $channel = $this->input->post('channel');
        $data_auto = $this->data_model->getCar($auto, 1);
        $marca = utf8_encode($data_auto['marca']);
        $modelo = utf8_encode($data_auto['modelo']);
		    $gclid = $this->input->post('gclid-info');
        $cuota = 0;
        //esto lo vas a poner en enviar mail, donde se obtienen los parametros
        $pais = $this->input->post('pais');




		//echo "<script>console.log(GCLID:".$gclid.")</script>";

        if($channel != "web"){
            $channel = "mobile";
        }

        if($opcion == "renting")
        {
            $cuota = $data_auto['cuota_ren'];
        }else if($opcion == "compra")
        {
            $cuota = $data_auto['cuota_com'];
        }

        //METHOD - SEND DATA TO SPREEDSHEET GOOGLE || LUIS FLORES DATASOFT
        //if($channel == "mobile"){
            $url = "https://script.google.com/macros/s/AKfycbz7cpb0mLEcHR87gdIyMoxFvpfZfse3ftlfKJgQjIwhs30eh7o/exec";
            $params = array('Marca' => $marca,
                        'Modelo' => $modelo,
                        'Opción' => $opcion,
                        'name' => $name,
                        'dui' => $dui,
                        'email' => $email,
                        'phone' => $phone,
                        'Cuota' => $cuota,
                        'channel' => $channel,
						'gclid'=> $gclid);

            $query = http_build_query($params);
            $ch    = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            $response = curl_exec($ch);
            curl_close($ch);
        //}

        $to = 'ventasusados@crediq.com';
        $subject = "Solicitud de Informaci�n";
        $cuerpo = '<table cellspacing="0" callpadding="0"  width="389" height="180" border="0">';
        $cuerpo .= "<tr>";
        $cuerpo = "<th>Formulario</th>";
        $cuerpo .= "</tr>";
        $cuerpo .= "<tr>";
        $cuerpo .= '<td align="center">';

        if(!empty($auto)){
            $cuerpo .= "<p>{$name} ha llenado el formulario Solicitud de Informaci�n con los siguiente datos:</p>";
        }else{
            $cuerpo .= "<p>{$name} ha llenado el formulario de cont�ctenos con los siguiente datos:</p>";
        }

        $cuerpo .= "<p><b>Nombre:</b> {$name}</p>";
        $cuerpo .= "<p><b>Dui/Identificaci�n:</b> {$dui}</p>";
        $cuerpo .= "<p><b>E-mail:</b> {$email}</p>";
        $cuerpo .= "<p><b>Tel�fono:</b> {$phone}</p>";

        if(!empty($auto)){
            $cuerpo .= "<p><b>Marca:</b> {$marca}<br>";
            $cuerpo .= "<b>Modelo:</b> {$modelo}<br>";
            $cuerpo .= "<b>Opcion:</b> {$opcion}<br>";
            $cuerpo .= "<b>Cuota:</b> {$cuota}<br></p>";
        }
        $cuerpo .= '</td>';
        $cuerpo .= '</tr>';
        $cuerpo .= '</table>';
        //Email configuracion
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '190.0.230.57',//'correo.crediqinfo.com',
            'smtp_port' => 25,
            'smtp_user' => 'info',
            'smtp_pass' => 'crediq',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => '\r\n'
        );
        //Load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //Set email parameters
        $this->email->from('info@crediqinfo.com', 'CrediQ');
        $this->email->to($to);

        $this->email->cc('fduran@crediq.com, callcenter@crediq.com','rvillalobos@crediq.com');

        // $this->email->bcc('gerardo@iw.sv');
        $this->email->subject($subject);
        $this->email->message($cuerpo);

       // if ($this->email->send()){
       //      $this->session->set_flashdata("msg", "Solicitud enviada exitosamente.");
       //      // redirect(base_url());
       //  } else {
       //      show_error($this->email->print_debugger());
       //      return FALSE;
       //  }

       $this->session->set_flashdata("msg", "Solicitud enviada exitosamente.");


        if(empty($auto)){
            self::interaccionContacto($email, $name, $phone, $pais);
          }else{
              self::TramaConsentimiento($auto,$renting,$marca,$modelo,$name,$dui,$phone,$email);
              redirect(base_url().'renting/catalogo');
          }



    }


    function cargarMarca(){

      try {
          $id_pais = $_POST['pais'];
          $token = 'eb8be537eb0ec271de8d6136fb092071';
          $client = new SoapClient(
            null,array(
            'location' => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php",
            'uri'      => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php?wsdl",
            'trace' => 1,
            'use' => SOAP_LITERAL,
          ));
          $marca = $client->consulta_marca($id_pais,$token);
          for ($i=0; $i <count($marca); $i++) {
            $marcas[$i] = explode("-", $marca[$i]);
          }

      } catch (Exception $e) {
          echo $e->getMessage();
      }
      echo json_encode($marcas);

    }

    function cargarModelo(){

      try {
          $id_pais = $_POST['pais'];
          $id_marca = $_POST['marca'];
          $token = 'eb8be537eb0ec271de8d6136fb092071';
          $client = new SoapClient(
            null,array(
            'location' => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php",
            'uri'      => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php?wsdl",
            'trace' => 1,
            'use' => SOAP_LITERAL,
          ));
          $modelo = $client->consulta_modelo($id_pais,$id_marca,$token);
          for ($i=0; $i <count($modelo); $i++) {
            $modelos[$i] = explode("-", $modelo[$i]);
          }

      } catch (Exception $e) {
          echo $e->getMessage();
      }
      echo json_encode($modelos);
    }



        function cargarVersiones(){
          try {
              $id_pais = $_POST['pais'];
              $id_marca = $_POST['marca'];
              $id_modelo =$_POST['modelo'];
              $token = 'eb8be537eb0ec271de8d6136fb092071';
              $client = new SoapClient(
                null,array(
                'location' => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php",
                'uri'      => "http://calidad.grupoq.co.cr/webservices/procesar_web_marcas/servicio.php?wsdl",
                'trace' => 1,
                'use' => SOAP_LITERAL,
              ));
              $version = $client->consulta_version($id_pais,$id_modelo,$token);
              $contador = 0;
              foreach ($version as $valor) {
                $version[$contador] = array(
                  'codigo'=>$valor->codigo,
                  'nombre'=>$valor->nombre
                );
                $contador++;
              }
          } catch (Exception $e) {
              echo $e->getMessage();
          }
            echo json_encode($version);
          }

  }
