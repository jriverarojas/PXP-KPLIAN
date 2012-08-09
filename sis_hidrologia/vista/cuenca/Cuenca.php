<?php
/*
 * VISTA: CUENCA
 * MFLORES 30-08-2011
 */

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Cuenca=Ext.extend
(
	Phx.arbInterfaz,
	{	
		constructor:function(config)
		{
			this.maestro=config.maestro;
	    	//llama al constructor de la clase padre
			Phx.vista.Cuenca.superclass.constructor.call(this,config);
			this.init();
		
			//de inicio bloqueamos el botono nuevo
		    this.tbar.items.get('b-new-'+this.idContenedor).disable();
			
			//this.load({params:{start:0, limit:50}})
		},
		
		Atributos:
		[
		    //Primera posicion va el identificador de nodo
			{
				// configuracion del componente (el primero siempre es el identificador)
				config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_cuenca'
				},
				type:'Field',
				form:true  
		
			},
			//En segunda posicion siempre va el identificador del nodo padre
			{
				// configuracin del componente
				config:{
					labelSeparator:'',
					inputType:'hidden',
					name:'id_cuenca_fk'
				},
				type:'Field',
				form:true
		
			},
			{
				config:{
					fieldLabel: "Tipo cuenca",
					gwidth: 120,
					name: 'tipo_cuenca',
					allowBlank:false,
					anchor:'100%'
				},
				type:'TextField',
				form:true
			},
			
			/*{
				config:{
					fieldLabel: "Tipo cuenca",				
					name: 'tipo_cuenca',
					typeAhead: true,
					allowBlank:false,
		    		triggerAction: 'all',
		    		emptyText:'Seleccione un tipo...',
		    		selectOnFocus:true,
		   			mode:'local',
					store:['Macro-cuenca','Sub-cuenca','Micro-cuenca'],
					valueField:'ID',
					width:150					
				},
				type:'ComboBox',
				form:true
			},	*/	
			{
				config:{
					fieldLabel: "Nombre",
					gwidth: 120,
					name: 'nombre',
					allowBlank:false,
					anchor:'100%'
				},
				type:'TextField',
				form:true
			},	
			{
				config:{
					fieldLabel: "Codigo",
					gwidth: 120,
					name: 'codigo',
					allowBlank:false,
					anchor:'100%'
				},
				type:'TextField',
				form:true
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
				filters:{pfiltro:'lug.fecha_reg',type:'date'},
				grid:true,
				form:false
			},
			{
				config:{
					name: 'id_usuario_reg',
					fieldLabel: 'Creado por',
					allowBlank: true,
					anchor: '80%',
					gwidth: 100,
					maxLength:4
				},
				type:'TextField',
				form:false
			}	
		],				
	
		title:'CLASIFICACION DE CUENCAS',
		ActSave:'../../sis_hidrologia/control/Cuenca/guardarCuenca',
		ActDel:'../../sis_hidrologia/control/Cuenca/eliminarCuenca',	
		ActList:'../../sis_hidrologia/control/Cuenca/listarCuencaArb',
	    id_store:'id_cuenca',
	    textRoot:'CLASIFICACION DE CUENCAS',
		id_nodo:'id_cuenca',
		id_nodo_p:'id_cuenca_fk',
		rootVisible:true,
		fields: [
		'id', //identificador unico del nodo (concatena identificador de tabla con el tipo de nodo)
		      //porque en distintas tablas pueden existir idetificadores iguales
		'tipo_meta',
		{name:'id_cuenca', type: 'numeric'},
		{name:'id_cuenca_fk', type: 'numeric'},
		{name:'tipo_cuenca', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'codigo_largo', type: 'string'},
		{name:'estado_reg', type: 'string'},		
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		],
		sortInfo:{
			field: 'id_cuenca',
			direction:'ASC'
		},
		
	
		//sobrecarga prepara menu
		preparaMenu:function(n)
		{
			var tb = this.tbar;		
						
			//si es una nodo tipo carpeta habilitamos la opcion de nuevo	
			console.log('tipo >>>', n.attributes.tipo_cuenca );
			
			if(n.attributes.tipo_cuenca == 'Macrocuenca' || n.attributes.tipo_cuenca == 'Subcuenca' || n.attributes.id == 'id')
			{
				tb.items.get('b-new-'+this.idContenedor).enable()
			}
			else 
			{
				tb.items.get('b-new-'+this.idContenedor).disable()
			}			
		
			// llamada funcion clace padre
			Phx.vista.Cuenca.superclass.preparaMenu.call(this,tb,n)
		},
	
			
		loadValoresIniciales:function()
		{												
			Phx.vista.Cuenca.superclass.loadValoresIniciales.call(this);				
			
			var nodo = this.sm.getSelectedNode();
			
			if(nodo.attributes.id == 'id')
			{
				this.getComponente('tipo_cuenca').setValue('Macrocuenca');
			}
			else
			{ 
				if(nodo.attributes.tipo_cuenca == 'Macrocuenca')			
				{
					this.getComponente('tipo_cuenca').setValue('Subcuenca');
				}
			   		
			  	else				
			  	{
			  		this.getComponente('tipo_cuenca').setValue('Microcuenca');
			  	}
			}	
			
			this.getComponente('tipo_cuenca').disable();
		},
		
		bdel:true,
		bsave:true
	}
	
)
</script>