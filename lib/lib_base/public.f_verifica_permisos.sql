CREATE OR REPLACE FUNCTION public.f_verifica_permisos (
  par_id_usuario integer,
  par_transaccion varchar,
  par_cod_gui varchar,
  par_ip_admin varchar [],
  par_ip varchar,
  out po_administrador boolean,
  out po_habilitar_log integer,
  out po_tiene_permisos boolean,
  out po_id_subsistema integer
)
RETURNS SETOF record AS'
/***************************************************************************
 DESCRIPCION:	Valida si el usuario tiene permiso para ejecutar la transaccion
 AUTOR:			 KPLIAN(jrr)
 FECHA:			 29-11-10
***************************************************************************/
declare
    v_descripcion   varchar;
begin


  -- 1) iniciamos los parametro
    
     po_administrador =FALSE; -- no es usuario administrador
     po_tiene_permisos = FALSE;  --los habilitado por defecto
     
  --2) verifica si es un usuario administrador, el administrador
  --   tiene permiso para ejecutar todas las transacciones 
  
   if exists(select 1 from segu.tusuario_rol ur where id_usuario=par_id_usuario and id_rol=1 and estado_reg=''activo'')then
       po_administrador:=true;
       po_tiene_permisos=true;
       
       --2.1) verificamos si la direccion IP del usuario administrador esta en la lista de los que pueden loguearse
       --si la lista de IP es nula no se plica esta verificacion 
       IF par_ip_admin is not null THEN
          IF  not ( ARRAY[par_ip] <@ par_ip_admin ) THEN        
               raise exception ''El usuario no tiene autorizacion para conectarse  desde %'',par_ip;
          END IF;
       END IF;
    end if;
    
   -- 3) verifica si la transaccion se almacena en log
   
    select CASE  
           WHEN p.habilita_log = ''no''THEN
              0
           ELSE
              1
           END,
           p.descripcion,
           f.id_subsistema
    into po_habilitar_log,v_descripcion,po_id_subsistema
    from segu.tprocedimiento p
    inner join segu.tfuncion f
        on(f.id_funcion=p.id_funcion)
    where p.codigo = par_transaccion;
    
    if(po_habilitar_log is null)then
        po_habilitar_log=1;
    end if;
   
     -- po_habilitar_log  = true;
  
    
    
    --  4) si no es administrador verificamos si no es una trasaccion basica
         -- (todos tienen permisos para ejecutar las basicas)
         IF ((not po_tiene_permisos) and  (par_transaccion in  (''SEG_SESION_INS'',''SEG_SESION_SEL'',''SEG_SESION_CONT'',''SEG_VALUSU_SEG'',''SEG_OBTEPRI_SEL'',''SEG_OBTEPRI_CONT'',''SEG_MENU_SEL'',''PM_GENALA_INS''))) THEN
         
            po_tiene_permisos = true;
         
         END IF; 
         
 
    
    --5)  verifica si el usuario tiene permiso para ejecutar la transaccion
   
    if (not po_tiene_permisos) THEN
     
     
     --5.1) si el usuario no es administrador verificamos 
     --     si tiene permisos para ejecutar la transaccion 
    
           IF(    
            		SELECT 1 
                    FROM segu.tusuario_rol ur
                    INNER JOIN  segu.trol_procedimiento_gui  rpg
                      ON rpg.id_rol = ur.id_rol  and rpg.estado_reg = ''activo''
                    INNER JOIN segu.tprocedimiento_gui pg
                     ON  rpg.id_procedimiento_gui = pg.id_procedimiento_gui and pg.estado_reg = ''activo''
                    INNER JOIN segu.tprocedimiento p 
                     ON    p.id_procedimiento  = pg.id_procedimiento   and p.estado_reg = ''activo''
                    WHERE ur.id_usuario=par_id_usuario 
                       and  ur.estado_reg=''activo'' and
                       p.codigo = par_transaccion
                       limit 1) THEN
                    
              
              po_tiene_permisos = true;
              
           ELSE   
           --en caso contrario arojamos el error de permiso denegado
           
              raise exception ''Permiso denegado para la transaccion :  %'',par_transaccion;
              
           END IF;
           
   END IF;
   
   RETURN NEXT;
   --RETURN;

   
   
end;
'LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY DEFINER
COST 100 ROWS 1000;