<?php
/**
*@package pXP
*@file gen-Medicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.MedicionDatoMedida=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config)
	{		
		this.maestro=config.maestro;

    	//llama al constructor de la clase padre
		Phx.vista.MedicionDatoMedida.superclass.constructor.call(this,config);		
		this.init();
		this.bloquearMenus();
		
		this.addButton('reporteHidro',{text:'Reporte',iconCls: 'blist',disabled:false,handler:reporteHidro,tooltip: '<b>Generar gráfica</b>'});
		
		function reporteHidro()
		{										
			//var rec=this.sm.getSelected();
			var rec = this.maestro.id_sensor;
			//console.log('sensor: ',rec);
			var data = this.maestro.id_sensor; 
			//this.sm.getSelected().data.id_sensor;
			/*
			Phx.CP.loadWindows('../../../sis_hidrologia/vista/rep_hidro/rep_hidro.php',
			'Reporte',
			{
				modal:true,
				width:400,
				height:170
		    },rec.data,this.idContenedor,'rep_hidro')*/
			
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				url:'../../sis_hidrologia/control/ReporteHidro/reporte_med_Hidro',
				params:{'id_sensor':data},
				success:this.misuccess,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});	
		}	
					
		//this.load({params:{start:0, limit:50}});
		//this.load({params:{start:0, limit:50, id_sensor: this.id_sensor}});
	},
	
	misuccess:function(resp)
	{		
		var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
		Phx.CP.loadingHide();
		window.open('../../../sis_hidrologia/control/reporte_Hidro.php');
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_medicion'
			},
			type:'Field',
			form:true 
		},
		/*{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_medicion'
			},
			type:'Field',
			form:true 
		},	*/			
		{
			config:{
					labelSeparator:'',
					//fieldLabel: 'id_sensor',
					inputType:'hidden',
					name: 'id_sensor'
			},
			type:'Field',
			form:true 			
		},			
		{
			config:{
				name: 'id_operador',
				fieldLabel: 'Operador',
				allowBlank: false,
				emptyText:'Operador...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_hidrologia/control/Operador/listarOperador',
					id: 'id_operador',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_operador','nombre_completo1','nombre','ap_paterno','ap_materno'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1'}
				}),
				valueField: 'id_operador',
				displayField: 'nombre_completo1',
				gdisplayField:'nombre_completo1',
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
				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo1']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre_completo1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true			
		},
		{
			config:{
				name: 'hora_medida',
				fieldLabel: 'Hora medida',
				allowBlank: true,
				format:"H:i:s",
				anchor: '40%',
				gwidth: 100//,
				//renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'TimeField',
			filters:{pfiltro:'med.hora_medida',type:'date'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'fecha_medida',
				fieldLabel: 'Fecha medida',
				allowBlank: true,
				anchor: '40%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''} // h:i:s
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha',type:'date'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		
		/*{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'fecha_fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},*/		
		/*{
			config:{
				name: 'h',
				fieldLabel: 'h',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'med.h',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		
		{
			config:{
				name: 'h_ini',
				fieldLabel: 'h_ini',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.h_ini',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'h_fin',
				fieldLabel: 'h_fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.h_fin',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'h_mini',
				fieldLabel: 'h_mini',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.h_mini',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'h_maxi',
				fieldLabel: 'h_maxi',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.h_maxi',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		
		{
			config:{
				name: 'h_original',
				fieldLabel: 'h_original',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.h_original',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},		
		{
			config:{
				name: 'q',
				fieldLabel: 'q',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			filters:{pfiltro:'med.q',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		{
			config:{
				name: 'q_original',
				fieldLabel: 'q_original',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'TextField',
			filters:{pfiltro:'med.q_original',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'valor_numeric',
				fieldLabel: 'Valor Numerico',
				allowBlank: true,
				anchor: '40%',
				decimalPrecision:4,
				gwidth: 100,
				maxLength:1310720
			},
			type:'NumberField',
			filters:{pfiltro:'dat.valor_numeric',type:'string'},
			id_grupo:1,
			grid:true,
			form:true,
			egrid:true
		},
		/*{
			config:{
				name: 'valor_varchar',
				fieldLabel: 'Valor literal',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'dat.valor_varchar',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
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
			filters:{pfiltro:'med.estado_reg',type:'string'},
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
			filters:{pfiltro:'med.fecha_reg',type:'date'},
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
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha_mod',type:'date'},
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
	title:'Medición',
	ActSave:'../../sis_hidrologia/control/MedicionDatoMedida/insertarMedicionDatoMedida',
	ActDel:'../../sis_hidrologia/control/MedicionDatoMedida/eliminarMedicionDatoMedida',
	ActList:'../../sis_hidrologia/control/MedicionDatoMedida/listarMedicionDatoMedida',
	id_store:'id_medicion',
	
	loadValoresIniciales:function()
	{
		Phx.vista.MedicionDatoMedida.superclass.loadValoresIniciales.call(this);
	    this.getComponente('id_sensor').setValue(this.maestro.id_sensor);
	    //this.getComponente('id_tipo_medicion').setValue(this.maestro.id_tipo_medicion);	    	    
	},
	
	/*onButtonNew:function()
	{
		this.getComponente('codigo').setValue('');
		this.getComponente('codigo').disable();
		Phx.vista.MedicionDatoMedida.superclass.onButtonNew.call(this);
	},
	
	onButtonEdit:function()
	{
		this.getComponente('codigo').setValue('');
		this.getComponente('codigo').disable();
		Phx.vista.MedicionDatoMedida.superclass.onButtonEdit.call(this);
	},*/
	
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_sensor:this.maestro.id_sensor};		
		this.load({params:{start:0, limit:50}});		
	},	
	
	fields: [
		{name:'id_medicion', type: 'numeric'},
		//{name:'id_tipo_medicion', type: 'numeric'},
		{name:'id_sensor', type: 'numeric'},		
		{name:'id_operador', type: 'numeric'},		
		//{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d'},	 //H:i:s
		{name:'fecha_medida', type: 'date', dateFormat:'Y-m-d'},
		{name:'hora_medida', type: 'time'},	
		/*{name:'h', type: 'numeric'},		
		{name:'h_ini', type: 'string'},
		{name:'h_fin', type: 'string'},
		{name:'h_maxi', type: 'string'},
		{name:'h_mini', type: 'string'},
		{name:'h_original', type: 'string'},
		{name:'q', type: 'numeric'},
		{name:'q_original', type: 'string'},*/
		{name:'valor_numeric', type: 'string'},
		/*{name:'valor_varchar', type: 'string'},*/
		{name:'estado_reg', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'nombre_completo1', type: 'string'}
	],
		
	sortInfo:{
		field: 'id_medicion',
		direction: 'ASC'
	},
	fheight:'60%',
	fwidth:'60%',
	bdel:true,
	bsave:true
	}
)
</script>
		
		