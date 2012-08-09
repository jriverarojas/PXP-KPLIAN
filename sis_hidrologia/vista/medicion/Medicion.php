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
Phx.vista.Medicion=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config)
	{		
		this.maestro=config.maestro;
		
		//console.log('medicion',config)
		
    	//llama al constructor de la clase padre
		Phx.vista.Medicion.superclass.constructor.call(this,config);		
		this.init();
		this.load({params:{start:0, limit:50, id_sensor: this.id_sensor}});
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
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_medicion'
			},
			type:'Field',
			form:true 
		},
		
		/*{
			config:{
				name: 'id_tipo_medicion',
				fieldLabel: 'Tipo Medicion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'TextField',
			//filters:{pfiltro:'med.h',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		
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
						field: 'id_operador',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_operador','nombre_completo1'],
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
				minChars:2
				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo1']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre_completo1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true			
		},		
		{
			config:{
				name: 'hora_medida',
				fieldLabel: 'Hora',
				allowBlank: true,
				format:"H:i:s",
				anchor: '80%',
				gwidth: 100//,
				//renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'TimeField',
			filters:{pfiltro:'med.hora_medida',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'fecha_ini',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},	
		
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'fecha_fin',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'med.fecha_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'valor_numeric',
				fieldLabel: 'Valor Numerico',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1310720
			},
			type:'NumberField',
			filters:{pfiltro:'dat.valor_numeric',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
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
		},
		{
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
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_sensor'
			},
			type:'Field',
			form:true 			
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
	ActSave:'../../sis_hidrologia/control/Medicion/insertarMedicion',
	ActDel:'../../sis_hidrologia/control/Medicion/eliminarMedicion',
	ActList:'../../sis_hidrologia/control/Medicion/listarMedicion',
	id_store:'id_medicion',
	
	loadValoresIniciales:function()
	{
		Phx.vista.Medicion.superclass.loadValoresIniciales.call(this);
	    this.getComponente('id_sensor').setValue(this.id_sensor);
	    this.getComponente('id_tipo_medicion').setValue(this.id_tipo_medicion);	    
	},
	
	fields: [
		{name:'id_medicion', type: 'numeric'},
		{name:'id_tipo_medicion', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'hora_medida', type: 'time'},		
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'valor_numeric', type: 'string'},
		{name:'valor_varchar', type: 'string'},
		{name:'h', type: 'numeric'},		
		{name:'h_ini', type: 'string'},
		{name:'h_fin', type: 'string'},
		{name:'h_maxi', type: 'string'},
		{name:'h_mini', type: 'string'},
		{name:'h_original', type: 'string'},
		{name:'id_operador', type: 'numeric'},
		{name:'id_sensor', type: 'numeric'},
		{name:'q', type: 'numeric'},
		{name:'q_original', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'nombre_completo1', type: 'string'}
	],
	
	/*east:{
		  url:'../../../sis_hidrologia/vista/dato_medida/DatoMedida.php',
		  title:'Dato Medida', 
		  width:400,
		  cls:'DatoMedida'
		 },
	
	sortInfo:{
		field: 'id_medicion',
		direction: 'ASC'
	},*/
	bdel:true,
	bsave:true
	}
)
</script>
		
		