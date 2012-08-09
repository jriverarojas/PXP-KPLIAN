<?php
class MODTipoColumna extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarTipoColumna(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_columna_sel';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPCOL_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_tipo_columna','integer');
		$this->captura('codigo','varchar');
		$this->captura('compromete','varchar');
		$this->captura('descripcion','varchar');
		$this->captura('descuento_incremento','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','date');
		$this->captura('formula','varchar');
		$this->captura('id_auxiliar_pasivo','integer');
		$this->captura('id_cuenta_pasivo','integer');
		$this->captura('id_moneda','integer');
		$this->captura('id_parametro_rhum','integer');
		$this->captura('id_tipo_descuento_bono','integer');
		$this->captura('id_tipo_obligacion','integer');
		$this->captura('movimiento_contable', 'varchar');
		$this->captura('nombre','varchar');
		$this->captura('observacion','varchar');
		$this->captura('prorratea','varchar');
		$this->captura('tipo_aporte','varchar');
		$this->captura('tipo_dato','varchar');
		$this->captura('valor','numeric');
		$this->captura('desc_parametro_rhum','integer');
		$this->captura('desc_moneda','varchar');
		$this->captura('desc_usureg','text');
		$this->captura('desc_cta','text');
		$this->captura('desc_aux','text');
		$this->captura('desc_tipo_obligacion','varchar');
		//Ejecuta la funcion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		return $this->respuesta;

	}
	
	function insertarTipoColumna(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_columna_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPCOL_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
	
		
		//Define los parametros para la funcion	
			
		$this->setParametro('codigo','codigo','varchar');
        $this->setParametro('compromete','compromete','varchar');
        $this->setParametro('descripcion','descripcion','varchar');
        $this->setParametro('descuento_incremento','descuento_incremento','varchar');
        $this->setParametro('formula','formula','varchar');
        $this->setParametro('id_auxiliar_pasivo','id_auxiliar_pasivo','integer');
        $this->setParametro('id_cuenta_pasivo','id_cuenta_pasivo','integer');
        $this->setParametro('id_moneda','id_moneda','integer');
        $this->setParametro('id_parametro_rhum','id_parametro_rhum','integer');
        $this->setParametro('id_tipo_descuento_bono','id_tipo_descuento_bono','integer');
        $this->setParametro('id_tipo_obligacion','id_tipo_obligacion','integer');
        $this->setParametro('id_usuario_reg','id_usuario_reg','integer');
        $this->setParametro('movimiento_contable','movimiento_contable','varchar');
        $this->setParametro('nombre','nombre','varchar');
        $this->setParametro('observacion','observacion','varchar');
        $this->setParametro('prorratea','prorratea','varchar');
        $this->setParametro('tipo_aporte','tipo_aporte','varchar');
        $this->setParametro('tipo_dato','tipo_dato','varchar');
        //$this->setParametro('valor','valor','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function modificarTipoColumna(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_columna_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPCOL_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_tipo_columna','id_tipo_columna','integer');	
		$this->setParametro('codigo','codigo','varchar');
        $this->setParametro('compromete','compromete','varchar');
        $this->setParametro('descripcion','descripcion','varchar');
        $this->setParametro('descuento_incremento','descuento_incremento','varchar');
        $this->setParametro('formula','formula','varchar');
        $this->setParametro('id_auxiliar_pasivo','id_auxiliar_pasivo','integer');
        $this->setParametro('id_cuenta_pasivo','id_cuenta_pasivo','integer');
        $this->setParametro('id_moneda','id_moneda','integer');
        $this->setParametro('id_parametro_rhum','id_parametro_rhum','integer');
        $this->setParametro('id_tipo_descuento_bono','id_tipo_descuento_bono','integer');
        $this->setParametro('id_tipo_obligacion','id_tipo_obligacion','integer');
        $this->setParametro('id_usuario_reg','id_usuario_reg','integer');
        $this->setParametro('movimiento_contable','movimiento_contable','varchar');
        $this->setParametro('nombre','nombre','varchar');
        $this->setParametro('observacion','observacion','varchar');
        $this->setParametro('prorratea','prorratea','varchar');
        $this->setParametro('tipo_aporte','tipo_aporte','varchar');
        $this->setParametro('tipo_dato','tipo_dato','varchar');
      //  $this->setParametro('valor','valor','numeric');
	
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarTipoColumna(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='rhum.ft_tipo_columna_ime';
		$this->transaccion='RH_TIPCOL_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_columna','id_tipo_columna','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>