@extends('backend.template.app')
<style type="text/css" media="screen">
        table {
    border-collapse: separate;
    border-spacing: 0 5px;
    }
    thead th {
      background-color:#428bca;
      color: white;
    }
    tbody td {
      background-color: #EEEEEE;
    }
</style>
@section('main-content')
<div class="panel panel-primary">
        <div class="panel-heading">
        <div class="row">
            <div class="col-md-2">
                <a type="button" class="btn btn-danger fa fa-arrow-left"  href="{{ url('InsumoSolicitudesMenu') }}"></span><h7 style="color:#ffffff">&nbsp;&nbsp;VOLVER</h7></a>
            </div>
            <div class="col-md-7 text-center">
                <p class="panel-title">RECEPCIÓN ORDEN DE PRODUCCIÓN</p>
            </div>
            <div class="col-md-3 text-right">

            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border"></div>
                    <div class="box-body">
                        <table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-orprod">
                            <thead class="cf">
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        NRO ORP
                                    </th>
                                    <th class="text-center">
                                        FECHA ORP
                                    </th>
                                    <th>
                                        FECHA RECEPCIÓN
                                    </th>
                                    <th class="text-center">
                                        PRODUCTO A PRODUCIR
                                    </th>
                                    <th class="text-center">
                                        UNIDAD MEDIDA
                                    </th>
                                    <th class="text-center">
                                        LINEA PRODUCCIÓN
                                    </th>
                                    <th class="text-center">
                                        CANTIDAD PRODUCIR
                                    </th>
                                    <th class="text-center">
                                        ESTADO RECEPCIÓN
                                    </th>
                                    <th class="text-center">
                                        RECEPCIONADO
                                    </th>
                                    <th class="text-center">
                                        OPCIONES
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        NRO ORP
                                    </th>
                                    <th class="text-center">
                                        FECHA ORP
                                    </th>
                                    <th>
                                        FECHA RECEPCIÓN
                                    </th>
                                    <th class="text-center">
                                        PRODUCTO A PRODUCIR
                                    </th>
                                    <th class="text-center">
                                        UNIDAD MEDIDA
                                    </th>
                                    <th class="text-center">
                                        LINEA PRODUCCIÓN
                                    </th>
                                    <th class="text-center">
                                        CANTIDAD PRODUCIR
                                    </th>
                                    <th class="text-center">
                                        ESTADO RECEPCIÓN
                                    </th>
                                    <th class="text-center">
                                        RECEPCIONADO
                                    </th>
                                    <th class="text-center">
                                        OPCIONES
                                    </th>
                                </tr>
                            </tfoot>
                            <tr>
                            </tr>
                    </table>
                </div>
            </div>
    </div>
</div>
    </div>
</div>


@endsection
@push('scripts')
<script>
var t = $('#lts-orprod').DataTable( {

         "processing": true,
            "serverSide": true,
            "ajax": "/CreateRecepcionOrp",
            "columns":[
                {data: 'orprod_id'},
                {data: 'orprod_nro_orden'},
                {data: 'orprod_registrado'},
                {data: 'orprod_modificado'},
                {data: 'nombreReceta'},
                {data: 'umed_nombre'},
                {data: 'lineaProduccion'},
                {data: 'orprod_cantidad'},
                {data: 'orprod_estado_recep'},
                {data: 'estadoAprobacion',orderable: false, searchable: false},
                {data: 'acciones'},
        ],
        "order": [[ 0, "desc" ]],
        "language": {
             "url": "/lenguaje"
        },
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    function CambiarEstado(id)
    {
        //alert("CAMBIANDO EL ESTADO RECEPCION CON ID ORP: "+id);
        var route="CambioEstadoRecepOrp/"+id+"";
           $.ajax({
                url: route,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                },
                error: function(result) {
                }
            });
    }
</script>
@endpush

