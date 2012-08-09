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
Phx.vista.mapaEstacion2=Ext.extend(Phx.gmapInterfaz,{
	autoLoad :true,
	
		mostrarDatos:function(datos){
		
		
	    },
	    
	    Atributos:[
	    ],
		

	constructor:function(config){
		this.maestro=config.maestro;
		
		
		Phx.vista.mapaEstacion2.superclass.constructor.call(this,config);
		
		this.store= new Ext.data.JsonStore({
          			url: '../../sis_hidrologia/control/Estacion/listarEstacionProyectos',
   					id: 'id_estacion',
   					root: 'datos',
   					sortInfo:{
   						field: 'id_estacion',
   						direction: 'ASC'
   					},
   					totalProperty: 'total',
   					fields: [
										{name:'id_estacion', type: 'numeric'},
										{name:'altitud', type: 'string'},
										{name:'codigo', type: 'string'},
										{name:'comentario', type: 'string'},
										{name:'direccion', type: 'string'},
										{name:'estado', type: 'string'},
										{name:'estado_reg', type: 'string'},
										{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
										{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
										{name:'admin', type: 'string'},
										{name:'cuenca', type: 'string'},
										{name:'lugar', type: 'string'},
										{name:'rio', type: 'string'},
										'id_administrador',
										'id_cuenca',
										'id_lugar',
										{name:'id_rio'},
										{name:'latitud_carto', type: 'string'},
										{name:'longitud_carto', type: 'string'},
										{name:'latitud', type: 'string'},
										{name:'longitud', type: 'string'},
										{name:'observador', type: 'string'},
										{name:'superficie_cuenca', type: 'numeric'},
										{name:'teletransmision', type: 'string'},
										{name:'tipo', type: 'string'},
										{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
										{name:'id_usuario_reg', type: 'numeric'},
										{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
										{name:'id_usuario_mod', type: 'numeric'},
										{name:'usr_reg', type: 'string'},
										{name:'usr_mod', type: 'string'},
										{name:'id_proyectos'},
									],
   					// turn on remote sorting
   					remoteSort: true
   			});
	
    
        
		
	
		
		  
		var combo_pro = new Ext.form.AwesomeCombo({
			   name:'id_proyectos',
   				fieldLabel:'Proyecto',
   				allowBlank:true,
   				emptyText:'Proyectos...',
   				store: new Ext.data.JsonStore({
          			url: '../../sis_parametros/control/Proyecto/listarProyecto',
   					id: 'id_proyecto',
   					root: 'datos',
   					sortInfo:{
   						field: 'nombre_proyecto',
   						direction: 'ASC'
   					},
   					totalProperty: 'total',
   					fields: ['id_proyecto','nombre_proyecto'],
   					// turn on remote sorting
   					remoteSort: true,
   					baseParams:{par_filtro:'nombre_proyecto',hidro:'si'}
   					
   				}),
   				valueField: 'id_proyecto',
   				displayField: 'nombre_proyecto',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				minChars:2,
       			enableMultiSelect:true

   			});
   			
   			
   		
   		
   		this.tbar.add(combo_pro);
		
		combo_pro.on('select',function (combo, record, index){	
			
			console.log('record',record)
			this.store.baseParams.id_proyectos=combo.getValue();	
			console.log(combo.getValue())
			this.store.load({params:{start:0, limit:250}});
			
			console.log()
			
			
			
		   //combo.store.baseParams.id_sistema_dist=combo_sistema_dist.getValue();	
		   //combo.load({params:{start:0, limit:50}});
		},this);	
		
		
		
		combo_pro.on('clearcmb',function (combo, record, index){	
			console.log('clearcmb')
			this.quitarMarcadores()
		},this);
		
		
		this.store.on('load',function(store,record,op){
			
			console.log('0000000000000',record)
			
			this.colocarMarcadores({store:store,  lat:'latitud',  lon:'longitud' })

			
		},this);
		
		
		
		
		
		
		
		
		
    	/*//llama al constructor de la clase padre
		Phx.vista.TipoEvento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})*/
    	
    	/* this.gm = new  Ext.ux.GMapPanel({
    	 	region: 'center',
    	 	containerScroll: true,
                border: false,
                //layout: 'fit',
               forceLayout:true,
               mapConfig:{ 
				 mapTypeId: google.maps.MapTypeId.ROADMAP,
		      },
       	   //autoHeight:true,
       	   autoDestroy:true,
       	   tbar:this.tbar,
       	   //autoWidth:true,
            plain: true,
                autoShow:true,
             
                 border:true,
                gmapType: 'map',
                //closeAction: 'hide',
                //width:400,
                //height:400,
                //x: 40,
                //y: 60
               
                
            })*/
    	/*
    	 this.gm = new  Ext.ux.GMapPanel({
                layout: 'fit',
                title: 'GMap Window',
                closeAction: 'hide',
                width:400,
                height:400,
                x: 40,
                y: 60,
                items: {
                    xtype: 'gmappanel',
                    zoomLevel: 14,
                    gmapType: 'map',
                   // mapConfOpts: ['enableScrollWheelZoom','enableDoubleClickZoom','enableDragging'],
                   // mapControls: ['GSmallMapControl','GMapTypeControl','NonExistantControl'],
                    /*setCenter: {
						//geoCodeAddr: '4 Yawkey Way, Boston, MA, 02215-3409, USA',
						
						lat: -17.5384998321533,
	                    lng: -63.1627655029297,
						
                        marker: {title: 'Fenway Park'}
		                        },
                    markers: [{
                       lat: -17.5384998321533,
	                    lng: -63.1627655029297,
                        
                        //lat: -17,5384998321533,
	                    //lng: -63,1627655029297,
                        
                        
                        marker: {title: 'zzzzzzzzzzzzzzz zzzzzzzzzz'}
                   // }]
                }
            });*/
            
          
    	this.regiones = new Array();
		//agrega el treePanel
		this.regiones.push(this.gm);
		/*arma los panles de ventanas hijo*/
	    this.definirRegiones();
    	
            
           // this.panel.add(this.gm)
            
            console.log(this.gm.isVisible())
            //this.gm.syncSize() 
             console.log(this.gm.isVisible())
            
            this.gm.expand(true);
             console.log(this.gm.isVisible())
             
             
             this.panel.doLayout(true,true)
            
            
        //this.gm.gmap = new google.maps.Map( this.idContenedor,  this.gm.defConfig);
        //this.gm.gmap.setCenter(new google.maps.LatLng(18.2, -66.4)) 
            
            
            

            // this.gm.render();
            //this.gm.gmap.setCenter(new google.maps.LatLng(18.2, -66.4));
           
          //  this.gm.render();
            /*
          
           	this.a = [{
                        lat: 42.339641,
                        lng: -71.094224,
                        marker: {title: 'XXXXXXXXXXXXXXXXXXXXXX'},
                        listeners: {
                            click: function(e){
                                Ext.Msg.alert('Its fine', 'and its art.');
                            }
                        }
                    }]
		
           
		
		 var point = new GLatLng(-17.5384998321533,-63.1627655029297);
         //this.gm.gmap.setCenter(point,5);   
		
		this.gm.setCenter()
            
    	this.gm.addMarkers(this.a)*/
            
		 this.geocoder = new google.maps.Geocoder();
			/*  function initialize() {
			   
			    var latlng = new google.maps.LatLng(-34.397, 150.644);
			    var myOptions = {
			      zoom: 8,
			      center: latlng,
			      mapTypeId: google.maps.MapTypeId.ROADMAP
			    }
			    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			  }*/
			
		
	
			
	
			  
			            
            
            

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