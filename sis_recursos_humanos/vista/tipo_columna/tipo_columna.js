<script>
Phx.vista.tipo_columna=function(config){

	this.Atributos=[
	       	{
	       		// configuracion del componente
	       		config:{
	       			labelSeparator:'',
	       			inputType:'hidden',
	       			name: 'id_tipo_columna'

	       		},
	       		type:'Field',
	       		form:true 
	       		
	       	},
	       	{
	       			config:{
	       				name:'id_parametro_kardex',
	       				fieldLabel:'Gestión',
	       				allowBlank:false,
	       				emptyText:'Gestión...',
	       				store: new Ext.data.JsonStore({

	    					url: '../../sis_recursos_humanos/control/ParametroRhum/listarParametroRhum',
	    					id: 'id_parametro_rhum',
	    					root: 'datos',
	    					sortInfo:{
	    						field: 'gestion',
	    						direction: 'ASC'
	    					},
	    					totalProperty: 'total',
	    					fields: ['id_parametro_rhum','gestion'],
	    					// turn on remote sorting
	    					remoteSort: true,
	    					baseParams:{par_filtro:'gestion'}
	    				}),
	       				valueField: 'id_parametro_rhum',
	       				displayField: 'desc_parametro_rhum',
	       				gdisplayField:'desc_parametro_rhum',//mapea al store del grid
	       				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{gestion}</p> </div></tpl>',
	       				hiddenName: 'id_parametro_rhum',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:120,
	       				gwidth:120,
	       				minChars:2,
	       				renderer:function (value, p, record){return String.format('{0}', record.data['desc_parametro_rhum']);}
	       			},
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
	    					fields: ['id_moneda','moneda'],
	    					// turn on remote sorting
	    					remoteSort: true,
	    					baseParams:{par_filtro:'moneda'}
	    				}),
	       				valueField: 'id_moneda',
	       				displayField: 'moneda',
	       				gdisplayField:'desc_moneda',//mapea al store del grid
	       				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{moneda}</p> </div></tpl>',
	       				hiddenName: 'id_moneda',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:120,
	       				gwidth:120,
	       				minChars:2,
	       				renderer:function (value, p, record){return String.format('{0}', record.data['desc_moneda']);}
	       			},
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
	       				name:'id_cuenta_pasivo',
	       				fieldLabel:'Cta. Pasivo',
	       				allowBlank:false,
	       				emptyText:'Cta. Pasivo...',
	       				store: new Ext.data.JsonStore({

	    					url: '../../sis_contabilidad/control/Cuenta/listarCuenta',
	    					id: 'id_cuenta',
	    					root: 'datos',
	    					sortInfo:{
	    						field: 'nombre',
	    						direction: 'ASC'
	    					},
	    					totalProperty: 'total',
	    					fields: ['id_cuenta','codigo','nombre'],
	    					// turn on remote sorting
	    					remoteSort: true,
	    					baseParams:{par_filtro:'codigo'}
	    				}),
	       				valueField: 'id_cuenta',
	       				displayField: 'nombre',
	       				gdisplayField:'desc_cta',//mapea al store del grid
	       				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p> </div></tpl>',
	       				hiddenName: 'id_cuenta_pasivo',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:120,
	       				gwidth:120,
	       				minChars:2,
	       				renderer:function (value, p, record){return String.format('{0}', record.data['desc_cta']);}
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
	       				name:'id_auxiliar_pasivo',
	       				fieldLabel:'Auxiliar Pasivo',
	       				allowBlank:false,
	       				emptyText:'Auxiliar Pasivo...',
	       				store: new Ext.data.JsonStore({

	    					url: '../../sis_contabilidad/control/Auxiliar/listarAuxiliar',
	    					id: 'id_auxiliar',
	    					root: 'datos',
	    					sortInfo:{
	    						field: 'nombre',
	    						direction: 'ASC'
	    					},
	    					totalProperty: 'total',
	    					fields: ['id_auxiliar','codigo','nombre'],
	    					// turn on remote sorting
	    					remoteSort: true,
	    					baseParams:{par_filtro:'codigo'}
	    				}),
	       				valueField: 'id_auxiliar',
	       				displayField: 'nombre',
	       				gdisplayField:'desc_aux',//mapea al store del grid
	       				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p> </div></tpl>',
	       				hiddenName: 'id_auxiliar_pasivo',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:120,
	       				gwidth:120,
	       				minChars:2,
	       				renderer:function (value, p, record){return String.format('{0}', record.data['desc_aux']);}
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
	       			fieldLabel: "Código",
	       			gwidth: 120,
	       			name: 'codigo',
	       			allowBlank:false,	
	       			maxLength:15,
	       			minLength:1,
	       			anchor:'80%'
	       		},
	       		type:'TextField',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},
	       		{
	       		config:{
	       			fieldLabel: "Nombre",
	       			gwidth: 120,
	       			name: 'nombre',
	       			allowBlank:false,	
	       			maxLength:255,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'TextField',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},{
	       		config:{
	       			fieldLabel: "Descripción",
	       			gwidth: 120,
	       			name: 'descripcion',
	       			allowBlank:false,	
	       			maxLength:255,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'TextArea',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},
	       	{
	       		config:{
	       			fieldLabel: "Observaciones",
	       			gwidth: 120,
	       			name: 'observacion',
	       			allowBlank:false,	
	       			maxLength:255,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'TextField',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},
	       	{config:{
	       			name:'compromete',
	       			fieldLabel:'Compromete Ppto',
	       			allowBlank:false,
	       			emptyText:'Compromete Ppto...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'compromete',
	       		   // displayField: 'descestilo',
	       		    store:['si','no']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['si','no'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	},	
	       	{config:{
	       			name:'descuento_incremento',
	       			fieldLabel:'Desc/Incr.',
	       			allowBlank:false,
	       			emptyText:'Desc/Incr...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'estado_reg',
	       		   // displayField: 'descestilo',
	       		    store:['aumentar','descontar','ninguno']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['aumentar','descontar','ninguno'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	},
	       		{
	       		config:{
	       			name:'estado_reg',
	       			fieldLabel:'Estado',
	       			allowBlank:false,
	       			emptyText:'Estado...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'estado_reg',
	       		   // displayField: 'descestilo',
	       		    store:['activo','inactivo']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['activo','inactivo'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	},
	       	{
	       		config:{
	       			fieldLabel: "Fecha registro",
	       			gwidth: 110,
	       				allowBlank:false,
	       				name:'fecha_reg',
	       				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''},
	       				anchor:'70%',
	       				format:'d/m/Y'
	       			},
	       			type:'DateField',
	       			filters:{type:'date'},
	       			grid:true,
	       			form:true,
	       			dateFormat:'m-d-Y'
	       	},
	       	/*
id_auxiliar_pasivo integer,id_cuenta_pasivo integer,
id_moneda integer,id_parametro_rhum integer,id_tipo_descuento_bono integer,id_tipo_obligacion integer,

movimiento_contable varchar,


prorratea varchar,tipo_aporte varchar,tipo_dato varchar,valor numeric,desc_parametro_rhum integer,
desc_moneda varchar,desc_usureg text,desc_cta ,desc_aux text,desc_tipo_obligacion varchar*/
	       		{
	       		config:{
	       			fieldLabel: "Fórmula",
	       			gwidth: 120,
	       			name: 'formula',
	       			allowBlank:true,	
	       			maxLength:500,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'TextArea',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},
	       		{
	       		config:{
	       			name:'movimiento_contable',
	       			fieldLabel:'Mov. Contable',
	       			allowBlank:false,
	       			emptyText:'Movimiento Contable...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'movimiento_contable',
	       		   // displayField: 'descestilo',
	       		    store:['debe','haber']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['debe','haber'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	},
	       	{
	       		config:{
	       			name:'prorratea',
	       			fieldLabel:'Prorratea',
	       			allowBlank:false,
	       			emptyText:'Prorratea...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'prorratea',
	       		   // displayField: 'descestilo',
	       		    store:['si','no']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['si','no'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	},
	       		{
	       		config:{
	       			name:'tipo_dato',
	       			fieldLabel:'Tipo Dato',
	       			allowBlank:false,
	       			emptyText:'Tipo Dato...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'tipo_dato',
	       		   // displayField: 'descestilo',
	       		    store:['basico','formula','bono_desc','variable']
	       		    
	       		},
	       		type:'ComboBox',
	       		id_grupo:0,
	       		filters:{	
	       		         type: 'list',
	       				 dataIndex: 'size',
	       				 options: ['basico','formula','bono_desc','variable'],	
	       		 	},
	       		grid:true,
	       		form:true
	       	}
	       	
	       	
	       	];
	       	
	Phx.vista.tipo_columna.superclass.constructor.call(this,config);
	
	this.init();
//	var txt_ci=this.getComponente('ci');	
//	var txt_correo=this.getComponente('correo');	
//	var txt_telefono=this.getComponente('telefono');	
	//this.getComponente('id_persona').on('select',onPersona);
	//this.getComponente();
	
	
	
//	function onPersona(c,r,e){
//		txt_ci.setValue(r.data.ci);
//		txt_correo.setValue(r.data.correo);
//		txt_telefono.setValue(r.data.telefono);
//	}
	this.load({params:{start:0, limit:50}});
	
	
	
	
	
	
	
}

Ext.extend(Phx.vista.tipo_columna,Phx.gridInterfaz,{
	title:'TipoColumnas',
	ActSave:'../../sis_recursos_humanos/control/TipoColumna/guardarTipoColumna',
	ActDel:'../../sis_recursos_humanos/control/TipoColumna/eliminarTipoColumna',
	ActList:'../../sis_recursos_humanos/control/TipoColumna/listarTipoColumna',
	id_store:'id_tipo_columna',
	fields: [
	{name:'id_tipo_columna'},
	{name:'codigo', type:'string'},
	{name:'nombre',type:'string'},
	{name:'descripcion',type:'string'},
	{name:'observacion',type:'string'},
	{name:'valor'},
	{name:'tipo_dato',type:'string'},
	{name:'compromete',type:'string'},
	{name:'descuento_incremento',type:'string'},
	{name:'formula',type:'string'},
	{name:'movimiento_contable',type:'string'},
	{name:'prorratea',type:'string'},
	{name:'fecha_reg', mapping: 'fecha_reg', type: 'date', dateFormat: 'Y-m-d'},
	{name:'estado_reg', type: 'string'},
	{name:'id_usuario_reg'},
	{name:'id_parametro_rhum'},
	{name:'id_moneda'},
	{name:'id_cuenta_pasivo'},
	{name:'id_auxiliar_pasivo'},
	{name:'id_tipo_obligacion'},
	{name:'desc_usureg',type:'string'},
	{name:'desc_parametro_rhum',type:'string'},
	{name:'desc_moneda',type:'string'},
	{name:'desc_cta',type:'string'},
	{name:'desc_aux',type:'string'}
	],
	sortInfo:{
		field: 'PERREG.nombre_completo1',
		direction: 'ASC'
	},
	
	
	// para configurar el panel south para un hijo
	
	/*
	 * south:{
	 * url:'../../../sis_seguridad/vista/usuario_regional/usuario_regional.php',
	 * title:'Regional', width:150
	 *  },
	 */	
	bdel:true,// boton para eliminar
	bsave:true// boton para eliminar
	
		 
})
</script>