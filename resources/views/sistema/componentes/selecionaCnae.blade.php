@include('sistema.componentes.selecionaCurto',
         ['id' => $id, 'label' => $label,
          'values' => \App\Models\Fiscal\Cnae::get()->pluck('descricao', 'id'),
          'selects' => null,
          'attributes' => isset($attributes) ? $attributes : null
         ]
        )