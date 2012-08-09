<?php
/**
*@package pXP
*@file gen-TipoColumna.php
*@author  (mflores)
*@date 15-03-2012 10:27:40
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.TipoColumna=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.TipoColumna.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}})
	},
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_tipo_columna'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Código',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'tipcol.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		/*{
			config:{
				name: 'tipo_dato',
				fieldLabel: 'Tipo dato',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'tipcol.tipo_dato',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},*/
		
		{   
			config:
			{
				name:'tipo_dato',
				fieldLabel:'Tipo Dato',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione un tipo...',
	    		selectOnFocus:true,
	   			mode:'local',
				store:['char','bit','bytea','money','date','integer','single','double','short','long','text','float','boolean','varchar','timestamp','time','string','numeric','serial'],
				valueField:'ID',
				width:250,			
			},
			type:'ComboBox',
			filters:{pfiltro:'tipcol.tipo_dato',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
			
		/*{
   			config:{
   				name:'id_tipo_dato',
   				fieldLabel:'Tipo dato',
   				allowBlank:false,
   				emptyText:'Tipo dato...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_hidrologia/control/TipoDato/ListarTipoDato',
					id: 'id_tipo_dato',
					root: 'datos',
					sortInfo:{
						field: 'tipo_dato',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_tipo_dato','tipo_dato'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'tipo_dato'}
				}),
   				valueField: 'id_tipo_dato',
   				displayField: 'tipo_dato',
   				gdisplayField:'tipo_dato',//mapea al store del grid
   				//tpl:'<tpl for="."><div class="x-combo-list-item"><p>{simbolo}</p><p>Unidad de medida: {unidad_medida}</p> </div></tpl>',
   				hiddenName: 'id_tipo_dato',
   				forceSelection:true,
   				typeAhead: true,
       			triggerAction: 'all',
       			lazyRender:true,
   				mode:'remote',
   				pageSize:10,
   				queryDelay:1000,
   				width:250,
   				gwidth:280,
   				minChars:2,
   				//turl:'../../../sis_seguridad/vista/persona/Persona.php',
   			    ttitle:'Tipo dato',
   			   // tconfig:{width:1800,height:500},
   			    tdata:{},
   			    tcls:'tipo_dato',
   			    pid:this.idContenedor,
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['tipo_dato']);}
   			},
   			type:'ComboBox',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'tipo_dato',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
	    },*/
		
		{
			config:{
				name: 'nombre_columna',
				fieldLabel: 'Nombre columna',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'tipcol.nombre_columna',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo_columna',
				fieldLabel: 'Tipo columna',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:50
			},
			type:'TextField',
			filters:{pfiltro:'tipcol.tipo_columna',type:'string'},
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
			filters:{pfiltro:'tipcol.estado_reg',type:'string'},
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
			filters:{pfiltro:'tipcol.fecha_reg',type:'date'},
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
			filters:{pfiltro:'tipcol.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Tipo Columna',
	ActSave:'../../sis_hidrologia/control/TipoColumna/insertarTipoColumna',
	ActDel:'../../sis_hidrologia/control/TipoColumna/eliminarTipoColumna',
	ActList:'../../sis_hidrologia/control/TipoColumna/listarTipoColumna',
	id_store:'id_tipo_columna',
	fields: [
		{name:'id_tipo_columna', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'tipo_dato', type: 'string'},
		{name:'nombre_columna', type: 'string'},
		{name:'tipo_columna', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		
	],
	sortInfo:{
		field: 'id_tipo_columna',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true
	}
)
</script>
		
		