<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ProcesoParaElaboracion=Ext.extend(Phx.gridInterfaz,{
	tipo_interfaz:'ELABORACION',
	title:'Formulacion de Requerimiento',
	ActSave:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
	ActDel:'../../sis_legal/control/ProcesoContrato/eliminarProcesoContrato',
	ActList:'../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
	id_store:'id_proceso_contrato',
	fheight:'60%',
	fwidth:'70%',
	fields: [
		{name:'id_proceso_contrato', type: 'numeric'},
		{name:'numero_requerimiento', type: 'string'},
		{name:'numero_contrato', type: 'string'},
		{name:'id_modalidad', type: 'numeric'},
		{name:'objeto_contrato', type: 'string'},
		{name:'id_depto', type: 'numeric'},
		{name:'id_rpc', type: 'numeric'},
		{name:'id_alarma', type: 'numeric'},
		{name:'id_proveedor', type: 'numeric'},
		{name:'id_uo', type: 'numeric'},
		{name:'id_representante_legal', type: 'numeric'},
		{name:'id_tipo_contrato', type: 'numeric'},
		{name:'id_supervisor', type: 'numeric'},
		{name:'id_gestion', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_modalidad', type:'string'},
		{name:'desc_depto', type:'string'},
		{name:'desc_rpc', type:'string'},
		{name:'desc_proveedor', type:'string'},
		{name:'desc_uo', type:'string'},
		{name:'desc_rep_legal', type:'string'},
		{name:'desc_tipo_contrato', type:'string'},
		{name:'desc_supervisor', type:'string'},
		{name:'desc_gestion', type:'string'},
		{name:'desc_funcionario', type:'string'},
		{name:'desc_moneda', type:'string'},
		{name:'nombre_estado', type:'string'},
		{name:'estado_proceso', type:'string'},
		{name:'monto_contrato', type:'numeric'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d'},
		'id_abogado',
		'abogado','version','doc_contrato','extension'
		
		
	
	],
	
	sortInfo:{
		field: 'id_proceso_contrato',
		direction: 'DESC'
	},
	bdel:false,
	bsave:false,
	bnew:false,

	
	Grupos: [
            {
                layout: 'column',
                border: false,
                defaults: {
                   border: false
                },            
                items: [{
					        bodyStyle: 'padding-right:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Unidad Solicitante',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:0
					        }]
					    }, {
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Proceso',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    },{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Datos Contrato',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:2
					        }]
					    },{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            width: 400,
					            title: 'Asignación de Abogado Resp.',
					            autoHeight: true,
					            items: [],
						        id_grupo:3
					        }]
					    }
					    ]
            }
        ],
	
	constructor:function(config){
		this.maestro=config.maestro;
		this.Atributos=[
					{//configuracion del componente
						config:{
								labelSeparator:'',
								inputType:'hidden',
								name: 'id_proceso_contrato'
						},
						type:'Field',
						//id_grupo:20,//grupo inexistenten para que no se bloquee
						form:true 
					},
					{
						config:{
							name: 'version',
							fieldLabel: 'Digital',
							gwidth: 60,
						
							renderer:function (value, p, record){
								var icono='eli';
								if(record.data.version>0){
									icono='ok';
								}
								return "<div style='text-align:center'><img src = '../../../lib/imagenes/icono_dibu/dibu_"+icono+".png' align='center' width='32' height='32'/></div>"
							 }
						},
						type:'Field',
						egrid:true,
						filters:{pfiltro:'contra.numero_contrato',type:'string'},
						id_grupo:2,
						grid:true,
						form:false
					},
					{
						config:{
							name: 'numero_requerimiento',
							fieldLabel: 'Requerimiento',
							allowBlank: true,
							width: 200,
							gwidth: 100,
							maxLength:4,
						    renderer:function (value, p, record){
						    	var fomato;
						    	if(record.data['estado_proceso']=='ANULADO'){
						    	 fomato = '<b><font color="red">{0}</font></b>'
						    	
						    	}
						    	else if(record.data['estado_proceso']=='REGCON'){
						    	 fomato = '<b><font color="Lime">{0}</font></b>'
						    	}
						    	else if(record.data['estado_proceso']=='ASIGNA'){
						    		fomato = '<b>{0}</b>'
						    	}
						    	else{
						    		fomato = '<font color="Blue"><b>{0}</b></font>'
						    	}
						    	
						    	return String.format(fomato, record.data['numero_requerimiento']);
						    	}
			   			
						},
						type:'Field',
						filters:{pfiltro:'contra.numero_requerimiento',type:'string'},
						id_grupo:1,
						grid:true,
						form:false
					}
					,
				   	{
						config:{
							name: 'numero_contrato',
							fieldLabel: 'Número Contrato',
							allowBlank: true,
							width: 200,
							gwidth: 200,
							maxLength:255,
							renderer:function (value, p, record){
								if(record.data['numero_contrato']&&record.data['numero_contrato']!='') return String.format('{0}', record.data['numero_contrato']);	else return String.format('<b><font color="red">PENDIENTE</font></b>', record.data['numero_contrato']);
							 }
						},
						type:'Field',
						egrid:true,
						filters:{pfiltro:'contra.numero_contrato',type:'string'},
						id_grupo:2,
						grid:true,
						form:true
					}
					,
					{
						config:{
							name: 'nombre_estado',
							fieldLabel: 'Estado Proceso',
							gwidth: 200
						},
						type:'Field',
						filters:{pfiltro:'est.nombre',type:'string'},
						id_grupo:1,
						grid:true,
						form:false
					},
					{
			   			config:{
			   				name:'desc_depto',
				   			fieldLabel: 'Depto',
				   			gdisplayField:'desc_depto',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   			    gwidth:200
				   		},
			   			//type:'TrigguerCombo',
			   			type:'Field',
			   			id_grupo:0,
			   			filters:{pfiltro:'depto.nombre',type:'string'},
			   		    grid:false,
			   			form:false
			       	},
				    {
				   		config:{
				   			name:'desc_uo',
				   			fieldLabel:'Unidad Solicitante',
				   			gwidth:200
				   		},
			   			type:'Field',
			   			id_grupo:0,
			   			filters:{pfiltro:'nombre_unidad',type:'string'},
			   		    grid:true,
			   			form:false
				   	},
			
					  {
			   			config:{
			       		    name:'desc_funcionario',
			   				fieldLabel:'Funcionario Solicitante',
			   				gwidth:200
			             },
			   			type:'Field',
			   			id_grupo:0,
			   			filters:{pfiltro:'funcio.desc_funcionario1',type:'string'},
			   		    grid:true,
			   			form:false
			   	      },
				   	  {
						config:{
							name: 'objeto_contrato',
							fieldLabel: 'Requerimiento',
							allowBlank: true,
							anchor: '80%',
							grow:true,
							height:100,
							//width: 300,
							gwidth: 300,
							maxLength:5000
						},
						type:'TextArea',
						filters:{pfiltro:'contra.objeto_contrato',type:'string'},
						id_grupo:1,
						grid:true,
						form:false
					 },
					 {
			   			config:{
			   				name:'id_abogado',
			   				fieldLabel:'Proceso Asignado',
			   				allowBlank:false,
			   				emptyText:'Abogado...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
								id: 'id_responsable_proceso',
								root: 'datos',
								sortInfo:{
									field: 'nombre_completo1',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_responsable_proceso','nombre_completo1','ci'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre_completo1#ci',tipo:'abogado'}
							}),
			   				valueField: 'id_responsable_proceso',
			   				displayField: 'nombre_completo1',
			   				gdisplayField:'abogado',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
			   				hiddenName: 'id_rpc',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:'280',
			   				gwidth:280,
			   				minChars:3,
			   				renderer:function (value, p, record){return String.format('{0}', record.data['abogado']);}
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:3,
			   			filters:{	
			   				        pfiltro:'abogado.desc_responsable_proceso',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       },
					
					{
			   			config:{
			   				name:'id_rpc',
			   				fieldLabel:'RPC',
			   				allowBlank:false,
			   				emptyText:'RPC...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
								id: 'id_responsable_proceso',
								root: 'datos',
								sortInfo:{
									field: 'nombre_completo1',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_responsable_proceso','nombre_completo1','ci'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre_completo1#ci',tipo:'rpc'}
							}),
			   				valueField: 'id_responsable_proceso',
			   				displayField: 'nombre_completo1',
			   				gdisplayField:'desc_rpc',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
			   				hiddenName: 'id_rpc',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:'280',
			   				gwidth:280,
			   				minChars:2,
			   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_rpc']);}
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:1,
			   			filters:{	
			   				        pfiltro:'rpc.desc_responsable_proceso',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       	},
					{
			   			config:{
			   				name:'id_supervisor',
			   				fieldLabel:'Supervisor',
			   				allowBlank:false,
			   				emptyText:'Supervisor...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
								id: 'id_responsable_proceso',
								root: 'datos',
								sortInfo:{
									field: 'nombre_completo1',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_responsable_proceso','nombre_completo1','ci'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre_completo1#ci',
								tipo:'supervisor'}
							}),
			   				valueField: 'id_responsable_proceso',
			   				displayField: 'nombre_completo1',
			   				gdisplayField:'desc_supervisor',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
			   				hiddenName: 'id_supervisor',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:280,
			   				gwidth:280,
			   				minChars:2,
			   				  			
			   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_supervisor']);}
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:1,
			   			filters:{	
			   				       pfiltro:'superv.desc_responsable_proceso',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       },
					{
			   			config:{
			   				name:'id_tipo_contrato',
			   				fieldLabel:'Tipo Requerimiento',
			   				allowBlank:false,
			   				emptyText:'Tipo Contrato...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/TipoContrato/listarTipoContrato',
								id: 'id_tipo_contrato',
								root: 'datos',
								sortInfo:{
									field: 'nombre',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_tipo_contrato','nombre'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre'}
							}),
			   				valueField: 'id_tipo_contrato',
			   				displayField: 'nombre',
			   				gdisplayField:'desc_tipo_contrato',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p> </div></tpl>',
			   				hiddenName: 'id_tipo_contrato',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:280,
			   				gwidth:280,
			   				minChars:2,
			   				
			   			
			   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_tipo_contrato']);}
			   			},
			   			
			   			type:'ComboBox',
			   			id_grupo:0,
			   			filters:{	
			   				        pfiltro:'nombre',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       	},
			       	
			       	
			       	
			       	{
			   			config:{
			   				name:'id_modalidad',
			   				fieldLabel:'Modalidad',
			   				allowBlank:false,
			   				emptyText:'Modalidad...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/Modalidad/listarModalidad',
								id: 'id_modalidad',
								root: 'datos',
								sortInfo:{
									field: 'nombre',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_modalidad','nombre'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'nombre'}
							}),
			   				valueField: 'id_modalidad',
			   				displayField: 'nombre',
			   				gdisplayField:'desc_modalidad',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre}</p></div></tpl>',
			   				hiddenName: 'id_modalidad',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:280,
			   				gwidth:280,
			   				minChars:2,
			   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_modalidad']);}
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:1,
			   			filters:{	
			   				        pfiltro:'nombre',
			   						type:'string'
			   					},
			   		   
			   			grid:true,
			   			form:true
			       	},
				    {
				   		config:{
				   				name:'id_proveedor',
				   				origen:'PROVEEDOR',
				   				tinit:true,
				   				fieldLabel:'Contratista',
				   				gdisplayField:'desc_proveedor',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				    gwidth:200,
				      			renderer:function (value, p, record){return String.format('{0}', record.data['desc_proveedor']);}
			   			},
			   			type:'ComboRec',
			   			id_grupo:1,
			   			filters:{ pfiltro:'desc_proveedor',type:'string'},
			   		    grid:true,
			   			form:true
				   	}
				   	,
			       	{
				   		config:{
				   				name:'id_moneda',
				   				origen:'MONEDA',
				   				fieldLabel:'Moneda',
				   				gdisplayField:'desc_moneda',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
				   				gwidth:200,
				   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_moneda']);}
			   			    },
			   			    type:'ComboRec',
			   			    id_grupo:2,
				   			filters:{pfiltro:'moneda',type:'string'},
				   		    grid:true,
				   			form:true
				   	},	    
				    {
						config:{
							name: 'monto_contrato',
							fieldLabel: 'Monto contrato',
							allowBlank: true,
							width: 200,
							gwidth: 200,
							maxLength:255
						},
						type:'NumberField',
						filters:{pfiltro:'contra.monto_contrato',type:'numeric'},
						id_grupo:2,
						grid:true,
						form:true
					},
					{
					       	config:{
					       		id: 'Phx.vista.ProcesoParaElaboracion-fecha_ini',
					       		//id: 'fecha_ini-'+this.idContenedor,
					       		name:'fecha_ini',
					       		fieldLabel:'Fecha Inicio',
					       		allowBlank:false,
					       		width: 200,
					       		vtype: 'daterange',
					       		endDateField:'Phx.vista.ProcesoParaElaboracion-fecha_fin',
					       		//endDateField:'fecha_fin-'+this.idContenedor,
					       		renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
					            format:'d-m-Y'
					       		
				       		},
				       		type:'DateField',
				       		id_grupo:2,
				       		grid:true,
						    form:true
				       	},
				       	{
					       	config:{
				       			id: 'Phx.vista.ProcesoParaElaboracion-fecha_fin',
				       			//id: 'fecha_fin-'+this.idContenedor,
					       		name:'fecha_fin',
					       		fieldLabel:'Fecha Fin',
					       		allowBlank:true,
					       		width: 200,
					       		vtype: 'daterange',
					       		startDateField:'Phx.vista.ProcesoParaElaboracion-fecha_ini',
					       		//startDateField:'fecha_ini-'+this.idContenedor,
					       		format:'d-m-Y',
					     		renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
					
				       		},
				       		type:'DateField',
				       		id_grupo:2,
				       		grid:true,
						    form:true
				       	},	    
				       {
					    config:{
							name: 'estado_reg',
							fieldLabel: 'Estado Reg.',
							allowBlank: false,
							anchor: '80%',
							gwidth: 100,
							maxLength:10
						},
						type:'Field',
						filters:{pfiltro:'depuo.estado_reg',type:'string'},
						id_grupo:0,
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
						filters:{pfiltro:'depuo.fecha_reg',type:'date'},
						id_grupo:0,
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
						type:'Field',
						filters:{pfiltro:'usu1.cuenta',type:'string'},
						id_grupo:0,
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
						filters:{pfiltro:'depuo.fecha_mod',type:'date'},
						id_grupo:0,
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
						type:'Field',
						filters:{pfiltro:'usu2.cuenta',type:'string'},
						id_grupo:0,
						grid:true,
						form:false
					}
					
			  ];
					
    	//llama al constructor de la clase padre
		Phx.vista.ProcesoParaElaboracion.superclass.constructor.call(this,config);
		this.init();
		//filtro  rapido para grilla
		/*var combo_pro = new Ext.form.AwesomeCombo(
			{
	       			name:'estilo',
	       			fieldLabel:'Estilo Interfaz',
	       			allowBlank:false,
	       			emptyText:'Estilo...',
	       			
	       			typeAhead: true,
	       		    triggerAction: 'all',
	       		    lazyRender:true,
	       		    mode: 'local',
	       		    valueField: 'estilo',
	       		   // displayField: 'descestilo',
	       		    store:['xtheme-blue.css','xtheme-gray.css','xtheme-access.css']
	       		    
	       	})*/
		
		
		
		//definimos boton de finalizacion de formulacion de requerimiento
		this.addButton('retroceder',{text:'Corregir',iconCls: 'bundo',disabled:true,handler:retroceder,tooltip: '<b>Devolver</b>'});
		
		this.addButton('fin_requerimiento',{text:'Siguiente',iconCls:'badelante',disabled:true,handler:this.onButtonSiguiente,tooltip: '<b>Finalizar</b>'});
		
		this.addButton('aSubirContrato',{text:'Subir Contrato',iconCls:'bupload',disabled:true,handler:SubirContrato,tooltip: '<b>Subir archivo</b><br/>Permite actualizar el documento escaneado con sus respetivas  firmas'});
		
		this.addButton('verContrato',{text:'Ver Contrato',iconCls: 'blist',disabled:true,handler:verContrato,tooltip: '<b>Subir archivo</b><br/>Permite visualizar el documento escaneado'});
		
		function verContrato(){
			var rec=this.sm.getSelected();
			window.open('../'+rec.data.doc_contrato);
		}
		
		function SubirContrato()
		{					
			var rec=this.sm.getSelected();
			
						
			Phx.CP.loadWindows('../../../sis_legal/vista/proceso_contrato/subirContrato.php',
			'Subir Contrato',
			{
				modal:true,
				width:500,
				height:250
		    },rec.data,this.idContenedor,'subirContrato')
		}
		
		function retroceder(){
			var data=this.sm.getSelected().data.id_proceso_contrato;
			var id_abogado=this.sm.getSelected().data.id_abogado;
			Phx.CP.loadingShow();
		    Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				url:'../../sis_legal/control/ProcesoContrato/insertarProcesoContrato',
				params:{id_proceso_contrato:data,operacion:'anterior',tipo_operacion:'cambiar_estado',id_abogado:id_abogado},
				success:this.successSinc,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});	
		}
		
		
		this.store.baseParams={tipo_interfaz:this.tipo_interfaz};
		this.load({params:{start:0, limit:20}});
		
	},
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  //si el archivo esta escaneado se permite visualizar
	  if(data['version']>0){
	  		this.getBoton('verContrato').enable();
	  }
	  
	  //cuando el conrtato esta registrado el abogado no puede hacerle mas cambios
	  if(data['estado_proceso']=='REGCON'){
	  		if(tb){
		  		this.getBoton('fin_requerimiento').disable()
		  		this.getBoton('retroceder').disable();
		  		this.getBoton('edit').disable();
		  		this.getBoton('aSubirContrato').disable();
		  	}
	  }else{
	  	 Phx.vista.ProcesoParaElaboracion.superclass.preparaMenu.call(this,n);
	   	 this.getBoton('retroceder').enable();
	   	 this.getBoton('fin_requerimiento').enable();
	   	 this.getBoton('fin_requerimiento').setIconClass('badelante'); 
		 this.getBoton('fin_requerimiento').setText( 'Siguiente' ); 
		 this.getBoton('fin_requerimiento').setTooltip('<p>Pasar al siguiente estado ...</p>'); 
			
	  }
	  
	  
	  if(data['estado_proceso']=='REVCON'){
	  	this.getBoton('fin_requerimiento').setIconClass('bok') ;
		this.getBoton('fin_requerimiento').setText( 'Finalizar' ); 
		this.getBoton('fin_requerimiento').setTooltip('<p>Finalizar el contrato. Ya no podra realizar cambios en el mismo </p>');
		
		this.getBoton('aSubirContrato').enable();
		
		 
	 }else if(data['estado_proceso']=='ASIGNA'){
		this.getBoton('fin_requerimiento').setIconClass('badelante') 
		this.getBoton('fin_requerimiento').setText( 'LLevar a borrador' ) 
		this.getBoton('fin_requerimiento').setTooltip('<p>Iniciar Borrador de Contrato</p>')
		this.getBoton('aSubirContrato').disable(); 
	}
	else if(data['estado_proceso']=='BORCON'){
		this.getBoton('fin_requerimiento').setIconClass('badelante') 
		this.getBoton('fin_requerimiento').setText( 'LLevar a Revisión' ) 
		this.getBoton('fin_requerimiento').setTooltip('<p>Si el contrato esta en etapa de revisión</p>')
		this.getBoton('aSubirContrato').disable(); 
	}
	  
	  
	  return tb
		
	},
	liberaMenu:function(){
		var tb = Phx.vista.ProcesoParaElaboracion.superclass.liberaMenu.call(this);
		if(tb){
			this.getBoton('fin_requerimiento').disable()
			this.getBoton('retroceder').disable();
			this.getBoton('verContrato').disable();
		}
		return tb
	},
	
	onButtonEdit:function(){
		
		this.ocultarGrupo(3);
		this.mostrarGrupo(0);
		this.mostrarGrupo(1);
		this.mostrarGrupo(2);
		this.argumentExtraSubmit.tipo_operacion ='elaboracion';
		Phx.vista.ProcesoParaElaboracion.superclass.onButtonEdit.call(this);
		
		
	},
	
	
	onButtonSiguiente:function(){
		console.log('siguiente')
		//this.loadForm(this.sm.getSelected())
		this.mostrarGrupo(3);
		this.ocultarGrupo(0);
		this.ocultarGrupo(1);
		this.ocultarGrupo(2);
		this.argumentExtraSubmit.tipo_operacion ='cambiar_estado';
		this.argumentExtraSubmit.operacion ='siguiente';
		
		//this.form.getForm().reset();
		this.mostrarComponente(this.getComponente('id_proceso_contrato'));
		this.loadForm(this.sm.getSelected())
		this.window.buttons[1].hide();
		this.window.show();
	},
	
	
	
	successSinc:function(resp){
			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
			
		}

	
	}
)     	
       	
</script>