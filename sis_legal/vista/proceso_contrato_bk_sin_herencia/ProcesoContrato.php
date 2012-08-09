<?php
/**
*@package pXP
*@file gen-ProcesoContrato.php
*@author  (mzm)
*@date 16-11-2011 17:25:24
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoContrato=Ext.extend(Phx.gridInterfaz,{
	
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
       	},
	{
			config:{
				name: 'id_rpc',
				fieldLabel: 'id_rpc',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_rpc',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_uo',
				fieldLabel: 'id_uo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_uo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
	{
			config:{
				name: 'plazo',
				fieldLabel: 'Plazo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'contra.plazo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},{
			config:{
				name: 'forma_pago',
				fieldLabel: 'Forma Pago',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'contra.forma_pago',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'notario',
				fieldLabel: 'Notario',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'contra.notario',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'numero_oc',
				fieldLabel: 'N� OC',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'contra.numero_oc',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_convocatoria',
				fieldLabel: 'Fecha Convocatoria',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_convocatoria',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'numero_requerimiento',
				fieldLabel: 'N. Requerimiento',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'contra.numero_requerimiento',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'multas',
				fieldLabel: 'Multas',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'contra.multas',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'fecha_aprobacion',
				fieldLabel: 'Fecha Aprobacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_aprobacion',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha Fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'extension',
				fieldLabel: 'extension',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100
			},
			type:'TextField',
			filters:{pfiltro:'contra.extension',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
   			config:{
   				name:'id_proyecto',
   				fieldLabel:'Proyecto',
   				allowBlank:false,
   				emptyText:'Proyecto...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_seguridad/control/Proyecto/listarProyecto',
					id: 'id_proyecto',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_proyecto','codigo','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
   				valueField: 'id_proyecto',
   				displayField: 'nombre',
   				gdisplayField:'nombre',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{codigo}</p><p>{nombre}</p></div></tpl>',
   				hiddenName: 'id_proyecto',
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
   				//turl:'../../../sis_seguridad/vista/persona/Persona.php',
   			    //ttitle:'Personas',
   			   // tconfig:{width:1800,height:500},
   			  //  tdata:{},
   			   // tcls:'persona',
   			    //pid:this.idContenedor,
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['nombre']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:1,
   			filters:{	
   				        pfiltro:'nombre',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},
		
		{
			config:{
				name: 'id_lugar_suscripcion',
				fieldLabel: 'id_lugar_suscripcion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_lugar_suscripcion',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'numero_cuce',
				fieldLabel: 'N� Cuce',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.numero_cuce',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_suscripcion',
				fieldLabel: 'Fecha Suscripcion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_suscripcion',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'testimonio',
				fieldLabel: 'Testimonio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'contra.testimonio',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'monto_contrato',
				fieldLabel: 'Monto Contrato',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'contra.monto_contrato',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'numero_contrato',
				fieldLabel: 'N�Contrato',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.numero_contrato',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'id_alarma',
				fieldLabel: 'id_alarma',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_alarma',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel: 'observaciones',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				//maxLength:5
			},
			type:'TextArea',
			filters:{pfiltro:'contra.observaciones',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'origen_recursos',
				fieldLabel: 'Origen Recursos',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'contra.origen_recursos',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		
		{
			config:{
				name: 'fecha_testimonio',
				fieldLabel: 'Fecha Testimonio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_testimonio',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'doc_contrato',
				fieldLabel: 'doc_contrato',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'contra.doc_contrato',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'beneficiario',
				fieldLabel: 'beneficiario',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'contra.beneficiario',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'version',
				fieldLabel: 'version',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.version',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_gestion',
				fieldLabel: 'id_gestion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_gestion',type:'numeric'},
			id_grupo:2,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha Ini',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_ini',type:'date'},
			id_grupo:2,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ap_acta',
				fieldLabel: 'Apertura Acta',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'contra.fecha_ap_acta',type:'date'},
			id_grupo:2,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_oc',
				fieldLabel: 'id_oc',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'contra.id_oc',type:'numeric'},
			id_grupo:2,
			grid:true,
			form:true
		},
	
		{
			config:{
				name: 'numero_licitacion',
				fieldLabel: 'N� Licitacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:-5
			},
			type:'TextField',
			filters:{pfiltro:'contra.numero_licitacion',type:'string'},
			id_grupo:2,
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
		{name:'notario', type: 'string'},
		{name:'numero_oc', type: 'string'},
		{name:'fecha_convocatoria', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'numero_requerimiento', type: 'string'},
		{name:'multas', type: 'string'},
		{name:'id_modalidad', type: 'numeric'},
		{name:'fecha_aprobacion', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'plazo', type: 'string'},
		{name:'objeto_contrato', type: 'string'},
		{name:'id_depto', type: 'numeric'},
		{name:'extension', type: 'string'},
		{name:'id_proyecto', type: 'numeric'},
		{name:'forma_pago', type: 'string'},
		{name:'id_lugar_suscripcion', type: 'numeric'},
		{name:'numero_cuce', type: 'numeric'},
		{name:'fecha_suscripcion', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'testimonio', type: 'string'},
		{name:'monto_contrato', type: 'numeric'},
		{name:'numero_contrato', type: 'numeric'},
		{name:'id_rpc', type: 'numeric'},
		{name:'id_alarma', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'id_proveedor', type: 'numeric'},
		{name:'origen_recursos', type: 'string'},
		{name:'id_uo', type: 'numeric'},
		{name:'id_representante_legal', type: 'numeric'},
		{name:'id_tipo_contrato', type: 'numeric'},
		{name:'fecha_testimonio', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'doc_contrato', type: 'string'},
		{name:'id_supervisor', type: 'numeric'},
		{name:'beneficiario', type: 'string'},
		{name:'version', type: 'numeric'},
		{name:'id_gestion', type: 'numeric'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_ap_acta', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_oc', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'numero_licitacion', type: 'string'},
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
		{name:'desc_moneda', type:'string'},
		{name:'desc_alarma', type:'string'},
		{name:'desc_proyecto', type:'string'},
		{name:'desc_lugar', type:'string'}
		
	
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
		//this.addButton('fin_requerimiento',{text:'Finalizar',icon:'../../../lib/imagenes/book_next.png',disabled:false,handler:fin_requerimiento,tooltip: '<b>Finalizar'});
		
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
		
		//this.store.baseParams={estado_proceso:'en_requerimiento'};
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
			
		},
		Grupos: [
            {
                layout: 'column',
                border: false,
                defaults: {
                   border: false
                },            
                items: [/*{
					        bodyStyle: 'padding-right:5px;',
					        items: [{
					            xtype: 'fieldset',
					            layout: 'form',
					            border:true,
					            title: 'Datos principales',
					            bodyStyle: 'padding:0 10px 0;',
					            columnWidth: '.5',
					            autoHeight: true,
					            items: [],
						        id_grupo:0
					        }]
					    }, {
					        bodyStyle: 'padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Orden y rutas',
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    }*/
					    {
				xtype:'fieldset',
				layout: 'form',
                border: true,
                title: 'Grupo 0',
                bodyStyle: 'padding:0 10px 0;',
                columnWidth: '.5',
                items:[],
		        id_grupo:0,
			},
			{
				xtype:'fieldset',
				layout: 'form',
                border: true,
                title: 'Grupo 1',
                bodyStyle: 'padding:0 10px 0;',
                columnWidth: '.5',
                items:[],
		        id_grupo:1,
			},
			{
				xtype:'fieldset',
				layout: 'form',
                border: true,
                title: 'Grupo 2',
                bodyStyle: 'padding:0 10px 0;',
                columnWidth: '.5',
                items:[],
		        id_grupo:2,
			}
					    ]
            }
        ]
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
		
		