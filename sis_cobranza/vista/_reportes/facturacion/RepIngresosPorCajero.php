<?php
/**
*@package pXP
*@file FacturasAnuladas.php
*@author  (admin)
*@date 17-11-2011
*@description Archivo con la interfaz para generación de reporte
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.RepIngresosPorCajero=Ext.extend(Phx.frmInterfaz,{
	Atributos:[
	       	/*{
		       	config:{
		       		name:'id_sistema_dist',
		       		fieldLabel: 'Sistema de Distribución',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_cobranza/control/SistemaDist/listarSistemaDist',
			       		id:'id_sistema_dist',
			       		root:'datos',
			       		sortInfo:{
			       			field:'nombre',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_sistema_dist','codigo','nombre'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'nombre'}
		       		}),
		       		valueField:'id_sistema_dist',
		       		displayField:'nombre',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:200,
		       		minChars:2
	       		},
	       		type:'ComboBox'
	       	},
	       	{
		       	config:{
		       		name:'id_cajero',
		       		fieldLabel: 'Cajero',
		       		allowBlank:false,
		       		store:new Ext.data.JsonStore({
			       		url:'../../sis_cobranza/control/Cajero/listarCajeroSistDist',
			       		id:'id_cajero',
			       		root:'datos',
			       		sortInfo:{
			       			field:'person.nombre_completo2',
			       			direction:'ASC'
		       			},
		       			totalProperty:'total',
		       			fields:['id_cajero','cajero','cod_caja','estado_caja','sist_dist'],
		       			remoteSort:true,
		       			baseParams:{par_filtro:'person.nombre_completo2'}
		       		}),
		       		valueField:'id_cajero',
		       		displayField:'cajero',
		       		mode:'remote',
		       		triggerAction: 'all',
		       		pageSize:10,
		       		queryDelay:500,
		       		width:300,
		       		minChars:2
	       		},
	       		type:'ComboBox'
	       	},*/
			{
			config:{
				name: 'id_enti_fin',
				fieldLabel:'Entidad Financiera',
				allowBlank:false,
				emptyText:'Entidad...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/EntiFin/listarEntiFin',
					id: 'id_enti_fin',
					root:'datos',
					sortInfo:{
						field:'institucion',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_enti_fin','institucion'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'institucion'}
				}),
				valueField: 'id_enti_fin',
				displayField: 'institucion',
				gdisplayField:'institucion',
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
				name: 'id_agencia',
				fieldLabel:'Agencia',
				allowBlank:false,
				emptyText:'Agencia...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_cobranza/control/Agencia/listarAgencia',
					id: 'id_agencia',
					root:'datos',
					sortInfo:{
						field:'codigo',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_agencia','codigo','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'codigo'}
				}),
				valueField: 'id_agencia',
				displayField: 'nombre',
				gdisplayField:'nombre',
				//hiddenName: 'id_administrador',
				forceSelection:true,
				typeAhead: false,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				renderer:function (value, p, record){return String.format('{0}', record.data['desc_agencia']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
			
	       	{
		       	config:{
		       		id: 'fecha_ini_'+this.idContenedor+'_RepIngresosPorCajero',
		       		name:'fecha_ini',
		       		fieldLabel:'Fecha Inicio',
		       		allowBlank:false,
		       		vtype: 'daterange',
		       		endDateField:'fecha_fin_'+this.idContenedor+'_RepIngresosPorCajero',
		       		format:'d-m-Y'
		       		
	       		},
	       		type:'DateField'
	       	},
	       	{
		       	config:{
	       			id: 'fecha_fin_'+this.idContenedor+'_RepIngresosPorCajero',
		       		name:'fecha_fin',
		       		fieldLabel:'Fecha Fin',
		       		allowBlank:false,
		       		vtype: 'daterange',
		       		startDateField:'fecha_ini_'+this.idContenedor+'_RepIngresosPorCajero',
		       		format:'d-m-Y'
	       		},
	       		type:'DateField'
	       	}
	],
	title:'Ingresos por Cajero',
	ActSave:'../../sis_cobranza/control/FacturaCob/repIngresosPorCajero',
	topBar:true,
	botones:false,
	labelSubmit:'Imprimir',
	tooltipSubmit:'<b>Generar reporte</b>',
	borientacion:true,
	bformato:true,
	btamano:true,
	constructor: function(config){
		Phx.vista.RepIngresosPorCajero.superclass.constructor.call(this,config);
		this.init();
		this.iniciarEventos();
	},
	/*iniciarEventos:function(){
			this.getComponente('id_sistema_dist').on('select',function(s,r,i){
			var cmbCajero=this.getComponente('id_cajero');
			cmbCajero.store.baseParams.id_sistema_dist=r.data.id_sistema_dist;
			cmbCajero.reset();
			cmbCajero.modificado=true;
		},this);
	},*/
	
	iniciarEventos:function()
	{
		this.getComponente('id_enti_fin').on('select',function(s,r,i)
		{
			var cmbAgencia=this.getComponente('id_agencia');
			cmbAgencia.store.baseParams.id_enti_fin=r.data.id_enti_fin;
			cmbAgencia.reset();
			cmbAgencia.modificado=true;
		},this);
	},
	
	tipo:'reporte',
	clsSubmit:'bprint',

	agregarArgsExtraSubmit: function()
	{
		//Inicializa el objeto de los argumentos extra
		this.argumentExtraSubmit={};

		//Obtiene los valores dinámicos
		var cmbEntiFin=this.getComponente('id_enti_fin');
		var aux=cmbEntiFin.store.getById(cmbEntiFin.getValue());

		var cmbAgencia=this.getComponente('id_agencia');
		var aux1=cmbAgencia.store.getById(cmbAgencia.getValue());

		//Añade los parámetros extra para mandar por submit
		this.argumentExtraSubmit.tipoReporte='pdf';
		this.argumentExtraSubmit.titulo='facturas_anuladas';
		this.argumentExtraSubmit.desc_entidad_financiera=aux.data.id_enti_fin;
		this.argumentExtraSubmit.desc_agencia=aux1.data.id_agencia;
	}

})
</script>