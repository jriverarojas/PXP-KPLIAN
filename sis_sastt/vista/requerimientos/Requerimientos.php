<?php
/**
*@package pXP
*@file gen-Requerimientos.php
*@author  (rortiz)
*@date 22-11-2011 15:09:03
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Requerimientos=Ext.extend(Phx.gridInterfaz,{
	tipo_interfaz:'ELABORACION',
	title:'requerimientos',
	ActSave:'../../sis_sastt/control/Requerimientos/insertarRequerimientos',
	ActDel:'../../sis_sastt/control/Requerimientos/eliminarRequerimientos',
	ActList:'../../sis_sastt/control/Requerimientos/listarCaptura',
	id_store:'id_requerimiento',
	fields: [
		{name:'id_requerimiento', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_tipo_requerimiento', type: 'numeric'},
		{name:'id_depto', type: 'numeric'},
		{name:'id_gestion', type: 'numeric'},
		{name:'numero_requerimiento', type: 'string'},
		{name:'version', type: 'numeric'},
		{name:'descripcion', type: 'string'},
		{name:'hora', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'estado_requerimiento', type: 'string'},
		{name:'desc_funcionario', type: 'string'},
		{name:'requerimiento', type: 'string'},
		{name:'departamento', type: 'string'},
		{name:'desc_gestion', type: 'string'},
		{name:'nombre_estado', type: 'string'},
		{name:'solucion', type: 'string'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d'},
		{name:'hora_requer', type: 'string'},
		{name:'fecha_requer', type: 'date', dateFormat:'Y-m-d'},
		'captura','extencion','id_tecnico','tecnico','version'
	],
	sortInfo:{
		field: 'id_requerimiento',
		direction: 'DESC'
	},
	bdel:false,
	bsave:false,
	bnew:false,
	
	//GroupBox
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
					    },{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Asignación de Tecnico',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    },{
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Especificacion de la Solucion',
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
					name: 'id_requerimiento'
			},
			type:'Field',
			form:true 
		},	
		{
			config:{
						name: 'numero_requerimiento',
						fieldLabel: 'Requerimiento',
						allowBlank: true,
						width: 230,
						gwidth: 160,
						maxLength:5,
						renderer:function (value, p, record){
							var fomato;
							if(record.data['estado_requerimiento']=='ANUREQ'){
							fomato = '<b><font color="red">{0}</font></b>'
								    	
						}
						else if(record.data['estado_requerimiento']=='PROREQ'){
						fomato = '<b><font color="Lime">{0}</font></b>'
						}
						else if(record.data['estado_requerimiento']=='ASIGNA'){
							fomato = '<b>{0}</b>'
						}
						else{
							fomato = '<font color="Blue"><b>{0}</b></font>'
						}
								    	
						return String.format(fomato, record.data['numero_requerimiento']);
					}
			   			
			},
			type:'Field',
			filters:{pfiltro:'req.numero_requerimiento',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'nombre_estado',
				fieldLabel: 'Estado Requerimiento',
				width: 250,
				gwidth:205,
			},
			type:'Field',
			filters:{pfiltro:'estado.nombre',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name:'id_funcionario',
				origen:'FUNCIONARIO',
				fieldLabel:'Funcionario Solicitante',
				allowBlank:false,
				width: 250,
				gwidth:215,
				valueField: 'id_funcionario',
				gdisplayField: 'desc_funcionario',
				renderer:function(value, p, record){return String.format('{0}', record.data['desc_funcionario']);}
			},
			type:'ComboRec',//ComboRec
			id_grupo:0,
			filters:{pfiltro:'funcio.desc_funcionario1',type:'string'},
			grid:true,
			form:true
		},

		//Para el Campo Tecnico
		{
			config:{
				name:'id_tecnico',
				fieldLabel:'Requerimiento Asignado',
				allowBlank:false,
				emptyText:'tecnico...',
				store: new Ext.data.JsonStore({

					url: '../../sis_parametros/control/DeptoUsuario/listarDeptoUsuario',
					id: 'id_depto_usuario',
					root: 'datos',
					sortInfo:{
						field: 'desc_usuario',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_depto_usuario','desc_usuario','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'desc_usuario#ci',tipo:'tecnico'}
				}),
				valueField: 'id_depto_usuario',
				displayField: 'desc_usuario',
				gdisplayField:'tecnico',//dibuja el campo extra de la consulta al hacer un inner join con otra tabla
				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_usuario}</p><p>CI:{ci}</p> </div></tpl>',
				hiddenName: 'id_depto_usuario',
				forceSelection:true,
				typeAhead: true,
				triggerAction: 'all',
				lazyRender:true,
				mode:'remote',
				pageSize:10,
				queryDelay:1000,
				width: 230,
				gwidth: 130,
				listWidth:'280',
				minChars:3,
				renderer:function (value, p, record){
					if(record.data['tecnico']==null){
						return '<b><font color="red">NO ASIGNADO</font></b>'
					}
					else{
						return String.format('{0}', record.data['tecnico']);
					}
				}
			},
			//type:'TrigguerCombo',
			type:'ComboBox',
			id_grupo:1,
			filters:{
				pfiltro:'tecnico.desc_respon_requer',
				type:'string'
			},

			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_requer',
				fieldLabel: 'Fecha Requerimiento',
				allowBlank: true,
				anchor: '80%',
				width: 280,
				gwidth: 140,
				renderer:function (value,p,record){return value?value.dateFormat('d-m-Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'req.fecha_requer',type:'date'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'hora_requer',
				fieldLabel: 'Hora Requerimiento',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
			type:'TextField',
			filters:{pfiltro:'req.hora_requer',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'descripcion',
				fieldLabel: '* Descripcion',
				allowBlank: true,
				anchor: '80%',
				grow:true,
				height:100,
				width: 500,
				gwidth: 200,
				maxLength:5000
			},
			type:'TextArea',
			filters:{pfiltro:'req.descripcion',type:'string'},
			id_grupo:0,
			grid:true,
			form:true
		},
		/*{
			config:{
				fieldLabel: "Captura",
				gwidth: 130,
				inputType:'file',
				name: 'captura',
				buttonText: '',
				maxLength:150,
				anchor:'100%',
				renderer:function (value, p, record){
					var momentoActual = new Date();

					var hora = momentoActual.getHours();
					var minuto = momentoActual.getMinutes();
					var segundo = momentoActual.getSeconds();

					hora_actual = hora+":"+minuto+":"+segundo;

					console.log(record.data)

					//return  String.format('{0}',"<div style='text-align:center'><img src = ../../control/captura_persona/"+ record.data['captura']+"?"+record.data['nombre_captura']+hora_actual+" align='center' width='70' height='70'/></div>");
					return  String.format('{0}',"<div style='text-align:center'><img src = '../../../sis_sastt/control/captura/ActionArmacaptura.php?nombre="+ record.data['captura']+"&asd="+hora_actual+"' align='center' width='70' height='70'/></div>");
				},
				buttonCfg: {
					iconCls: 'upload-icon'
				}
			},
			//type:'FileUploadField',
			type:'Field',
			sortable:false,
			//filters:{type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},*/
		{
			config:{
				name:'id_tipo_requerimiento',
				fieldLabel:'Tipo Requerimiento',
				allowBlank:false,
				width: 250,
				gwidth:200,
				emptyText:'Tipo de Requerimiento...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_sastt/control/TipoRequerimiento/listarTipoRequerimiento',
					id: 'id_tipo_requerimiento',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tipo_requerimiento','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_tipo_requerimiento',
				displayField: 'nombre',
				gdisplayField:'requerimiento',
				//hiddenName: 'nombre',
				forceSelection:true,
				typeAhead: true,
				triggerAction: 'all',
				lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:200,
				minChars:2,

				renderer:function (value, p, record){return String.format('{0}', record.data['requerimiento']);}
			},
			type:'ComboBox',
			filters:{
				pfiltro:'tipreq.nombre',
				type:'string'
			},
			id_grupo:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'solucion',
				fieldLabel: 'Solucion',
				allowBlank: true,
				anchor: '80%',
				grow:true,
				height:100,
				width: 500,
				gwidth: 200,
				maxLength:5000
			},
			type:'TextArea',
			filters:{pfiltro:'req.solucion',type:'string'},
			id_grupo:2,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha Solucion',
				allowBlank: true,
				anchor: '80%',
				width: 280,
				gwidth: 140,
				renderer:function (value,p,record){return value?value.dateFormat('d-m-Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'estreq.fecha_fin',type:'date'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'hora',
				fieldLabel: 'Hora Solucion',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:8
			},
			type:'TextField',
			filters:{pfiltro:'estreq.hora',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name:'id_depto',
				origen:'DEPTO',
				allowBlank: false,
				fieldLabel: 'Departamento',
				gdisplayField:'departamento',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
				width: 250,
				gwidth:200,
				baseParams:{estado:'activo',codigo_subsistema:'SAST'},//parametros adicionales que se le pasan al store
				renderer:function (value, p, record){return String.format('{0}', record.data['departamento']);}
			},
			//type:'TrigguerCombo',
			type:'ComboRec',
			id_grupo:0,
			filters:{
				pfiltro:'depto.nombre',
				type:'string'
			},
			grid:false,
			form:true
		},
		{
			config:{
				name: 'usr_reg',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:5
			},
			type:'NumberField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'req.fecha_reg',type:'date'},
			id_grupo:3,
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
				maxLength:5
			},
			type:'NumberField',
			filters:{pfiltro:'usu2.cuenta',type:'string'},
			id_grupo:3,
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
			filters:{pfiltro:'req.fecha_mod',type:'date'},
			id_grupo:3,
			grid:true,
			form:false
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
			filters:{pfiltro:'req.estado_reg',type:'string'},
			id_grupo:3,
			grid:true,
			form:false
		}
	],
	
	constructor:function(config){
		this.maestro=config.maestro;
		//llama al constructor de la clase padre
		Phx.vista.Requerimientos.superclass.constructor.call(this,config);
		//alert(this.getIndAtributo('fecha_ini'));
		if(this.getComponente('fecha_ini')){
			this.getComponente('fecha_ini').on('valid',function(f,n,o){
				this.getComponente('fecha_fin').setMinValue(f.getValue())
			},this);

			this.getComponente('fecha_fin').on('valid',function(f,n,o){
				this.getComponente('fecha_ini').setMaxValue(f.getValue())
			},this);
		}
		this.init();

		this.addButton('imagenGantt',{text:'Historial',iconCls: 'bven1',disabled:false,handler:imagenGantt,tooltip: '<b>Generar gráfica Gantt</b>'});
		function imagenGantt()
		{
						
			var dat = this.sm.getSelected()
			console.log('dat>>>>', dat);
			
			if(dat){
				var data1 = dat.data.id_requerimiento;
				var data2 = dat.data.numero_requerimiento;
				var data3 = dat.data.id_tecnico;
				var data4 = dat.data.requerimiento;

				Phx.CP.loadingShow();
				Ext.Ajax.request({
					// form:this.form.getForm().getEl(),
					url:'../../sis_sastt/control/EstadoRequerimiento/dibujaGrafico',
					params:{'id_requerimiento':data1,'numero_requerimiento':data2,'requerimiento':data4},
					success:this.successGantt,
					failure: this.conexionFailure,
					timeout:this.timeout,
					scope:this
				});
			}
		}

	},//Fin constructor
	
	successGantt:function(resp)
	{
		//console.log(resp)
		var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
		Phx.CP.loadingHide();
		
		console.log('y estos sonnnnn',reg.datos);
		
		if(reg.datos.length > 0)
		{
			window.open('../../../sis_sastt/control/mostrarGantSast.php');
		}
		else
		{
			Ext.Msg.alert('ERROR','No es posible generar el historial para el proceso seleccionado');
		}

	},
	
	verCaptura:function(){
		var rec=this.sm.getSelected();
		console.log(rec.data)
		window.open('../'+rec.data.captura);
	},

	retroceder:function(){
		var data=this.sm.getSelected().data.id_requerimiento;
		var id_tecnico=this.sm.getSelected().data.id_tecnico;
		Phx.CP.loadingShow();
		Ext.Ajax.request({
			// form:this.form.getForm().getEl(),
			url:'../../sis_sastt/control/Requerimientos/insertarRequerimientos',
			params:{id_requerimiento:data,operacion:'anterior',tipo_operacion:'cambiar_estado',id_tecnico:id_tecnico},
			success:this.successSinc,
			failure: this.conexionFailure,
			timeout:this.timeout,
			scope:this
		});
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
	},

	bdel:true,
	bsave:true
}
)
</script>