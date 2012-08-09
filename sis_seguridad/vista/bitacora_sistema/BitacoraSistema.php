<?php
/**
*@package pXP
*@file BitacoraSistema.php
*@author KPLIAN (RCM)
*@date 14-02-2011
*@description  Vista para mostrar los registros de la bitacora del Sistema Operativo.
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>

Phx.vista.bitacora_sistema=function(config){
	
	
	this.Atributos=[
	{
		//configuracion del componente
		config:{
			fieldLabel:'Identificador',
			gwidth: 100,
			name: 'identificador'

		},
		type:'TextField',
		form:true,
		filters:{	pfiltro:'logg.id_log',
					type:'numeric'},
		grid:true 
		
	},	
	 {
		config:{
			fieldLabel: "Usuario",
			gwidth: 100,
			name: 'cuenta_usuario'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	
	{
		config:{
			fieldLabel: "Usuario BD",
			gwidth: 100,
			name: 'usuario_base'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Consulta",
			gwidth: 250,
			name: 'consulta'
			
		},
		type:'TextArea',
		filters:{type:'string'},
		grid:true,
		form:false,
		egrid:true
	},
	
	{
		config:{
			fieldLabel: "Fecha/Hora",
			gwidth: 130,
			renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
   		    name: 'fecha_reg'
			
		},
		type:'DateField',
		filters:{pfiltro:'logg.fecha_reg',
				type:'date'
				},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Tipo",
			gwidth: 110,
			name: 'tipo_log'
			
		},
		type:'TextField',
		filters:{ type: 'list',
	       		  dataIndex: 'tipo_log',
	       		  options: ['ERROR_WEB','ERROR_CONTROLADO_PHP','INYECCION',
	       		  			'SESION','ERROR_TRANSACCION_BD','ERROR_CONTROLADO_BD',
	       		  			'ERROR_PERMISOS','ERROR_BLOQUEO','ERROR_ACCESO','LOG_TRANSACCION',
	       		  			'LOG_REPORTE','LOG_BD','ERROR_BD']
					},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "IP",
			gwidth: 100,
			name: 'ip_maquina'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Sistema",
			gwidth: 110,
			name: 'codigo_subsistema'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Transaccion",
			gwidth: 110,
			name: 'transaccion'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Mensaje",
			gwidth: 120,
			name: 'descripcion'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Descripción Transacción",
			gwidth: 120,
			name: 'descripcion_transaccion'
			
		},
		type:'TextField',
		filters:{pfiltro:'proce.descripcion',
				type:'string'},
		grid:true,
		form:false
	},
	
	{
		config:{
			fieldLabel: "Tiempo Ejec.(ms)",
			gwidth: 80,
			name: 'tiempo_ejecucion'
			
		},
		type:'TextField',
		filters:{type:'numeric'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "Procedimientos",
			gwidth: 150,
			name: 'procedimientos'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	
	{
		config:{
			fieldLabel: "Codigo Error",
			gwidth: 100,
			name: 'codigo_error'
			
		},
		type:'TextField',
		filters:{type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "SID BD-WEB",
			gwidth: 110,
			name: 'sidweb'
			
		},
		type:'TextField',
		filters:{	pfiltro:'logg.sid_web',
					type:'string'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "PID WEB",
			gwidth: 90,
			name: 'pidweb'
			
		},
		type:'TextField',
		filters:{	pfiltro:'logg.pid_web',
					type:'numeric'},
		grid:true,
		form:false
	},
	{
		config:{
			fieldLabel: "PID BD",
			gwidth: 90,
			name: 'piddb'			
		},
		type:'TextField',
		filters:{	pfiltro:'logg.pid_db',
					type:'numeric'},
		grid:true,
		form:false
	}
	];

	Phx.vista.bitacora_sistema.superclass.constructor.call(this,config);
	this.init();
	
	
	var combo_gestion = new Ext.form.ComboBox({
	        store: new Ext.data.JsonStore({

	    		url: '../../sis_parametros/control/Gestion/listarGestion',
	    		id: 'id_gestion',
	    		root: 'datos',
	    		sortInfo:{
	    			field: 'gestion',
	    			direction: 'DESC'
	    		},
	    		totalProperty: 'total',
	    		fields: [
					{name:'id_gestion'},
					{name:'gestion', type: 'string'},
					{name:'estado_reg', type: 'string'}
				],
	    		remoteSort: true,
	    		baseParams:{start:0,limit:10}
	    	}),
	        displayField: 'gestion',
	        valueField: 'gestion',
	        typeAhead: true,
	        mode: 'remote',
	        triggerAction: 'all',
	        emptyText:'Gestión...',
	        selectOnFocus:true,
	        width:135
	    });
	    
	    var combo_periodo = new Ext.form.ComboBox({
	        store:['01','02','03','04','05','06','07','08','09','10','11','12'],
	        typeAhead: true,
	        mode: 'local',
	        triggerAction: 'all',
	        emptyText:'Periodo...',
	        selectOnFocus:true,
	        width:135
	    });
	    
    	this.grid.getTopToolbar().addField(combo_gestion);
    	this.grid.getTopToolbar().addField(combo_periodo);
    	this.grid.getTopToolbar().doLayout();
    	combo_periodo.on('select',evento_combo,this);
    	combo_gestion.on('select',evento_combo,this);
    	
    	
    	//this.load({params:{start:0, limit:50}});
    	function evento_combo(){
    		
    		if(combo_periodo.getValue()!=undefined && combo_periodo.getValue()!='' &&
    			combo_gestion.getValue()!=undefined && combo_gestion.getValue()!=''){
    				this.store.setBaseParam('gestion',combo_gestion.getValue());
    				this.store.setBaseParam('periodo',combo_periodo.getValue());
    				this.load();
    					
    		}
    		
    	}
	
}
Ext.extend(Phx.vista.bitacora_sistema,Phx.gridInterfaz,{
	
	title:'Log',
	ActList:'../../sis_seguridad/control/Log/listarLog',
	id_store:'identificador',
	fields: [
	{name:'identificador'},
	{name:'id_usuario'},
	{name:'cuenta_usuario', type: 'string'},
	{name:'mac_maquina', type: 'string'},
	{name:'ip_maquina', type: 'string'},
	{name:'tipo_log', type: 'string'},
	{name:'fecha_reg', type:'date',dateFormat: 'Y-m-d H:i:s'},
	{name:'procedimientos', type: 'string'},
	{name:'transaccion', type: 'string'},
	{name:'descripcion', type: 'string'},
	{name:'consulta', type: 'string'},
	{name:'usuario_base', type: 'string'},
	{name:'tiempo_ejecucion'},
	{name:'pidweb'},
	{name:'piddb'},
	{name:'sidweb', type: 'string'},
	{name:'codigo_error', type: 'string'},
	{name:'descripcion_transaccion', type: 'string'},
	{name:'codigo_subsistema', type: 'string'}
	],
	sortInfo:{
		field: 'logg.fecha_reg',
		direction: 'DESC'
	},
	bdel:false,//boton para eliminar
	bsave:false,//boton para eliminar
	bnew:false,//boton para eliminar
	bedit:false,//boton para eliminar

	

	//sobre carga de funcion
	preparaMenu:function(tb){
		//llamada funcion clace padre
		Phx.vista.bitacora_sistema.superclass.preparaMenu.call(this,tb);
		  
	}
	
	
}
)
</script>