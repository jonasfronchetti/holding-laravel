<div class="box-body" id="box-body{{$items['model']}}">
    <input id="table-line{{$items['model']}}" type="hidden" value="">
    <input id="id{{$items['model']}}" type="hidden" value="0">
    <input id="count{{$items['model']}}" type="hidden" value="{{count($items['data'])}}">
    @foreach($components as $component)
        @include($component['type'], $component['properties'])
    @endforeach
    <div class="panel-body">
        <a id="adicionar{{$items['model']}}" onclick="item_add({{json_encode($items['fillable'])}}, '{{$items['model']}}');" class="btn btn-primary pull-right" title="Adicionar">
            <i class="fa fa-plus-square"></i> Adicionar
        </a>
    </div>
</div>
<div>
    <div>
        <table class="table table-bordered table-hover">
            <tr>
                @foreach($items['names'] as $item)
                    <th>{{$item}}</th>
                @endforeach
            </tr>
            <tbody id="itemlist{{$items['model']}}">
            @if (count($items['data']) > 0)
                @foreach($items['data'] as $cod=>$item)
                    <tr id="{{$items['model']}}{{$cod}}"><input type="hidden" name="{{$items['model']}}[{{$cod}}][id]" value="{{$item->id}}">
                        @foreach($items['fillable'] as $c=>$i)
                            <td><input type="hidden" name="{{$items['model']}}[{{$cod}}][{{$i}}]" value="{{$item->$i}}">{{$item->$i}}</td>
                        @endforeach
                        <td>
                            <a href="javascript:void(0);" onclick="item_edit({{$cod}}, {{json_encode($items['fillable'])}}, '{{$items['model']}}');" title="Editar" style="color:blue"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a href="javascript:void(0);" id="remove-item" title="Deletar" style="color:red"><i class="fa fa-trash-o fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
</div>

@section('before-scripts-end')
    @parent
    <script>

        function clear(items, nameModel) {
            $("#table-line"+nameModel).val("");
            $("#id"+nameModel).val("0");

            for (var cod in items) {
                $("#" + items[cod]).val("")
            }
        }

        $("tbody").on("click", "#remove-item", function () {
            $(this).parent().parent().remove();
        });

        function item_edit(line, items, nameModel) {
            document.getElementById("table-line"+nameModel).value = line;
            document.getElementById("adicionar"+nameModel).innerHTML = '<i class="fa fa-plus-square"></i>' + ' Salvar';
            document.getElementById("id"+nameModel).value = document.getElementsByName(nameModel + "[" + line + "][id]")[0].value;
            for (var cod in items) {
                $("#" + items[cod]).val(document.getElementsByName(nameModel + "[" + line + "][" + items[cod] + "]")[0].value);
            }
            $("#div"+nameModel).removeClass('collapsed-box');
            var a = $("#i"+nameModel);
            a.removeClass('fa-plus')
            a.addClass('fa-minus');

            //remove style none do box-body para mostrar div
            document.getElementById("box-body"+nameModel).style.display = '';

            document.getElementById(items[0]).focus();
        }

        function item_add(items, nameModel) {
            var id = document.getElementById("id"+nameModel).value;
            var line = document.getElementById("table-line"+nameModel).value;
            var count = document.getElementById("count"+nameModel).value;
            var table = "";
            var aux;
            if (line != "") {
                aux = count;
                count = line;
            }

            table += "<tr id="+ nameModel + count + "><input type='hidden' name='" + nameModel + "[" + count + "][id]' value='" + id + "'>";
            for (var cod in items) {
                var fieldValue = document.getElementById(items[cod]).value;
                table += "<td><input type='hidden' name='" + nameModel + "[" + count + "][" + items[cod] + "]' value='" + fieldValue + "'>" + fieldValue + "</td>";
            }
            table += "<td><a href='javascript:void(0);' onclick='item_edit(" + count + ", " + JSON.stringify(items) +", " + JSON.stringify(nameModel) +");' title='Editar' style='color:blue'><i class='fa fa-pencil-square-o fa-lg'></i></a>\n";
            table += "<a href='javascript:void(0);' id='remove-item' title='Deletar' style='color:red'><i class='fa fa-trash-o fa-lg'></i></a></td>";
            table += "</tr>";

            if (line != "") {
                var el = document.getElementById(nameModel + line);
                el.parentNode.removeChild(el);
            } else {
                count ++;
                document.getElementById("count"+nameModel).value  = count;
            }

            document.getElementById("itemlist" + nameModel).innerHTML += table;
            clear(items, nameModel);

            $("#div"+nameModel).addClass('collapsed-box');
            var a = $("#i"+nameModel);
            a.removeClass('fa-minus')
            a.addClass('fa-plus');
            document.getElementById("box-body"+nameModel).style.display = 'none';
            document.getElementById("adicionar"+nameModel).innerHTML = '<i class="fa fa-plus-square"></i>' + ' Adicionar';
        };

    </script>

@endsection
