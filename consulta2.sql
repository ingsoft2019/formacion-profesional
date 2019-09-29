SELECT a.*,c.nombres as nombres,c.apellidos as apellidos,b.no_cuenta,d.nombreCarrera as carrera FROM 
        tbl_control_de_procesos a 
        left join tbl_estudiantes b 
        on a.idEstudiante=b.idEstudiante
        left join tbl_resultados c 
        on b.idEstudiante=c.idResultados
        
        
        left join tbl_carreras d 
        on b.idCarrera=d.idCarrera


       *** SSELECT a.idEstudiante,a.idResultados,c.idprocesos,c.fechainicio, c.fechafinal,a.urlPdf FROM tbl_resultados a 
left join tbl_procesos c on a.idResultados=c.idprocesos