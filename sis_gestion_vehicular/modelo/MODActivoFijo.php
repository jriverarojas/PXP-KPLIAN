<?php
/**
*@package pXP
*@file gen-MODActivoFijo.php
*@author  (rcm)
*@date 02-02-2012 21:32:39
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODActivoFijo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarActivoFijo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='actif.f_taf_activo_fijo_sel';
		$this->transaccion='AF_VEHIC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_activo_fijo','int4');
		$this->captura('num_poliza_garantia','varchar');
		$this->captura('fecha_ini_dep','date');
		$this->captura('tipo_af_bien','varchar');
		$this->captura('codigo','varchar');
		$this->captura('num_factura','varchar');
		$this->captura('depreciacion_acum_ant','numeric');
		$this->captura('id_sub_tipo_activo','int4');
		$this->captura('fecha_compra','date');
		$this->captura('id_cotizacion','int4');
		$this->captura('id_usuario','int4');
		$this->captura('id_deposito','int4');
		$this->captura('tasa_depreciacion','numeric');
		$this->captura('id_sub_tipo_ant','int4');
		$this->captura('estado','varchar');
		$this->captura('vida_util_restante','int4');
		$this->captura('descripcion_larga','varchar');
		$this->captura('orden_compra','varchar');
		$this->captura('id_moneda_original','int4');
		$this->captura('origen','varchar');
		$this->captura('tipo_cambio','numeric');
		$this->captura('vida_util_2','int4');
		$this->captura('monto_actual','numeric');
		$this->captura('monto_actualiz_2','numeric');
		$this->captura('id_moneda','int4');
		$this->captura('vida_util_original','int4');
		$this->captura('id_lugar','int4');
		$this->captura('proyecto','varchar');
		$this->captura('clonacion','varchar');
		$this->captura('id_clon_origen','int4');
		$this->captura('id_estado_funcional','int4');
		$this->captura('descripcion','varchar');
		$this->captura('tipo','varchar');
		$this->captura('monto_compra','numeric');
		$this->captura('fecha_ultima_deprec','date');
		$this->captura('flag_revaloriz','varchar');
		$this->captura('id_depto','int4');
		$this->captura('ubicacion_fisica','varchar');
		$this->captura('estado_anterior','varchar');
		$this->captura('id_solicitud_compra','int4');
		$this->captura('con_garantia','varchar');
		$this->captura('observaciones','varchar');
		$this->captura('id_cotizacion_det','int4');
		$this->captura('monto_compra_mon_orig','numeric');
		$this->captura('depreciacion_periodo','numeric');
		$this->captura('fecha_fin_gar','date');
		$this->captura('id_unidad_constructiva','int4');
		$this->captura('codigo_ant','varchar');
		$this->captura('depreciacion_acum','numeric');
		$this->captura('valor_rescate','numeric');
		$this->captura('monto_actualiz','numeric');
		$this->captura('fecha_reg','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_activo_fijo','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		//echo $this->respuesta; exit;
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarActivoFijo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='actif.f_taf_activo_fijo_ime';
		$this->transaccion='AF_VEHIC_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('num_poliza_garantia','num_poliza_garantia','varchar');
		$this->setParametro('fecha_ini_dep','fecha_ini_dep','date');
		$this->setParametro('tipo_af_bien','tipo_af_bien','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('num_factura','num_factura','varchar');
		$this->setParametro('depreciacion_acum_ant','depreciacion_acum_ant','numeric');
		$this->setParametro('id_sub_tipo_activo','id_sub_tipo_activo','int4');
		$this->setParametro('fecha_compra','fecha_compra','date');
		$this->setParametro('id_cotizacion','id_cotizacion','int4');
		$this->setParametro('id_usuario','id_usuario','int4');
		$this->setParametro('id_deposito','id_deposito','int4');
		$this->setParametro('tasa_depreciacion','tasa_depreciacion','numeric');
		$this->setParametro('foto_activo','foto_activo','bytea');
		$this->setParametro('id_sub_tipo_ant','id_sub_tipo_ant','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('vida_util_restante','vida_util_restante','int4');
		$this->setParametro('descripcion_larga','descripcion_larga','varchar');
		$this->setParametro('orden_compra','orden_compra','varchar');
		$this->setParametro('id_moneda_original','id_moneda_original','int4');
		$this->setParametro('origen','origen','varchar');
		$this->setParametro('tipo_cambio','tipo_cambio','numeric');
		$this->setParametro('vida_util_2','vida_util_2','int4');
		$this->setParametro('monto_actual','monto_actual','numeric');
		$this->setParametro('monto_actualiz_2','monto_actualiz_2','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('vida_util_original','vida_util_original','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('proyecto','proyecto','varchar');
		$this->setParametro('clonacion','clonacion','varchar');
		$this->setParametro('id_clon_origen','id_clon_origen','int4');
		$this->setParametro('id_estado_funcional','id_estado_funcional','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('monto_compra','monto_compra','numeric');
		$this->setParametro('fecha_ultima_deprec','fecha_ultima_deprec','date');
		$this->setParametro('flag_revaloriz','flag_revaloriz','varchar');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('ubicacion_fisica','ubicacion_fisica','varchar');
		$this->setParametro('estado_anterior','estado_anterior','varchar');
		$this->setParametro('id_solicitud_compra','id_solicitud_compra','int4');
		$this->setParametro('con_garantia','con_garantia','varchar');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('id_cotizacion_det','id_cotizacion_det','int4');
		$this->setParametro('monto_compra_mon_orig','monto_compra_mon_orig','numeric');
		$this->setParametro('depreciacion_periodo','depreciacion_periodo','numeric');
		$this->setParametro('fecha_fin_gar','fecha_fin_gar','date');
		$this->setParametro('id_unidad_constructiva','id_unidad_constructiva','int4');
		$this->setParametro('codigo_ant','codigo_ant','varchar');
		$this->setParametro('depreciacion_acum','depreciacion_acum','numeric');
		$this->setParametro('valor_rescate','valor_rescate','numeric');
		$this->setParametro('monto_actualiz','monto_actualiz','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarActivoFijo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='actif.f_taf_activo_fijo_ime';
		$this->transaccion='AF_VEHIC_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('num_poliza_garantia','num_poliza_garantia','varchar');
		$this->setParametro('fecha_ini_dep','fecha_ini_dep','date');
		$this->setParametro('tipo_af_bien','tipo_af_bien','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('num_factura','num_factura','varchar');
		$this->setParametro('depreciacion_acum_ant','depreciacion_acum_ant','numeric');
		$this->setParametro('id_sub_tipo_activo','id_sub_tipo_activo','int4');
		$this->setParametro('fecha_compra','fecha_compra','date');
		$this->setParametro('id_cotizacion','id_cotizacion','int4');
		$this->setParametro('id_usuario','id_usuario','int4');
		$this->setParametro('id_deposito','id_deposito','int4');
		$this->setParametro('tasa_depreciacion','tasa_depreciacion','numeric');
		$this->setParametro('foto_activo','foto_activo','bytea');
		$this->setParametro('id_sub_tipo_ant','id_sub_tipo_ant','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('vida_util_restante','vida_util_restante','int4');
		$this->setParametro('descripcion_larga','descripcion_larga','varchar');
		$this->setParametro('orden_compra','orden_compra','varchar');
		$this->setParametro('id_moneda_original','id_moneda_original','int4');
		$this->setParametro('origen','origen','varchar');
		$this->setParametro('tipo_cambio','tipo_cambio','numeric');
		$this->setParametro('vida_util_2','vida_util_2','int4');
		$this->setParametro('monto_actual','monto_actual','numeric');
		$this->setParametro('monto_actualiz_2','monto_actualiz_2','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('vida_util_original','vida_util_original','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('proyecto','proyecto','varchar');
		$this->setParametro('clonacion','clonacion','varchar');
		$this->setParametro('id_clon_origen','id_clon_origen','int4');
		$this->setParametro('id_estado_funcional','id_estado_funcional','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('monto_compra','monto_compra','numeric');
		$this->setParametro('fecha_ultima_deprec','fecha_ultima_deprec','date');
		$this->setParametro('flag_revaloriz','flag_revaloriz','varchar');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('ubicacion_fisica','ubicacion_fisica','varchar');
		$this->setParametro('estado_anterior','estado_anterior','varchar');
		$this->setParametro('id_solicitud_compra','id_solicitud_compra','int4');
		$this->setParametro('con_garantia','con_garantia','varchar');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('id_cotizacion_det','id_cotizacion_det','int4');
		$this->setParametro('monto_compra_mon_orig','monto_compra_mon_orig','numeric');
		$this->setParametro('depreciacion_periodo','depreciacion_periodo','numeric');
		$this->setParametro('fecha_fin_gar','fecha_fin_gar','date');
		$this->setParametro('id_unidad_constructiva','id_unidad_constructiva','int4');
		$this->setParametro('codigo_ant','codigo_ant','varchar');
		$this->setParametro('depreciacion_acum','depreciacion_acum','numeric');
		$this->setParametro('valor_rescate','valor_rescate','numeric');
		$this->setParametro('monto_actualiz','monto_actualiz','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarActivoFijo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='actif.f_taf_activo_fijo_ime';
		$this->transaccion='AF_VEHIC_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>