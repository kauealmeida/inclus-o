<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome_aluno',//
        'data_nascimento',//
        'RA',//
        'diagnostico',//
        'EC',
        'PEP',
        'flex_prova',
        'cries',
        'desc_cries',
        'sala_recursos',
        'desc_sala_recursos',
        'atend_externo',
        'detalhe_necessidades',
        'adaptacoes',
        'adaptacoes_outros',
        'apoio',
        'referencia',
        'nv_escrita',
        
        'fk_alunos_bairros',
        'fk_alunos_escolas',//
        'fk_alunos_series',//
        'fk_alunos_turmas',//
        'fk_alunos_periodos',//
        'fk_alunos_necessidades_especiais',//
    ];

    protected $primaryKey = 'id_alunos';
}
