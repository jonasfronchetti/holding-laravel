@include('sistema.componentes.selecionaCurto',
         ['id' => $id, 'label' => $label,
          'values' => \App\Models\Basico\Cidade::select(DB::raw("CONCAT(bas_cidades.nome,'-',bas_estados.uf) as nome"), 'bas_estados.uf', 'bas_cidades.id')
            ->join('bas_estados', 'bas_estados.id', '=', 'bas_cidades.estado_id')
            ->orderby('bas_estados.uf')->orderby('bas_cidades.nome')->get()->pluck('nome', 'id')
            ,
          'selects' => null,
          'attributes' => isset($attributes) ? $attributes : null
         ]
        )