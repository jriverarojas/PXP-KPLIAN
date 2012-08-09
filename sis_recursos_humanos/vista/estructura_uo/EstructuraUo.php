<?php
/**
*@package pXP
*@file EstructuraUO.php
*@author KPLIAN (admin)
*@date 14-02-2011
*@description  Vista para registrar las estructura de las Unidades Organizacionales
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.EstructuraUo=function(config){
	

	

	
	


	   this.Atributos =[
	      //Primera posicion va el identificador de nodo
		{
			// configuracion del componente (el primero siempre es el
			// identificador)
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_estructura_uo'

			},
			type:'Field',
			form:true  

		},
	      
	      {
			// configuracion del componente (el primero siempre es el
			// identificador)
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name: 'id_uo'

			},
			type:'Field',
			form:true  

		},
		 //En segunda posicion siempre va el identificador del nodo padre
			{
			// configuracin del componente
			config:{
				labelSeparator:'',
				inputType:'hidden',
				name:'id_uo_padre'

			},
			type:'Field',
			form:true

		},
		{
			config:{
				fieldLabel: "codigo",
				gwidth: 120,
				name: 'codigo',
				allowBlank:false,
				anchor:'100%'
				
			},
			type:'Field',
			id_grupo:0,
			form:true
		},
		
		{
			config:{
				fieldLabel: "Nombre",
				gwidth: 120,
				name: 'nombre_unidad',
				allowBlank:false,
				anchor:'100%'
				
			},
			type:'TextField',
			id_grupo:0,
			form:true
		},
		{
			config:{
				fieldLabel: "Descripción",
				gwidth: 120,
				name: 'descripcion',
				allowBlank:false,
				anchor:'100%'
			},
			type:'Field',
			id_grupo:0,
			form:true
		},
	
		
		
		{
			config:{
				fieldLabel: "Cargo",
				gwidth: 120,
				name: 'nombre_cargo',
				allowBlank:false,
				anchor:'100%'
				
			},
			type:'TextField',
			id_grupo:0,
			form:true
		},
		{
			config:{
				fieldLabel: "Cargo Individual",
				gwidth: 120,
				name: 'cargo_individual',
				allowBlank:false,
				anchor:'100%',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione una opcion...',
	    		selectOnFocus:true,
	   			mode:'local',
				/*store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['si','si'],	
	        			['no','no']]
	        				
	    		}),*/
				store:['si','no'],
				valueField:'ID'
				
			},
			type:'ComboBox',
			id_grupo:0,
			form:true
		},
		
		{   config:{
			name:'presupuesta',
			fieldLabel:'Presupuesta',
			typeAhead: true,
			allowBlank:false,
    		triggerAction: 'all',
    		emptyText:'Seleccione una opcion...',
    		selectOnFocus:true,
   			mode:'local',
			store:['si','no'],
			/*store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['si','si'],	
	        			['no','no']]
	        				
	    		}),*/
			valueField:'ID',
			width:150,			
				
			   },
			type:'ComboBox',
			id_grupo:0,
			form:true
		},
		{
			config:{
				name:'nodo_base',
				fieldLabel:'Nodo Base',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				/*store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['si','si'],	
	        			['no','no']]
	        				
	    		}),*/
				store:['si','no'],
				valueField:'ID',
				displayField:'valor',
				width:150,			
				
			},
			type:'ComboBox',
			id_grupo:0,
			form:true
		},
		{
			config:{
				name:'correspondencia',
				fieldLabel:'Correspondencia',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				/*store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['si','si'],	
	        			['no','no']]
	        				
	    		}),*/
				store:['si','no'],
				valueField:'ID',
				displayField:'valor',
				width:150,			
				
			},
			type:'ComboBox',
			id_grupo:0,
			form:true
		}
		,
		{
			config:{
				name:'gerencia',
				fieldLabel:'Gerencia',
				typeAhead: true,
				allowBlank:false,
	    		triggerAction: 'all',
	    		emptyText:'Seleccione Opcion...',
	    		selectOnFocus:true,
				mode:'local',
				/*store:new Ext.data.ArrayStore({
	        	fields: ['ID', 'valor'],
	        	data :	[['si','si'],	
	        			['no','no']]
	        				
	    		}),*/
				store:['si','no'],
				valueField:'ID',
				displayField:'valor',
				width:150,			
				
			},
			type:'ComboBox',
			id_grupo:0,
			form:true
		}
		];
		
		Phx.vista.EstructuraUo.superclass.constructor.call(this,config);
		
		
		
	
             this.datoFiltro.on('valid',function(f,n,o){
				console.log('llamada')
			},this);
			
			
		
		//coloca elementos en la barra de herramientas
		this.tbar.add('->');
   		this.tbar.add(' Filtrar:');
   		this.tbar.add(this.datoFiltro);
		
		//de inicio bloqueamos el botono nuevo
		//this.tbar.items.get('b-new-'+this.idContenedor).disable()
		

		this.init();
		
		this.loaderTree.baseParams={id_subsistema:this.id_subsistema};
		this.rootVisible=false;
	
		
}


Ext.extend(Phx.vista.EstructuraUo,Phx.arbInterfaz,{
		datoFiltro:new Ext.form.Field({ 
		                        allowBlank:true,
					       		width: 200}),
    	title:'estructura_uo',
		ActSave:'../../sis_recursos_humanos/control/EstructuraUo/guardarEstructuraUo',
		ActDel:'../../sis_recursos_humanos/control/EstructuraUo/eliminarEstructuraUo',	
		ActList:'../../sis_recursos_humanos/control/EstructuraUo/listarEstructuraUo',
	    enableDD:false,
		expanded:false,
		fheight:'80%',
		fwidth:'50%',
		textRoot:'Estructura Organizacional',
		id_nodo:'id_uo',
		id_nodo_p:'id_uo_padre',
		fields: [
		'id', //identificador unico del nodo (concatena identificador de tabla con el tipo de nodo)
		      //porque en distintas tablas pueden exitir idetificadores iguales
		'tipo_meta',
		'id_estructura_uo',
		'id_uo',
		'id_uo_padre',
		'codigo',
		'descripcion',
		'nombre_unidad',
		'nombre_cargo',
		'presupuesta',
		'nodo_base','correspondencia','gerencia'],
		sortInfo:{
			field: 'id',
			direction:'ASC'
		},
		onButtonAct:function(){
			
			this.sm.clearSelections();
			var dfil = this.datoFiltro.getValue();
			if(dfil && dfil!=''){
				this.loaderTree.baseParams={filtro:'activo',criterio_filtro_arb:dfil};
			     this.root.reload();
			}
			else
			{
				this.loaderTree.baseParams={filtro:'inactivo',criterio_filtro_arb:''};
			     this.root.reload();
			}
		},
	
		
		//sobrecarga prepara menu
		preparaMenu:function(tb,n){
			//si es una nodo tipo carpeta habilitamos la opcion de nuevo	
			/*if((n.attributes.nodo_base == 'si' || n.attributes.tipo_dato == 'no' )&& n.attributes.id != 'id'){
					
				}
				else {
					tb.items.get('b-new-'+this.idContenedor).disable()
				}*/
			
			//tb.items.get('b-new-'+this.idContenedor).enable()
			// llamada funcion clace padre
			Phx.vista.EstructuraUo.superclass.preparaMenu.call(this,tb,n)
		},
		/*Sobre carga boton new */
		onButtonNew:function(){
			var nodo = this.sm.getSelectedNode();			
			Phx.vista.EstructuraUo.superclass.onButtonNew.call(this);			
			//this.getComponente('id_uo_padre').setValue('');
			//this.getComponente('nivel').setValue((nodo.attributes.nivel*1)+1);
			},
		
		/*Sobre carga boton EDIT */
		onButtonEdit:function(){
	
			var nodo = this.sm.getSelectedNode();			
						
			//this.getComponente('nivel').setValue((nodo.attributes.nivel*1)+1);
			
			/*if(nodo.attributes.tipo_dato=='interface'){		
				console.log(this.getComponente('nombre'))
				//componente 5 y tipo_dato son el mismo
				this.getComponente('tipo_dato').disable();				
				this.Componentes[5].setValue('interface');
				this.getComponente('ruta_archivo').enable();
				this.getComponente('icono').enable();
				this.getComponente('clase_vista').enable();
			}
			else{
				
				this.getComponente('tipo_dato').enable();
				this.getComponente('ruta_archivo').disable();
				this.getComponente('icono').disable();
				this.getComponente('clase_vista').disable();
			}	*/
			Phx.vista.EstructuraUo.superclass.onButtonEdit.call(this);
		},
		
	
		
		//estable el manejo de eventos del formulario
		iniciarEventos:function(){
			/*this.getComponente('tipo_dato').on('beforeselect',function(combo,record,index){
				if(record.json[0]=='interface'){
				
					this.getComponente('ruta_archivo').enable();
				    this.getComponente('icono').enable();
				    this.getComponente('clase_vista').enable();
				}
				else{
					this.getComponente('ruta_archivo').disable();
					this.getComponente('icono').disable();
					this.getComponente('clase_vista').disable();
				}
			},this)*/
		},
	/*
	 * south:{ url:'../../sis_legal/vista/representante/representante.php',
	 * title:'Representante', height:200 },
	 */	
		
          east:{
		  url:'../../../sis_recursos_humanos/vista/uo_funcionario/UOFuncionario.php',
		  title:'Asignacion de Funcionarios a Unidad', 
		  width:400,
		  cls:'uo_funcionario'
		 },
		bdel:true,// boton para eliminar
		bsave:false,// boton para eliminar
		
		//DEFINIE LA ubicacion de los datos en el formulario
	Grupos:[{ 
			 layout: 'column',
			 items:[{
				    xtype:'fieldset',
                    layout: 'form',
                    border: true,
                    title: 'Datos principales',
                    bodyStyle: 'padding:0 10px 0;',
                    columnWidth: '1',
                    items:[],
		            id_grupo:0
                  }
                  
                  /*{  
                    xtype:'fieldset',
                    layout: 'form',
                    border: true,
                    title: 'Orden y rutas',
                    bodyStyle: 'padding:0 10px 0;',
                    columnWidth: '.5',
                    
                    items:[],
                    id_grupo:1
                 }*/] }]
			


}
)
</script>