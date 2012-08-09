<?php
/**
*@package pXP
*@file gen-TipoSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:35
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoSensor=Ext.extend(Phx.gridInterfaz,{
	genTable:function(){
		
			var data=this.sm.getSelected().data.id_tipo_sensor;
			Phx.CP.loadingShow();
			Ext.Ajax.request({
				// form:this.form.getForm().getEl(),
				
				url:'../../sis_hidrologia/control/TipoSensor/genTable',
				params:{'id_tipo_sensor':data},
				success:this.successGen,
				failure: this.conexionFailure,
				timeout:this.timeout,
				scope:this
			});
			// _CP.loadWindows('../../../sis_legal/vista/garantia/garantia.php','Garantia',{width:800,height:500},this.sm.getSelected().data,this.idContenedor);
	},
	successGen:function(resp){
		Phx.CP.loadingHide();
		var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
		if(!reg.ROOT.error){
			alert(reg.ROOT.detalle.mensaje)
			
		}else{
			alert('ocurrio un error durante el proceso')
		}
		this.reload();
			
	},

	constructor:function(config){
		//alert('llega');
		this.maestro=config.maestro;
		//alert('llega1');
    	//llama al constructor de la clase padre
		Phx.vista.TipoSensor.superclass.constructor.call(this,config);
		this.addButton('generartable',{text:'Crear',iconCls: 'blist',disabled:true,handler:this.genTable,tooltip: '<b>Crear</b><br/>Crea las tablas para el tipo de sensor '});
		
		
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_sensor'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'nombre_sensor',
				fieldLabel: 'Nombre Sensor',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.nombre_sensor',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Código',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'abreviacion',
				fieldLabel: 'Abreviación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.abreviacion',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*
		{
			config:{
				name: 'tipo_dato',
				fieldLabel: 'Tipo dato',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:25
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.tipo_dato',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
			
		{
			config:{
				name: 'equivalente_hidra',
				fieldLabel: 'equivalente_hidra',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.equivalente_hidra',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		{
			config:{
				name: 'descrip',
				fieldLabel: 'Descripción',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.descrip',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_ts',
				fieldLabel: 'Estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'tipsen.estado_ts',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
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
			filters:{pfiltro:'tipsen.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
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
			filters:{pfiltro:'tipsen.fecha_reg',type:'date'},
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
			filters:{pfiltro:'tipsen.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Tipo Sensor',
	ActSave:'../../sis_hidrologia/control/TipoSensor/insertarTipoSensor',
	ActDel:'../../sis_hidrologia/control/TipoSensor/eliminarTipoSensor',
	ActList:'../../sis_hidrologia/control/TipoSensor/listarTipoSensor',
	id_store:'id_tipo_sensor',
	fields: [
		{name:'id_tipo_sensor', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'abreviacion', type: 'string'},
		{name:'tipo_dato', type: 'string'},
		{name:'unidad_medida', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'equivalente_hidra', type: 'string'},
		{name:'descrip', type: 'string'},
		{name:'nombre_medida', type: 'string'},
		{name:'nombre_sensor', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'estado_ts', type: 'string'}
	],
	sortInfo:{
		field: 'id_tipo_sensor',
		direction: 'ASC'
	},
	south:{
		  url:'../../../sis_hidrologia/vista/tipo_columna_sensor/TipoColumnaSensor.php',
		  title:'Tipo Columna Sensor', 		 
		  height:'50%',
		  cls:'TipoColumnaSensor'
	},
	bdel:true,
	bsave:true,
	
		preparaMenu:function(tb)
		{
			this.getBoton('generartable').enable();
	        Phx.vista.TipoSensor.superclass.preparaMenu.call(this,tb);
	        var data = this.getSelectedData();
	        if(data.estado_ts == 'generado')
	        {
	        	this.getBoton('generartable').disable();
	        }
			return tb
		},
		liberaMenu:function(tb)
		{
			this.getBoton('generartable').disable();
			Phx.vista.TipoSensor.superclass.liberaMenu.call(this,tb)
			return tb
		}
	}
)
</script>
		
		