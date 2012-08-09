<?php
/**
*@package pXP
*@file gen-SponsableProceso.php
*@author  (mzm)
*@date 16-11-2011 16:54:59
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ResponsableProceso=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
		
		//llama al constructor de la clase padre
		Phx.vista.ResponsableProceso.superclass.constructor.call(this,config);
		this.init();
		this.addButton('asignar_responsable',{text:'Asignar Remplazo',iconCls: 'bassign',disabled:false,handler:this.asignar_responsable,tooltip: '<b>Asignar Responsable</b><br/>Permite definir el reemplazo (crea un nuevo registro) e inactiva el reponsable seleccionado'});
		
		
		
		this.load({params:{start:0, limit:50}})
	},
			
	Grupos: [
            {
                layout: 'column',
                border: false,
                defaults: {
                   border: false
                },            
                items: [{
					        bodyStyle: 'padding-right:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Responsable de Proceso',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:0
					        }]
					    }, {
					        bodyStyle: 'padding-left:5px;padding-left:5px;',
					        items: [{
					            xtype: 'fieldset',
					            title: 'Nuevo Responsable',
					            width: 400,
					            autoHeight: true,
					            items: [],
						        id_grupo:1
					        }]
					    }
					    ]
            }
        ],
	
	
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_responsable_proceso'
			},
			type:'Field',
			form:true 
		},
		
		
		
		{
			config:{
				name:'id_funcionario',
   				fieldLabel:'Funcionario',
   				allowBlank:false,
   				emptyText:'Funcionario...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_recursos_humanos/control/Funcionario/listarFuncionario',
					id: 'id_funcionario',
					root: 'datos',
					sortInfo:{
						field: 'desc_person',
						direction:'ASC'
					},
					totalProperty: 'total',
					fields: ['id_funcionario','desc_person','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'PERSON.nombre_completo1#PERSON.ci'}
				}),
   				valueField:'id_funcionario',
   				displayField: 'desc_person',
   				gdisplayField:'nombre_completo1',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_person}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_funcionario',
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
   				
   				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo1']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'funcio.desc_funcionario1',type:'string'},
			id_grupo:0,
			grid:true,	
			form:true
		},
		{   
			config:{
				name:'tipo',
				fieldLabel:'Tipo',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione un tipo...',
	    		selectOnFocus:true,
	   			mode:'local',
				store:['rpc','rep_legal','supervisor','abogado'],
				valueField:'ID',
				width:150,			
				renderer:function (value, p, record){
								var tipo_r='';
								if(record.data.tipo=='rpc'){
									tipo_r='RPC';
								}
								if(record.data.tipo=='rep_legal'){
									tipo_r='Representante Legal';
								}
								if(record.data.tipo=='supervisor'){
									tipo_r='Supervisor';
								}
								if(record.data.tipo=='abogado'){
									tipo_r='Abogado';
								}
								return tipo_r
								//return "<div style='text-align:center'><img src = '../../../lib/imagenes/icono_dibu/dibu_"+icono+".png' align='center' width='32' height='32'/></div>"
							 }	
			   },
			type:'ComboBox',
			filters:{pfiltro:'respro.tipo',type:'string'},
			id_grupo:0,
			grid:true,
			egrid:true,
			form:true
		},
	{
			config:{
				name:'id_funcionario_',
   				fieldLabel:'Funcionario',
   				allowBlank:false,
   				emptyText:'Funcionario...',
   				store: new Ext.data.JsonStore({

					url: '../../sis_recursos_humanos/control/Funcionario/listarFuncionario',
					id: 'id_funcionario',
					root: 'datos',
					sortInfo:{
						field: 'desc_person',
						direction:'ASC'
					},
					totalProperty: 'total',
					fields: ['id_funcionario','desc_person','ci'],
					// turn on remote sorting
					remoteSort: true,
					baseParams:{par_filtro:'PERSON.nombre_completo1#PERSON.ci'}
				}),
   				valueField:'id_funcionario',
   				displayField: 'desc_person',
   				gdisplayField:'nombre_completo1',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_person}</p><p>CI:{ci}</p> </div></tpl>',
   				hiddenName: 'id_funcionario_',
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
   				
   				renderer:function (value, p, record){return String.format('{0}', record.data['nombre_completo1']);}
			},
			type:'ComboBox',
			filters:{pfiltro:'nombre_completo1',type:'string'},
			id_grupo:1,
			grid:false,
			form:true  
		},
		
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'respro.estado_reg',type:'string'},
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
				allowBlank: false,
				anchor: '80%',
				gwidth: 100,
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'respro.fecha_reg',type:'date'},
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
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'respro.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'tiene_procesos_pendientes'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'desc_resp_ant',
				fieldLabel: 'Responsable anterior',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'funcio_ant.desc_funcionario1',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
	],
	title:'Responsable de Proceso',
	ActSave:'../../sis_legal/control/ResponsableProceso/insertarResponsableProceso',
	ActDel:'../../sis_legal/control/ResponsableProceso/eliminarResponsableProceso',
	ActList:'../../sis_legal/control/ResponsableProceso/listarResponsableProceso',
	id_store:'id_responsable_proceso',
	
	fheight:'50%',
	fwidth:'40%',
	fields: [
		{name:'id_responsable_proceso', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'tipo', type: 'string'},
		{name:'id_funcionario', type: 'numeric'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'nombre_completo1', type: 'string'},
		{name:'tiene_procesos_pendientes', type: 'string'},
		{name:'desc_resp_ant', type: 'string'}
		
	],
	sortInfo:{
		field: 'id_responsable_proceso',
		direction: 'ASC'
	},
	bdel:true,
	bsave:true,
	
	preparaMenu:function(n){
	  	var data = this.getSelectedData();  
		var tb =this.tbar;
	  	//si el archivo esta escaneado se permite visualizar
	  	Phx.vista.ResponsableProceso.superclass.preparaMenu.call(this,n);
	  	if(parseFloat(data['tiene_procesos_pendientes'])>0 || data['estado_reg']=='inactivo'){
	  		this.getBoton('edit').disable();
	  		this.getBoton('del').disable();
	  		this.getBoton('asignar_responsable').disable();
	  	}else{ 
	  		this.getBoton('edit').enable();
	  		this.getBoton('del').enable();
	  		this.getBoton('asignar_responsable').enable();
	  		this.adminGrupo({ocultar:[1],mostrar:[0]});
	  		
	  	}
	  	 return tb
		
	},onButtonNew:function(){
		
		this.adminGrupo({ocultar:[1],mostrar:[0]});
		Phx.vista.ResponsableProceso.superclass.onButtonNew.call(this);
	},
	onButtonEdit:function(){
		var rec=this.getSelectedData();
		this.adminGrupo({ocultar:[1],mostrar:[0]});
		Phx.vista.ResponsableProceso.superclass.onButtonEdit.call(this);
	},
	asignar_responsable:function()
		{					
			//var rec=this.sm.getSelected();
			var rec=this.getSelectedData();
			this.adminGrupo({ocultar:[0],mostrar:[1]});
			
			Phx.vista.ResponsableProceso.superclass.onButtonEdit.call(this);

		}
	
}
)
</script>
		
		