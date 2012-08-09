<?php
/**
*@package pXP
*@file gen-Boleta.php
*@author  (fprudencio)
*@date 17-11-2011 11:23:54
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.AdministracionBoleta=Ext.extend(Phx.gridInterfaz,{
	
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_boleta'
			},
			type:'Field',
			form:true 
		},
		
	
		
		{
			config:{
				name: 'version',
				fieldLabel: 'Digital',
				gwidth: 60,
			
				renderer:function (value, p, record){
					var icono='eli';
					if(record.data.version>0){
						icono='ok';
					}
					return "<div style='text-align:center'><img src = '../../../lib/imagenes/icono_dibu/dibu_"+icono+".png' align='center' width='32' height='32'/></div>"
				 }
			},
			type:'Field',
			egrid:true,
			filters:{pfiltro:'contra.numero_contrato',type:'string'},
		    id_grupo:0,
			grid:true,
			form:false
		},
			
		
		{
			   			config:{
			   				name:'id_proceso_contrato',
			   				fieldLabel:'Contrato',
			   				allowBlank:false,
			   				emptyText:'Contrato...',
			   				store: new Ext.data.JsonStore({
			
								url: '../../sis_legal/control/ProcesoContrato/listarProcesoContrato',
								id: 'id_proceso_contrato',
								root: 'datos',
								sortInfo:{
									field: 'desc_proveedor',
									direction: 'ASC'
								},
								totalProperty: 'total',
								fields: ['id_proceso_contrato','numero_contrato','desc_proveedor','nombre_estado','numero_requerimiento'],
								// turn on remote sorting
								remoteSort: true,
								baseParams:{par_filtro:'provee.desc_proveedor#contra.numero_contrato#contra.numero_requerimiento'}
							}),
			   				valueField: 'id_proceso_contrato',
			   				displayField: 'numero_requerimiento',
			   				gdisplayField:'numero_requerimiento',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
			   				tpl:'<tpl for="."><div class="x-combo-list-item"><p>{desc_proveedor}</p><p>Contrato:{numero_contrato}, NUM Req.: {numero_requerimiento}</p> <p>Estado:{nombre_estado}</p></div></tpl>',
			   				hiddenName: 'id_proceso_contrato',
			   				forceSelection:true,
			   				typeAhead: true,
			       			triggerAction: 'all',
			       			lazyRender:true,
			   				mode:'remote',
			   				pageSize:10,
			   				queryDelay:1000,
			   				width:250,
			   				listWidth:'280',
			   				gwidth:150,
			   				minChars:3,
			   				renderer:function (value, p, record) {
								if(record.data['numero_contrato']&&record.data['numero_contrato']!='') return String.format('{0}', record.data['numero_contrato']);	else return String.format('<b><font color="red">-</font></b>', record.data['numero_contrato']);
							 }
			   			},
			   			//type:'TrigguerCombo',
			   			type:'ComboBox',
			   			id_grupo:3,
			   			filters:{	
			   				        pfiltro:'pc.numero_contrato#pc.numero_requerimiento',
			   						type:'string'
			   					},
			   		   
			   			grid:true, 
			   			form:true
		 },//provee.desc_proveedor
		 {
			config:{
				name: 'desc_proveedor',
				fieldLabel: 'Contratista',
				allowBlank: true,
				gwidth: 280,
				maxLength:20
			},
			type:'Field',
			filters:{pfiltro:'provee.desc_proveedor',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		
		{
			config:{
				name:'tipo',
				fieldLabel:'Tipo Boleta.',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['anticipo','Buen uso de Anticipo'],	
	        			['cumplimiento','Cumplimiento de Contrato']]
	        				
	    		}),
				valueField:'ID',
				displayField:'valor',
				width:150,			
				anchor:'70%'
			},
			type:'ComboBox',
			filters:{pfiltro:'boleta.tipo',type:'string'},
			form:true,
			grid:true,
			id_grupo:0
		},
		{
			config:{
				name: 'estado',
				fieldLabel: 'estado',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:20
			},
			type:'TextField',
			filters:{pfiltro:'boleta.estado',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
	   		config:{
	   				name:'id_institucion_banco',
	   				fieldLabel: 'Banco',
	   				baseParams:{es_banco:'SI'},
	   				anchor: '90%',
	   				tinit:true,
	   				allowBlank:false,
	   				origen:'INSTITUCION',
	   				gdisplayField:'nombre',
	   			    gwidth:200,	
	   			   	renderer:function (value, p, record){return String.format('{0}', record.data['nombre']);}
   			
	   			  },
   			type:'ComboRec',
   			id_grupo:0,
   			filters:{pfiltro:'nombre',type:'string'},
   			grid:true,
   			form:true
	   	},
	
	    {
			config:{
				name: 'numero',
				fieldLabel: 'numero',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:40
			},
			type:'TextField',
			filters:{pfiltro:'boleta.numero',type:'string'},
			id_grupo:0,
			grid:true,
			form:true
		},
		{
	   		config:{
	   				name:'id_moneda',
	   				origen:'MONEDA',
	   				fieldLabel:'Moneda',
	   				
	   				gdisplayField:'desc_moneda',//dibuja el campo extra de la consulta al hacer un inner join con orra tabla
	   				gwidth:200,
	   				renderer:function (value, p, record){return String.format('{0}', record.data['desc_moneda']);}
			    },
			    type:'ComboRec',
			    id_grupo:2,
	   			filters:{pfiltro:'moneda',type:'string'},
	   		    grid:true,
	   			form:true
		},
		{
			config:{
				name: 'monto',
				fieldLabel: 'Monto Boleta',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:1179650
			},
			type:'NumberField',
			filters:{pfiltro:'boleta.monto',type:'numeric'},
			id_grupo:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'fecha_suscripcion',
				fieldLabel: 'Fecha Suscripción',
				allowBlank: true,
				gwidth: 100,
				vtype: 'daterange',
				format:'d-m-Y',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'boleta.fecha_suscripcion',type:'date'},
			id_grupo:0,
			grid:true,
			form:true
		},
        {
			config:{
				name: 'fecha_vencimiento',
				fieldLabel: 'Fecha Vencimiento',
				allowBlank: false,
				vtype: 'daterange',
				gwidth: 100,
				format:'d-m-Y',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'boleta.fecha_vencimiento',type:'date'},
			id_grupo:0,
			grid:true,
			form:true
		},
		
		{
			config:{
				name: 'orden',
				fieldLabel: 'orden',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:12
			},
			type:'NumberField',
			filters:{pfiltro:'boleta.orden',type:'numeric'},
			id_grupo:0,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'observaciones',
				fieldLabel: 'observaciones',
				allowBlank: true,
				width: 200,
				gwidth: 100,
				maxLength:500,
				grow:true,
				growMin:100
			},
			type:'TextArea',
			filters:{pfiltro:'boleta.observaciones',type:'string'},
			id_grupo:0,
			grid:true,
			form:true
		},
		
		
		
         /*{
		       	config:{
		       		name:'fecha_ini',
		       		fieldLabel:'Fecha Inicio',
		       		allowBlank:false,
		       		width: 200,
		       		vtype: 'daterange',
		       		renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''},
		            format:'d-m-Y'
		       		
	       		},
	       		type:'DateField',
	       		filters:{pfiltro:'boleta.fecha_ini',type:'date'},
	       		id_grupo:2,
	       		grid:true,
			    form:true
	       	},
	       	{
		       	config:{
	       			name:'fecha_fin',
		       		fieldLabel:'Fecha Fin',
		       		allowBlank:true,
		       		width: 200,
		       		vtype: 'daterange',
		       		format:'d-m-Y',
		     		renderer:function (value,p,record){return value?value.dateFormat('d/m/Y h:i:s'):''}
		        },
	       		filters:{pfiltro:'boleta.fecha_fin',type:'date'},
	       		type:'DateField',
	       		id_grupo:2,
	       		grid:true,
			    form:true
	       	}
	
		,*/
				
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
			filters:{pfiltro:'boleta.estado_reg',type:'string'},
			id_grupo:0,
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
			id_grupo:0,
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
				format:'d-m-Y',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
				
			},
			type:'DateField',
			filters:{pfiltro:'boleta.fecha_reg',type:'date'},
			id_grupo:0,
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
			id_grupo:0,
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
				format:'d-m-Y',
				renderer:function (value,p,record){return value?value.dateFormat('d/m/Y'):''}
			},
			type:'DateField',
			filters:{pfiltro:'boleta.fecha_mod',type:'date'},
			id_grupo:0,
			grid:true,
			form:false
		}
	],
	constructor:function(config){
		//obtenemos el tipo de ventana padre
		
		this.maestro=config;
		
		console.log('CONSTRUCTOR....',config)

    	//llama al constructor de la clase padre
		Phx.vista.AdministracionBoleta.superclass.constructor.call(this,config);
		
		this.getComponente('fecha_suscripcion').on('valid',function(f,n,o){
			this.getComponente('fecha_vencimiento').setMinValue(f.getValue())
		},this);
		
		this.getComponente('fecha_vencimiento').on('valid',function(f,n,o){
			this.getComponente('fecha_suscripcion').setMaxValue(f.getValue())
		},this);
		
		this.addButton('aSubirBoleta',{text:'Subir Boleta',iconCls:'bupload',disabled:true,handler:SubirBoleta,tooltip: '<b>Subir archivo</b><br/>Permite actualizar la Boleta escaneada'});
		this.addButton('verBoleta',{text:'Ver Boleta',iconCls: 'bsee',disabled:true,handler:this.verBoleta,tooltip: '<b>Ver Boleta</b><br/>Permite visualizar la boleta escaneada'});
		this.addButton('verContrato',{text:'Ver Contrato',iconCls: 'bsee',disabled:true,handler:this.verContrato,tooltip: '<b>Ver Boleta</b><br/>Permite visualizar el Contrato escaneado'});
	
		this.addButton('cmbBorrador',{text:'Hacer Editable',iconCls: 'bundo',disabled:true,argument:{estado:'borrador'},handler:this.cmbEstado,tooltip: '<b>Borrador</b><br/>Permite hacer editable la boleta'});
		this.addButton('cmbRegistrada',{text:'Finalizar Registro',iconCls: 'bend',disabled:true,argument:{estado:'registrada'},handler:this.cmbEstado,tooltip: '<b>Registrar</b><br/>Bloquea la edición de la boleta'});
		this.addButton('cmbRenovar',{text:'Renovar',iconCls: 'brenew',disabled:true,argument:{estado:'renovada'},handler:this.cmbEstado,tooltip: '<b>Renovar</b><br/>Permite registrar una nueva Boleta que extien el plazo de la actual'});
		this.addButton('cmbCobrar',{text:'Cobrar',iconCls: 'bcharge',disabled:true,argument:{estado:'cobrada'},handler:this.cmbEstado,tooltip: '<b>Cobrar</b><br/>Dar  por cobrada la Boleta'});
		this.addButton('cmbFinalizar',{text:'Finalizar Boleta',iconCls: 'bok',disabled:true,argument:{estado:'finalizada'},handler:this.cmbEstado,tooltip: '<b>Finalizar</b><br/>Da por Finalizada la Boleta'});
		
		
		if(this.maestro.tipoFiltro && this.maestro.tipoFiltro!='encargadobol')
		{
			//ocultamos los botnoes para los que no son encargados de boletas
			this.getBoton('aSubirBoleta').hide();
			this.getBoton('cmbBorrador').hide();
			this.getBoton('cmbRegistrada').hide();
			this.getBoton('cmbRenovar').hide();
			this.getBoton('cmbFinalizar').hide();
			this.getBoton('cmbCobrar').hide();
		
		}
		
		
		function SubirBoleta()
		{					
			var rec=this.sm.getSelected();
			
						
			Phx.CP.loadWindows('../../../sis_legal/vista/boleta/subirBoleta.php',
			'Subir Contrato',
			{
				modal:true,
				width:500,
				height:250
		    },rec.data,this.idContenedor,'subirBoleta')
		}
		
		this.init();
		
		
		
		
		if(this.maestro.filtrar)
		{
			console.log('aplica filtros')
			//silel filtro esta habilitado mandamos el criterio
			this.load({params:{
				          start:0, 
				           limit:50,
				           tipoFiltro:this.maestro.tipoFiltro,
				           id_usuario:Phx.CP.config_ini.id_usuario}})
		}
		else
		{
			console.log('no APLICA')
			this.load({params:{start:0, limit:50}})
		}	
		
		
		
		
	}, 
	title:'Boleta',
	ActSave:'../../sis_legal/control/Boleta/insertarBoleta',
	ActDel:'../../sis_legal/control/Boleta/eliminarBoleta',
	ActList:'../../sis_legal/control/Boleta/listarBoletaContrato',
	id_store:'id_boleta',
	fields: [
		{name:'id_boleta', type: 'numeric'},
		{name:'extension', type: 'string'},
		{name:'doc_garantia', type: 'string'},
		{name:'id_alarma', type: 'numeric'},
		{name:'id_institucion_banco', type: 'numeric'},
		{name:'fecha_fin', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'numero', type: 'string'},
		{name:'fecha_vencimiento', type: 'date', dateFormat:'Y-m-d'},
		{name:'fecha_suscripcion', type: 'date', dateFormat:'Y-m-d'},
		{name:'orden', type: 'numeric'},
		{name:'observaciones', type: 'string'},
		{name:'monto', type: 'numeric'},
		{name:'id_moneda', type: 'numeric'},
		{name:'tipo', type: 'string'},
		{name:'version', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'id_proceso_contrato', type: 'numeric'},
		{name:'fecha_ini', type: 'date', dateFormat:'Y-m-d H:i:s'},
		{name:'estado', type: 'string'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_reg', type: 'date', dateFormat:'Y-m-d'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'fecha_mod', type: 'date', dateFormat:'Y-m-d'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},
		{name:'desc_moneda', type: 'string'},
		{name:'nombre', type: 'string'},'numero_requerimiento','numero_contrato','desc_proveedor','doc_contrato'
	],
	sortInfo:{
		field: 'fecha_reg',
		direction: 'DESC'
	},
	bdel:true,
	bsave:true,
	verContrato:function(){
		var rec=this.sm.getSelected();
		window.open('../'+rec.data.doc_contrato);
		},
	cmbEstado:function(a){
		var data=this.sm.getSelected().data;
		
			if(a.argument.estado!='renovada'){
					Phx.CP.loadingShow();
				    Ext.Ajax.request({
						// form:this.form.getForm().getEl(),
						url:'../../sis_legal/control/Boleta/cambiarEstado',
						params:{id_boleta:data.id_boleta,estado:a.argument.estado},
						success:this.successCmbEstado,
						failure: this.conexionFailure,
						timeout:this.timeout,
						scope:this
					});	
			}
			else{
				//formulario para registrar boleta y renovar anterior
				this.onButtonNew();
		        this.argumentExtraSubmit.id_boleta_fk=data.id_boleta;
		        this.getComponente('id_proceso_contrato').setValue(data.id_proceso_contrato)
		        this.getComponente('tipo').setValue(data.tipo)
		        
		        
		    }
		
		
	},
	onButtonNew:function(){
		this.argumentExtraSubmit={};
		this.getComponente('id_proceso_contrato').enable();
		Phx.vista.AdministracionBoleta.superclass.onButtonNew.call(this);
	},
	onButtonEdit:function(){
		this.getComponente('id_proceso_contrato').disable();
		Phx.vista.AdministracionBoleta.superclass.onButtonEdit.call(this);
	},
	
	successCmbEstado:function(resp){
		Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			console.log(reg)
			console.log(reg.ROOT.error)
			
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
		
	},
	
	onReloadPage:function(m){
          	this.maestro=m;
			this.Atributos[1].valorInicial=this.maestro.id_proceso_contrato;
	    	
			this.store.baseParams={id_proceso_contrato:this.maestro.id_proceso_contrato};
			this.load({params:{start:0, limit:50}})

		},

	verBoleta:function(){
		var rec=this.sm.getSelected();
		window.open('../'+rec.data.doc_garantia);
	},
	
	preparaMenu:function(n){
	  var data = this.getSelectedData();
	  var tb =this.tbar;
	  if(data['version']>0){
	  		this.getBoton('verBoleta').enable();
	  }
	  
	  if(data['doc_contrato']!=null){
	  		this.getBoton('verContrato').enable();
	  }
	  
	 if(data.estado=='borrador'){
		  
		  	Phx.vista.AdministracionBoleta.superclass.preparaMenu.call(this,n);
		   	this.getBoton('aSubirBoleta').enable();
		   	this.getBoton('cmbRegistrada').enable();
		   	this.getBoton('edit').enable();
			this.getBoton('del').enable();
		   	
		   	
	   }
	   else if(data.estado=='registrada'){
		  
		  	Phx.vista.AdministracionBoleta.superclass.preparaMenu.call(this,n);
		    this.getBoton('cmbFinalizar').enable();
		   	this.getBoton('cmbCobrar').enable();
		   	this.getBoton('cmbRenovar').enable();
		   	this.getBoton('cmbRegistrada').disable();
		   	this.getBoton('edit').disable();
			this.getBoton('del').disable();
		   
	   }
	   else{
	   	   	this.getBoton('aSubirBoleta').disable();
		   	this.getBoton('cmbFinalizar').disable();
		   	this.getBoton('cmbCobrar').disable();
		   	this.getBoton('cmbRenovar').disable()
		   	this.getBoton('edit').disable();
			this.getBoton('del').disable();
	   	
	   }
	  if(data.estado=='finalizada' || data.estado=='renovada' || data.estado=='cobrada'|| data.estado=='registrada'){
		 this.getBoton('cmbBorrador').enable();
	  } else{
	  	 this.getBoton('cmbBorrador').disable();
	  }
	   

	 // Phx.vista.ProcesoRequerimiento.superclass.preparaMenu.call(this,n);
	  return tb
	},
	liberaMenu:function(){
		var tb = Phx.vista.AdministracionBoleta.superclass.liberaMenu.call(this);
		
			this.getBoton('aSubirBoleta').disable();
			this.getBoton('verBoleta').disable();
			this.getBoton('verContrato').disable();
			 this.getBoton('cmbRegistrada').disable();
			this.getBoton('cmbFinalizar').disable();
		   	this.getBoton('cmbCobrar').disable();
		   	this.getBoton('cmbRenovar').disable();
		
		return tb
	}
	
	
	}
)
</script>