<?php
/**
*@package pXP
*@file gen-Localizacion.php
*@author  (rac)
*@date 14-06-2012 03:46:45
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Localizacion=Ext.extend(Phx.arbInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Localizacion.superclass.constructor.call(this,config);
		this.init();
		
		this.tbar.items.get('b-new-'+this.idContenedor).disable()

	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_localizacion'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'id_localizacion_fk',
				inputType:'hidden',
				labelSeparator:''
				
			},
			type:'Field',
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'codigo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'loc.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
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
			filters:{pfiltro:'loc.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'nombre',
				fieldLabel: 'nombre',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:150
			},
			type:'TextField',
			filters:{pfiltro:'loc.nombre',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'ubicacion',
				fieldLabel: 'ubicacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:500
			},
			type:'TextField',
			filters:{pfiltro:'loc.ubicacion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'latitud',
				fieldLabel: 'LAtitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'loc.latitud',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'longitud',
				fieldLabel: 'Longitud',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'loc.longitud',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'coordenadas',
				fieldLabel: 'coordenadas',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:200
			},
			type:'TextField',
			filters:{pfiltro:'loc.coordenadas',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'desc_ubicacion',
				fieldLabel: 'desc_ubicacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:2000
			},
			type:'TextField',
			filters:{pfiltro:'loc.desc_ubicacion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
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
			type:'NumberField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'loc.fecha_reg',type:'date'},
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
			type:'NumberField',
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
			filters:{pfiltro:'loc.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Localizacion',
	ActSave:'../../sis_mantenimiento/control/Localizacion/insertarLocalizacion',
	ActDel:'../../sis_mantenimiento/control/Localizacion/eliminarLocalizacion',
	ActList:'../../sis_mantenimiento/control/Localizacion/listarLocalizacionArb',
	id_store:'id_localizacion',
	textRoot:'LOCALIZACIONES',
	id_nodo:'id_localizacion',
	id_nodo_p:'id_localizacion_fk',
	
	fields: [
	    'id',
	    'tipo_meta',
		{name:'id_localizacion', type: 'numeric'},
		{name:'codigo', type: 'string'},
		{name:'estado_reg', type: 'string'},
		{name:'nombre', type: 'string'},
		{name:'id_localizacion_fk', type: 'numeric'},
		{name:'ubicacion', type: 'string'},
		{name:'coordenadas', type: 'string'},
		{name:'desc_ubicacion', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	east:{
		  url:'../../../sis_mantenimiento/vista/localizacion/mapaLocalizacion.php',
		  title:'Ubicación', 
		  width:'50%',
		  cls:'mapaLocalizacion'
		 },
	
	sortInfo:{
		field: 'id_localizacion',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	rootVisible:true,
	
	preparaMenu:function(n){
			//si es una nodo tipo carpeta habilitamos la opcion de nuevo
							
			if(n.attributes.tipo_nodo == 'hijo' || n.attributes.tipo_nodo == 'raiz' || n.attributes.id == 'id'){
					this.tbar.items.get('b-new-'+this.idContenedor).enable()
				}
				else {
					this.tbar.items.get('b-new-'+this.idContenedor).disable()
				}
			
		
			// llamada funcion clace padre
			Phx.vista.Localizacion.superclass.preparaMenu.call(this,n)
		},
		
		EnableSelect:function(n){
	    var nivel = n.getDepth();
		var direc = this.getNombrePadre(n)
		if(direc){
			Phx.CP.getPagina(this.idContenedor+'-east').ubicarPos(direc,nivel)
			Phx.vista.Localizacion.superclass.EnableSelect.call(this,n)
		}
		
	},
	
	getNombrePadre:function(n){
		var direc 
		
		
		var padre = n.parentNode;
		
		
		if(padre){
			if(padre.attributes.id!='id'){
			   direc = n.attributes.nombre +' - '+ this.getNombrePadre(padre)
			   return direc;
			}else{
				
				return n.attributes.nombre;
			}
		}
		else{
				return undefined;
		}

		
	 }
	
	
	
	
	
	}	
)
</script>
		
		