<?php
/**
*@package pXP
*@file gen-Sensor.php
*@author  (mflores)
*@date 06-09-2011 11:45:42
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Sensor=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Sensor.superclass.constructor.call(this,config);
				
		//de inicio bloqueamos el botono nuevo
		this.tbar.items.get('b-new-'+this.idContenedor).disable(); 
		
		this.bloquearMenus();
		
		//agregamos boton para mostrar ventana hijo
		this.addButton('gen_Excel',{text:'Generar Excel',iconCls:'bexcel',disabled:true,handler:gen_Excel,tooltip: '<b>Generar Excel</b><br/>Permite generar una plantilla en formato Excel'});
		
		//this.addButton('aSubirExcel',{text:'Subir archivo',iconCls: 'blist',disabled:true,handler:aSubirExcel,tooltip: '<b>Subir archivo</b><br/>Permite subir al sevidor un archivo CSV'});
		
		
		
		this.addButton('mediciones',{text:'Mediciones',iconCls: 'blist',disabled:true,handler:mediciones,tooltip: '<b>Mediciones del sensor</b><br/>Abre pantalla de mediciones '});
		
		
		function mediciones(){
					
			var rec=this.sm.getSelected();
			
			if (rec == undefined)
			{
				Ext.MessageBox.alert('ALERTA', 'Debe seleccionar un registro.');	
			}
			else
			{
						
				Phx.CP.loadWindows('../../../sis_hidrologia/vista/tipo_sensor_codigo/TipoSensorCodigo.php',
						'Tipo Sensor Codigo',
						{
							width:900,
							height:400,
							modal:false
					    },rec.data,this.idContenedor,'TipoSensorCodigo')
			}
			
			
		}
				
			
		function aSubirExcel()
		{					
			var rec=this.sm.getSelected();
			//console.log('rec:',rec);
			Phx.CP.loadWindows('../../../sis_hidrologia/vista/subir_excel/subir_excel.php',
			'Subir archivo',
			{
				modal:true,
				width:400,
				height:150
		    },rec.data,this.idContenedor,'SubirExcel')
		}
		
		function gen_Excel()
		{
			var col = new Array();
					
			var v_label = new Array();
			var v_name = new Array();
			var v_width = new Array();
			var v_type = new Array();
			
			v_label[0] = 'fecha_medida';
			v_label[1] = 'hora_medida';
			v_label[2] = 'valor_numeric';
			v_label[3] = 'codigo';
			
			v_name[0] = 'fecha_medida';
			v_name[1] = 'hora_medida';
			v_name[2] = 'valor_numeric';
			v_name[3] = 'codigo';
			
			v_width[0] = 100;
			v_width[1] = 100;
			v_width[2] = 100;
			v_width[3] = 220;
			
			v_type[0] = 'DateField';
			v_type[1] = 'TimeField';
			v_type[2] = 'NumberField';
			v_type[3] = 'TextField';
			
						
			for(var i=0; i <= 3 ;i++)
			{					
				//console.log(i)
				col.push({label:v_label[i],
						name:v_name[i],
						width:v_width[i],
						type:v_type[i]
					});									
			}		
			
			var params=
			{
				tipoReporte:'excel_grid',
				//titulo:this.title,
				titulo:'Plantilla CSV',
				dir:this.store.getSortState().direction,
				sort:this.store.getSortState().field,
				totalCount:this.store.getTotalCount(),
				filter:this.gfilter.buildQuery(this.gfilter.getFilterData()).filter,
				columnas:Ext.util.JSON.encode(col)
			}
			
			//console.log(this.store.baseParams); //contenido de col
			Ext.apply(params,this.store.baseParams)
			Phx.CP.loadingShow()
			
			Ext.Ajax.request({
				url:this.ActList,
				//url:'../../sis_hidrologia/control/MedicionDatoMedida/listarMedicionDatoMedida',
				params:params,			
				success:this.successExcel,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});		
		}
	 this.init();
	  //cuando es un hijo de pestañas es necessario iniciar 
	  //onEnablePanel al para cargar los datos del padre
	   if(Phx.CP.getPagina(this.idContenedorPadre)){
      	 var dataMaestro=Phx.CP.getPagina(this.idContenedorPadre).getSelectedData();
	 	 if(dataMaestro){
	 	 	this.onEnablePanel(this,dataMaestro)
	 	 }
	  }
	  
	  this.iniciarEventos();		  
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sensor'
			},
			type:'Field',
			form:true 
		},
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
				sortable:false,
				name: 'id_tipo_sensor',
				fieldLabel: 'Tipo Sensor',
				allowBlank: false,
				emptyText:'Tipo Sensor...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/TipoSensor/listarTipoSensor',
					id: 'id_tipo_sensor',
					root: 'datos',
					sortInfo:{
						field: 'id_tipo_sensor',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tipo_sensor','nombre_sensor'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_sensor'}
				}),
				valueField: 'id_tipo_sensor',
				displayField: 'nombre_sensor',
				gdisplayField:'tipo_sensor',
				//hiddenName: 'id_administrador',
				groupable:true,//rpueba rac
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
				renderer:function (value, p, record){return String.format('{0}', record.data['tipo_sensor']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre_sensor',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Código',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100,
				disabled: true
			},
			type:'TextField',
			filters:{pfiltro:'sen.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'nombre_medida',
				fieldLabel: 'Nombre Medida',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:100,
				disabled: true
			},
			type:'TextField',
			filters:{pfiltro:'tipmed.nombre_medida',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'estado',
				fieldLabel: 'Estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'sen.estado',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},		
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha ini',
				allowBlank: true,
				anchor: '80%',
				format: 'd/m/Y',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sen.fecha_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha fin',
				allowBlank: true,
				anchor: '80%',
				format: 'd/m/Y',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sen.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'unidad_medida',
				fieldLabel: 'Unidad de Medida',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'tipmed.unidad_medida',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'ficticio',
				fieldLabel: 'Ficticio',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'Checkbox',
			filters:{pfiltro:'sen.ficticio',type:'boolean'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				sortable:false,
				name: 'id_sensor_fk',
				fieldLabel: 'Sensor asociado',
				allowBlank: false,
				emptyText:'Sensor...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Sensor/listarSensorFicticio',
					id: 'id_sensor',
					root: 'datos',
					sortInfo:{
						field: 'id_sensor',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_sensor','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_sensor',
				displayField: 'codigo',
				gdisplayField:'codigo',
				//hiddenName: 'id_administrador',
				groupable:true,//rpueba rac
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
				renderer:function (value, p, record){return String.format('{0}', record.data['sen_asociado']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'codigo',type:'string'},
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
			filters:{pfiltro:'sen.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creacion',
				format: 'd/m/Y',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sen.fecha_reg',type:'date'},
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
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				format: 'd/m/Y',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'sen.fecha_mod',type:'date'},
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
		}
	],
	title:'Sensor',
	ActSave:'../../sis_hidrologia/control/Sensor/insertarSensor',
	ActDel:'../../sis_hidrologia/control/Sensor/eliminarSensor',
	ActList:'../../sis_hidrologia/control/Sensor/listarSensor',
	id_store:'id_sensor',
	
	loadValoresIniciales:function()
	{
		Phx.vista.Sensor.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_estacion').setValue(this.maestro.id_estacion);		
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_estacion:this.maestro.id_estacion};
		this.load({params:{start:0, limit:50}});			
	},	
	
	iniciarEventos:function()
	{
		this.getComponente('id_sensor_fk').disable();		
		
		this.getComponente('ficticio').on('check',function(e,b)
		{
			if(b == true)
			{
				this.getComponente('id_sensor_fk').enable();				
			}
			else
			{
				this.getComponente('id_sensor_fk').disable();				
			}
		},this)
	},	
	
	fields: [
		{name:'id_sensor', type: 'numeric'},
		{name:'id_sensor_fk', type: 'numeric'},
		{name:'id_tipo_sensor', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d'},
		{name:'ficticio', type: 'boolean'},
		{name:'id_estacion', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'estacion', type: 'string'},
		{name:'tipo_sensor', type: 'string'},
		//{name:'nombre_medida', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'unidad_medida', type: 'string'},
		{name:'sen_asociado', type: 'string'},'tipo_sensor_codigo'
	],
	sortInfo:{
		field: 'id_sensor',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	/*east:{
		  url:'../../../sis_hidrologia/vista/medicion_dato_medida/MedicionDatoMedida.php',
		  title:'Medidas', 		 
		  width:'50%',
		  cls:'MedicionDatoMedida'
	},*/
	
	// sobre carga de funcion
	preparaMenu:function(tb)
	{
		// llamada funcion clace padre
		Phx.vista.Sensor.superclass.preparaMenu.call(this,tb)
			
		//this.getBoton('aSubirExcel').enable();
		this.getBoton('gen_Excel').enable();
	},
		
	liberaMenu:function(tb)
	{
		// llamada funcion clace padre
		Phx.vista.Sensor.superclass.liberaMenu.call(this,tb)
		
		//this.getBoton('aSubirExcel').disable();
		this.getBoton('gen_Excel').disable();		
	}		
  }
)
</script>