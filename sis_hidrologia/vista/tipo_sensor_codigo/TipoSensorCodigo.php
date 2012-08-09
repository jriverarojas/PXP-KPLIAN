<?php
/**
*@package pXP
*@file gen-TipoSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:35
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoSensorCodigo=Ext.extend(Phx.gridInterfaz,{
     constructor:function(config){
		//console.log(config,'config')
		
		this.configMaestro=config;
		this.config=config;
    	//llama al constructor de la clase padre
    	Phx.CP.loadingShow();
	    this.storeAtributos= new Ext.data.JsonStore({
          			url:'../../sis_hidrologia/control/TipoColumnaSensor/listarTipoColumnaSensor',
				    id: 'id_tipo_columna_sensor',
   					root: 'datos',
   				    totalProperty: 'total',
   					fields: [
							'id_tipo_columna_sensor','estado_reg','unidad_medida','prioridad',
							'tipo_dato', 'nombre_columna', 'codigo_columna','id_tipo_sensor', 'mapeo_archivo', 
							'orden','id_usuario_reg','id_usuario_mod','usr_reg','usr_mod', 
						],
						sortInfo:{
							field: 'id_tipo_columna_sensor',
							direction: 'ASC'
						}});
			//evento de error
			this.storeAtributos.on('loadexception',this.conexionFailure);				
			
			this.storeAtributos.load({params:{
				                              "sort":"id_tipo_columna_sensor",
				                              "dir":"ASC",
				                              'id_tipo_sensor':config.id_tipo_sensor,
				                               start:0, 
				                               limit:50},callback:this.successConstructor,scope:this})			
	},		
	
	successConstructor:function(rec,con,res){
		this.Atributos=[];
		this.fields=[];
		this.id_store='id_tipo_sensor_'+this.config.tipo_sensor_codigo
		
		this.sortInfo={
			field: this.id_store,
			direction: 'ASC'
		};
		this.fields.push(this.id_store)
		this.fields.push('id_sensor')
		
		if(res)
		{
			this.Atributos[0]={
			//configuracion del componente
								config:{
										labelSeparator:'',
										inputType:'hidden',
										name: this.id_store
								},
								type:'Field',
								form:true 
						};
			
			this.Atributos[1]={
			//configuracion del componente
								config:{
										labelSeparator:'',
										inputType:'hidden',
										name: 'id_sensor'
								},
								type:'Field',
								form:true 
						};
						
			var recText = this.id_store + '#integer@id_sensor#integer';			
				//console.log('this.id_store: ', this.id_store);		
			
			for (var i=0;i<rec.length;i++){
				var configDef={};
				if(rec[i].data.tipo_dato=='numeric')
				{
					configDef={
						type:'NumberField'
					};
					this.fields.push(rec[i].data.codigo_columna)
				}
				else if(rec[i].data.tipo_dato=='varchar'){
					configDef={
						type:'TextField'
					};
					this.fields.push(rec[i].data.codigo_columna)
				}
				else if(rec[i].data.tipo_dato=='date'){
					configDef={
						config:{
							name: rec[i].data.codigo_columna,
							fieldLabel: rec[i].data.nombre_columna,
							allowBlank: false,
							anchor: '80%',
							format: 'd/m/Y',
							gwidth: 100,
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
						},
						type:'DateField'
					};
					this.fields.push({name:rec[i].data.codigo_columna, type: 'date', dateFormat:'Y-m-d'})
			
				}
				else if(rec[i].data.tipo_dato=='timestamp'){
					
					
					
					configDef={
						config:{
							name: rec[i].data.codigo_columna,
							fieldLabel: rec[i].data.nombre_columna,
							allowBlank: false,
							anchor: '80%',
							format: 'd/m/Y',
							gwidth: 150,
							renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
						},
						type:'DateField'
					};
					this.fields.push({name:rec[i].data.codigo_columna, type: 'date', dateFormat:'Y-m-d H:i:s'})
				}
				else if(rec[i].data.tipo_dato=='time'){
					configDef={
						type:'TimeField'
					};
					this.fields.push(rec[i].data.codigo_columna)
				}
				else if(rec[i].data.tipo_dato=='text'){
					configDef={
						type:'TextArea'
					  };
					  	this.fields.push(rec[i].data.codigo_columna)
				}
				else{
					configDef={
						type:'Field'
					};
					this.fields.push(rec[i].data.codigo_columna)
				}
				
			    recText=recText+'@'+rec[i].data.codigo_columna+'#'+rec[i].data.tipo_dato
				this.Atributos[i+2]={config:{
									 name: rec[i].data.codigo_columna,
									 fieldLabel: rec[i].data.nombre_columna,
									 allowBlank: true,
									 anchor: '80%',
									 gwidth: 100,
									 maxLength:100
									},
									type:'Field',
									filters:{pfiltro:rec[i].data.codigo_columna,type:'string'},
									id_grupo:1,
									egrid:true,
									grid:true,
									form:true
							};
					Ext.apply(this.Atributos[i+2],configDef); 
			}
			
			Phx.CP.loadingHide();
			Phx.vista.TipoSensorCodigo.superclass.constructor.call(this,this.config);
			this.argumentExtraSubmit={'tipo_sensor_codigo':this.config.tipo_sensor_codigo,'id_sensor':this.config.id_sensor,'datos':recText};
		    
			
			this.addButton('aSubirExcel',{text:'Subir archivo',iconCls: 'blist',disabled:false,handler:this.aSubirExcel,tooltip: '<b>Subir archivo</b><br/>Permite subir al sevidor un archivo CSV'});
		    this.addButton('reporteHidro',{text:'Reporte',iconCls: 'blist',disabled:false,handler:this.reporteHidro,tooltip: '<b>Generar gráfica</b>'});
		    this.addButton('promedios',{text:'Promedios',iconCls: 'blist',disabled:false,handler:this.promedios,tooltip: '<b>Obtener promedios</b>'});
		
		
			this.init();
			
			this.store.baseParams={tipo_sensor_codigo:this.config.tipo_sensor_codigo,id_sensor:this.config.id_sensor,datos:recText};			               
				                   
			this.load({params:{start:0, limit:50}})
			
		}
		
	},
	
	
	promedios: function()
	{
		/*var datos = {
			id_sensor:this.config.id_sensor,
			tipo_sensor_codigo:this.config.tipo_sensor_codigo,
			id_tipo_sensor:this.config.id_tipo_sensor,
			tabla:this.id_store,
			}; 
		
		Phx.CP.loadWindows('../../../sis_hidrologia/vista/tipo_sensor_codigo/Promedios.php',
		'Promedio',
		{
			modal:true,
			width:500,
			height:300
	    },datos,this.idContenedor,'Promedios')*/
	},
	
	reporteHidro:function()
	{															
		var data = {
			id_sensor:this.config.id_sensor,
			tipo_sensor_codigo:this.config.tipo_sensor_codigo,
			id_tipo_sensor:this.config.id_tipo_sensor,
			tabla:this.id_store,
			};   
					
		Phx.CP.loadWindows('../../../sis_hidrologia/vista/tipo_sensor_codigo/RepHidro.php',
		'Reporte',
		{
			modal:true,
			width:500,
			height:300
	    },data,this.idContenedor,'RepHidro')			
	},
		
	aSubirExcel:function()
	{							
		Phx.CP.loadWindows('../../../sis_hidrologia/vista/tipo_sensor_codigo/SubirExcelDinamico.php',
		'Subir archivo',
		{
			modal:true,
			width:500,
			height:250
	    },{id_sensor:this.config.id_sensor,
	    	tipo_sensor_codigo:this.config.tipo_sensor_codigo,
	    	id_tipo_sensor:this.config.id_tipo_sensor},this.idContenedor,'SubirExcelDinamico')
	},
	
	title:'Tipo Sensor',
	ActSave:'../../sis_hidrologia/control/TipoSensorCodigo/insertarTipoSensorCodigo',
	ActDel:'../../sis_hidrologia/control/TipoSensorCodigo/eliminarTipoSensorCodigo',
	ActList:'../../sis_hidrologia/control/TipoSensorCodigo/listarTipoSensorCodigo',
	bdel:true,
	bsave:true,
	bnew:true,
	bedit:true,
	preparaMenu:function(tb){
			this.getBoton('generartable').enable();
            Phx.vista.TipoSensorCodigo.superclass.preparaMenu.call(this,tb)
			return tb
		},
	liberaMenu:function(tb){
			this.getBoton('generartable').disable();
			Phx.vista.TipoSensorCodigo.superclass.liberaMenu.call(this,tb)
			return tb
		},
	loadValoresIniciales:function()
	{
		Phx.vista.TipoSensorCodigo.superclass.loadValoresIniciales.call(this);
		this.getComponente('id_sensor').setValue(this.config.id_sensor);	
			
	},
				
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sensor:this.maestro.id_sensor};
		this.load({params:{start:0, limit:50}});			
	}
		
}
)
</script>
		
		