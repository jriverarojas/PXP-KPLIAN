<?php
/**
*@package pXP
*@file gen-EntiFin.php
*@author  (gvelasquez)
*@date 20-09-2011 16:58:53
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.EntiFin=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.EntiFin.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_enti_fin'
			},
			type:'Field',
			form:true 
		},		
		{
			config:{
				name: 'id_institucion',
				fieldLabel: 'Institución',
				allowBlank: false,
				emptyText:'Institución...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_parametros/control/Institucion/listarInstitucion',
					id: 'id_institucion',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_institucion','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_institucion',
				displayField: 'nombre',
				gdisplayField:'institucion',
				//hiddenName: 'id_institucion',
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
				
				renderer:function (value, p, record){return String.format('{0}', record.data['institucion']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'institucion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'nro_cuenta',
				fieldLabel: 'Nro Cuenta',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'entfin.nro_cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'tipo_entidad',
				fieldLabel: 'Tipo de Entidad',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'entfin.tipo_entidad',type:'string'},
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
			filters:{pfiltro:'entfin.estado_reg',type:'string'},
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
				name: 'fecha_reg',
				fieldLabel: 'Fecha Creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'entfin.fecha_reg',type:'date'},
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
			filters:{pfiltro:'entfin.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Entidad Financiera',
	ActSave:'../../sis_cobranza/control/EntiFin/insertarEntiFin',
	ActDel:'../../sis_cobranza/control/EntiFin/eliminarEntiFin',
	ActList:'../../sis_cobranza/control/EntiFin/listarEntiFin',
	id_store:'id_enti_fin',
	fheight:'70%',
	fwidth:'50%',
	fields: [
		{name:'id_enti_fin', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_institucion', type: 'numeric'},
		{name:'institucion', type: 'string'},
		{name:'nro_cuenta', type: 'string'},
		{name:'tipo_entidad', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		//{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
    east:{
		  url:'../../../sis_cobranza/vista/agencia/Agencia.php',
		  title:'Agencias', 
		 // height:'50%',	//altura de la ventana hijo
		  width:'50%',		//ancho de la ventana hjo
		  cls:'Agencia'
		 },	
	
	sortInfo:{
		field: 'id_enti_fin',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		