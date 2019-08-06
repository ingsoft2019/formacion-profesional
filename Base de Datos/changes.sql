alter table tbl_secciones add dia VARCHAR(100)  null;
ALTER TABLE tbl_secciones CHANGE COLUMN fechahorafinal horafinal time ;
ALTER TABLE tbl_secciones CHANGE COLUMN fechahorainicial horainicial time ;
ALTER TABLE tbl_secciones MODIFY idsecciones VARCHAR(150);
commit;