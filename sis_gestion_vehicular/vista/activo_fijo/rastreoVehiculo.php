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
Phx.vista.rastreoVehiculo=Ext.extend(Phx.gmapInterfaz,{
	autoLoad :true,
	bact:true,
	fechaIni:new Ext.form.DateField({ 
					       		allowBlank:false,
					       		width: 200,
					       		format:'d-m-Y'}),
	fechaFin :new Ext.form.DateField({allowBlank:false,
					       		width: 200,
					       		format:'d-m-Y'}),
					       		
	combo_pro : new Ext.form.ComboBox({
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
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_activo_fijo}</p><p>Placa:{placa}</p> </div></tpl>',
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
   				minChars:2       			
                }),
	     mostrarDatos:function(datos){
		
	
		
	    },
	    
	    Atributos:[
	    ],
		

	constructor:function(config){
		this.maestro=config.maestro;
		
		
		Phx.vista.rastreoVehiculo.superclass.constructor.call(this,config);
		
		this.store= new Ext.data.JsonStore({
          			url: '../../sis_gestion_vehicular/control/ActivoFijoRastreo/listarActivoFijoRastreoDet',
   					id: 'id_activo_fijo_rastreo',
   					root: 'datos',
   				    totalProperty: 'total',
   					fields: ['id_activo_fijo_rastreo',
							'id_funcionario',
							'fecha_satelite',
							'curso',
							'velocidad',
							'id_activo_fijo',
							'longitud',
							'punto_cercano',
							'altitud',
							'latitud',
							'desc_funcionario1']});
			//evento de error
			this.store.on('loadexception',this.conexionFailure);
	
             this.fechaIni.on('valid',function(f,n,o){
				this.fechaFin.setMinValue(f.getValue())
			},this);
			
			this.fechaFin.on('valid',function(f,n,o){
				this.fechaIni.setMaxValue(f.getValue())
			},this);
		
		//coloca elementos en la barra de herramientas
		this.tbar.add(this.combo_pro);
   		this.tbar.add(' Inicio:');
   		this.tbar.add(this.fechaIni);
   		this.tbar.add(' Fin:');
   		this.tbar.add(this.fechaFin);
		
		//coloca los marcadores en el mapa
		this.store.on('load',function(store,record,op){
			
			this.colocarMarcadores({store:store,  lat:'latitud',  lon:'longitud' })
			//this.colocarMarcadoresRuta({store:store,  lat:'latitud',  lon:'longitud' })
			
		},this);
		
	 
	},
	//sobrecarga boton de actualizacion
	onButtonAct:function(){
		
		if(this.combo_pro.getValue() && this.fechaIni.getValue() && this.fechaFin.getValue())
		{
			this.store.baseParams.id_activo_fijo=this.combo_pro.getValue();
			this.store.baseParams.fecha_ini=this.fechaIni.getValue().dateFormat('d-m-Y');
			this.store.baseParams.fecha_fin=this.fechaFin.getValue().dateFormat('d-m-Y');	
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
		
		
		//this.ubicarPos('Rio Btanco - Acre - Brasil');
		
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