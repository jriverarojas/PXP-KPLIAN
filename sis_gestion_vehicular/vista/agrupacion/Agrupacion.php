<?php
/**
*@package pXP
*@file gen-Agrupacion.php
*@author  (herman)
*@date 02-02-2012 16:12:10
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Agrupacion=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Agrupacion.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_agrupacion'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Nombre Grupo',
				allowBlank: true,
				anchor: '100%',
				gwidth: 250,
				maxLength:80
			},
			type:'TextField',
			filters:{pfiltro:'agr.nombre',type:'string'},
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
			filters:{pfiltro:'agr.estado_reg',type:'string'},
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
			filters:{pfiltro:'agr.fecha_reg',type:'date'},
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
			filters:{pfiltro:'agr.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Agrupacion',
	ActSave:'../../sis_gestion_vehicular/control/Agrupacion/insertarAgrupacion',
	ActDel:'../../sis_gestion_vehicular/control/Agrupacion/eliminarAgrupacion',
	ActList:'../../sis_gestion_vehicular/control/Agrupacion/listarAgrupacion',
	id_store:'id_agrupacion',
	fields: [
		{name:'id_agrupacion', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	//HP agregar el formulario Modelo como detalle
	east:{
		  url:'../../../sis_gestion_vehicular/vista/agrupacion_evento/AgrupacionEvento.php',
		  title:'Eventos', 
		 // height:'50%',	//altura de la ventana hijo
		  width:'50%',		//ancho de la ventana hjo
		  cls:'AgrupacionEvento'
		 },
	
	sortInfo:{
		field: 'id_agrupacion',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		