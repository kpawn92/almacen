<?php

namespace App\Controllers;

use App\Models\M_student;
use App\Models\M_book;
use App\Models\M_entrega;

use CodeIgniter\Controller;

class Entrega extends Controller
{
    public function list_entrega()
    {
        //$id_estudiante = $_POST['ci'];
        if ($_POST['f'] == "listarEntegados") {
            $librosEntregado = new M_entrega();

            $json = array();
            $books = $librosEntregado->list_bookEntregados();

            //print_r($books);

            foreach ($books as $data) {
                $json['data'][] = $data;
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }

    public function book()
    {
        $libro = new M_book();
        $books = $libro->getBook();
        foreach ($books as $book) :
            echo '<option value="' . $book['id'] . '">' . $book['codigo'] . ' | ' . $book['titulo'] . '</option>';
        endforeach;
    }

    public function save_entrega()
    {
        $request = \Config\Services::request();

        $validation = $this->validate([
            'fecha_entrega' => 'required'
        ]);

        if (!$validation) {
            $confirmBook  = $this->validator;
            return $confirmBook->listErrors();
        } else {
            extract($request->getPost());

            $sb = new M_entrega();
            $book = new M_book();
            $rows_report = $sb->row_preport($fk_estudiante, $fk_libro);
            if ($rows_report->getNumRows() > 0) {
                echo 'El estudiante ya posee el libro';
            } else {
                $date_entrega = strtotime($fecha_entrega);
                $book->descontar($fk_libro);
                $sb->guardar($fk_estudiante, $fk_libro, $date_entrega);

                echo "Datos guardados correctamente";
            }
        }
    }

    public function id_ci()
    {
        $student = new M_student();
        $request = \Config\Services::request();
        
        extract($request->getPost());

        $idCI = $student->id_ci($ci);

        echo $idCI['id'];
    }
}
