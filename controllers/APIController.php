<?php

namespace Controllers;

use Model\Cita;
use Model\Horas;
use Model\Servicio;
use Model\CitaServicio;

class APIController {
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
    }
    public static function horas() {
        $horas = Horas::all();
        echo json_encode($horas, JSON_UNESCAPED_UNICODE);
    }
    public static function horasDisponibles() {
        // redireccionar si la url no contiene ?fecha=
        if(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) !== 'fecha=' . $_GET['fecha']) {
            header('Location: /cita');
        }elseif(!preg_match('/\d{4}-\d{2}-\d{2}/', $_GET['fecha'])) {
            header('Location: /cita');
        }        
       
        $consulta = " SELECT horas.* FROM horas, ";
        $consulta .= " (SELECT horaId FROM citas WHERE fecha = '${_GET['fecha']}') as citas ";
        $consulta .= " WHERE horas.id IN (citas.horaId) ";
        $consulta .= " ORDER BY horas.id ";

        $horas = Horas::SQL($consulta);
        echo json_encode($horas, JSON_UNESCAPED_UNICODE);

    }
    
    public static function guardar() {
        $alertas = [];

        // Almacena la cita y devuelve el id
        $cita = new Cita($_POST);
        
        // Revisar que no exista una cita con la misma fecha y hora
        $citaExistente = Cita::whereAnd('fecha', $_POST['fecha'], 'horaId', $_POST['horaId']);

        if($citaExistente) {
            $alertas[] = 'Ya existe una cita en esa fecha y hora';

            $respuesta = [
                'alertas' => $alertas
            ];
            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
            return;
        } 
                
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        // Almacen la cita y el servicio

        $idServicios = explode(",", $_POST['servicios']);

        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            
            $citaServicio->guardar();
        }
        // Retornamos una respuesta
        $respuesta = [
            'servicios' => $resultado
        ];
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();            
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
