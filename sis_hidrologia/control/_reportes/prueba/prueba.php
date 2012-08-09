<script>
/*
/***
 * Nombre:		persona.js
 * Proposito:	Vista para desplegar listados de personas
 * Autor:		Kplian (JRR)
 * Fecha:		03/01/2011
 */
Phx.vista.repPersona=Ext.extend(Phx.frmInterfaz,{
	
	Atributos:[{
   	  config:{
			labelSeparator:'',
			inputType:'hidden',
			name: 'id_persona'
		},
		type:'Field'
	},{
		config:{
			fieldLabel: "Nombre",
			name: 'nombre',
			allowBlank:false,	
			maxLength:150,
			minLength:2
		},
		type:'TextField',		
		id_grupo:0		
	}/*,{
		config:{
			fieldLabel: "Apellido Paterno",
			name: 'ap_paterno',
			allowBlank:false,	
			maxLength:150
		},
		type:'TextField',		
		id_grupo:0
	},{
		config:{
			fieldLabel: "Apellido Materno",
			name: 'ap_materno',
			allowBlank:true,	
			maxLength:150
		},
		type:'TextField',
		id_grupo:0
	},{
		config:{
			fieldLabel: "CI",
			gwidth: 80,
			name: 'ci',
			allowBlank:true,	
			maxLength:15,
			minLength:5
		},
		type:'TextField',		
		id_grupo:0
	},{
		config:{
			fieldLabel: "Telefono",
			name: 'telefono1',
			allowBlank:true,	
			maxLength:20,
			minLength:5
		},
		type:'NumberField',
		id_grupo:0
	},{
		config:{
			fieldLabel: "Celular",
			name: 'celular1',
			allowBlank:true,	
			maxLength:20,
			minLength:5
		},
		type:'NumberField',
		id_grupo:0
	},{
		config:{
			fieldLabel: "Correo",
			name: 'correo',
			allowBlank:true,
			vtype:'email',	
			maxLength:100,
			minLength:5
		},
		type:'TextField',
		id_grupo:0
	}*/	],
	title:'Persona',
	ActSave:'../../sis_hidrologia/control/MedicionDatoMedida/listarMedicionDatoMedida',
	
	constructor: function(config)
	{
		// configuracion del data store
		Phx.vista.repPersona.superclass.constructor.call(this,config);
		this.init();
		
	}
})
</script>