<?php
/**
*@package pXP
*@file gen-SistemaDistAgencia.php
*@author  (fprudencio)
*@date 20-09-2011 16:24:24
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.SistemaDistAgencia=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		
		this.maestro=config;
    	//llama al constructor de la clase padre
		Phx.vista.SistemaDistAgencia.superclass.constructor.call(this,config);
		this.init()
		
		//cuando es un hijo de pestañas es necessario iniciar 
	  //onEnablePanel al para cargar los datos del padre
	   if(Phx.CP.getPagina(this.idContenedorPadre)){
      	 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
	 	 if(dataMaestro){
	 	 	this.onEnablePanel(this,dataMaestro)
	 	 }
	  }

		this.load({params:{start:0, limit:50, id_sistema_dist:this.maestro.id_sistema_dist}});
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sistema_dist_agencia'
			},
			type:'Field',
			form:true 
		},
		
		{
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sistema_dist'
			},
			type:'Field',
			form:true
		},
		{
			config:{
				name: 'id_agencia',
				fieldLabel: 'Agencia',
				allowBlank: false,
				emptyText:'Agencia...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/Agencia/listarAgencia',
					id: 'id_agencia',
					root:'datos',
					sortInfo:{
						field:'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_agencia','nombre','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_agencia',
				displayField: 'nombre',
				gdisplayField:'nombre_agencia',
				//hiddenName: 'id_administrador',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_agencia']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre_agencia',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'enti.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'usr_reg',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'enti.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'usr_mod',
				fieldLabel: 'Modificado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'usu2.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'enti.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Entidades o Agencias Habilitadas',
	ActSave:'../../sis_cobranza/control/SistemaDistAgencia/insertarSistemaDistAgencia',
	ActDel:'../../sis_cobranza/control/SistemaDistAgencia/eliminarSistemaDistAgencia',
	ActList:'../../sis_cobranza/control/SistemaDistAgencia/listarSistemaDistAgencia',
	id_store:'id_sistema_dist_agencia',
	loadValoresIniciales:function()
	{
		Phx.vista.SistemaDistAgencia.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sistema_dist').setValue(this.maestro.id_sistema_dist);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sistema_dist:this.maestro.id_sistema_dist};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'id_sistema_dist_agencia', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_sistema_dist', type: 'numeric'},
		{name:'nombre_sistema', type: 'string'},
		{name:'id_agencia', type: 'numeric'},
		{name:'nombre_agencia', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'nombre_agencia',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		