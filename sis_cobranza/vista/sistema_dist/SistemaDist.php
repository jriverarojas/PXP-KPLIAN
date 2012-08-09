<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("SistemaDistAbs.php");
//header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.SistemaDist=Ext.extend(Phx.vista.SistemaDistAbs,{
	constructor:function(config)
	{
		this.maestro=config;
    	//llama al constructor de la clase padre
		Phx.vista.SistemaDist.superclass.constructor.call(this,config);
		this.init();
		
		
		//this.addButton('EntHabilitadas',{text:'Agencias Habilitadas',iconCls: 'blist',disabled:true,handler:EntHabilitadas,tooltip: '<b>Entidades - Agencias Habilitadas'});
		this.addButton('ImportarClientes',{text:'Importar Clientes',iconCls: 'blist',disabled:true,handler:ImClientes,tooltip: '<b>Importar Clientes'});
		this.addButton('ImportarFacturacion',{text:'Importar Facturacion',iconCls: 'blist',disabled:true,handler:ImFacturacion,tooltip: '<b>Importar Facturaci�n'});
		this.addButton('RepSistDist',{text:'Sistemas Dist.',iconCls: 'blist',disabled:false,handler:repSistDist,tooltip: '<b>Imprimir listado Sistemas de Distribici�n'});
		
		/*function EntHabilitadas()
		{					
			var rec=this.sm.getSelected();
			
			//console.log('rec del sensor',rec)

			Phx.CP.loadWindows('../../../sis_cobranza/vista/sistema_dist_agencia/SistemaDistAgencia.php',
					'Agencias Habilitadas',
					{
						modal:true,
						width:900,
						height:400
				    },rec.data,this.idContenedor,'SistemaDistAgencia')			
		}*/
		function ImClientes()
		{		alert('aaaaaaaaaaaa')				
			var data_id_sistema_dist=this.sm.getSelected().data.id_sistema_dist;
			var data_conexion=this.sm.getSelected().data.conexion;
			var aaa=this
			Ext.Msg.confirm('Confirmaci�n','Esta seguro de importar todos los datos de la facturacion del sistema de distribucion seleccionado?',function(btn,b,c,d){
				
				console.log('entra en el boton',btn,b,c,d, this,aaa)
				if(btn=='yes'){
					console.log('entra al yes');
					Phx.CP.loadingShow();
					Ext.Ajax.request({
						// form:this.form.getForm().getEl(),
						url:'../../sis_cobranza/control/SistemaDist/importarClientes',
						params:{'id_sistema_dist':data_id_sistema_dist,'conexion':data_conexion},
						success:aaa.successSinc,
						failure: aaa.conexionFailure,
						timeout:10000000,
						scope:aaa
					});	
				}
			})
		}
		function ImFacturacion()
		{			
			alert('aaaaaaaaaaaa')		
			var data_id_sistema_dist=this.sm.getSelected().data.id_sistema_dist;
			var data_conexion=this.sm.getSelected().data.conexion;
			var aaa=this
			
			//if(confirm("Esta seguro de importar todos los datos de la facturacion del sistema de distribución seleccionado?")){
			Ext.Msg.confirm('Confirmación','¿Esta seguro de importar todos los datos de la facturacion del sistema de distribución seleccionado?',function(btn,b,c,d){
				console.log('entra en el boton',btn,b,c,d, this,aaa)
				alert('aaaaaaaaaaaa')
				if(btn=='yes'){
					Phx.CP.loadingShow();
					Ext.Ajax.request({
						// form:this.form.getForm().getEl(),
						url:'../../sis_cobranza/control/SistemaDist/importarFacturacion',
						params:{'id_sistema_dist':data_id_sistema_dist,'conexion':data_conexion},
						success:aaa.successSinc,
						failure: aaa.conexionFailure,
						timeout:aaa,
						scope:aaa
					});
				}				
			})
		}

		function repSistDist(){					
			window.open('http://10.172.0.11/web/sis_cobranza/vista/_reportes/sistema_dist/rep_sistema_dist.php');
		}

		
		this.load({params:{start:0, limit:50}})
	},
	successSinc:function(resp){
		
		console.log('LLEGAAAAAAAAAAAAA')
			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
			
		},			 
	/*east:{
		  url:'../../../sis_cobranza/vista/sistema_dist_usuario/SistemaDistUsuario.php',
		  title:'Usuarios Habilitados', 
		  width:'40%',
		  cls:'SistemaDistUsuario'
		 },
	south:{
		  url:'../../../sis_cobranza/vista/cliente/Cliente.php',
		  title:'Clientes', 
		  height:'40%',
		  cls:'Cliente'
		 },*/
		 tabsouth:[
	     {
		  url:'../../../sis_cobranza/vista/sistema_dist_usuario/SistemaDistUsuario.php',
		  title:'Usuarios Habilitados', 
		  //width:'50%',
		  height:'50%',
		  cls:'SistemaDistUsuario'
		 },
		  {
		  url:'../../../sis_cobranza/vista/sistema_dist_agencia/SistemaDistAgencia.php',
		  title:'Agencias Habilitadas', 
		  //width:'50%',
		  height:'50%',
		  cls:'SistemaDistAgencia'
		 },
	    {
		  url:'../../../sis_cobranza/vista/cliente/Cliente.php',
		  title:'Clientes', 
		  height:'50%',
		  cls:'Cliente'
		 }]	,  
		 
		 
		 
	//sobre carga de funcion
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			//this.getBoton('EntHabilitadas').enable();
			this.getBoton('ImportarClientes').enable();
			this.getBoton('ImportarFacturacion').enable(); 
			Phx.vista.SistemaDist.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		