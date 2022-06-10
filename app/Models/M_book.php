<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_book extends Model{
    protected $table      = 'tb_libro';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($codigo, $titulo, $precio, $autor, $isbn, $cantidad, $portada)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_libro');
        $data = [                        
            'codigo' => $codigo,
            'titulo' => $titulo,            
            'precio' => $precio,
            'autor' => $autor,
            'isbn' => $isbn,
            'cantidad' => $cantidad,
            'portada' => $portada
        ];
        return $builder->insert($data);
    }

    function row_preport($codigo)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_libro WHERE codigo = '$codigo'");
        return $query;
    }
}