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
Phx.vista.RepFacturasAnuladas=Ext.extend(Phx.frmInterfaz,{
	Atributos:[
	       	{
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
	       	},
	       	{
		       	config:{
		       		id: 'fecha_ini_'+this.idContenedor+'_RepFacturasAnuladas',
		       		name:'fecha_ini',
		       		fieldLabel:'Fecha Inicio',
		       		allowBlank:false,
		       		vtype: 'daterange',
		       		endDateField:'fecha_fin_'+this.idContenedor+'_RepFacturasAnuladas',
		       		format:'d-m-Y'
		       		
	       		},
	       		type:'DateField'
	       	},
	       	{
		       	config:{
	       			id: 'fecha_fin_'+this.idContenedor+'_RepFacturasAnuladas',
		       		name:'fecha_fin',
		       		fieldLabel:'Fecha Fin',
		       		allowBlank:false,
		       		vtype: 'daterange',
		       		startDateField:'fecha_ini_'+this.idContenedor+'_RepFacturasAnuladas',
		       		format:'d-m-Y'
	       		},
	       		type:'DateField'
	       	}
	],
	title:'Facturas Anuladas',
	ActSave:'../../sis_cobranza/control/FacturaCob/repFacturasAnul',
	topBar:true,
	botones:false,
	labelSubmit:'Imprimir',
	tooltipSubmit:'<b>Generar reporte</b>',
	borientacion:true,
	bformato:true,
	btamano:true,
	constructor: function(config){
		Phx.vista.RepFacturasAnuladas.superclass.constructor.call(this,config);
		this.init();
		this.iniciarEventos();
	},
	iniciarEventos:function(){
			this.getComponente('id_sistema_dist').on('select',function(s,r,i){
			var cmbCajero=this.getComponente('id_cajero');
			cmbCajero.store.baseParams.id_sistema_dist=r.data.id_sistema_dist;
			cmbCajero.reset();
			cmbCajero.modificado=true;
		},this);
	},
	tipo:'reporte',
	clsSubmit:'bprint',

	agregarArgsExtraSubmit: function(){
		//Inicializa el objeto de los argumentos extra
		this.argumentExtraSubmit={};

		//Obtiene los valores dinámicos
		var cmbSistDist=this.getComponente('id_sistema_dist');
		var aux=cmbSistDist.store.getById(cmbSistDist.getValue());

		var cmbCajero=this.getComponente('id_cajero');
		var aux1=cmbCajero.store.getById(cmbCajero.getValue());

		//Añade los parámetros extra para mandar por submit
		this.argumentExtraSubmit.titulo='facturas_anuladas';
		this.argumentExtraSubmit.sistema_dist=aux.data.nombre;
		this.argumentExtraSubmit.cajero=aux1.data.cajero;
	}

})
</script>