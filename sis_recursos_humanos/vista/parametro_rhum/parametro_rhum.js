<script>
Phx.vista.parametro_rhum=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
	//this.maestro=config.maestro;
    //llama al constructor de la clase padre
	Phx.vista.parametro_rhum.superclass.constructor.call(this,config);
	this.init();
	this.load({params:{start:0, limit:50}})

	
},
	Atributos:[
	       	{
	       		// configuracion del componente
	       		config:{
	       			labelSeparator:'',
	       			inputType:'hidden',
	       			name: 'id_parametro_rhum'

	       		},
	       		type:'Field',
	       		form:true 
	       		
	       	},
	       	{
	       			config:{
	       				name:'id_gestion',
	       				fieldLabel:'Gestión',
	       				allowBlank:false,
	       				emptyText:'Gestión...',
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
	    					baseParams:{par_filtro:'gestion'}
	    				}),
	       				valueField: 'id_gestion',
	       				displayField: 'gestion',
	       				gdisplayField:'gestion',//mapea al store del grid
	       				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{gestion}</p> </div></tpl>',
	       				hiddenName: 'id_gestion',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:250,
	       				gwidth:400,
	       				minChars:2,
	       			
	       				renderer:function (value, p, record){return String.format('{0}', record.data['gestion']);}
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
	       				name:'id_moneda_sal_min_nal',
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
	    					baseParams:{par_filtro:'codigo#moneda'}
	    				}),
	       				valueField: 'id_moneda',
	       				displayField: 'moneda',
	       				gdisplayField: 'moneda',
	       				hiddenName: 'id_moneda',
	       				forceSelection:true,
	       				typeAhead: true,
	           			triggerAction: 'all',
	           			lazyRender:true,
	       				mode:'remote',
	       				pageSize:10,
	       				queryDelay:1000,
	       				width:250,
	       				minChars:2,
	       			
	       				renderer:function(value, p, record){return String.format('{0}', record.data['moneda']);}

	       			},
	       			type:'ComboBox',
	       			id_grupo:0,
	       			filters:{   pfiltro:'moneda',
	       						type:'string'
	       					},
	       			grid:true,
	       			form:true
	       	},
	       	
	       	{
	       		config:{
	       			fieldLabel: "Salario Min. Nal.",
	       			gwidth: 120,
	       			name: 'salario_min_nal',
	       			allowBlank:false,	
	       			maxLength:100,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'NumberField',
	       		filters:{type:'string'},
	       		id_grupo:0,
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
	       				fieldLabel: "fecha_mod",
	       				gwidth: 110,
	       				name:'fecha_mod',
	       				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
	       			},
	       			type:'DateField',
	       			filters:{pfiltro:'PARRHH.fecha_reg',type:'date'},
	       			grid:true,
	       			form:false
	       	}
	       	
	       	
	       	
	       	],
	title:'Parametros RRHH',
	ActSave:'../../sis_recursos_humanos/control/ParametroRhum/guardarParametroRhum',
	ActDel:'../../sis_recursos_humanos/control/ParametroRhum/eliminarParametroRhum',
	ActList:'../../sis_recursos_humanos/control/ParametroRhum/listarParametroRhum',
	id_store:'id_parametro_rhum',
	fields: [
	{name:'id_parametro_rhum'},
	{name:'id_gestion'},
	{name:'id_moneda_sal_min_nal'},
	{name:'salario_min_nal'},
	
	{name:'fecha_reg', mapping: 'fecha_reg', type: 'date', dateFormat: 'Y-m-d'},
	{name:'fecha_mod', mapping: 'fecha_mod', type: 'date', dateFormat: 'Y-m-d'},
	{name:'gestion', type: 'string'},
	{name:'moneda', type: 'string'},
	{name:'estado_reg', type: 'string'}
		
	],
	sortInfo:{
		field: 'gestion',
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
	bsave:true,// boton para eliminar

		  
		  
		 
})
</script>