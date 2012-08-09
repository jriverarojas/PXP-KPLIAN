<?php
/**
*@package pXP
*@file gen-Arqueo.php
*@author  (fprudencio)
*@date 27-09-2011 11:02:53
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ArqueoAbs=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ArqueoAbs.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_arqueo'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel:'Estado Reg.',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'arq.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name:'observaciones',
				fieldLabel:'Observaciones',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
				maxLength:1000
			},
			type:'TextArea',
			filters:{pfiltro:'arq.observaciones',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name:'estado',
				fieldLabel:'Estado',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
				disabled:true,
				maxLength:15
			},
			type:'TextField',
			valorInicial:'borrador',
			filters:{pfiltro:'arq.estado',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'id_caja',
				fieldLabel:'Caja',
				allowBlank:false,
				emptyText:'Caja...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/Caja/listarCaja',
					id: 'id_caja',
					root:'datos',
					sortInfo:{
						field:'codigo',
						direction: 'ASC'
					},
					totalProperty:'total',
					fields: ['id_caja','codigo'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_caja',
				displayField: 'codigo',
				gdisplayField:'codigo',
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
				renderer:function (value, p, record){return String.format('{0}', record.data['codigo']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'caja.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha',
				fieldLabel:'Fecha',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'arq.fecha',type:'date'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name:'usr_reg',
				fieldLabel:'Creado por',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
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
				name:'fecha_reg',
				fieldLabel:'Fecha creación',
				allowBlank:true,
				anchor:'80%',
				gwidth:100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'arq.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name:'usr_mod',
				fieldLabel:'Modificado por',
				allowBlank: true,
				anchor:'80%',
				gwidth:100,
				maxLength:4
			},
			type:'TextField',
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
			filters:{pfiltro:'arq.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	ActList:'../../sis_cobranza/control/Arqueo/listarArqueo',
	id_store:'id_arqueo',
	fields: [
		{name:'id_arqueo', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'observaciones', type: 'string'},
		{name:'estado', type: 'string'},
		{name:'id_caja', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'fecha', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	bdel:false,
	bsave:false,
	bedit:false,
	bnew:false,
	sortInfo:{
		field: 'id_arqueo',
		direction: 'ASC'
	},
	south:{
		  url:'../../../sis_cobranza/vista/arqueo_det/ArqueoDet.php',
		  title:'Detalle de Arqueo', 
		  height:'40%',
		  cls:'ArqueoDet'
		 }	
	}
)
</script>
		
		