@include('sistema.componentes.selecionaCurto',
         ['id' => $id, 'label' => $label,
          'values' => \App\Models\Fiscal\ClFiscal::get()->pluck('nome', 'id'),
          'selects' => null,
          'attributes' => isset($attributes) ? $attributes : null
         ]
        )