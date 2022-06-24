<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_student extends Model{
    protected $table      = 'tb_estudiante';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ci)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_estudiante WHERE ci = '$ci'");
        return $query;
    }

    function guardar($ci, $nombre, $lastname, $direccion, $fk_municipio, $fk_carrera, $fk_year_academico, $fk_brigada)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_estudiante');
        $data = [                        
            'ci' => $ci,
            'nombre' => $nombre,            
            'lastname' => $lastname,
            'direccion' => $direccion,
            'fk_municipio' => $fk_municipio,
            'fk_carrera' => $fk_carrera,
            'fk_year_academico' => $fk_year_academico,
            'fk_brigada' => $fk_brigada
        ];
        return $builder->insert($data);
    }

    function update_student($id, $nombre, $lastname, $ci, $direccion, $fk_municipio, $fk_carrera, $fk_year_academico, $fk_brigada)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_estudiante');
        $data = [
            'nombre' => $nombre,
            'lastname' => $lastname,
            'ci' => $ci,
            'direccion' => $direccion,
            'fk_municipio' => $fk_municipio,
            'fk_carrera' => $fk_carrera,
            'fk_year_academico' => $fk_year_academico,
            'fk_brigada' => $fk_brigada            
        ];
        $builder->where('id', $id);        
        return $builder->update($data);
    }

    function del_student($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_estudiante');       
        $builder->where('id', $id);
        return $builder->delete();
    }

    function listar_stud()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_estudiante.id, nombre, lastname, ci, direccion, municipio, carrera, anno_academico, brigada FROM tb_estudiante JOIN tb_municipio ON tb_municipio.id = tb_estudiante.fk_municipio JOIN tb_carrera ON tb_carrera.id = tb_estudiante.fk_carrera JOIN tb_year_academico ON tb_year_academico.id = tb_estudiante.fk_year_academico JOIN tb_brigada ON tb_brigada.id = tb_estudiante.fk_brigada ORDER BY tb_estudiante.id DESC");
        return $query->getResultArray();
    }

    function id_ci($ci)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id FROM tb_estudiante WHERE ci = '$ci'");
        return $query->getRowArray();
    }
}