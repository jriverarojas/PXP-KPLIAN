<?php
/**
*@package pXP
*@file gen-Marca.php
*@author  (rac)
*@date 01-02-2012 03:36:14
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Marca=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Marca.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_marca'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'marca',
				fieldLabel: 'Marca',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'mar.marca',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'procedencia',
				fieldLabel: 'Lugar de procedencia',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'mar.procedencia',type:'string'},
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
			filters:{pfiltro:'mar.estado_reg',type:'string'},
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
			filters:{pfiltro:'mar.fecha_reg',type:'date'},
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
			filters:{pfiltro:'mar.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'marca',
	ActSave:'../../sis_gestion_vehicular/control/Marca/insertarMarca',
	ActDel:'../../sis_gestion_vehicular/control/Marca/eliminarMarca',
	ActList:'../../sis_gestion_vehicular/control/Marca/listarMarca',
	id_store:'id_marca',
	fields: [
		{name:'id_marca', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'procedencia', type: 'string'},
		{name:'marca', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	//HP agregar el formulario Modelo como detalle
    east:{
		  url:'../../../sis_gestion_vehicular/vista/modelo/Modelo.php',
		  title:'Modelos', 
		 // height:'50%',	//altura de la ventana hijo
		  width:'50%',		//ancho de la ventana hjo
		  cls:'Modelo'
		 },
	sortInfo:{
		field: 'id_marca',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		