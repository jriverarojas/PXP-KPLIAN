<?php
/**
*@package pXP
*@file gen-HdAdministradorHidro.php
*@author  (rac)
*@date 31-08-2011 11:15:21
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.AdministradorHidro=Ext.extend(Phx.gridInterfaz,
{

	constructor:function(config)
	{
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.AdministradorHidro.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:
	[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_administrador'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'codigo',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:24
			},
			type:'TextField',
			filters:{pfiltro:'adm.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'nombre',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'adm.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'hidro',
				fieldLabel: 'hidro',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'Checkbox',
			filters:{pfiltro:'adm.hidro',type:'boolean'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'meteo',
				fieldLabel: 'meteo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'Checkbox',
			filters:{pfiltro:'adm.meteo',type:'boolean'},
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
			filters:{pfiltro:'adm.estado_reg',type:'string'},
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
			filters:{pfiltro:'adm.fecha_reg',type:'date'},
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
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'adm.fecha_mod',type:'date'},
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
		}
	],
	title:'Administrador',
	ActSave:'../../sis_hidrologia/control/AdministradorHidro/insertarAdministradorHidro',
	ActDel:'../../sis_hidrologia/control/AdministradorHidro/eliminarAdministradorHidro',
	ActList:'../../sis_hidrologia/control/AdministradorHidro/listarAdministradorHidro',
	id_store:'id_administrador',
	fields: [
		{name:'id_administrador', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'hidro', type: 'boolean'},
		{name:'meteo', type: 'boolean'},
		{name:'nombre', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
	],
	sortInfo:{
		field: 'id_administrador',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		