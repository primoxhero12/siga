<div class="modal fade modal-primary" data-backdrop="static" data-keyboard="false" id="myCreatePart" tabindex="-5">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Registro Partida
                </h4>
            </div>
            <div class="modal-body">
                <div class="caption">
                        {!! Form::open(['id'=>'proveedor'])!!}
                        <input id="token" name="csrf-token" type="hidden" value="{{ csrf_token() }}">
                            <input id="id_proveedor1" name="id_proveedor" type="hidden" value="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>
                                                    Codigo de Partida:
                                                </label>
                                                <span class="block input-icon input-icon-right">
                                                    {!! Form::text('codigoPart', null, array('placeholder' => 'Codigo Partida','class' => 'form-control','id'=>'codigoPart','style'=>'text-transform:uppercase;', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();')) !!}
                                                </span>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>
                                                    Nombre de Partida:
                                                </label>
                                                <span class="block input-icon input-icon-right">
                                                    {!! Form::text('nombrePart', null, array('placeholder' => 'Nombre Partida','class' => 'form-control','id'=>'nombrePart','style'=>'text-transform:uppercase;', 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();')) !!}
                                                </span>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </input>
                        </input>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                {!!link_to('#',$title='Registrar', $attributes=['id'=>'registroPart','class'=>'btn btn-success','style'=>''], $secure=null)!!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
