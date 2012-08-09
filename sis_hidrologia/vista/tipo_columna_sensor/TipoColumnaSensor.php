<?php
/**
*@package pXP
*@file gen-TipoColumnaSensor.php
*@author  (rac)
*@date 16-03-2012 17:06:17
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoColumnaSensor=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config)
	{
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TipoColumnaSensor.superclass.constructor.call(this,config);
		this.bloquearMenus();
		this.init();
		//this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_columna_sensor'
			},
			type:'Field',
			form:true 
		},
		
		{
			config:{
				labelSeparator:'',
				name: 'id_tipo_sensor',
				inputType:'hidden'
				
			},
			type:'Field',
			form:true
		},
			
		{
			config:{
				name: 'codigo_columna',
				fieldLabel: 'Código',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:25
			},
			type:'TextField',
			filters:{pfiltro:'ticosen.codigo_columna',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'nombre_columna',
				fieldLabel: 'Nombre',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'ticosen.nombre_columna',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{   
			config:
			{
				name:'unidad_medida',
				fieldLabel:'Unidad de medida',
				//typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione una unidad...',
	    		selectOnFocus:true,
	   			mode:'local',
	   			
	   			store:new Ext.data.ArrayStore({
        			fields: ['ID' ,'simbolo', 'descripcion'],
        			data : [ ['0' ,'cm', 'Centímetros'],
        				   ['1' ,'m/s²', 'Metro sobre segundo al cuadrado'],
        				   ['2' ,'m/s', 'Metro sobre segundo'],
        				   ['3' ,'s', 'Segundos'],
        				   ['4' ,'m', 'Metro'],
        				   ['5' ,'mm', 'Milímetro'],
        				   ['6' ,'kg', 'Kilogramo'],
        				   ['7' ,'gr', 'Gramo'],
        				   ['8' ,'°C', 'Grados Celsius'],
        				   ['9' ,'°F', 'Grados Farenheit'],
        				   ['10' ,'°K', 'Grados Kelvin'],
        				   ['11' ,'mol', 'Mol'], 
        				   ['12' ,'cd', 'Candela'],
        				   ['13' ,'A', 'Amperio'],
        				   ['14' ,'rad', 'Radián'],
        				   ['15' ,'m²', 'Metro cuadrado'], 
        				   ['16' ,'m³', 'Metro cúbico'],
        				   ['17' ,'Hz', 'Hertz'],
        				   ['18' ,'N', 'Newton'],
        				   ['19' ,'Pa', 'Pascal'],
        				   ['20' ,'J', 'Joule'],
        				   ['21' ,'W', 'Watt'],
        				   ['22' ,'C', 'Coulomb'],
        				   ['23' ,'V', 'Vatio'],
        				   ['24' ,'h', 'Hora'],
        				   ['25' ,'d', 'Día'],
        				   ['26' ,'min', 'Minuto'],
        				   ['27' ,'°', 'Grados'],
        				   ['28' ,"'", 'Minutos angulares'], 
        				   ['29' ,'"', 'Segundos angulares']]  //Ext.exampledata.states // from states.js
    				}),
	   			tpl:'<tpl for="."><div class="x-combo-list-item"><p>Símbolo: {simbolo}</p><p>Nombre: {descripcion}</p> </div></tpl>',				
				valueField:'simbolo',
				displayField: 'simbolo',
				width:400	
			},
			type:'ComboBox',
			filters:{pfiltro:'ticosen.unidad_medida',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
				
		{   
			config:
			{
				name:'tipo_dato',
				fieldLabel:'Tipo Dato',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione un tipo...',
	    		selectOnFocus:true,
	   			mode:'local',
				store:['char','bit','bytea','money','date','integer','single','double','short','long','text','float','boolean','varchar','timestamp','time','string','numeric','serial'],
				valueField:'ID',
				width:250,			
			},
			type:'ComboBox',
			filters:{pfiltro:'ticosen.tipo_dato',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
			
		/*{
   			config:{
   				name:'id_tipo_dato',
   				fieldLabel:'Tipo dato',
   				allowBlank:false,
   				emptyText:'Tipo dato...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_hidrologia/control/TipoDato/ListarTipoDato',
					id: 'id_tipo_dato',
					root: 'datos',
					sortInfo:{
						field: 'tipo_dato',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tipo_dato','tipo_dato'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'tipo_dato'}
				}),
   				valueField: 'id_tipo_dato',
   				displayField: 'tipo_dato',
   				gdisplayField:'tipo_dato',//mapea al store del grid
   				//tpl:'<tpl for="."><div class="x-combo-list-item"><p>{simbolo}</p><p>Unidad de medida: {unidad_medida}</p> </div></tpl>',
   				hiddenName: 'id_tipo_dato',
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
   			    ttitle:'Tipo dato',
   			   // tconfig:{width:1800,height:500},
   			    tdata:{},
   			    tcls:'tipo_dato',
   			    pid:this.idContenedor,
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['tipo_dato']);}
   			},
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'tipo_dato',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
	    },*/
		{
			config:{
				name: 'prioridad',
				fieldLabel: 'Prioridad',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100
			},
			type:'NumberField',
			filters:{pfiltro:'ticosen.prioridad',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},	
		{
			config:{
				name: 'mapeo_archivo',
				fieldLabel: 'Mapeo Archivo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:400
			},
			type:'TextField',
			filters:{pfiltro:'ticosen.mapeo_archivo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'orden',
				fieldLabel: 'Orden',
				allowBlank: false,
				anchor: '80%', 
				gwidth: 100
				
			},
			type:'NumberField',
			filters:{pfiltro:'ticosen.orden',type:'numeric'},
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
			filters:{pfiltro:'ticosen.estado_reg',type:'string'},
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
			filters:{pfiltro:'ticosen.fecha_reg',type:'date'},
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
			filters:{pfiltro:'ticosen.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	onReloadPage:function(m)
	{
		//Phx.vista.TipoColumnaSensor.superclass.liberaMenu.call(this);
		console.log('m: ' ,m);
		this.maestro=m;		
		alert('llega1');
		/*if(this.maestro.estado_ts == 'generado')
		{
			//this.liberaMenu();
			console.log('estado1 >>', this.maestro.estado_ts);			
			this.tbar.items.get('b-new-'+this.idContenedor).disable();			
			console.log('h >>', this.tbar.items.get('b-new-'+this.idContenedor).disabled);
		}
		else
		{
			//this.desbloquearMenus();
			console.log('estado2 >>', this.maestro.estado_ts );
			this.tbar.items.get('b-new-'+this.idContenedor).enable();			
			console.log('h >>', this.tbar.items.get('b-new-'+this.idContenedor).disabled);
		}
		*/
		this.Atributos[1].valorInicial=this.maestro.id_tipo_sensor;
    	this.store.baseParams={id_tipo_sensor:this.maestro.id_tipo_sensor};
		this.load({params:{start:0, limit:50}})
	},
	
	liberaMenu: function() 
	{			
		//console.log('tb>>', this.tbar.items);
		
		//if(this.maestro.estado_ts == 'generado')
		//{
			//this.bloquearMenus();
			this.tbar.items.get('b-save-' + this.idContenedor).disable();
	        this.tbar.items.get('b-new-' + this.idContenedor).disable();
	        this.tbar.items.get('b-edit-' + this.idContenedor).disable();
	        this.tbar.items.get('b-del-' + this.idContenedor).disable();
		//}		
		//else
		//{			
			Phx.vista.TipoColumnaSensor.superclass.liberaMenu.call(this);
		//}             
	},
	
	EnableSelect: function(n) 
	{/*
		if(this.maestro.estado_ts == 'generado')
		{
			//this.bloquearMenus();
			/*this.tbar.items.get('b-save-' + this.idContenedor).disable();
	        this.tbar.items.get('b-new-' + this.idContenedor).disable();*/
	       // this.tbar.items.get('b-edit-' + this.idContenedor).disable();
	       // this.tbar.items.get('b-del-' + this.idContenedor).disable();
		/*}		
		else
		{		*/	
			Phx.vista.TipoColumnaSensor.superclass.EnableSelect.call(this);
		//}   */
	},
	
	title:'Tipo Columna Sensor',
	ActSave:'../../sis_hidrologia/control/TipoColumnaSensor/insertarTipoColumnaSensor',
	ActDel:'../../sis_hidrologia/control/TipoColumnaSensor/eliminarTipoColumnaSensor',
	ActList:'../../sis_hidrologia/control/TipoColumnaSensor/listarTipoColumnaSensor',
	id_store:'id_tipo_columna_sensor',
	fields: [
		{name:'id_tipo_columna_sensor', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'unidad_medida', type: 'string'},
		{name:'prioridad', type: 'numeric'},
		{name:'tipo_dato', type: 'string'},
		{name:'nombre_columna', type: 'string'},
		{name:'codigo_columna', type: 'string'},
		{name:'id_tipo_sensor', type: 'numeric'},
		{name:'mapeo_archivo', type: 'string'},
		{name:'orden', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_tipo_columna_sensor',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>	