<?php
/**
*@package pXP
*@file gen-Estacion.php
*@author  mflores
*@date 05-09-2011 10:30:01
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Estacion=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Estacion.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
		
		this.addButton('FotoEstacion',{text:'Subir foto estacion',iconCls: 'blist',disabled:true,handler:FotoEstacion,tooltip: '<b>Subir foto estacion</b><br/>Permite subir una foto para la estacion seleccionada'});
		
		function FotoEstacion()
		{					
			var rec=this.sm.getSelected();
						
			Phx.CP.loadWindows('../../../sis_hidrologia/vista/estacion/subirFotoEstacion.php','Subir foto',
			{
				modal:true,
				width:400,
				height:150
		    },rec.data,this.idContenedor,'subirFotoEstacion')
		}
		
		/*var combo_pro = new Ext.form.AwesomeCombo(
		{
	   		name:'id_proyectos',
			fieldLabel:'Proyecto',
			allowBlank:true,
			emptyText:'Proyectos...',
			store: new Ext.data.JsonStore({
  			url: '../../sis_parametros/control/Proyecto/listarProyecto',
				id: 'id_proyecto',
				root: 'datos',
				sortInfo:{
					field: 'nombre_proyecto',
					direction: 'ASC'
				},
				totalProperty: 'total',
				fields: ['id_proyecto','nombre_proyecto'],
				// turn on remote sorting
				remoteSort: true,
				baseParams:{par_filtro:'nombre_proyecto',hidro:'si'}
				
			}),
			valueField: 'id_proyecto',
			displayField: 'nombre_proyecto',
			forceSelection:true,
			typeAhead: true,
			triggerAction: 'all',
			lazyRender:true,
			mode:'remote',
			pageSize:10,
			queryDelay:1000,
			width:250,
			minChars:2,
			enableMultiSelect:true

		});
		
		this.tbar.add(combo_pro);
		
		combo_pro.on('select',function (combo, record, index)
		{	
			this.store.baseParams.id_proyectos=combo.getValue();	
			this.store.load({params:{start:0, limit:250}});
			
		},this);	*/
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_estacion'
			},
			type:'Field',
			form:true 
		},
		
		{
			config:{
				name: 'codigo',
				fieldLabel: 'C贸digo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'est.codigo',type:'string'},
			
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'id_administrador',
				fieldLabel: 'Administrador',
				allowBlank: false,
				emptyText:'Administrador...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/AdministradorHidro/listarAdministradorHidro',
					id: 'id_administrador',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_administrador','nombre','codigo','meteo','hidro'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre#codigo'}
				}),
				valueField: 'id_administrador',
				displayField: 'nombre',
				gdisplayField:'admin',
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
			
				renderer:function (value, p, record){return String.format('{0}', record.data['admin']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre',type:'string'},
			
			grid:true,
			form:true
		},
						
		{
			config:{
				name: 'id_cuenca',
				fieldLabel: 'Cuenca',
				allowBlank: false,
				emptyText:'Cuenca...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Cuenca/listarCuencaCombo',
					id: 'id_cuenca',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_cuenca','id_cuenca_fk','tipo_cuenca','nombre','codigo','codigo_largo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_cuenca',
				displayField: 'nombre',
				gdisplayField:'cuenca',
				//hiddenName: 'id_cuenca',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['cuenca']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'cuenca',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_lugar',
				fieldLabel: 'Lugar',
				allowBlank: false,
				emptyText:'Lugar...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/Lugar/listarLugar',
					id: 'id_lugar',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_lugar','id_lugar_fk','codigo','nombre','tipo','sw_municipio','sw_impuesto','codigo_largo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_lugar',
				displayField: 'nombre',
				gdisplayField:'lugar',
				hiddenName: 'id_lugar',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['lugar']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'lugar',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_rio',
				fieldLabel: 'Rio',
				allowBlank: false,
				emptyText:'Rio...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Rio/listarRio',
					id: 'id_rio',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_rio','codigo','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_rio',
				displayField: 'nombre',
				gdisplayField:'rio',
				hiddenName: 'id_rio',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['rio']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'rio',type:'string'},
			
			grid:true,
			form:true
		},
		{
   			config:{
   				name:'id_proyectos',
   				fieldLabel:'Proyectos',
   				allowBlank:true,
   				emptyText:'Proyectos...',
   				store: new Ext.data.JsonStore({
          			url: '../../sis_parametros/control/Proyecto/listarProyecto',
   					id: 'id_proyecto',
   					root: 'datos',
   					sortInfo:{
   						field: 'nombre_proyecto',
   						direction: 'ASC'
   					},
   					totalProperty: 'total',
   					fields: ['id_proyecto','nombre_proyecto'],
   					// turn on remote sorting
   					remoteSort: true,
   					baseParams:{par_filtro:'nombre_proyecto',hidro:'si'}
   					
   				}),
   				valueField: 'id_proyecto',
   				displayField: 'nombre_proyecto',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				minChars:2,
       			enableMultiSelect:true,   			
   				//renderer:function(value, p, record){return String.format('{0}', record.data['descripcion']);}
   			},
   			type:'AwesomeCombo',
   			id_grupo:0,
   			grid:false,
   			form:true
       	},	
       	{
			config:{
				name: 'proyectos',
				fieldLabel: 'Proyectos',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648
			},
			type:'TextField',
			//filters:{pfiltro:'proy.nombre_proyecto',type:'string'},			
			grid:true,
			form:false
		},
		{
			config:{
				name: 'latitud_carto',
				fieldLabel: 'Latitud geografica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648
			},
			type:'TextField',
			filters:{pfiltro:'est.latitud_carto',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'longitud_carto',
				fieldLabel: 'Longitud geografica',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648
			},
			type:'TextField',
			filters:{pfiltro:'est.longitud_carto',type:'string'},
			
			grid:true,
			form:true
		},		
		{
			config:{
				name: 'latitud',
				fieldLabel: 'Latitud decimal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648,
				disabled: true
			},
			type:'TextField',
			filters:{pfiltro:'est.latitud',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'longitud',
				fieldLabel: 'Longitud decimal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648,
				disabled: true
			},
			type:'TextField',
			filters:{pfiltro:'est.longitud',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'altitud',
				fieldLabel: 'Altitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179648
			},
			type:'NumberField',
			filters:{pfiltro:'est.altitud',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'direccion',
				fieldLabel: 'Direcci贸n',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'est.direccion',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'Estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'est.estado',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'superficie_cuenca',
				fieldLabel: 'Superficie de la cuenca',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'est.superficie_cuenca',type:'numeric'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'teletransmision',
				fieldLabel: 'Tele transmisi贸n',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'Checkbox',
			filters:{pfiltro:'est.teletransmision',type:'boolean'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo',
				fieldLabel: 'Tipo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'est.tipo',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observador',
				fieldLabel: 'Observador',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'est.observador',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'comentario',
				fieldLabel: 'Comentario',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'est.comentario',type:'string'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha ini',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'est.fecha_ini',type:'date'},
			
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'est.fecha_fin',type:'date'},
			
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
			filters:{pfiltro:'est.estado_reg',type:'string'},
			
			grid:true,
			form:false
		},		
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creaci贸n',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'est.fecha_reg',type:'date'},
			
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
			filters:{pfiltro:'est.fecha_mod',type:'date'},
			
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
			
			grid:true,
			form:false
		}
	],
	title:'Estaci贸n',
	ActSave:'../../sis_hidrologia/control/Estacion/insertarEstacion',
	ActDel:'../../sis_hidrologia/control/Estacion/eliminarEstacion',
	//ActList:'../../sis_hidrologia/control/Estacion/listarEstacionProyectos',
	ActList:'../../sis_hidrologia/control/Estacion/listarEstacion',
	id_store:'id_estacion',
	fheight:'70%',
	fwidth:'50%',
	fields: [
		{name:'id_estacion', type: 'numeric'},
		{name:'altitud', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'comentario', type: 'string'},
		{name:'direccion', type: 'string'},
		{name:'estado', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'admin', type: 'string'},
		{name:'cuenca', type: 'string'},
		{name:'lugar', type: 'string'},
		{name:'rio', type: 'string'},
		'id_administrador',
		'id_cuenca',
		'id_lugar',
		{name:'id_rio'},
		{name:'latitud_carto', type: 'string'},
		{name:'longitud_carto', type: 'string'},
		{name:'latitud', type: 'string'},
		{name:'longitud', type: 'string'},
		{name:'observador', type: 'string'},
		{name:'superficie_cuenca', type: 'numeric'},
		{name:'teletransmision', type: 'string'},
		{name:'tipo', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'id_proyectos'},
		{name:'proyectos', type: 'string'}
	],
	
	east:{
		  url:'../../../sis_hidrologia/vista/estacion/mapaEstacion.php',
		  title:'Mapa Estacion', 
		  width:'50%',
		  //height:'50%',
		  cls:'mapaEstacion'
		 },
	
	south:{
		  url:'../../../sis_hidrologia/vista/sensor/Sensor.php',
		  title:'Sensores', 
		  height:'50%',
		  cls:'Sensor'
		 },
	
	sortInfo:{
		field: 'id_estacion',
		direction: 'ASC'
	},
	
	onButtonDel:function()
	{
		if(confirm('緿esea eliminar la estacion seleccionada?'))
		{
			Phx.vista.Estacion.superclass.onButtonDel.call(this);
		}
	},
	
	EnableSelect:function(tb)
	{
		//llamada funcion clace padre
		this.getBoton('FotoEstacion').enable();		
		Phx.vista.Estacion.superclass.EnableSelect.call(this,tb);
		return tb
	},	
	
	bdel:true,
	bsave:true	
	}
)
</script>