<?php
/**
*@package pXP
*@file gen-Iboton.php
*@author  (rcm)
*@date 04-02-2012 19:23:49
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Iboton=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Iboton.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_iboton'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_funcionario',
				origen:'FUNCIONARIO',
				fieldLabel: 'Solicitante',
				allowBlank: false,
				anchor: '80%',
				gwidth: 200,
				maxLength:400,
				valueField: 'id_funcionario',
				gdisplayField: 'desc_funcionario',
		      			renderer:function(value, p, record){return String.format('{0}', record.data['desc_funcionario']);}
			},
			type:'ComboRec',
			filters:{pfiltro:'emplea.desc_funcionario1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Código',
				allowBlank: false,
				anchor: '70%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'ibut.codigo',type:'string'},
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
			filters:{pfiltro:'ibut.estado_reg',type:'string'},
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
			filters:{pfiltro:'ibut.fecha_reg',type:'date'},
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
			filters:{pfiltro:'ibut.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Ibutton',
	ActSave:'../../sis_gestion_vehicular/control/Iboton/insertarIboton',
	ActDel:'../../sis_gestion_vehicular/control/Iboton/eliminarIboton',
	ActList:'../../sis_gestion_vehicular/control/Iboton/listarIboton',
	id_store:'id_iboton',
	fields: [
		{name:'id_iboton', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_funcionario', type: 'string'}
	],
	sortInfo:{
		field: 'id_iboton',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		