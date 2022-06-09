<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_municipios;
use App\Models\M_carrera;
use App\Models\M_yearA;
use App\Models\M_brigada;
use App\Models\M_student;

class Dash extends Controller
{
    public function index()
    {
        $municipios = new M_municipios();
        $dato['municipios'] = $municipios->orderBy('id')->findAll();
        $carreras = new M_carrera();
        $dato['carreras'] = $carreras->orderBy('id')->findAll();
        $year = new M_yearA();
        $dato['academias'] = $year->orderBy('id')->findAll();
        $brigada = new M_brigada();
        $dato['brigadas'] = $brigada->orderBy('id')->findAll();
        return view('template/main', $dato);
    }

    public function save_student()
    {
        $request = \Config\Services::request();
        $validation = $this->validate([
            'nombre' => 'required|min_length[1]|max_length[50]|alpha_space',
            'lastname' => 'required|min_length[1]|max_length[50]|alpha_space',
            'ci' => 'required|is_natural|min_length[11]|max_length[11]|numeric',
            'direccion' => 'required'
        ]);

        if (!$validation) {
            $confirm  = $this->validator;
            return $confirm->listErrors();
        } else {
            extract($request->getPost());
            $student = new M_student();
            $rows_report = $student->row_preport($ci);
            if ($rows_report->getNumRows() > 0) {
                echo "El estudiante ya existe";
            } else {
                $student->guardar($ci, $nombre, $lastname, $direccion, $fk_municipio, $fk_carrera, $fk_year_academico, $fk_brigada);
                echo "<strong>Datos guardados correctamente...</strong>";
            }
        }
    }

    public function edit_student()
    {
        $request = \Config\Services::request();
        $validation = $this->validate([
            'nombre' => 'required|min_length[1]|max_length[50]|alpha_space',
            'lastname' => 'required|min_length[1]|max_length[50]|alpha_space',
            'ci' => 'required|is_natural|min_length[11]|max_length[11]|numeric',
            'direccion' => 'required'
        ]);

        if (!$validation) {
            $confirm  = $this->validator;
            return $confirm->listErrors();
        } else {
            extract($request->getPost());
            $student = new M_student();
            $act = $student->update_student($id, $nombre, $lastname, $ci, $direccion, $fk_municipio, $fk_carrera, $fk_year_academico, $fk_brigada);
            if ($act==false) {
                echo "Error de actualizaci&oacute;n";
            } else echo "<strong>Datos actualizados correctamente...</strong>";
        }
    }

    public function del_student()
    {
        $request = \Config\Services::request();
        $student = new M_student();
        extract($request->getPost());
        $query1 = $student->del_student($id);
        if ($query1 != true) {
            echo "El estudiante tiene registros pendientes";
        } else
            echo "El estudiante ha sido eliminado exitosamente";
    }


    public function list_student()
    {
        $estudiantes = new M_student();
        if ($_POST['funcion'] == "listar") {
            $json = array();
            $student = $estudiantes->listar_stud();

            foreach ($student as $data) {
                $json['data'][] = $data;
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }
}
