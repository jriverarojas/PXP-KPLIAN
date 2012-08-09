<?php
/**
*@package pXP
*@file gen-ImportarFactur.php
*@author  (jmita)
*@date 18-10-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ImportarFacturAbs=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ImportarFacturAbs.superclass.constructor.call(this,config);
		this.init();		
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
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
				name:'nombre',
				fieldLabel: 'Nombre',
				allowBlank: false,
				anchor: '60%',
				gwidth: 200,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'sisdis.nombre',type:'string'},
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Codigo',
				allowBlank: true,
				anchor: '60%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'sisdis.codigo',type:'string'},
			grid:true,
			form:true
		},
		{
			config:{
				name: 'conexion',
				fieldLabel: 'Conexion',
				allowBlank: true,
				anchor: '60%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'sisdis.conexion',type:'string'},
			grid:false,
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
			filters:{pfiltro:'sisdis.estado_reg',type:'string'},
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
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sisdis.fecha_reg',type:'date'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sisdis.fecha_mod',type:'date'},
			grid:true,
			form:false
		}
	],
	title:'Importar Facturación',
	//ActSave:'../../sis_cobranza/control/SistemaDist/insertarSistemaDist',
	//ActDel:'../../sis_cobranza/control/SistemaDist/eliminarSistemaDist',
	ActList:'../../sis_cobranza/control/SistemaDist/listarSistemaDist',
	id_store:'id_sistema_dist',
	fields: [
		{name:'id_sistema_dist', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'conexion', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	/*east:{
		  url:'../../../sis_cobranza/vista/sistema_dist_usuario/SistemaDistUsuario.php',
		  title:'Usuarios Habilitados', 
		  width:'40%',
		  cls:'SistemaDistUsuario'
		 },
	south:{
		  url:'../../../sis_cobranza/vista/cliente/Cliente.php',
		  title:'Clientes', 
		  height:'40%',
		  cls:'Cliente'
		 },*/
	sortInfo:{
		field: 'nombre',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bnew:false,
	bedit:false	
	}
)
</script>
		
		