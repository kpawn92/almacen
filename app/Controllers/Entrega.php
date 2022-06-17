<?php

namespace App\Controllers;

use App\Models\M_student;
use App\Models\M_book;

use CodeIgniter\Controller;

class Entrega extends Controller
{
    public function list_entrega()
    {
        $libros = new M_book();
        if ($_POST['f'] == "listarLibro") {
            $json = array();
            $book = $libros->list_book();

            foreach ($book as $data) {
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
            echo '<option value="' . $book['id'] . '">' . $book['codigo'] .' | '. $book['titulo'] . '</option>';
        endforeach;
    }
}
