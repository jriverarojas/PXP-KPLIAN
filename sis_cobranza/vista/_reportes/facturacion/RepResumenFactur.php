<?php
/**
*@package pXP
*@file RepResumenFactur.php
*@author  (jmita)
*@date 20-01-2012
*@description Archivo con la interfaz para generación de reporte
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.RepResumenFactur=Ext.extend(Phx.frmInterfaz,{
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
					name:'periodo',
					fieldLabel:'Periodo',
					typeAhead: true,
					allowBlank:false,
		    		triggerAction: 'all',
		    		emptyText:'Seleccione Periodo...',
		    		selectOnFocus:true,
					mode:'local',
					store:new Ext.data.ArrayStore({
		        	fields: ['ID', 'valor'],
		        	data :	[['1','Enero'],	
		        			['2','Febrero'],
		        			['3','Marzo'],
		        			['4','Abril'],
		        			['5','Mayo'],
		        			['6','Junio'],
		        			['7','Julio'],
		        			['8','Agosto'],
		        			['9','Septiembre'],
		        			['10','Octubre'],
		        			['11','Noviembre'],
		        			['12','Diciembre']]
		        				
		    		}),
					valueField:'ID',
					displayField:'valor',
					width:150,
	       		},
	       		type:'ComboBox'
	       	},
	       	{
	       		config:{
				name:'gestion',
				fieldLabel:'Gestión',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Gestión...',
	    		selectOnFocus:true,
				mode:'local',
				store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['2000','2000'],	
	        			['2001','2001'],
	        			['2002','2002'],
	        			['2003','2003'],
	        			['2004','2004'],
	        			['2005','2005'],
	        			['2006','2006'],
	        			['2007','2007'],
	        			['2008','2008'],
	        			['2009','2009'],
	        			['2010','2010'],
	        			['2011','2011'],
	        			['2012','2012'],
	        			['2013','2013'],
	        			['2014','2014'],
	        			['2015','2015'],
	        			['2016','2016'],
	        			['2017','2017'],
	        			['2018','2018'],
	        			['2019','2019'],
	        			['2020','2020'],
	        			['2021','2021']]
	    		}),
				valueField:'ID',
				displayField:'valor',
				width:150,
       		},
       		type:'ComboBox'
	       	}
	],
	title:'Resumen de Facturación',
	ActSave:'../../sis_cobranza/control/FacturaCob/repFacturasAnul',
	topBar:true,
	botones:false,
	labelSubmit:'Imprimir',
	tooltipSubmit:'<b>Generar reporte</b>',
	borientacion:true,
	bformato:true,
	btamano:true,
	constructor: function(config){
		Phx.vista.RepResumenFactur.superclass.constructor.call(this,config);
		this.init();
		this.iniciarEventos();
	},
	iniciarEventos:function(){/*
			this.getComponente('id_sistema_dist').on('select',function(s,r,i){
			var cmbCajero=this.getComponente('id_cajero');
			cmbCajero.store.baseParams.id_sistema_dist=r.data.id_sistema_dist;
			cmbCajero.reset();
			cmbCajero.modificado=true;
		},this);*/
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
		//var aux1=cmbCajero.store.getById(cmbCajero.getValue());

		//Añade los parámetros extra para mandar por submit
		this.argumentExtraSubmit.tipoReporte='pdf';
		this.argumentExtraSubmit.titulo='facturas_anuladas';
		this.argumentExtraSubmit.sistema_dist=aux.data.nombre;
		//this.argumentExtraSubmit.cajero=aux1.data.cajero;
	}

})
</script>