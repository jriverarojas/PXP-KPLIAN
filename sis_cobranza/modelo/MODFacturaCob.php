<?php
/**
*@package pXP
*@file gen-MODFacturaCob.php
*@author  (gvelasquez)
*@date 23-09-2011 17:21:15
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFacturaCob extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFacturaCob(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_sel';
		$this->transaccion='CB_FACCOB_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_factura_cob','int4');
		$this->captura('importe_cred_fis','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('tipo_lectura','varchar');
		$this->captura('reconex_val','numeric');
		$this->captura('credito_pagado','numeric');
		$this->captura('consumo_cambio','numeric');
		$this->captura('nombre_fac','varchar');
		$this->captura('potencia_val','numeric');
		$this->captura('nro_factura','varchar');
		$this->captura('consumo_libre','numeric');
		$this->captura('nro_orden','varchar');
		$this->captura('sw_deb_fis','varchar');
		$this->captura('consumo_total','numeric');
		$this->captura('cod_alfanum','varchar');
		$this->captura('cod_control','varchar');
		$this->captura('id_caja','int4');
		$this->captura('fecha_act','date');
		$this->captura('conexion_val','numeric');
		$this->captura('fecha_ant','date');
		$this->captura('nit_fact','varchar');
		$this->captura('fecha_prox_med','date');
		$this->captura('estado_fac','varchar');
		$this->captura('lectura_kw','numeric');
		$this->captura('cod_ubica','varchar');
		$this->captura('nro_autorizacion','varchar');
		$this->captura('multi_kwh','numeric');
		$this->captura('gestion','numeric');
		$this->captura('id_cajero','int4');
		$this->captura('id_cliente','int4');
		$this->captura('periodo','numeric');
		$this->captura('consumo_val','numeric');
		$this->captura('fecha_pago','timestamp');
		$this->captura('direccion','varchar');
		$this->captura('importe_dev','numeric');
		$this->captura('nro_medidor','varchar');
		$this->captura('lectura_act','numeric');
		$this->captura('importe_total','numeric');
		$this->captura('acumulado','numeric');
		$this->captura('facturas_pagadas','bigint');
		$this->captura('num_formulario','varchar');
		$this->captura('fecha_vence','date');
		$this->captura('fecha_factura','date');
		$this->captura('id_moneda','int4');
		$this->captura('consumo_periodo','numeric');
		$this->captura('lectura_ant','numeric');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_factura','text');
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarFacturaCob(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_ime';
		$this->transaccion='CB_FACCOB_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('importe_cred_fis','importe_cred_fis','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_lectura','tipo_lectura','varchar');
		$this->setParametro('reconex_val','reconex_val','numeric');
		$this->setParametro('credito_pagado','credito_pagado','numeric');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('nombre_fac','nombre_fac','varchar');
		$this->setParametro('potencia_val','potencia_val','numeric');
		$this->setParametro('nro_factura','nro_factura','varchar');
		$this->setParametro('consumo_libre','consumo_libre','numeric');
		$this->setParametro('nro_orden','nro_orden','varchar');
		$this->setParametro('sw_deb_fis','sw_deb_fis','varchar');
		$this->setParametro('consumo_total','consumo_total','numeric');
		$this->setParametro('cod_alfanum','cod_alfanum','varchar');
		$this->setParametro('cod_control','cod_control','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('fecha_act','fecha_act','date');
		$this->setParametro('conexion_val','conexion_val','numeric');
		$this->setParametro('fecha_ant','fecha_ant','date');
		$this->setParametro('nit_fact','nit_fact','varchar');
		$this->setParametro('fecha_prox_med','fecha_prox_med','date');
		$this->setParametro('estado_fac','estado_fac','varchar');
		$this->setParametro('lectura_kw','lectura_kw','numeric');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nro_autorizacion','nro_autorizacion','varchar');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('consumo_val','consumo_val','numeric');
		$this->setParametro('fecha_pago','fecha_pago','timestamp');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('importe_dev','importe_dev','numeric');
		$this->setParametro('nro_medidor','nro_medidor','varchar');
		$this->setParametro('lectura_act','lectura_act','numeric');
		$this->setParametro('importe_total','importe_total','numeric');
		$this->setParametro('num_formulario','num_formulario','varchar');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('fecha_factura','fecha_factura','date');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('consumo_periodo','consumo_periodo','numeric');
		$this->setParametro('lectura_ant','lectura_ant','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFacturaCob(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_ime';
		$this->transaccion='CB_FACCOB_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob','id_factura_cob','int4');
		$this->setParametro('importe_cred_fis','importe_cred_fis','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_lectura','tipo_lectura','varchar');
		$this->setParametro('reconex_val','reconex_val','numeric');
		$this->setParametro('credito_pagado','credito_pagado','numeric');
		$this->setParametro('consumo_cambio','consumo_cambio','numeric');
		$this->setParametro('nombre_fac','nombre_fac','varchar');
		$this->setParametro('potencia_val','potencia_val','numeric');
		$this->setParametro('nro_factura','nro_factura','varchar');
		$this->setParametro('consumo_libre','consumo_libre','numeric');
		$this->setParametro('nro_orden','nro_orden','varchar');
		$this->setParametro('sw_deb_fis','sw_deb_fis','varchar');
		$this->setParametro('consumo_total','consumo_total','numeric');
		$this->setParametro('cod_alfanum','cod_alfanum','varchar');
		$this->setParametro('cod_control','cod_control','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('fecha_act','fecha_act','date');
		$this->setParametro('conexion_val','conexion_val','numeric');
		$this->setParametro('fecha_ant','fecha_ant','date');
		$this->setParametro('nit_fact','nit_fact','varchar');
		$this->setParametro('fecha_prox_med','fecha_prox_med','date');
		$this->setParametro('estado_fac','estado_fac','varchar');
		$this->setParametro('lectura_kw','lectura_kw','numeric');
		$this->setParametro('cod_ubica','cod_ubica','varchar');
		$this->setParametro('nro_autorizacion','nro_autorizacion','varchar');
		$this->setParametro('multi_kwh','multi_kwh','numeric');
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('consumo_val','consumo_val','numeric');
		$this->setParametro('fecha_pago','fecha_pago','timestamp');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('importe_dev','importe_dev','numeric');
		$this->setParametro('nro_medidor','nro_medidor','varchar');
		$this->setParametro('lectura_act','lectura_act','numeric');
		$this->setParametro('importe_total','importe_total','numeric');
		$this->setParametro('num_formulario','num_formulario','varchar');
		$this->setParametro('fecha_vence','fecha_vence','date');
		$this->setParametro('fecha_factura','fecha_factura','date');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('consumo_periodo','consumo_periodo','numeric');
		$this->setParametro('lectura_ant','lectura_ant','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFacturaCob(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_ime';
		$this->transaccion='CB_FACCOB_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob','id_factura_cob','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	function pagarFacturaCob(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_ime';
		$this->transaccion='CB_PAGA_FAC';
		$this->tipo_procedimiento='IME';   
		
		//echo ('Garrotera llega');exit;
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob','id_factura_cob','varchar'); 
		$this->setParametro('gestion','gestion','numeric');
		$this->setParametro('periodo','periodo','numeric');
		$this->setParametro('facturas_pagadas','facturas_pagadas','int4');
		$this->setParametro('acumulado','acumulado','numeric');
		$this->setParametro('importe_recibido','importe_recibido','numeric');
		$this->setParametro('importe_cambio','importe_cambio','numeric');
		$this->setParametro('id_cliente','id_cliente','int4'); 
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo ('Garrotera Gustosa llega');exit;
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	function anularFactura(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_ime';
		$this->transaccion='CB_ANULA_FAC';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob','id_factura_cob','int4');
		$this->setParametro('id_cobro','id_cobro','int4');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function repFacturacionPend(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_sel';
		$this->transaccion='CB_FACPEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//$this->setCount(false);
				
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		
		//Definicion de la lista del resultado del query
		$this->captura('nombre','varchar');
		$this->captura('nro_cuenta','varchar');
		$this->captura('cod_alfanum','varchar');
		$this->captura('cod_control','varchar');
		$this->captura('fecha_factura','date');
		$this->captura('fecha_vence','date');
		$this->captura('importe_total','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

	/*
	 * Desripción: Consulta para el reporte de la facturación anulada por cajero en un periodo de tiempo
	 * Autor: RCM
	 * Fecha: 12/12/2011 
	 */
	function repFacturasAnul(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_sel';
		$this->transaccion='CB_FACANU_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//$this->setCount(false);
				
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		
		//Definicion de la lista del resultado del query
		$this->captura('id_cajero','integer');
		$this->captura('nro_cuenta','varchar');
		$this->captura('nombre','varchar');
		$this->captura('nro_formulario','integer');
		$this->captura('motivo','varchar');
		$this->captura('cajero','text');
		$this->captura('importe_total','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	/*
	 * Desripción: Consulta para el reporte de ingresos por cajero en un periodo de tiempo
	 * Autor: Grover Velasquez Colque
	 * Fecha: 27/12/2011 
	 */
	function repIngresosPorCajero()
	{		
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_sel';
		$this->transaccion='CB_INGPORCAJ_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//$this->setCount(false);
				
		$this->setParametro('id_enti_fin','id_enti_fin','int4');
		$this->setParametro('id_agencia','id_agencia','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		
		//Definicion de la lista del resultado del query
		$this->captura('id_cajero','integer');
		$this->captura('cajero','text');		
		$this->captura('cantidad_facturas','bigint');
		$this->captura('importe_total','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		
		
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	/*
	 * Desripción: Consulta para el reporte del rsumen de facturacon
	 * Autor: JMITA
	 * Fecha: 20/01/2012
	 */
	function repResumenFac(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_sel';
		$this->transaccion='CB_RESFAC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//$this->setCount(false);
				
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('periodo','periodo','int4');
		$this->setParametro('gestion','gestion','int4');
		
		//Definicion de la lista del resultado del query
		$this->captura('cant_clientes','integer');
		$this->captura('energia','numeric');
		$this->captura('importe_reconex','numeric');
		$this->captura('devol','numeric');
		$this->captura('importe_suministro','numeric');
		$this->captura('descuento_1','numeric');
		$this->captura('descuento_2','numeric');
		$this->captura('tasa_1','numeric');
		$this->captura('tasa_2','numeric');
		$this->captura('descuento_3','numeric');
		$this->captura('importe_total','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	/*
	 * Desripción: Consulta para generación de la factura
	 * Autor: rcm
	 * Fecha: 14-03-2012
	 */
	function repFacturaDatosGen(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_rep_sel';
		$this->transaccion='CB_FADAGE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('nro_factura','varchar');
		$this->captura('nro_autorizacion','varchar');
		$this->captura('fecha_factura','date');
		$this->captura('cliente','varchar');
		$this->captura('nit_cliente','varchar');
		$this->captura('nro_medidor','varchar');
		$this->captura('nro_cuenta','varchar');
		$this->captura('direccion','varchar');
		$this->captura('categoria','varchar');
		$this->captura('cod_ubica','varchar');
		$this->captura('periodo','numeric');
		$this->captura('dias','numeric');
		$this->captura('lectura_ant','numeric');
		$this->captura('lectura_act','numeric');
		$this->captura('consumo_total','numeric');
		$this->captura('tipo_lectura','varchar');
		$this->captura('multi_kwh','numeric');
		$this->captura('lectura_kw','numeric');
		$this->captura('fecha_prox_med','date');
		$this->captura('fecha_vence','date');
		$this->captura('consumo_val','numeric');
		$this->captura('potencia_val','numeric');
		$this->captura('importe_conex_reconex','numeric');
		$this->captura('credito_deb_dev','numeric');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	/*
	 * Desripción: Consulta para generación de la factura
	 * Autor: rcm
	 * Fecha: 14-03-2012
	 */
	function repFacturaDatosDetalle(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_rep_sel';
		$this->transaccion='CB_FADADE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('concepto','varchar');
		$this->captura('importe','numeric');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
/*
	 * Desripción: Consulta para generación de la factura
	 * Autor: rcm
	 * Fecha: 14-03-2012
	 */
	function repFacturaHistoricoConsumo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_rep_sel';
		$this->transaccion='CB_FAHICO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('periodo','varchar');
		$this->captura('consumo_total','numeric');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
}
?>