@include('sistema.componentes.seleciona'.(isset($size) ? 'Curto' : ''),
         ['id' => $id, 'label' => $label,
          'values' => \App\Models\Financeiro\Aplicacao::get()->pluck('nome', 'id'),
          'selects' => null,
          'attributes' => isset($attributes) ? $attributes : null
         ]
        )