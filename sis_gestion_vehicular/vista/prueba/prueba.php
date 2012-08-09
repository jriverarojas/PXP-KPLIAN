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
Phx.vista.prueba=Ext.extend(Phx.mapInterfaz,{
	
		mostrarDatos:function(datos){
		
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
		
              console.log(datos)
		alert('llega')
		
		
		
		
		 var point = new GLatLng(-17.5384998321533,-63.1627655029297);
         this.gm.gmap.setCenter(point,5);   
		
		//this.gm.setCenter()
		this.gm.addMarkers(this.a)
		
		
		
		
	    },
		

	constructor:function(config){
		this.maestro=config.maestro;
		
		Phx.vista.prueba.superclass.constructor.call(this,config);
		
	
		
    	/*//llama al constructor de la clase padre
		Phx.vista.TipoEvento.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})*/
    	
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
                    mapConfOpts: ['enableScrollWheelZoom','enableDoubleClickZoom','enableDragging'],
                    mapControls: ['GSmallMapControl','GMapTypeControl','NonExistantControl'],
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
                    }]*/
                }
            });
            
            
            
            
            
            this.panel.add(this.gm)
    	
    	
	
	
	
	
	}
		
	
	}
)
</script>