<?php
/**
*@package pXP
*@file gen-Sensor.php
*@author  (rarteaga)
*@date 06-09-2011 11:45:42
*@description permites subir archivos  de imegenes a la tabla de personas
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Promedios=Ext.extend(Phx.frmInterfaz,{

	constructor:function(config)
	{		
    	this.maestro = config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Promedios.superclass.constructor.call(this,config);
		this.init();	
		this.iniciarEventos(config);
		this.loadValoresIniciales();
		this.getComponente('id_sensor').setValue(config.id_sensor);	
		this.getComponente('id_tipo_sensor').setValue(config.id_tipo_sensor);
		this.getComponente('tipo_sensor_codigo').setValue(config.tipo_sensor_codigo);	
		this.getComponente('tipo_columna_sensor_valor').store.baseParams={'id_tipo_sensor':config.id_tipo_sensor,par_filtro:'numeric'};
		this.getComponente('tipo_columna_sensor_fecha').store.baseParams={'id_tipo_sensor':config.id_tipo_sensor,par_filtro:'fecha'};	
				
		this.getComponente('promedio').disable();
		this.getComponente('promedio').hide();
		this.getComponente('hora').disable();
		this.getComponente('hora').hide();
				
		this.getComponente('tipo_columna_sensor_fecha').store.load(
			                	{    
				                	params:{"sort":"id_tipo_columna_sensor",
			                               "dir":"ASC",
			                               'id_tipo_sensor':config.id_tipo_sensor,
			                               start:0, 
			                               par_filtro:'fecha',
			                               limit:50},
			                        callback:this.successConstructor,
			                        scope:this,
				                               
				                    callback: function()
						    		{    			
						    			if(this.getComponente('tipo_columna_sensor_fecha').store.data.items.length > 0)
						    			{    				
						    			   //var cant = this.getComponente('tipo_columna_sensor_fecha').store.data.items.length;
						    			   
						    			   this.getComponente('tipo_columna_sensor_fecha').setValue(
						    			   			this.getComponente('tipo_columna_sensor_fecha').store.data.items[0].data.codigo_columna
						    			   		);
						    			} 					    			
						    			
						    			this.cargaFechas(config);
						    		}
					    		})
	},
	
	iniciarEventos:function(c)
	{		
		this.getComponente('tipo_columna_sensor_fecha').on('select',function(com,r,i)
		{
			this.cargaFechas(c);
		},this);
		
		this.getComponente('opciones').on('select',function(com1,r1,i1)
		{				
			if (r1.data.id == 1)
			{				
				this.getComponente('promedio').disable();
				this.getComponente('promedio').hide();
			}
			else
			{				
				this.getComponente('promedio').enable();
				this.getComponente('promedio').show();
			}			
		},this);
		
		this.getComponente('promedio').on('select',function(com2,r2,i2)
		{				
			if (r2.data.ID == 1)
			{
				this.getComponente('hora').enable();
				this.getComponente('hora').show();
			}
			else
			{				
				this.getComponente('hora').disable();
				this.getComponente('hora').hide();
			}						
		},this);
	},
	
	cargaFechas:function(c)
	{		
		Phx.CP.loadingShow();
	    this.storeAtributos = new Ext.data.JsonStore
	    ({
      			url:'../../sis_hidrologia/control/ObtieneFecha/obtener_fechas',
			    id: 'id_tipo_columna_sensor',
				root: 'datos',
			    totalProperty: 'total',
				fields: 
					['fecha_min', 'fecha_max']
		});
		
		columna_fecha = this.getComponente('tipo_columna_sensor_fecha').getValue();
		
		this.storeAtributos.on('loadexception',this.conexionFailure);																
																			
		this.storeAtributos.load({params:{
			                       "sort":"id_sensor",
			                       "dir":"ASC",
			                       'id_sensor': c.id_sensor,
			                       'columna_fecha': columna_fecha,
			                       'tabla': c.tabla,
			                      start:0, 
			                      limit:50},
			                          
			                      callback: this.successConstructor,scope:this});
			                      
		this.argumentExtraSubmit={'columna_fecha':columna_fecha, 'tabla': c.tabla};		    
	},
			
	successConstructor:function(rec,con,res)
	{		
		var f_min = rec[0].data.fecha_min;
		f_min = f_min.toString('dddd MMM yyyy h:mm:ss');
		var v_fecha = f_min.split(" ");
		var fecha = v_fecha[0].toString('dddd MMM yyyy');
		f_min = new Date(fecha);				
		var dia = f_min.getDate() + 1;
		var mes = f_min.getMonth();		
		var anio = f_min.getFullYear();				
		var f_minima = new Date(anio, mes, dia);				
				
		var f_max = rec[0].data.fecha_max;
		f_max = f_max.toString('dddd MMM yyyy h:mm:ss');
		var v_fecha = f_max.split(" ");
		var fecha = v_fecha[0].toString('dddd MMM yyyy');
		f_max = new Date(fecha);
		var dia = f_max.getDate() + 1;
		var mes = f_max.getMonth();		
		var anio = f_max.getFullYear();		
		var f_maxima = new Date(anio, mes, dia);		
		
		// valor minimo y maximo para fecha ini		
		this.getComponente('fecha_ini').minValue = f_minima;
		this.getComponente('fecha_ini').maxValue = f_maxima;
		this.getComponente('fecha_ini').setValue(f_minima);

		// valor minimo y maximo para fecha fin
		this.getComponente('fecha_fin').minValue = f_minima;
		this.getComponente('fecha_fin').maxValue = f_maxima;
		this.getComponente('fecha_fin').setValue(f_maxima);
		
		Phx.CP.loadingHide();		    
	},
		
	successSave:function(resp)
	{
    	Phx.CP.loadingHide();
		var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
		
		Phx.CP.loadingHide();
		window.open('../../../sis_hidrologia/control/reporte_Hidro.php');
    },	
	
	Atributos:
	[
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
					name: 'id_tipo_sensor'
			},
			type:'Field',
			form:true 
		},
		
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'tipo_sensor_codigo'
			},
			type:'Field',
			form:true 
		},		
		{
			config:{
				name: 'tipo_columna_sensor_valor',
				fieldLabel: 'Valores',
				allowBlank: false,
				anchor: '65%',
				emptyText:'Tipo Sensor...',
				store:new Ext.data.JsonStore({
          			url:'../../sis_hidrologia/control/TipoColumnaSensor/listarTipoColumnaSensor',
				    id: 'id_tipo_columna_sensor',
   					root: 'datos',
   				    totalProperty: 'total',
   					fields: ['id_tipo_columna_sensor','estado_reg','unidad_medida','prioridad',
							'tipo_dato', 'nombre_columna', 'codigo_columna','id_tipo_sensor', 'mapeo_archivo', 
							'orden','id_usuario_reg','id_usuario_mod','usr_reg','usr_mod'],
						sortInfo:{
							field: 'id_tipo_columna_sensor',
							direction: 'ASC'
						}}),
				valueField: 'codigo_columna',
				displayField: 'codigo_columna',
			
				
				//hiddenName: 'id_administrador',
				groupable:true,//rpueba rac
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				listWidth:'280',
				width:210,
				minChars:2,
				renderer:function (value, p, record){return String.format('{0}', record.data['codigo_columna']);}
			},
			type:'ComboBox',
			id_grupo:1,
			form:true
		},
		
		{
			config:{
				name: 'tipo_columna_sensor_fecha',
				fieldLabel: 'Fechas',
				allowBlank: false,
				anchor: '65%',
				emptyText:'Tipo Sensor...',
				store:new Ext.data.JsonStore({
          			url:'../../sis_hidrologia/control/TipoColumnaSensor/listarTipoColumnaSensor',
				    id: 'id_tipo_columna_sensor',
   					root: 'datos',
   				    totalProperty: 'total',
   					fields: ['id_tipo_columna_sensor','estado_reg','unidad_medida','prioridad',
							'tipo_dato', 'nombre_columna', 'codigo_columna','id_tipo_sensor', 'mapeo_archivo', 
							'orden','id_usuario_reg','id_usuario_mod','usr_reg','usr_mod', 
						],						    			   
						sortInfo:{
							field: 'id_tipo_columna_sensor',
							direction: 'ASC'
						}}),
				valueField: 'codigo_columna',
				displayField: 'codigo_columna',
				
				//hiddenName: 'id_administrador',
				groupable:true,//rpueba rac
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				listWidth:'280',
				width:210,
				
				minChars:2,
			},
			type:'ComboBox',
			id_grupo:1,
			form:true
		},
		{
			config:{
				name:'opciones',
				fieldLabel:'Opciones',
				typeAhead: true,
				allowBlank:false,
				anchor: '65%',
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				store:new Ext.data.ArrayStore({
	        	fields: ['id', 'valores'],
	        	data :	[['1','Periodo'],	
	        			['2','Horario']]
	        				
	    		}),
				valueField:'id',
				displayField:'valores',
				width:150,						
			},
			type:'ComboBox',
			id_grupo:1,
			form:true
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha inicio',
				allowBlank: false,
				anchor: '50%',
				format: 'd/m/Y',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''} // h:i:s
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha',type:'timestamp'},
			id_grupo:1,
			grid:true,
			form:true
			//,egrid:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha final',
				allowBlank: false,
				anchor: '50%',
				format: 'd/m/Y',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''} // h:i:s
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha',type:'timestamp'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'periodo',
				boxLabel: 'Periodo',
				allowBlank: true,
				width: 'auto',
				gwidth: 100,
				checked: true,
			},
			type:'Radio',
			//filters:{pfiltro:'med.fecha',type:'timestamp'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'horario',
				boxLabel: 'Horario',
				allowBlank: true,
				width: 'auto',
				gwidth: 100
			},
			type:'Radio',
			//filters:{pfiltro:'med.fecha',type:'timestamp'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		
		{
			config:{
				name:'promedio',
				fieldLabel:'Promedio',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				anchor: '65%',
				store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['1','Por hora'],	
	        			['2','Por día'],
	        			['3','Por semana'],
	        			['4','Por mes'],
	        			['5','Por año']]
	        				
	    		}),
				valueField:'ID',
				displayField:'valor',
				width:150,						
			},
			type:'ComboBox',
			id_grupo:1,
			form:true
		},
		{
			config:{
				name: 'hora',
				fieldLabel: 'Hora',
				allowBlank: true,
				format:"H:i:s",
				anchor: '65%',
				gwidth: 100//,
				//renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'TimeField',
			//filters:{pfiltro:'med.hora_medida',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		}
	],		
	
	title:'Reporte',
	ActSave:'../../sis_hidrologia/control/TipoSensorCodigo/promedioTipoSensorCodigo'
	}
)	

</script>