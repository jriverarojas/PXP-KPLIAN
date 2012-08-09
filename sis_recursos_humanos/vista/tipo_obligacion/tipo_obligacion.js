<script>
Phx.vista.tipo_obligacion=function(config){

	this.Atributos=[
	       	{
	       		// configuracion del componente
	       		config:{
	       			labelSeparator:'',
	       			inputType:'hidden',
	       			name: 'id_tipo_obligacion'

	       		},
	       		type:'Field',
	       		form:true 
	       		
	       	},
	       	{
	       		config:{
	       			fieldLabel: "Código",
	       			gwidth: 120,
	       			name: 'codigo',
	       			allowBlank:false,	
	       			maxLength:15,
	       			minLength:1,
	       			anchor:'80%'
	       		},
	       		type:'TextField',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	},
	       		{
	       		config:{
	       			fieldLabel: "Nombre",
	       			gwidth: 120,
	       			name: 'nombre',
	       			allowBlank:false,	
	       			maxLength:255,
	       			minLength:1,
	       			anchor:'100%'
	       		},
	       		type:'TextField',
	       		filters:{type:'string'},
	       		id_grupo:0,
	       		grid:true,
	       		form:true
	       	}
	      
	       	
	       	
	       	];
	       	
	Phx.vista.tipo_obligacion.superclass.constructor.call(this,config);
	
	this.init();
//	var txt_ci=this.getComponente('ci');	
//	var txt_correo=this.getComponente('correo');	
//	var txt_telefono=this.getComponente('telefono');	
	//this.getComponente('id_persona').on('select',onPersona);
	//this.getComponente();
	
	
	
//	function onPersona(c,r,e){
//		txt_ci.setValue(r.data.ci);
//		txt_correo.setValue(r.data.correo);
//		txt_telefono.setValue(r.data.telefono);
//	}
	this.load({params:{start:0, limit:50}});
	
	
	
	
	
	
	
}

Ext.extend(Phx.vista.tipo_obligacion,Phx.gridInterfaz,{
	title:'TipoObligacions',
	ActSave:'../../sis_recursos_humanos/control/TipoObligacion/guardarTipoObligacion',
	ActDel:'../../sis_recursos_humanos/control/TipoObligacion/eliminarTipoObligacion',
	ActList:'../../sis_recursos_humanos/control/TipoObligacion/listarTipoObligacion',
	id_store:'id_tipo_obligacion',
	fields: [
	{name:'id_tipo_obligacion'},
	{name:'codigo', type:'string'},
	{name:'nombre',type:'string'}
	],
	sortInfo:{
		field: 'PERREG.nombre_completo1',
		direction: 'ASC'
	},
	
	
	// para configurar el panel south para un hijo
	
	/*
	 * south:{
	 * url:'../../../sis_seguridad/vista/usuario_regional/usuario_regional.php',
	 * title:'Regional', width:150
	 *  },
	 */	
	bdel:true,// boton para eliminar
	bsave:true// boton para eliminar
	
		 
})
</script>