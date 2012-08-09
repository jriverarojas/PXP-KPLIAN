<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
//include_once("../../../../../sis_cobranza/vista/sistema_dist/SistemaDistAbs.php");
include_once("ProcesoContrato.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
/*Phx.vista.ProcesoRequerimiento=Ext.extend(Phx.vista.ProcesoContrato,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		
    	Phx.vista.ProcesoRequerimiento.superclass.constructor.call(this,config);
		this.init();		
		this.store.baseParams={'estado_proceso':'en_requerimiento'};
		
	this.addButton('fin_requerimiento',{text:'Finalizar',icon:'../../../lib/imagenes/book_next.png',disabled:false,handler:fin_requerimiento,tooltip: '<b>Finalizar'});
	function fin_requerimiento()
		{					
			var data=this.sm.getSelected().data.id_proceso_contrato;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
				params:{'id_proceso_contrato':data,'operacion':'fin_requerimiento'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
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
	onButtonNew:function(){
	    Phx.vista.ProcesoRequerimiento.superclass.onButtonNew.call(this);
	    this.ocultarGrupo(2);	
	},
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={'estado_proceso':'en_requerimiento'};
		this.load({params:{start:0, limit:50}});			
	}	
	
	}
)*/
Phx.vista.ProcesoRequerimiento=Ext.extend(Phx.gridInterfaz,{
	
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_proceso_contrato'
			},
			type:'Field',
			form:true 
		},
		{
   			config:{
   				name:'id_gestion',
   				fieldLabel:'Gestion',
   				allowBlank:true,
   				emptyText:'Gestion...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_parametros/control/Gestion/listarGestion',
					id: 'id_gestion',
					root: 'datos',
					sortInfo:{
						field: 'gestion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_gestion','gestion'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'gestion', estado:'activo'}
				}),
   				valueField: 'id_gestion',
   				displayField: 'gestion',
   				gdisplayField:'desc_gestion',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{gestion}</p></div></tpl>',
   				hiddenName: 'id_gestion',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:80,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_gestion']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'gestion',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_depto',
   				fieldLabel:'Departamento',
   				allowBlank:true,
   				emptyText:'Departamento...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_parametros/control/Depto/listarDepto',
					id: 'id_depto',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_depto','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
   				valueField: 'id_depto',
   				displayField: 'nombre',
   				gdisplayField:'desc_depto',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p></div></tpl>',
   				hiddenName: 'id_depto',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_depto']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_uo',
   				fieldLabel:'Unidad Solicitante',
   				allowBlank:true,
   				emptyText:'Unidad Solicitante...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_recursos_humanos/control/Uo/listarUo',
					id: 'id_uo',
					root: 'datos',
					sortInfo:{
						field: 'nombre_unidad',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_uo','nombre_unidad','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_unidad#codigo'}
				}),
   				valueField: 'id_uo',
   				displayField: 'nombre_unidad',
   				gdisplayField:'desc_uo',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_unidad}</p><p>Codigo:{codigo}</p> </div></tpl>',
   				hiddenName: 'id_uo',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_uo']);}
   			},
   			
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_unidad',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		
		
		{
			config:{
				name: 'objeto_contrato',
				fieldLabel: 'Requerimiento',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5000
			},
			type:'TextArea',
			filters:{pfiltro:'contra.objeto_contrato',type:'string'},
			id_grupo:0,
			grid:true,
			form:true
		},
		
		{
   			config:{
   				name:'id_rpc',
   				fieldLabel:'RPC',
   				allowBlank:false,
   				emptyText:'RPC...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
					id: 'id_responsable_proceso',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_responsable_proceso','nombre_completo1','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#ci',tipo:'rpc'}
				}),
   				valueField: 'id_responsable_proceso',
   				displayField: 'nombre_completo1',
   				gdisplayField:'desc_rpc',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_rpc',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_rpc']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},{
   			config:{
   				name:'id_proveedor',
   				fieldLabel:'Proveedor',
   				allowBlank:false,
   				emptyText:'Proveedor...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_parametros/control/Proveedor/listarProveedor',
					id: 'id_proveedor',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_proveedor','nombre_completo1','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#codigo'}
				}),
   				valueField: 'id_proveedor',
   				displayField: 'nombre_completo1',
   				gdisplayField:'desc_proveedor',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{codigo}</p> </div></tpl>',
   				hiddenName: 'id_proveedor',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_proveedor']);}
   			},
   			
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_supervisor',
   				fieldLabel:'Supervisor',
   				allowBlank:false,
   				emptyText:'Supervisor...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
					id: 'id_responsable_proceso',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_responsable_proceso','nombre_completo1','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#ci',
					tipo:'supervisor'}
				}),
   				valueField: 'id_responsable_proceso',
   				displayField: 'nombre_completo1',
   				gdisplayField:'desc_supervisor',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_supervisor',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				  			
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_supervisor']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_representante_legal',
   				fieldLabel:'Representante Legal',
   				allowBlank:false,
   				emptyText:'Representante Legal...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
					id: 'id_responsable_proceso',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_responsable_proceso','nombre_completo1','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#ci',tipo:'rep_legal'}
				}),
   				valueField: 'id_responsable_proceso',
   				displayField: 'nombre_completo1',
   				gdisplayField:'desc_rep_legal',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_representante_legal',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_rep_legal']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_tipo_contrato',
   				fieldLabel:'Tipo Requerimiento',
   				allowBlank:false,
   				emptyText:'Tipo Requerimiento...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_legal/control/TipoContrato/listarTipoContrato',
					id: 'id_tipo_contrato',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tipo_contrato','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
   				valueField: 'id_tipo_contrato',
   				displayField: 'nombre',
   				gdisplayField:'desc_tipo_contrato',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p> </div></tpl>',
   				hiddenName: 'id_tipo_contrato',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_tipo_contrato']);}
   			},
   			
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
       	{
   			config:{
   				name:'id_modalidad',
   				fieldLabel:'Modalidad',
   				allowBlank:false,
   				emptyText:'Modalidad...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_legal/control/Modalidad/listarModalidad',
					id: 'id_modalidad',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_modalidad','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
   				valueField: 'id_modalidad',
   				displayField: 'nombre',
   				gdisplayField:'desc_modalidad',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p></div></tpl>',
   				hiddenName: 'id_modalidad',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_modalidad']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
       	{
   			config:{
   				name:'id_funcionario',
   				fieldLabel:'Funcionario',
   				allowBlank:true,
   				emptyText:'Funcionario...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_recursos_humanos/control/Funcionario/listarFuncionario',
					id: 'id_funcionario',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_funcionario','nombre_completo1','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#ci'}
				}),
   				valueField: 'id_funcionario',
   				displayField: 'nombre_completo1',
   				gdisplayField:'desc_funcionario',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_funcionario',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_funcionario']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		{
   			config:{
   				name:'id_moneda',
   				fieldLabel:'Moneda',
   				allowBlank:false,
   				emptyText:'Moneda...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_parametros/control/Moneda/listarMoneda',
					id: 'id_moneda',
					root: 'datos',
					sortInfo:{
						field: 'moneda',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_moneda','moneda','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'moneda#codigo'}
				}),
   				valueField: 'id_moneda',
   				displayField: 'moneda',
   				gdisplayField:'desc_moneda',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>Moneda:{moneda}</p><p>Codigo:{codigo}</p> </div></tpl>',
   				hiddenName: 'id_moneda',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_moneda']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'moneda',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	}
  ],
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
	ActDel:'../../sis_legal/control/ProcesoContrato/eliminarProcesoContrato',
	ActList:'../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
	id_store:'id_proceso_contrato',
	fields: [
		{name:'id_proceso_contrato', type: 'numeric'},
		{name:'numero_requerimiento', type: 'string'},
		{name:'id_modalidad', type: 'numeric'},
		{name:'objeto_contrato', type: 'string'},
		{name:'id_depto', type: 'numeric'},
		{name:'id_rpc', type: 'numeric'},
		{name:'id_alarma', type: 'numeric'},
		{name:'id_proveedor', type: 'numeric'},
		{name:'id_uo', type: 'numeric'},
		{name:'id_representante_legal', type: 'numeric'},
		{name:'id_tipo_contrato', type: 'numeric'},
		{name:'id_supervisor', type: 'numeric'},
		{name:'id_gestion', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_modalidad', type:'string'},
		{name:'desc_depto', type:'string'},
		{name:'desc_rpc', type:'string'},
		{name:'desc_proveedor', type:'string'},
		{name:'desc_uo', type:'string'},
		{name:'desc_rep_legal', type:'string'},
		{name:'desc_tipo_contrato', type:'string'},
		{name:'desc_supervisor', type:'string'},
		{name:'desc_gestion', type:'string'},
		{name:'desc_funcionario', type:'string'},
		{name:'desc_moneda', type:'string'}
		
	
	],
	
	
	
	sortInfo:{
		field: 'id_proceso_contrato',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	
	
	
	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ProcesoContrato.superclass.constructor.call(this,config);
		this.init();
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('fin_requerimiento',{text:'Finalizar',iconCls: 'bnew',/*icon:'../../../lib/imagenes/book_next.png'*/disabled:false,handler:fin_requerimiento,tooltip: '<b>Finalizar'});
		
		function fin_requerimiento()
		{					
			var data=this.sm.getSelected().data.id_proceso_contrato;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
				params:{'id_proceso_contrato':data,'operacion':'fin_requerimiento'},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
		
		this.store.baseParams={estado_proceso:'en_requerimiento'};
		this.load({params:{start:0, limit:50}});
		
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
			
		}
	/*{
				xtype:'fieldset',
				layout: 'form',
                border: true,
                title: 'Grupo 0',
                bodyStyle: 'padding:0 10px 0;',
                columnWidth: '.5',
                items:[],
		        id_grupo:0,
			},*/
	
	}
)     	
       	
</script>