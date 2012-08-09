<?php
/**
*@package pXP
*@file gen-SistemaDistUsuario.php
*@author  (fprudencio)
*@date 21-09-2011 10:41:58
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.SistemaDistUsuario=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.SistemaDistUsuario.superclass.constructor.call(this,config);
		this.init();
		
		  //cuando es un hijo de pestañas es necessario iniciar 
		  //onEnablePanel al para cargar los datos del padre
		  if(Phx.CP.getPagina(this.idContenedorPadre)){
			 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
			 if(dataMaestro){
				this.onEnablePanel(this,dataMaestro)
			 }
		  }
	  
		this.bloquearMenus()
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sistema_dist_usuario'
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
				origen:'USUARIO',
				fieldLabel: 'Usuario',
				name: 'id_usuario',
				gwidth: 200,
				renderer:function (value, p, record){return String.format('{0}', record.data['desc_usuario']);}
			},
			type:'ComboRec',
			filters:{pfiltro:'usu3.cuenta',type:'string'},
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
			filters:{pfiltro:'ushab.estado_reg',type:'string'},
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
			filters:{pfiltro:'ushab.fecha_reg',type:'date'},
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
			filters:{pfiltro:'ushab.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Usuarios Habilitados',
	ActSave:'../../sis_cobranza/control/SistemaDistUsuario/insertarSistemaDistUsuario',
	ActDel:'../../sis_cobranza/control/SistemaDistUsuario/eliminarSistemaDistUsuario',
	ActList:'../../sis_cobranza/control/SistemaDistUsuario/listarSistemaDistUsuario',
	id_store:'id_sistema_dist_usuario',
	loadValoresIniciales:function()
	{
		Phx.vista.SistemaDistUsuario.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sistema_dist').setValue(this.maestro.id_sistema_dist);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sistema_dist:this.maestro.id_sistema_dist};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'id_sistema_dist_usuario', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario', type: 'numeric'},
		{name:'desc_usuario', type: 'string'},
		{name:'id_sistema_dist', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'desc_usuario',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	//sobre carga de funcion
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.SistemaDistUsuario.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		