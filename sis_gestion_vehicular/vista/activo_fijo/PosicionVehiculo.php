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
Phx.vista.PosicionVehiculo=Ext.extend(Phx.gmapInterfaz,{
	autoLoad :true,
	bact:true,
	combo_segundos:new Ext.form.ComboBox({
	        store:['detener','5','8','10','15','30','45','60'],
	        typeAhead: true,
	        mode: 'local',
	        triggerAction: 'all',
	        emptyText:'Periodo...',
	        selectOnFocus:true,
	        width:135
	    }),
					       		
	combo_pro : new Ext.form.AwesomeCombo({
			    name:'id_activo_fijo',
   				fieldLabel:'Vehiculos',
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
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				enableMultiSelect:true     			
                }),
	     mostrarDatos:function(datos){
		
	
		
	    },
	    
	    Atributos:[
	    ],
		

	constructor:function(config){
		this.maestro=config.maestro;
		
		
		Phx.vista.PosicionVehiculo.superclass.constructor.call(this,config);
		
		this.store= new Ext.data.JsonStore({
          			url: '../../sis_gestion_vehicular/control/ActivoFijoUltimoRegistro/listarActivoFijoRastreoDetUltimo',
   					id: 'id_activo_fijo_rastreo',
   					root: 'datos',
   				    totalProperty: 'total',
   					fields: ['id_ultimo_registro',
							'id_funcionario',
							'fecha_satelite',
							'curso',
							'velocidad',
							'id_activo_fijo',
							'longitud',
							'latitud',
							'desc_funcionario1',
							'punto_cercano']});
			//evento de error
			this.store.on('loadexception',this.conexionFailure);
			
			this.combo_segundos.on('select',evento_combo,this);
    	    this.combo_segundos.setValue('30');
    	    
    	    //TIMER
    	    this.timer_id=Ext.TaskMgr.start({
		    run: Ftimer,
		    interval:parseInt(this.combo_segundos.getValue())*1000,
		    scope:this
		    });
		    
			function evento_combo(){
	    		Ext.TaskMgr.stop(this.timer_id);
	    		if(this.combo_segundos.getValue()!='detener'){
		    		this.timer_id=Ext.TaskMgr.start({
				    	run: Ftimer,
				    	interval:parseInt(this.combo_segundos.getValue())*1000,
				    	scope:this
					});
	    		}  		
	    	}
	    	function Ftimer(){
	    		if(this.combo_pro.getValue())
				{
					this.store.baseParams.id_activo_fijo=this.combo_pro.getValue();
					this.store.load({params:{}});
				}
	    		
	    	 }
	    	//this.load({params:{start:0, limit:50}});
		    	
				//coloca elementos en la barra de herramientas
			this.tbar.add(this.combo_pro);
		   	this.tbar.add(' Actualizar cada:');
		   	this.tbar.add(this.combo_segundos);
   		
   		
		
   		
		
		//coloca los marcadores en el mapa
		this.store.on('load',function(store,record,op){
			
			this.colocarMarcadores({store:store,  lat:'latitud',  lon:'longitud' })
			//this.colocarMarcadoresRuta({store:store,  lat:'latitud',  lon:'longitud' })
			
		},this);
		
	 
	},
	

	
	
	//sobrecarga boton de actualizacion
	onButtonAct:function(){
		
		if(this.combo_pro.getValue())
		{
			this.store.baseParams.id_activo_fijo=this.combo_pro.getValue();
			this.store.load({params:{}});
		}
		else
		{
			alert('Son necesarios los parametros de filtro, Vehiculo, Inicio y Fin')
			
		}

	},
	
	onReloadPage:function(dat){
		console.log(dat)
		
		this.ubicarCoordenada(dat.latitud,dat.longitud,true)
		
	},
		
	ubicarPos:function(direc,zoom){
			var myMapa = this.gm.getMap()
			var address = direc;
			
			
			if(!this.marker){
			this.marker = new google.maps.Marker({
			            map: myMapa 
			        });
			        
			}  
			var marker = this.marker      
			        
			this.geocoder.geocode({ 'address': address}, function(results, status) {
			      if (status == google.maps.GeocoderStatus.OK) {
			        myMapa.setCenter(results[0].geometry.location);
			        myMapa.setZoom(zoom*3)
			        marker.setPosition(results[0].geometry.location)
			        
			      } else {
			        alert("No se pudo encontrar la direcci�n por este motivo: " + status);
			      }
			    });
		
		
	},
	
	ubicarCoordenada:function(lat,lon){
		
		var myMapa = this.gm.getMap()
		
		var pos=new google.maps.LatLng(lat,lon,true)
			
			
			if(!this.marker){
			this.marker = new google.maps.Marker({
			            map: myMapa 
			        });
			        
			}  
		   var marker = this.marker 
		 
		
		
		 myMapa.setCenter(pos)
		 marker.setPosition(pos)
		 myMapa.setZoom(10)
		
		
	},
	
	getMarker:function(){
		return this.marker 
		
	}
	
		
	
	})
</script>