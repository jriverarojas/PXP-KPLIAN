<?php
/**
*@package pXP
*@file gen-ServicioDet.php
*@author  (rac)
*@date 02-02-2012 21:56:04
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ServicioDet=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ServicioDet.superclass.constructor.call(this,config);
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
					            title: 'Datos Detalle de Solicitud',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:1
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
					name: 'id_servicio_det'
			},
			type:'Field',
			
			form:true 
		},
		{
			config:{
				name: 'id_servicio',
				fieldLabel: 'id_servicio',
				allowBlank: false,
				anchor: '80%',
				//configuracion del componente
				inputType:'hidden',
				gwidth: 100,
				maxLength:4
			},
			type:'Field',
			filters:{pfiltro:'sde.id_servicio',type:'numeric'},
			id_grupo:1,
			grid:false,
			form:true
		},
		///////
		{
			config:{
			    name:'id_activo_fijo',
   				fieldLabel:'Vehiculo',
   				allowBlank:true,
   				emptyText:'Vehiculos...',
   				store: new Ext.data.JsonStore({
          			url: '../../sis_gestion_vehicular/control/ActivoDatosTec/listarActivoDatosTec',
   					id: 'id_activo_fijo',
   					root: 'datos',
   					sortInfo:{field: 'placa',direction: 'ASC'},
   					totalProperty: 'total',
   					fields: ['id_activo_datos_tec','id_activo_fijo','placa','desc_activo_fijo'],
   					remoteSort: true,
   					baseParams:{par_filtro:'actif.codigo#actif.descripcion#vhic.placa',hidro:'si'}
   					
   				}),
   				//tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_activo_fijo}</p><p>Placa:{placa}</p> </div></tpl>',
		   		valueField: 'id_activo_fijo',
   				displayField: 'desc_activo_fijo',
   				gdisplayField:'desc_activo_fijo',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_activo_fijo'])}
   		     },
			type:'ComboBox',
			filters:{pfiltro:'desc_activo_fijo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		}
		
		///////
		,
		{
				config:{
	   				name:'id_funcionario',
	   				origen:'FUNCIONARIO',
	   				tinit:true,
	   				fieldLabel:'Responsable',
	   				gdisplayField:'desc_funcionario1',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				    width:250,
   				    gwidth:200,
	      			renderer:function (value, p, record){return String.format('{0}', record.data['desc_funcionario1']);}
	   			},
	   			type:'ComboRec',
	   			id_grupo:1,
	   			filters:{ pfiltro:'f.desc_funcionario1',type:'string'},
	   		    grid:true,
	   			form:true
	  },
		
		{
			config:{
				name: 'kilometraje_ini',
				fieldLabel: 'Kilometraje Ini',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'sde.kilometraje_ini',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'kilometraje_fin',
				fieldLabel: 'Kilometraje Fin',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'sde.kilometraje_fin',type:'numeric'},
			id_grupo:1,
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
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'sde.estado_reg',type:'string'},
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
			filters:{pfiltro:'sde.fecha_reg',type:'date'},
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
			filters:{pfiltro:'sde.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'servicio_det',
	ActSave:'../../sis_gestion_vehicular/control/ServicioDet/insertarServicioDet',
	ActDel:'../../sis_gestion_vehicular/control/ServicioDet/eliminarServicioDet',
	ActList:'../../sis_gestion_vehicular/control/ServicioDet/listarServicioDet',
	id_store:'id_servicio_det',
	fields: [
		{name:'id_servicio_det', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'kilometraje_ini', type: 'numeric'},
		{name:'id_activo_fijo', type: 'numeric'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_servicio', type: 'numeric'},
		{name:'kilometraje_fin', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		'desc_funcionario1','desc_activo_fijo'
		
	],
	sortInfo:{
		field: 'id_servicio_det',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	
	}
)
</script>
		
		