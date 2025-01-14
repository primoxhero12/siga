<?php

namespace siga\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App;
use siga\Modelo\insumo\insumo_registros\Proveedor;
use siga\Modelo\insumo\insumo_registros\EvaluacionProveedor;
use siga\Modelo\admin\Usuario;//NEW
use DB;
use siga\Modelo\insumo\insumo_registros\UnidadMedida;
use siga\Modelo\insumo\insumo_recetas\Receta;
use siga\Modelo\insumo\insumo_recetas\DetalleReceta;
use siga\Modelo\insumo\insumo_registros\Sabor;
use siga\Modelo\insumo\insumo_registros\SubLinea;
use siga\Modelo\insumo\insumo_registros\Ingreso;
use siga\Modelo\insumo\insumo_registros\DetalleIngreso;
use siga\Modelo\insumo\insumo_registros\IngresoPreliminar;
use siga\Modelo\insumo\insumo_registros\DetalleIngresoPreliminar;
use siga\Modelo\insumo\insumo_solicitud\OrdenProduccion;
use siga\Modelo\insumo\insumo_solicitud\DetalleOrdenProduccion;
use siga\Modelo\insumo\insumo_devolucion\Devolucion;
use siga\Modelo\insumo\InsumoHistorial;
use siga\Modelo\insumo\Stock;
use siga\Http\Modelo\comercial\SolicitudPv;
use siga\Http\Modelo\comercial\SolicitudProd;
use siga\Http\Modelo\comercial\IngresoPv;
use siga\Http\Modelo\comercial\DetalleIngresoPv;
class ReportController extends Controller
{

    public function test_print()
    {
        $username = Auth::user()->usr_usuario;
        $title = "Reporte ";
        $date =Carbon::now();
        $storage = 'almacen isabel';
        // // $html = '<h1>Hello world</h1>';
        // return view('layouts.print', compact('username','date','title'));
        $view = \View::make('layouts.print', compact('username','date','title','storage'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        //$pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0); //SETTEANDO LANDSCAPE HORIZONTAL
        return $pdf->inline();
        // return 'test';
    }

    public function reporte_proveedores()
    {
        $username = Auth::user()->usr_usuario;
        $title = "EVALUACIÓN PROVEEDORES";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
            ->where('usr_id', Auth::user()->usr_id)->first();
        $storage = $planta->nombre_planta;
        // // $html = '<h1>Hello world</h1>';
        // return view('layouts.print', compact('username','date','title'));
        $evaluaciones = EvaluacionProveedor::join('insumo.proveedor as prov','insumo.evaluacion_proveedor.eval_prov_id','=','prov.prov_id')->get();

        $view = \View::make('reportes.proveedores', compact('username','date','title','storage','evaluaciones'));
        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }

    public function imprimir_receta($id_receta)
    {
        $username = Auth::user()->usr_usuario;
        $title = "RECETA";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
            ->where('usr_id', Auth::user()->usr_id)->first();
        $storage = $planta->nombre_planta;
        $receta = Receta::join('insumo.sub_linea as subl','insumo.receta.rece_sublinea_id','=','subl.sublin_id')
                        ->join('insumo.sabor as sab','insumo.receta.rece_sabor_id','=','sab.sab_id')
                        ->join('insumo.unidad_medida as uni','insumo.receta.rece_uni_id','=','uni.umed_id')->where('rece_id',$id_receta)
                        ->first();
        // return $receta;
        $code = $receta->rece_codigo??'';
        $dataos_json = null;
        if ($receta->rece_lineaprod_id == 1) {
            $datos_json = json_decode($receta->rece_datos_json);
        }
        $view = \View::make('reportes.receta', compact('username','date','title','storage','receta','code','datos_json'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }
    public function ingreso_materia_prima($id_envio)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE INGRESO DE MATERIA PRIMA";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);


        $reg = Ingreso::join('acopio.envio_almacen as env','insumo.ingreso.ing_env_acop_id','=','env.enval_id')
                      ->where('ing_env_acop_id',$id_envio)->first();
        $detalle_ingreso = DetalleIngreso::join('insumo.insumo as ins','insumo.detalle_ingreso.deting_ins_id','=','ins.ins_id')->where('deting_ing_id',$reg->ing_id)->first();

        $code = $reg['ing_enumeracion'].'/'.date('Y',strtotime($reg['ing_registrado']));

        $view = \View::make('reportes.ingreso_materia_prima', compact('username','date','title','storage','receta','reg','detalle_ingreso','per','planta'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }

    public function orden_de_produccion($id_orprod)
    {

        $username = Auth::user()->usr_usuario;
        $title = "ORDEN DE PRODUCCIÓN";
        $date =Carbon::now();



        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();

        $receta = OrdenProduccion::join('insumo.receta as rece','insumo.orden_produccion.orprod_rece_id','=','rece.rece_id')
                ->join('insumo.sub_linea as subl','rece.rece_sublinea_id','=','subl.sublin_id')
                ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                ->join('insumo.unidad_medida as uni','rece.rece_uni_id','=','uni.umed_id')
                ->join('insumo.mercado as mer','insumo.orden_produccion.orprod_mercado_id','=','mer.mer_id')
                ->join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_id','=','planta.id_planta')->where('orprod_id',$id_orprod)->first();

        $storage = 'LINEA PRODUCCIÓN '. $this->nombreLinea($receta->rece_lineaprod_id);

        $datos_json = null;
        if ($receta->rece_lineaprod_id == 1) {
            $datos_json = json_decode($receta->rece_datos_json);
        }

        $code = null;

        $view = \View::make('reportes.orden_de_produccion', compact('username','date','title','storage','receta','datos_json'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function solicitud_traspaso($id_orp)
    {

        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE SOLICITUD POR TRAPASO";
        $date =Carbon::now();



        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                    ->where('usr_id',Auth::user()->usr_id)
                    ->first();

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                    ->where('usr_id',Auth::user()->usr_id)
                    ->first();

        $storage = $planta->nombre_planta;
        $reg = OrdenProduccion::join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_traspaso','=','planta.id_planta')
                              ->join('public._bp_planta as pl','insumo.orden_produccion.orprod_planta_id','=','pl.id_planta')
                              ->join('public._bp_usuarios as usu','insumo.orden_produccion.orprod_usr_id','=','usu.usr_id')
                              ->join('public._bp_personas as per','usu.usr_prs_id','=','per.prs_id')
                              ->where('orprod_tiporprod_id',3)->where('orprod_id',$id_orp)
                              ->first();

        $code = $reg['orprod_nro_solicitud'];

        $view = \View::make('reportes.solicitud_traspaso', compact('username','date','title','storage','reg','id_orp','code'));

        $html_content = $view->render();

        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function kardex_valorado($rep)
    {
        $username = Auth::user()->usr_usuario;
        $title = "KARDEX VALORADO";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                        ->where('usr_id',Auth::user()->usr_id)
                        ->first();

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id',Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;

        $insumo = InsumoHistorial::join('insumo.insumo as ins', 'insumo.insumo_historial.inshis_ins_id', '=', 'ins.ins_id')
                        ->join('insumo.unidad_medida as umed', 'ins.ins_id_uni', '=', 'umed.umed_id')
                        ->where('inshis_planta_id', '=', $planta->id_planta)
                        ->where('inshis_ins_id', $rep)
                        ->orderby('inshis_id', 'ASC')
                        ->first();

        $tabkarde = InsumoHistorial::leftJoin('insumo.detalle_ingreso','insumo.detalle_ingreso.deting_id','=','insumo.insumo_historial.inshis_deting_id')
                                    ->leftJoin('insumo.detalle_orden_produccion','insumo.detalle_orden_produccion.detorprod_id','=','insumo.insumo_historial.inshis_detorprod_id')
                                    ->leftJoin('insumo.ingreso','insumo.ingreso.ing_id','=','insumo.detalle_ingreso.deting_ing_id')
                                    ->leftJoin('insumo.orden_produccion','insumo.orden_produccion.orprod_id','=','detalle_orden_produccion.detorprod_orprod_id')
                                    ->where('insumo.insumo_historial.inshis_planta_id', '=', $planta->id_planta)
                                    ->where('insumo.insumo_historial.inshis_ins_id', $rep)
                                    ->orderBy('insumo.insumo_historial.inshis_id')
                                    ->get();
        // return $tabkarde;
        $detallesIngresos = DetalleIngreso::where('deting_ins_id',$rep)->get();

        $stocks = Stock::join('insumo.detalle_ingreso as deting', 'insumo.stock.stock_deting_id', '=', 'deting.deting_id')
			->where('stock_planta_id', $planta->id_planta)
			->where('stock_cantidad', '>', 0)
			->where('stock_ins_id', $rep)
			->orderby('deting_ing_id')
			->get();
        $code = $insumo->ins_codigo;

        $view = \View::make('reportes.kardex_valorado', compact('username','date','title','storage','insumo','tabkarde','code','detallesIngresos','stocks'));

        $html_content = $view->render();

        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }

    public function kardex_fisico($rep)
    {
        $username = Auth::user()->usr_usuario;
        $title = "KARDEX FISICO";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                        ->where('usr_id',Auth::user()->usr_id)
                        ->first();

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id',Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;

        $insumo = InsumoHistorial::join('insumo.insumo as ins', 'insumo.insumo_historial.inshis_ins_id', '=', 'ins.ins_id')
                        ->join('insumo.unidad_medida as umed', 'ins.ins_id_uni', '=', 'umed.umed_id')
                        ->where('inshis_planta_id', '=', $planta->id_planta)
                        ->where('inshis_ins_id', $rep)
                        ->orderby('inshis_id', 'ASC')
                        ->first();

        $tabkarde = InsumoHistorial::leftJoin('insumo.detalle_ingreso','insumo.detalle_ingreso.deting_id','=','insumo.insumo_historial.inshis_deting_id')
                                    ->leftJoin('insumo.detalle_orden_produccion','insumo.detalle_orden_produccion.detorprod_id','=','insumo.insumo_historial.inshis_detorprod_id')
                                    ->leftJoin('insumo.ingreso','insumo.ingreso.ing_id','=','insumo.detalle_ingreso.deting_ing_id')
                                    ->leftJoin('insumo.orden_produccion','insumo.orden_produccion.orprod_id','=','detalle_orden_produccion.detorprod_orprod_id')
                                    ->where('insumo.insumo_historial.inshis_planta_id', '=', $planta->id_planta)
                                    ->where('insumo.insumo_historial.inshis_ins_id', $rep)
                                    ->orderBy('insumo.insumo_historial.inshis_id')
                                    ->get();


        $code = $insumo->ins_codigo;

        $view = \View::make('reportes.kardex_fisico', compact('username','date','title','storage','insumo','tabkarde','code'));

        $html_content = $view->render();

        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }

    public function nota_de_salida($id_orp_aprob)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE SALIDA ";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();

        $reg = OrdenProduccion::join('insumo.receta as rece','insumo.orden_produccion.orprod_rece_id','=','rece.rece_id')
                                ->leftjoin('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                                ->join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_id','=','planta.id_planta')
                                ->join('insumo.mercado as merc','insumo.orden_produccion.orprod_mercado_id','=','merc.mer_id')
                                ->where('orprod_id','=',$id_orp_aprob)
                                ->first();

        $detroprod = DetalleOrdenProduccion::join('insumo.insumo as ins','insumo.detalle_orden_produccion.detorprod_ins_id','=','ins.ins_id')
                                ->join('insumo.unidad_medida as uni','ins.ins_id_uni','=','uni.umed_id')
                                ->where('detorprod_orprod_id',$reg->orprod_id)
                                ->get();


        $code = $reg['orprod_nro_salida'].'/'.date('Y',strtotime($reg['orprod_registrado']));

        $view = \View::make('reportes.nota_de_salida', compact('username','date','title','storage','receta','reg','detroprod','usuario','code'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();

    }

    public function nota_de_ingreso($id_ingreso)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA INGRESO";

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usuario);
        $reg = Ingreso::join('insumo.tipo_ingreso as tip', 'insumo.ingreso.ing_id_tiping', '=', 'tip.ting_id')
                        ->where('ing_id',$id_ingreso)
                        ->first();
        $fecha = Carbon::parse($reg['ing_fecha_remision']);


        $mesesLiteral = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $deta_ingreso = DetalleIngreso::join('insumo.insumo as ins','insumo.detalle_ingreso.deting_ins_id','=','ins.ins_id')
                                                ->leftjoin('insumo.unidad_medida as uni','ins.ins_id_uni','=','uni.umed_id')
                                                ->join('insumo.proveedor as prov','insumo.detalle_ingreso.deting_prov_id','=','prov.prov_id')
                                                ->where('deting_ing_id',$id_ingreso)->get();


        $code = $reg['ing_enumeracion'].'/'.date('Y',strtotime($reg['ing_registrado']));
        $date =date('d/m/Y',strtotime($reg['ing_registrado']));

        $view = \View::make('reportes.nota_de_ingreso', compact('username','date','title','storage','reg','deta_ingreso','usuario','code','per'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function nombreLinea($id){
        if ($id == 1) {
            return 'LACTEOS';
        }elseif($id == 2){
            return 'ALMENDRA';
        }elseif($id == 3){
            return 'MIEL';
        }elseif($id == 4){
            return 'FRUTOS';
        }elseif($id == 5){
            return 'DERIVADOS';
        }
    }
    
    public function boleta_solicitud_adicional($id_orprod)
    {
        $username = Auth::user()->usr_usuario;
        $title = "INSUMO ADICIONAL";
        $date =Carbon::now();



        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();

        $receta = OrdenProduccion::join('insumo.receta as rece','insumo.orden_produccion.orprod_rece_id','=','rece.rece_id')
                ->join('insumo.sub_linea as subl','rece.rece_sublinea_id','=','subl.sublin_id')
                ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                ->join('insumo.unidad_medida as uni','rece.rece_uni_id','=','uni.umed_id')
                ->join('insumo.mercado as mer','insumo.orden_produccion.orprod_mercado_id','=','mer.mer_id')
                ->join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_id','=','planta.id_planta')->where('orprod_id',$id_orprod)->first();

        $storage = 'LINEA PRODUCCIÓN '. $this->nombreLinea($receta->rece_lineaprod_id);

        $datos_json = null;
        if ($receta->rece_lineaprod_id == 1) {
            $datos_json = json_decode($receta->rece_datos_json);
        }

        $code = null;

        $view = \View::make('reportes.boleta_solicitud_adicional', compact('username','date','title','storage','receta','datos_json'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function boleta_devolucion_sobrante($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "DEVOLUCION SOBRANTE";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as persona','public._bp_usuarios.usr_prs_id','=','persona.prs_id')->where('usr_id','=',Auth::user()->usr_id)->first();
        $id_user =  Auth::user()->usr_id;

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                 ->where('usr_id',$id_user)->first();
        $devolucion = Devolucion::join('public._bp_planta as planta','insumo.devolucion.devo_planta_id','=','planta.id_planta')
                              ->join('public._bp_usuarios as usu','insumo.devolucion.devo_usr_id','=','usu.usr_id')
                              ->join('public._bp_personas as per','usu.usr_prs_id','=','per.prs_id')
                              ->join('insumo.orden_produccion as orp','insumo.devolucion.devo_nro_orden','=','orp.orprod_id')
                              ->join('insumo.receta as rece','orp.orprod_rece_id','=','rece.rece_id')
                              ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                              ->where('devo_id',$id)
                              ->first();       
        $code = null;
        $view = \View::make('reportes.boleta_devolucion_sobrante', compact('username','date','title','planta','devolucion'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function boleta_devolucion_defectuoso($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "DEVOLUCION DEFECTUOSO";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as persona','public._bp_usuarios.usr_prs_id','=','persona.prs_id')->where('usr_id','=',Auth::user()->usr_id)->first();
        $id_user =  Auth::user()->usr_id;

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                 ->where('usr_id',$id_user)->first();
        $devolucion = Devolucion::join('public._bp_planta as planta','insumo.devolucion.devo_planta_id','=','planta.id_planta')
                              ->join('public._bp_usuarios as usu','insumo.devolucion.devo_usr_id','=','usu.usr_id')
                              ->join('public._bp_personas as per','usu.usr_prs_id','=','per.prs_id')
                              ->join('insumo.orden_produccion as orp','insumo.devolucion.devo_nro_orden','=','orp.orprod_id')
                              ->join('insumo.receta as rece','orp.orprod_rece_id','=','rece.rece_id')
                              ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                              ->where('devo_id',$id)
                              ->first();       
        $code = null;
        $view = \View::make('reportes.boleta_devolucion_defectuoso', compact('username','date','title','planta','devolucion'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function boleta_aprobacion_sobrante($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE ACEPTACIÓN DEVOLUCIÓN DEFECTUOSO";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as persona','public._bp_usuarios.usr_prs_id','=','persona.prs_id')->where('usr_id','=',Auth::user()->usr_id)->first();
        $id_user =  Auth::user()->usr_id;

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                 ->where('usr_id',$id_user)->first();
        $devolucion = Devolucion::join('public._bp_planta as planta','insumo.devolucion.devo_planta_id','=','planta.id_planta')
                              ->join('public._bp_usuarios as usu','insumo.devolucion.devo_usr_id','=','usu.usr_id')
                              ->join('public._bp_personas as per','usu.usr_prs_id','=','per.prs_id')
                              ->join('insumo.orden_produccion as orp','insumo.devolucion.devo_nro_orden','=','orp.orprod_id')
                              ->join('insumo.receta as rece','orp.orprod_rece_id','=','rece.rece_id')
                              ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                              ->where('devo_id',$id)
                              ->first();       
        $code = null;
        $view = \View::make('reportes.boleta_aceptacion_sobrante', compact('username','date','title','planta','devolucion'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function boleta_aprobacion_defectuoso($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE ACEPTACIÓN DEVOLUCIÓN DEFECTUOSO";
        $date =Carbon::now();

        $usuario = Usuario::join('public._bp_personas as persona','public._bp_usuarios.usr_prs_id','=','persona.prs_id')->where('usr_id','=',Auth::user()->usr_id)->first();
        $id_user =  Auth::user()->usr_id;

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                 ->where('usr_id',$id_user)->first();
        $devolucion = Devolucion::join('public._bp_planta as planta','insumo.devolucion.devo_planta_id','=','planta.id_planta')
                              ->join('public._bp_usuarios as usu','insumo.devolucion.devo_usr_id','=','usu.usr_id')
                              ->join('public._bp_personas as per','usu.usr_prs_id','=','per.prs_id')
                              ->join('insumo.orden_produccion as orp','insumo.devolucion.devo_nro_orden','=','orp.orprod_id')
                              ->join('insumo.receta as rece','orp.orprod_rece_id','=','rece.rece_id')
                              ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                              ->where('devo_id',$id)
                              ->first();       
        $code = null;
        $view = \View::make('reportes.boleta_aceptacion_defectuoso', compact('username','date','title','planta','devolucion'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();    
    }

    public function ReportPreliminarIngreso($id)
    {
        //dd("REPORTE PRELIMINAR");
        $username = Auth::user()->usr_usuario;
        $title = "NOTA INGRESO";

        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usuario);
        $reg = IngresoPreliminar::join('insumo.tipo_ingreso as tiping','insumo.ingreso_preliminar.ingpre_id_tiping','=','tiping.ting_id')
                                ->where('insumo.ingreso_preliminar.ingpre_id',$id)->first();
        $fecha = Carbon::parse($reg['ing_fecha_remision']);


        $mesesLiteral = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        //$deta_ingreso = DetalleIngreso::join('insumo.insumo as ins','insumo.detalle_ingreso.deting_ins_id','=','ins.ins_id')
        //                                        ->leftjoin('insumo.unidad_medida as uni','ins.ins_id_uni','=','uni.umed_id')
        //                                        ->join('insumo.proveedor as prov','insumo.detalle_ingreso.deting_prov_id','=','prov.prov_id')
        //                                        ->where('deting_ing_id',$id_ingreso)->get();
        $deta_ingreso = DetalleIngresoPreliminar::join('insumo.proveedor as prov','insumo.detalle_ingreso_preliminar.detingpre_prov_id','=','prov.prov_id')
                                        ->join('insumo.insumo as ins','insumo.detalle_ingreso_preliminar.detingpre_ins_id','=','ins.ins_id')
                                        ->leftjoin('insumo.unidad_medida as uni','ins.ins_id_uni','=','uni.umed_id')
                                        ->where('detingpre_ingpre_id',$id)->get();


        $code = $reg['ingpre_enumeracion'].'/'.date('Y',strtotime($reg['ingpre_registrado']));
        $date =date('d/m/Y',strtotime($reg['ingpre_registrado']));

        $view = \View::make('reportes.nota_de_ingreso_preliminar', compact('username','date','title','storage','reg','deta_ingreso','usuario','code','per'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function ingreso_materia_prima_pri($id)
    {
        //dd("Hola");
        $username = Auth::user()->usr_usuario;
        $title = "NOTA DE INGRESO DE MATERIA PRIMA";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);


        $reg = Ingreso::join('acopio.envio_almacen as env','insumo.ingreso.ing_env_acop_id','=','env.enval_id')
                      ->where('ing_id',$id)->first();
        //dd($reg);
        $detalle_ingreso = DetalleIngreso::join('insumo.insumo as ins','insumo.detalle_ingreso.deting_ins_id','=','ins.ins_id')->where('deting_ing_id',$reg->ing_id)->first();



        $code = $reg['ing_enumeracion'].'/'.date('Y',strtotime($reg['ing_registrado']));

        $view = \View::make('reportes.ingreso_materia_prima_pri', compact('username','date','title','storage','receta','reg','detalle_ingreso','per','planta'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }
    //******************************************************REPORTES GENERALES*************************************************************//
    public function RpMensual()
    {
        //dd("REPORTE GENERAL MENSUAL");
        $username = Auth::user()->usr_usuario;
        $title = "REPORTE MENSUAL";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);


        $insumo_ingreso = DetalleIngreso::select(DB::raw('SUM(deting_cantidad) as deting_cantidad'),'deting_ins_id','deting_costo')->join('insumo.ingreso as ing','insumo.detalle_ingreso.deting_ing_id','=','ing.ing_id')->where('ing_planta_id', '=', $planta->id_planta)->groupBy('deting_costo','deting_ins_id')->orderby('deting_ins_id', 'ASC')->get();
        //dd($reg);
        $view = \View::make('reportes.reporte_mensual', compact('username','date','title','storage','insumo_ingreso','per','storage','planta'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        //$pdf->loadHTML($html_content);
        $pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0);
        return $pdf->inline();
    }

    public function RptIngresoGeneral()
    {
        //dd("REPORTE PDF INGRESO GENERAL");
        $username = Auth::user()->usr_usuario;
        $title = "REPORTE GENERAL DE INGRESOS";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();
        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);
        $ingreso = Ingreso::where('ing_planta_id',$planta->id_planta)->get();
        //dd($ingreso);
        $insumo_ingreso = DetalleIngreso::join('insumo.ingreso as ing','insumo.detalle_ingreso.deting_ing_id','=','ing.ing_id')->where('ing_planta_id', '=', $planta->id_planta)->orderby('deting_ins_id', 'ASC')->get();
        $view = \View::make('reportes.reporte_ingreso_general', compact('username','date','title','storage','insumo_ingreso','per','storage','planta','ingreso'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0);
        return $pdf->inline();
    }

    public function RptSolicitudGeneral()
    {
        $username = Auth::user()->usr_usuario;
        $title = "REPORTE GENERAL DE SOLICITUD";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();
        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);
        $orprod = OrdenProduccion::where('orprod_planta_id',$planta->id_planta)->get();
        $detorprod = DetalleOrdenProduccion::join('insumo.orden_produccion as orp','insumo.detalle_orden_produccion.detorprod_orprod_id','=','orp.orprod_id')->where('orprod_planta_id', '=', $planta->id_planta)->orderby('detorprod_ins_id', 'ASC')->get();
        $view = \View::make('reportes.reporte_solicitud_general', compact('username','date','title','storage','detorprod','per','storage','planta','orprod'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0);
        return $pdf->inline();
    }

    public function RptSalidasGeneral()
    {
        $username = Auth::user()->usr_usuario;
        $title = "REPORTE GENERAL DE SALIDA";
        $date =Carbon::now();
        $planta = Usuario::join('_bp_planta', '_bp_usuarios.usr_planta_id', '=', '_bp_planta.id_planta')
                        ->where('usr_id', Auth::user()->usr_id)
                        ->first();
        $storage = $planta->nombre_planta;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per=Collect($usr);
        $orprod = OrdenProduccion::where('orprod_planta_id',$planta->id_planta)->get();
        $detorprod = DetalleOrdenProduccion::join('insumo.orden_produccion as orp','insumo.detalle_orden_produccion.detorprod_orprod_id','=','orp.orprod_id')->where('orprod_planta_id', '=', $planta->id_planta)->where('orprod_estado_orp','D')->orderby('detorprod_ins_id', 'ASC')->get();
        $view = \View::make('reportes.reporte_salida_general', compact('username','date','title','storage','detorprod','per','storage','planta','orprod'));
        $html_content = $view->render();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content)->setPaper('Letter')->setOrientation('landscape')->setOption('margin-bottom', 0);
        return $pdf->inline();
    }

    public function orden_de_produccion_rorp($id_orp)
    {
        //dd("BOLETA DE RECEPCION ORP");
        $username = Auth::user()->usr_usuario;
        $title = "ORDEN DE PRODUCCIÓN";
        $date =Carbon::now();



        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();

        $receta = OrdenProduccion::join('insumo.receta as rece','insumo.orden_produccion.orprod_rece_id','=','rece.rece_id')
                ->join('insumo.sub_linea as subl','rece.rece_sublinea_id','=','subl.sublin_id')
                ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                ->join('insumo.unidad_medida as uni','rece.rece_uni_id','=','uni.umed_id')
                ->join('insumo.mercado as mer','insumo.orden_produccion.orprod_mercado_id','=','mer.mer_id')
                ->join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_id','=','planta.id_planta')->where('orprod_id',$id_orp)->first();

        $storage = 'LINEA PRODUCCIÓN '. $this->nombreLinea($receta->rece_lineaprod_id);

        $datos_json = null;
        if ($receta->rece_lineaprod_id == 1) {
            $datos_json = json_decode($receta->rece_datos_json);
        }

        $code = null;

        $view = \View::make('reportes.orden_de_produccion_rorp', compact('username','date','title','storage','receta','datos_json'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    public function orden_de_produccion_solalorp($id_solalorp)
    {
        //dd($id_solalorp);
        $username = Auth::user()->usr_usuario;
        $title = "ORDEN DE PRODUCCIÓN";
        $date =Carbon::now();

        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();

        $receta = OrdenProduccion::join('insumo.receta as rece','insumo.orden_produccion.orprod_rece_id','=','rece.rece_id')
                ->join('insumo.sub_linea as subl','rece.rece_sublinea_id','=','subl.sublin_id')
                ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                ->join('insumo.unidad_medida as uni','rece.rece_uni_id','=','uni.umed_id')
                ->join('insumo.mercado as mer','insumo.orden_produccion.orprod_mercado_id','=','mer.mer_id')
                ->join('public._bp_planta as planta','insumo.orden_produccion.orprod_planta_id','=','planta.id_planta')->where('orprod_id',$id_solalorp)->first();

        $storage = 'LINEA PRODUCCIÓN '. $this->nombreLinea($receta->rece_lineaprod_id);

        $datos_json = null;
        if ($receta->rece_lineaprod_id == 1) {
            $datos_json = json_decode($receta->rece_datos_json);
        }

        $code = null;

        $view = \View::make('reportes.orden_de_produccion_solalorp', compact('username','date','title','storage','receta','datos_json'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }

    //REPORTES COMRECIAL
    public function imprimirSolpvComercial($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "BOLETA DE SOLICITUD PUNTO DE VENTA";
        $date =Carbon::now();
        $punto_venta = Usuario::join('public._bp_planta as planta','public._bp_usuarios.usr_planta_id','=','planta.id_planta')
                              ->join('comercial.punto_venta_comercial as pvc', 'planta.id_planta','=','pvc.pv_id_planta')
                              ->select('pvc.pv_nombre','pvc.pv_id','planta.id_planta')->where('usr_id','=',Auth::user()->usr_id)->first();
        $storage = 'PUNTO DE VENTA : '.$punto_venta->pv_nombre;
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $solpv = SolicitudPv::join('public._bp_usuarios as usr','comercial.solicitud_pv_comercial.solpv_usr_id','=','usr.usr_id')
                            ->join('public._bp_personas as prs','usr.usr_prs_id','=','prs.prs_id')
                            ->where('solpv_id',$id)->first();

        $code = null;

        $view = \View::make('reportes.boleta_solicitudpv_comercial', compact('username','date','title','storage','solpv'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }
    public function imprimirSolprodComercial($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "BOLETA DE SOLICITUD DE PRODUCTOS A PRODUCCION";
        $date =Carbon::now();
        $punto_venta = Usuario::join('public._bp_planta as planta','public._bp_usuarios.usr_planta_id','=','planta.id_planta')
                              ->join('comercial.punto_venta_comercial as pvc', 'planta.id_planta','=','pvc.pv_id_planta')
                              ->select('pvc.pv_nombre','pvc.pv_id','planta.id_planta')->where('usr_id','=',Auth::user()->usr_id)->first();
        $usr = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $solprod = SolicitudProd::join('public._bp_usuarios as usr','comercial.solicitud_produccion_comercial.solprod_usr_id','=','usr.usr_id')
                            ->join('public._bp_personas as prs','usr.usr_prs_id','=','prs.prs_id')
                            ->where('solprod_id',$id)->first();
        $storage = $this->traeLinea($solprod->solprod_lineaprod_id);
        $code = null;

        $view = \View::make('reportes.boleta_solicitudprod_comercial', compact('username','date','title','storage','solprod'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();    
    }
    function traeLinea($id)
    {
        if ($id == 1) {
            return "LACTEOS";
        }elseif($id == 2){
            return "ALMENDRA";
        }elseif($id == 3){
            return "MIEL";
        }elseif($id == 4){
            return "FRUTOS";
        }elseif($id == 5){
            return "DERIVADOS";
        }
    }

    public function boletaIngresoPvComercial($id)
    {
        $username = Auth::user()->usr_usuario;
        $title = "NOTA INGRESO PRODUCTOS";

        $planta = Usuario::join('public._bp_planta as pl', 'public._bp_usuarios.usr_planta_id', '=', 'pl.id_planta')
                        ->join('comercial.punto_venta_comercial as pv','pl.id_planta','=','pv.pv_id_planta')
                        ->where('_bp_usuarios.usr_id', Auth::user()->usr_id)
                        ->first();

        $storage = 'PUNTO DE VENTA: '.$planta->pv_nombre;
        $usuario = Usuario::join('public._bp_personas as per','public._bp_usuarios.usr_prs_id','=','per.prs_id')
                ->where('usr_id',Auth::user()->usr_id)->first();
        $per= $usuario->prs_nombres.' '.$usuario->prs_paterno.' '.$usuario->prs_materno;
        $ingresopv = IngresoPv::where('ingpv_id',$id)->first();
        $detingresopv = DetalleIngresoPv::join('comercial.producto_comercial as prod','comercial.detalle_ingreso_punto_venta_comercial.detingpv_prod_id','=','prod.prod_id')
                                        ->join('insumo.receta as rece','prod.prod_rece_id','=','rece.rece_id')
                                        ->join('insumo.sabor as sab','rece.rece_sabor_id','=','sab.sab_id')
                                        ->where('detingpv_ingpv_id',$id)->get();
        $fecha = date('d-m-Y',strtotime($ingresopv->ingpv_registrado));
        $code = $ingresopv->ingpv_nro_ingreso;
        $date =date('d/m/Y', strtotime($ingresopv->ingpv_registrado));

        $view = \View::make('reportes.boleta_ingresopv_comercial', compact('username','ingresopv','detingresopv','date','title','storage','usuario','code','per'));

        $html_content = $view->render();
        // return $html_content;
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html_content);
        return $pdf->inline();
    }
}
