<?php
/**
*@package pXP
*@file gen-Operador.php
*@author  (mflores)
*@date 02-09-2011 12:20:00
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>

Phx.vista.Operador=Ext.extend(Phx.gridInterfaz,{	

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Operador.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:50}});
		
		//agregamos boton para mostrar ventana para subir fotos
		this.addButton('aSubirFoto',{text:'Subir archivo',iconCls: 'blist',disabled:true,handler:SubirFoto,tooltip: '<b>Subir archivo</b><br/>Permite actualizar la foto de la persona'});
		
		function SubirFoto()
		{					
			var rec=this.sm.getSelected();
			console.log(' rec',rec)
						
			Phx.CP.loadWindows('../../../sis_seguridad/vista/persona/subirFotoPersona.php',
			'Subir foto',
			{
				modal:true,
				width:400,
				height:150
		    },rec.data,this.idContenedor,'subirFotoPersona')
		}
	},	
	
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_operador'
			},
			type:'Field',
			form:true 
		},		
		
		{
   			config:{
   				name:'id_persona',
   				fieldLabel:'Persona',
   				allowBlank:false,
   				emptyText:'Persona...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_seguridad/control/Persona/listarPersona',
					id: 'id_persona',
					root: 'datos',
					sortInfo:{
						field: 'nombre_completo1',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_persona','nombre_completo1','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre_completo1#ci'}
				}),
   				valueField: 'id_persona',
   				displayField: 'nombre_completo1',
   				gdisplayField:'nombre_completo1',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{nombre_completo1}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_persona',
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
   				turl:'../../../sis_seguridad/vista/persona/Persona.php',
   			    ttitle:'Personas',
   			   // tconfig:{width:1800,height:500},
   			    tdata:{},
   			    tcls:'persona',
   			    pid:this.idContenedor,
   			
   				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo1']);}
   			},
   			type:'TrigguerCombo',
   			//type:'ComboRec',
   			id_grupo:0,
   			filters:{	
   				        pfiltro:'nombre_completo1',
   						type:'string'
   					},
   		   
   			grid:true,
   			form:true
       	},	
       	{
			config:{
				fieldLabel: "Foto",
				gwidth: 130,
				inputType:'file',
				name: 'foto',
				buttonText: '',	
				maxLength:150,
				anchor:'100%',
				renderer:function (value, p, record){	
							var momentoActual = new Date();
						
							var hora = momentoActual.getHours();
							var minuto = momentoActual.getMinutes();
							var segundo = momentoActual.getSeconds();
							
							hora_actual = hora+":"+minuto+":"+segundo;
							
							console.log(record.data)
							
							//return  String.format('{0}',"<div style='text-align:center'><img src = ../../control/foto_persona/"+ record.data['foto']+"?"+record.data['nombre_foto']+hora_actual+" align='center' width='70' height='70'/></div>");
							return  String.format('{0}',"<div style='text-align:center'><img src = '../../../sis_seguridad/control/foto_persona/ActionArmafoto.php?nombre="+ record.data['foto']+"&asd="+hora_actual+"' align='center' width='70' height='70'/></div>");
						},	
				buttonCfg: {
	                iconCls: 'upload-icon'
	            }
			},
			//type:'FileUploadField',
			type:'Field',
			sortable:false,
			//filters:{type:'string'},
			id_grupo:0,
			grid:true,
			form:false
		},		
		{
			config:{
				name: 'codigo',
				fieldLabel: 'Codigo',
				allowBlank: false,
				anchor: '40%',
				gwidth: 100,
				maxLength:30
			},
			type:'TextField',
			filters:{pfiltro:'tme.codigo',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name:'id_proyecto',
				fieldLabel:'Proyecto',
				allowBlank:false,
				emptyText:'Proyecto...',
				store:new Ext.data.JsonStore(
				{
					url: '../../sis_seguridad/control/Proyecto/listarProyecto',
					id: 'id_proyecto',
					root: 'datos',
					sortInfo:{
						field: 'nombre',
						direction: 'ASC'
					},
					totalProperty: 'total',
					fields: ['id_proyecto','nombre'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'nombre'}
				}),
				valueField: 'id_proyecto',
				displayField: 'nombre',
				gdisplayField:'proyecto',
				//hiddenName: 'nombre',
				forceSelection:true,
				typeAhead: true,
    			triggerAction: 'all',
    			lazyRender:true,
				mode:'remote',
				pageSize:50,
				queryDelay:500,
				width:210,
				gwidth:220,
				minChars:2,
				
				renderer:function (value, p, record){return String.format('{0}', record.data['proyecto']);}
			},
			type:'ComboBox',
			filters:{	
		        pfiltro:'proyecto',
				type:'string'
			},
			
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'fecha_presentacion',
				fieldLabel: 'Fecha de presentacion',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'ope.fecha_presentacion',type:'date'},
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
			filters:{pfiltro:'ope.estado_reg',type:'string'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
				format:'d-m-Y'
			},
			type:'DateField',
			filters:{pfiltro:'ope.fecha_reg',type:'date'},
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
			type:'TextField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
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
			filters:{pfiltro:'ope.fecha_mod',type:'date'},
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
			type:'TextField',
			filters:{pfiltro:'usu2.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	title:'Operador',
	ActSave:'../../sis_hidrologia/control/Operador/insertarOperador',
	ActDel:'../../sis_hidrologia/control/Operador/eliminarOperador',
	ActList:'../../sis_hidrologia/control/Operador/listarOperador',
	id_store:'id_operador',
	fields: [
		{name:'id_operador', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'fecha_presentacion', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_persona'},
		{name:'id_proyecto'},
		{name:'nombre_completo1', type: 'string'},
		{name:'proyecto', type: 'string'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'codigo', type: 'string'},
		{name:'foto'}
		
	],
	sortInfo:{
		field: 'id_operador',
		direction: 'ASC'
	},
	
	// sobre carga de funcion
	preparaMenu:function(tb){
		// llamada funcion clace padre
		Phx.vista.Operador.superclass.preparaMenu.call(this,tb)
		this.getBoton('aSubirFoto').enable();
	},
	
	liberaMenu:function(tb){
		// llamada funcion clace padre
		Phx.vista.Operador.superclass.liberaMenu.call(this,tb)
		this.getBoton('aSubirFoto').disable();
		
	},
	
    fileUpload:true,
	bdel:true,
	bsave:true
	}
)
</script>
		
		