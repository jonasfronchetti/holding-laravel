@include('sistema.componentes.selecionaCurto',
         ['id' => $id, 'label' => $label,
          'values' => \App\Models\Estoque\Unidade::get()->pluck('nome', 'id'),
          'selects' => null
         ]
        )