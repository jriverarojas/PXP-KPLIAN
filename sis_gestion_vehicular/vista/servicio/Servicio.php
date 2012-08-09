<?php
/**
*@package pXP
*@file gen-Servicio.php
*@author  (rcm)
*@date 02-02-2012 02:56:44
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Servicio=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Servicio.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
	
	Grupos: [
            {
                layout: 'column',
                border: false,
                defaults: {
                   border: false
                },            
                items: [{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Unidad Solicitante',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    }, {
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Asignacion',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:2
					        }]
					    }
					    ]
            }
        ],
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_servicio'
			},
			type:'Field',
			id_grupo:1,
			form:true 
		},
		{
			config:{
				name: 'fecha_sol_ini',
				fieldLabel: 'Fecha inicio',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_sol_ini',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'fecha_sol_fin',
				fieldLabel: 'Fecha Fin',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_sol_fin',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_funcionario',
				origen:'FUNCIONARIO',
				fieldLabel: 'Solicitante',
				allowBlank: false,
				anchor: '80%',
				gwidth: 200,
				maxLength:400,
				valueField: 'id_funcionario',
				gdisplayField: 'desc_funcionario',
		      			renderer:function(value, p, record){return String.format('{0}', record.data['desc_funcionario']);}
			},
			type:'ComboRec',
			filters:{pfiltro:'emplea.desc_funcionario1',type:'string'},
			id_grupo:1,
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
				maxLength:10
			},
			type:'Field',
			filters:{pfiltro:'servic.estado',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
	    
	/*	{
			config:{
				name: 'id_lugar_destino',
				fieldLabel: 'Lugar destino',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'servic.id_lugar_destino',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'id_ep',
				fieldLabel: 'EP',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'servic.id_ep',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
		
		
		{
			config:{
				name:'id_lugar_origen',
			   	fieldLabel: 'Lugar origen',
   				allowBlank:false,
   				emptyText:'Lugar origen...',
   				store: new Ext.data.JsonStore({
					url: '../../sis_parametros/control/Lugar/listarLugar',
					id: 'id_lugar',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_lugar','nombre','codigo','tipo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre#codigo'
					}
				}),
   				valueField: 'id_lugar',
   				displayField: 'nombre',
   				gdisplayField:'desc_lugar_ini',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p><p>Codigo:{codigo}</p> </div></tpl>',
   				hiddenName: 'id_lugar_origen',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				listWidth:280,
   				gwidth:200,
   				minChars:2,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_lugar_ini']);}
   			},
   			//type:'TrigguerCombo',
   			type:'ComboBox',
   			id_grupo:1,
   			filters:{	
   				       pfiltro:'lug.desc_lugar_ini',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
		},
		{
			   			config:{
			   				name:'id_lugar_destino',
			   				fieldLabel: 'Lugar destino',
			   				allowBlank:false,
			   				emptyText:'Lugar destino...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_parametros/control/Lugar/listarLugar',
								id: 'id_lugar',
								root: 'datos',
								sortInfo:{
									field: 'nombre',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_lugar','nombre','codigo','tipo'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre#codigo'
								}
							}),
			   				valueField: 'id_lugar',
			   				displayField: 'nombre',
			   				gdisplayField:'desc_lugar_des',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p><p>Codigo:{codigo}</p> </div></tpl>',
			   				hiddenName: 'id_lugar_destino',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:280,
			   				gwidth:200,
			   				minChars:2,
			   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_lugar_des']);}
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:1,
			   			filters:{	
			   				       pfiltro:'lug.desc_lugar_des',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       },
		
		{
			config:{
				name: 'cant_personas',
				fieldLabel: 'Num.Personas',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'servic.cant_personas',type:'numeric'},
			grid:true,
			id_grupo:1,
			form:true
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: 'Descripción',
				allowBlank: false,
				anchor: '100%',
				gwidth: 300,
				maxLength:1000
			},
			type:'TextArea',
			filters:{pfiltro:'servic.descripcion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel: 'Observaciones',
				allowBlank: true,
				anchor: '100%',
				gwidth: 300,
				maxLength:2000
			},
			type:'TextArea',
			filters:{pfiltro:'servic.observaciones',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_funcionario_autoriz',
				origen:'FUNCIONARIO',
				fieldLabel: 'Aprobador',
				allowBlank: false,
				anchor: '80%',
				gwidth: 200,
				maxLength:400,
				valueField: 'id_funcionario',
				gdisplayField: 'desc_funcionario',
		      	renderer:function(value, p, record){return String.format('{0}', record.data['desc_funcionario_autoriz']);}
			},
			type:'ComboRec',
			filters:{pfiltro:'empaut.desc_funacionario1',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		
	
		{
			config:{
				name: 'fecha_asig_ini',
				fieldLabel: 'Fecha asig.Ini',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_asig_ini',type:'date'},
			id_grupo:2,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_asig_fin',
				fieldLabel: 'Fecha asignacion fin',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_asig_fin',type:'date'},
			id_grupo:2,
			grid:true,
			form:true
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
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_reg',type:'date'},
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
				vtype: 'daterange',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'servic.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
					    config:{
							name: 'estado_reg',
							fieldLabel: 'Estado Reg.',
							allowBlank: false,
							width: 200,
							gwidth: 100,
							maxLength:10
						},
						type:'Field',
						filters:{pfiltro:'servic.estado_reg',type:'string'},
						id_grupo:1,
						grid:true,
						form:false
					}
	],
	title:'Servicio',
	ActSave:'../../sis_gestion_vehicular/control/Servicio/insertarServicio',
	ActDel:'../../sis_gestion_vehicular/control/Servicio/eliminarServicio',
	ActList:'../../sis_gestion_vehicular/control/Servicio/listarServicio',
	id_store:'id_servicio',
	fields: [
		{name:'id_servicio', type: 'numeric'},
		{name:'estado', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_lugar_destino', type: 'numeric'},
		{name:'id_ep', type: 'numeric'},
		{name:'fecha_asig_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_sol_ini', type: 'date', dateFormat:'Y-m-d'},
		{name:'descripcion', type: 'string'},
		{name:'id_lugar_origen', type: 'numeric'},
		{name:'cant_personas', type: 'numeric'},
		{name:'fecha_sol_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'fecha_asig_ini', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_funcionario', type: 'string'},
		{name:'desc_lugar_ini', type: 'string'},
		{name:'desc_lugar_des', type: 'string'},
		{name:'id_funcionario_autoriz', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'desc_funcionario_autoriz', type: 'string'}
	],
	sortInfo:{
		field: 'id_servicio',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		