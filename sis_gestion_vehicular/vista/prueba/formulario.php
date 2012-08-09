<?php
/**
*@package pXP
*@file gen-TipoEvento.php
*@author  (prueba1)
*@date 13-10-2011 11:22:31
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.formulario=Ext.extend(Phx.frmInterfaz,{
    topBar:true,


	constructor:function(config){
		this.maestro=config.maestro;
		
		Phx.vista.formulario.superclass.constructor.call(this,config);
		
		
		this.init();	
		this.loadValoresIniciales()	
		
		
    	/*//llama al constructor de la clase padre
		Phx.vista.TipoEvento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})*/
	
	   this.tbar.add({
			icon: '../../../lib/imagenes/a_xp.png',
			//cls: 'x-btn-icon',
			disabled :false,
			handler:this.verMapa,
			scope:this
		})
		
				this.datos= new Ext.data.JsonStore({

	    					url:'../../sis_gestion_vehicular/control/ActivoFijoRastreo/obtenerCoordenadas',
	    					isUpload:false,
	    					id: 'id_activo_fijo',
	    					root: 'datos',
	    					/*sortInfo:{
	    						field: 'nombre_completo1',
	    						direction: 'ASC'
	    					},*/
	    					totalProperty: 'total',
	    					fields:  [
									{name:'id_activo_fijo_rastreo', type: 'numeric'},
									{name:'estado_reg', type: 'string'},
									{name:'fecha_servidor', type: 'date', dateFormat:'Y-m-d H:i:s'},
									{name:'aux2', type: 'string'},
									{name:'fecha_satelite', type: 'date', dateFormat:'Y-m-d H:i:s'},
									{name:'curso', type: 'numeric'},
									{name:'fecha_hora', type: 'numeric'},
									{name:'aux1', type: 'string'},
									{name:'odometro', type: 'numeric'},
									{name:'mensaje', type: 'string'},
									{name:'hora_gps', type: 'numeric'},
									{name:'velocidad', type: 'numeric'},
									{name:'advisories', type: 'string'},
									{name:'longitud', type: 'numeric'},
									{name:'dia', type: 'numeric'},
									{name:'aux3', type: 'string'},
									{name:'punto_cercano', type: 'string'},
									{name:'id_Activo_fijo', type: 'numeric'},
									{name:'altitud', type: 'numeric'},
									{name:'ciudad', type: 'string'},
									{name:'numero_actualizado', type: 'numeric'},
									{name:'estado', type: 'string'},
									{name:'aux4', type: 'string'},
									{name:'latitud', type: 'numeric'},
									{name:'events', type: 'numeric'},
									{name:'mes', type: 'numeric'},
									{name:'anio', type: 'numeric'},
									{name:'calle', type: 'string'},
									{name:'id_usuario_reg', type: 'numeric'},
									{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
									{name:'id_usuario_mod', type: 'numeric'},
									{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
									{name:'usr_reg', type: 'string'},
									{name:'usr_mod', type: 'string'},
									
								],
	    					// turn on remote sorting
	    					remoteSort: true
	    				})
	    				
	    				
	    				this.datos.on('exception',this.conexionFailure)
	    				
	    				this.datos.on('load',this.successSave)
		
	
	
	},
	
	verMapa:function(){
		
			if(this.form.getForm().isValid()){

			Phx.CP.loadingShow();
    		// arma json en cadena para enviar al servidor
			
			//Ext.apply(this.argumentSave,o.argument);
         /*	Ext.Ajax.request({
						url:'../../sis_gestion_vehicular/control/ActivoFijoRastreo/obtenerCoordenadas',
						//params:this.form.getForm().getValues(),
						params:this.getValForm,
						success:this.successSave,
						isUpload:false,
						//argument:{foo:'prueba'},
		
						failure: this.conexionFailure,
						timeout:this.timeout,
						scope:this
					});
					*/
	
	    				//console.log(this.getValForm())
	    				this.datos.load({params:this.getValForm()})
	    				
	    				//this.datos.load()
	    				
	    				
	    				
	    				
	    				Phx.CP.getPagina(this.idContenedor+'-east').mostrarDatos(this.datos);
	    				
	    				
	    				
	    				
					
			


		}
		
		
		
		
	},
	
	successSave:function(resp){
		
		Phx.CP.loadingHide();
		
		console.log('desde maopa',resp)
		
		
		
		
		
		
		
		
	},
	
			
	Atributos:[
		
		{
			config:{
				name: 'fecha_ini',
				fieldLabel: 'Fecha Ini.',
				allowBlank: true,
				anchor: '80%'
			},
			type:'DateField',
			id_grupo:1
			
		},
		{
			config:{
				name: 'fecha_fin',
				fieldLabel: 'Fecha Fin',
				allowBlank: true,
				anchor: '80%'
				
			},
			type:'DateField',			
			id_grupo:1
		},
		{
			config:{
				name: 'activo_fijo',
				fieldLabel: 'Vehiculo',
				allowBlank: true,
				anchor: '80%',
				maxLength:4
			},
			type:'NumberField',
			
			id_grupo:1,
			
			
		}		
	],
	title:'tipo_evento',
	//ActSave:'../../sis_gestion_vehicular/control/TipoEvento/insertarTipoEvento',
	
	

	//cargar una vista hijo
	east:{
		  url:'../../../sis_gestion_vehicular/vista/prueba/prueba.php',
		  title:'Evento', 		 
		  height:'60%',
		  cls:'prueba'
	},

	
	bsave:false,
	bedit:false,
	bdel:false,
	bact:true,
    bexcel:false
	}
)
</script>