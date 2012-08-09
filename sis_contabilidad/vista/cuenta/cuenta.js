<script>
Phx.vista.cuenta=Ext.extend(Phx.gridInterfaz,{
	Atributos:[
	{
   	  config:{
			labelSeparator:'',
			inputType:'hidden',
			name: 'id_cuenta'

		},
		type:'Field',
		form:true,
		egrid:false 
		
	},{
		config:{
			fieldLabel: "Codigo",
			gwidth: 130,
			name: 'codigo',
			allowBlank:false,	
			maxLength:50,
			minLength:1,
			anchor:'100%'
		},
		type:'TextField',
		filters:{type:'string'},
		id_grupo:0,
		grid:true,
		form:true
	},
	 {
		config:{
			fieldLabel: "Cuenta",
			gwidth: 130,
			name: 'nombre',
			allowBlank:false,	
			maxLength:250,
			minLength:1,
			anchor:'100%'
		},
		type:'TextField',
		filters:{type:'string'},
		id_grupo:0,
		grid:true,
		form:true
	},
	 {
		config:{
			fieldLabel: "Estado",
			gwidth: 130,
			name: 'estado_reg',
			allowBlank:false,	
			maxLength:150,
			
			anchor:'100%'
		},
		type:'TextField',
		filters:{type:'string'},
		id_grupo:0,
		grid:true,
		form:false
	}
	],

	title:'Cuenta',
	ActSave:'../../sis_contabilidad/control/Cuenta/guardarCuenta',
	ActDel:'../../sis_contabilidad/control/Cuenta/eliminarCuenta',
	ActList:'../../sis_contabilidad/control/Cuenta/listarCuenta',
	id_store:'id_cuenta',
	fields: [
	{name:'id_cuenta'},
	{name:'codigo', type: 'string'},
	{name:'nombre', type: 'string'},
	{name:'estado_reg', type: 'string'}
	
		],
	sortInfo:{
		field: 'id_cuenta',
		direction: 'ASC'
	},
	bdel:true,// boton para eliminar
	bsave:true,// boton para eliminar


	// sobre carga de funcion
	preparaMenu:function(tb){
		// llamada funcion clace padre
		Phx.vista.cuenta.superclass.preparaMenu.call(this,tb)
	},

	/*
	 * Grupos:[{
	 * 
	 * xtype:'fieldset', border: false, //title: 'Checkbox Groups', autoHeight:
	 * true, layout: 'form', items:[], id_grupo:0 }],
	 */

	constructor: function(config){
		// configuracion del data store
		
		Phx.vista.cuenta.superclass.constructor.call(this,config);
		this.init();
		// this.addButton('my-boton',{disabled:false,handler:myBoton,tooltip:
		// '<b>My Boton</b><br/>Icon only button with tooltip'});
		this.load({params:{start:0, limit:50}})
	}

}
)
</script>