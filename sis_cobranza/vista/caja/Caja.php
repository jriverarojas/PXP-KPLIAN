<?php
/**
*@package pXP
*@file gen-Caja.php
*@author  (fprudencio)
*@date 26-09-2011 18:19:13
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Caja=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Caja.superclass.constructor.call(this,config);
		this.init();	
		//boton abrir caja
		this.addButton('AbrirCaja',{text:'Abrir Caja',iconCls: 'blist',disabled:true,handler:AbrirCaja,tooltip: '<b>Abrir Caja'});
		
		function AbrirCaja()
		{					
			var data=this.sm.getSelected().data.id_caja;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Caja/abrirCaja',
				params:{'id_caja':data,'operacion':'abierto'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		//boton cerrar caja
		this.addButton('CerrarCaja',{text:'Cerrar Caja',iconCls: 'blist',disabled:true,handler:CerrarCaja,tooltip: '<b>Cerrar Caja'});
		
		function CerrarCaja()
		{					
			var data=this.sm.getSelected().data.id_caja;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_cobranza/control/Caja/AbrirCaja',
				params:{'id_caja':data,'operacion':'cerrado'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});			
		}	
		
		//cuando es un hijo de pestañas es necessario iniciar 
		  //onEnablePanel al para cargar los datos del padre
		   if(Phx.CP.getPagina(this.idContenedorPadre)){
			 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
			 if(dataMaestro){
				this.onEnablePanel(this,dataMaestro)
			 }
		  }		
		

		this.iniciarEventos();
		this.load({params:{start:0, limit:50}})
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
					name: 'id_caja'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_enti_fin',
				fieldLabel:'Entidad Financiera',
				allowBlank:false,
				emptyText:'Entidad...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/EntiFin/listarEntiFin',
					id: 'id_enti_fin',
					root:'datos',
					sortInfo:{
						field:'institucion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_enti_fin','institucion'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'institucion'}
				}),
				valueField: 'id_enti_fin',
				displayField: 'institucion',
				gdisplayField:'institucion',
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
				renderer:function (value, p, record){return String.format('{0}', record.data['institucion']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'institucion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_agencia',
				fieldLabel:'Agencia',
				allowBlank:false,
				emptyText:'Agencia...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/Agencia/listarAgencia',
					id: 'id_agencia',
					root:'datos',
					sortInfo:{
						field:'codigo',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_agencia','codigo','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_agencia',
				displayField: 'nombre',
				gdisplayField:'nombre',
				//hiddenName: 'id_administrador',
				forceSelection:true,
				typeAhead: false,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				renderer:function (value, p, record){return String.format('{0}', record.data['desc_agencia']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name:'codigo',
				fieldLabel: 'Código',
				allowBlank: true,
				anchor:'50%',
				gwidth: 100,
				width:70,
				maxLength:15
			},
			type:'TextField',
			filters:{pfiltro:'caja.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel:'Observaciones',
				allowBlank:true,
				anchor:'60%',
				gwidth:100,
				maxLength:500
			},
			type:'TextArea',
			filters:{pfiltro:'caja.observaciones',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor:'80%',
				gwidth:100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'caja.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		
		{
			config:{
				name:'estado_caja',
	       		fieldLabel:'Estado Caja',
				allowBlank:false,
				typeAhead:true,
	       		triggerAction:'all',
	       		lazyRender:true,
	       		disabled:true,
	       		mode:'local',
	       		store:['cerrado','abierto']
			},
			valorInicial:'borrador',
			type:'ComboBox',
			filters:{pfiltro:'caja.estado_caja',type:'string'},
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
			filters:{pfiltro:'caja.fecha_reg',type:'date'},
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
			filters:{pfiltro:'caja.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Cajas',
	ActSave:'../../sis_cobranza/control/Caja/insertarCaja',
	ActDel:'../../sis_cobranza/control/Caja/eliminarCaja',
	ActList:'../../sis_cobranza/control/Caja/listarCaja',
	id_store:'id_caja',
	fields: [
		{name:'id_caja', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_agencia', type: 'numeric'},
		{name:'institucion', type: 'string'},
		{name:'estado_caja', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'cod_agencia', type: 'string'},
		{name:'desc_agencia', type: 'string'}
		
	],
	sortInfo:{
		field: 'id_caja',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	south:{
		  url:'../../../sis_cobranza/vista/cajero/Cajero.php',
		  title:'Cajeros', 
		  height:'40%',
		  cls:'Cajero'
		 },
		 //sobre carga de funcion
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			if(this.sm.getSelected().data.estado_caja=='borrador'){
			  this.getBoton('CerrarCaja').disable();	
			  this.getBoton('AbrirCaja').enable();
			}
			else{
				if(this.sm.getSelected().data.estado_caja=='abierto'){
					this.getBoton('CerrarCaja').enable();	
			        this.getBoton('AbrirCaja').disable();
				}
				else{
					this.getBoton('CerrarCaja').disable();	
			        this.getBoton('AbrirCaja').disable();
				}
			}
			
			
			Phx.vista.Caja.superclass.preparaMenu.call(this,tb);
	},
	iniciarEventos:function(){
		this.getComponente('id_enti_fin').on('select',function(s,r,i){
			var cmbAgencia=this.getComponente('id_agencia');
			cmbAgencia.store.baseParams.id_enti_fin=r.data.id_enti_fin;
			cmbAgencia.reset();
			cmbAgencia.modificado=true;
		},this);
	}
})
</script>
		
		