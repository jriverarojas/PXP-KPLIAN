<?php
/**
*@package pXP
*@file gen-TipoEvento.php
*@author  (rcm)
*@date 02-02-2012 01:00:14
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoEvento=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TipoEvento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_evento'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Tipo de Evento',
				allowBlank: true,
				anchor: '100%',
				gwidth: 200,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'tipeve.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},		
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Código',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'tipeve.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
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
			filters:{pfiltro:'tipeve.estado_reg',type:'string'},
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
			type:'NumberField',
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
			filters:{pfiltro:'tipeve.fecha_reg',type:'date'},
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
			type:'NumberField',
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
			filters:{pfiltro:'tipeve.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Tipos de Eventos',
	ActSave:'../../sis_gestion_vehicular/control/TipoEvento/insertarTipoEvento',
	ActDel:'../../sis_gestion_vehicular/control/TipoEvento/eliminarTipoEvento',
	ActList:'../../sis_gestion_vehicular/control/TipoEvento/listarTipoEvento',
	id_store:'id_tipo_evento',
	fields: [
		{name:'id_tipo_evento', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
    east:{
		  url:'../../../sis_gestion_vehicular/vista/evento/Evento.php',
		  title:'Eventos', 
		 // height:'50%',	//altura de la ventana hijo
		  width:'50%',		//ancho de la ventana hjo
		  cls:'Evento'
		 },	
	sortInfo:{
		field: 'id_tipo_evento',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		