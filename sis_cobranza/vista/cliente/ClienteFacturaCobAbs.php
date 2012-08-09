<?php
/**
*@package pXP
*@file gen-Cliente.php
*@author  (fprudencio)
*@date 22-09-2011 11:53:34
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ClienteFacturaCobAbs=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ClienteFacturaCobAbs.superclass.constructor.call(this,config);
		this.init();		 
		//this.bloquearMenus();	

		
		var combo_sistema_dist = new Ext.form.ComboBox({
                    typeAhead:true,
                    triggerAction:'all',
                    lazyRender:true,
                    mode:'remote',
					emptyText:'Sistema de Distribución',
                    store:new Ext.data.JsonStore(
				    {
						url:'../../sis_cobranza/control/SistemaDistUsuario/listarSistemaDistUsuario',
						id: 'id_sistema_dist_usuario',
						root:'datos',
						sortInfo:{
							field:'nombre_sisdis',
							direction:'ASC'
						},
						totalProperty:'total',
						fields: ['id_sistema_dist','nombre_sisdis'],
						// turn on remote sorting
						remoteSort: true,
						baseParams:{par_filtro:'sisdis.nombre',
							start:0,
							limit:10}
				    }),
                  valueField: 'id_sistema_dist',
                  displayField: 'nombre_sisdis',
                  width:200
        });
		combo_sistema_dist.store.baseParams.id_usuario=Phx.CP.config_ini.id_usuario;
		this.tbar.add(combo_sistema_dist);
		combo_sistema_dist.on('select',function (combo, record, index){	
		this.store.baseParams.id_sistema_dist=combo_sistema_dist.getValue();	
		this.load({params:{start:0, limit:50}});
		},this);
	},		
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cliente'
			},
			type:'Field',
			form:true 
		},		
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'Nro Cuenta',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'clie.nro_cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_cuenta_ant',
				fieldLabel: 'Nro Cuenta Ant',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'clie.nro_cuenta_ant',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'Cliente',
				allowBlank: true,
				anchor: '80%',
				gwidth: 200,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'clie.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_nit',
				fieldLabel: 'NIT',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:786432
			},
			type:'TextField',
			filters:{pfiltro:'clie.nro_nit',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo_cliente',
				fieldLabel: 'Tipo de Cliente',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'clie.tipo_cleinte',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sistema_dist'
			},
			type:'Field',
			form:false
		},
		{
			config:{
				name: 'id_cliente_dist',
				fieldLabel: 'id_cliente_dist',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'clie.id_cliente_dist',type:'numeric'},
			id_grupo:1,
			grid:false,
			form:false
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
			filters:{pfiltro:'clie.estado_reg',type:'string'},
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
				fieldLabel: 'Fecha Creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'clie.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name:'usr_mod',
				fieldLabel:'Modificado por',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
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
			filters:{pfiltro:'clie.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Clientes',
	ActSave:'../../sis_cobranza/control/Cliente/insertarCliente',
	ActDel:'../../sis_cobranza/control/Cliente/eliminarCliente',
	ActList:'../../sis_cobranza/control/Cliente/listarCliente',
	id_store:'id_cliente',
	
	/*loadValoresIniciales:function()
	{
		Phx.vista.Cliente.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sistema_dist').setValue(this.maestro.id_sistema_dist);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sistema_dist:this.maestro.id_sistema_dist};
		this.load({params:{start:0, limit:50}});			
	},*/
	fields: [
		{name:'id_cliente', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'nro_cuenta', type: 'string'},
		{name:'tipo_cleinte', type: 'string'},
		{name:'nro_nit', type: 'string'},
		{name:'id_sistema_dist', type: 'numeric'},
		{name:'id_cliente_dist', type: 'numeric'},
		{name:'nombre', type: 'string'},
		{name:'nro_cuenta_ant', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'}
		
	],	 
	sortInfo:{
		field: 'id_cliente',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bexcel:false,
	bedit:false,
	bnew:false
	
	}
)
</script>
		
		