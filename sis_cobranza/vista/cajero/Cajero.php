<?php
/**
*@package pXP
*@file gen-Cajero.php
*@author  (fprudencio)
*@date 28-09-2011 14:13:20
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Cajero=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Cajero.superclass.constructor.call(this,config);
		this.init();
		this.addButton('HabilitarCajero',{text:'Habilitar/Deshabilitar Cajero',iconCls: 'blist',disabled:true,handler:HabilitarCajero,tooltip: '<b>Habilitar o Deshabilitar Cajero'});
		
		function HabilitarCajero()
		{					
			var data_cajero=this.sm.getSelected().data.id_cajero;
			var data_caja=this.sm.getSelected().data.id_caja;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Cajero/habilitarCajero',
				params:{'id_cajero':data_cajero,'id_caja':data_caja},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		this.bloquearMenus()
	},
	successSinc:function(resp){
			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
			
		},		
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cajero'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_usuario',
				fieldLabel: 'Cajero',
				allowBlank: false,
				emptyText:'Cajero...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_seguridad/control/Usuario/listarUsuario',
					id: 'id_usuario',
					root:'datos',
					sortInfo:{
						field:'cuenta',
						direction:'ASC'
					},
					totalProperty:'total',
					fields: ['id_usuario','cuenta','desc_person'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'cuenta'}
				}),
				valueField: 'id_usuario',
				displayField: 'desc_person',
				gdisplayField:'nombre_completo',
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
				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'person.nombre_completo2',type:'string'},
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
			filters:{pfiltro:'cajero.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name:'estado_cajero',
	       		fieldLabel:'Estado',
				allowBlank:false,
				typeAhead:true,
	       		triggerAction:'all',
	       		lazyRender:true,
	       		disabled:true,
	       		mode:'local',
	       		store:['activo','inactivo']
			},
			valorInicial:'activo',
			type:'ComboBox',
			filters:{pfiltro:'cajero.estado_cajero',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				labelSeparator:'',
					inputType:'hidden',
					name: 'id_caja'
			},
			type:'Field',
			form:true
		},
		{			
			config:{
				name:'tipo_cajero',
	       		fieldLabel:'Tipo Cajero',
				allowBlank:false,
				typeAhead:true,
	       		triggerAction:'all',
	       		lazyRender:true,
	       		disabled:false,
	       		mode:'local',
	       		store:['cajero','responsable']
			},
			valorInicial:'cajero',
			type:'ComboBox',
			filters:{pfiltro:'cajero.tipo_cajero',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
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
			filters:{pfiltro:'cajero.fecha_reg',type:'date'},
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
			filters:{pfiltro:'cajero.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'CAJERO',
	ActSave:'../../sis_cobranza/control/Cajero/insertarCajero',
	ActDel:'../../sis_cobranza/control/Cajero/eliminarCajero',
	ActList:'../../sis_cobranza/control/Cajero/listarCajero',
	id_store:'id_cajero',
	loadValoresIniciales:function()
	{
		Phx.vista.Cajero.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_caja').setValue(this.maestro.id_caja);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_caja:this.maestro.id_caja};
		this.load({params:{start:0, limit:50}});			
	},
	fields: [
		{name:'id_cajero', type: 'numeric'},
		{name:'id_usuario', type: 'numeric'},
		{name:'nombre_completo', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'estado_cajero', type: 'string'},
		{name:'id_caja', type: 'numeric'},
		{name:'tipo_cajero', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_cajero',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.Cajero.superclass.preparaMenu.call(this,tb);
			this.getBoton('HabilitarCajero').enable();				
	}
	}
)
</script>
		
		