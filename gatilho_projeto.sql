

DELIMITER $

CREATE TRIGGER excluir_contrato_das_propriedades BEFORE DELETE
ON propriedade
FOR EACH ROW
BEGIN
	delete from mensalidade where id_propriedade=old.id;
END$


DELIMITER $

CREATE TRIGGER excluir_contrato_dos_inquilinos BEFORE DELETE
ON iquilino
FOR EACH ROW
BEGIN
	delete from mensalidade where id_iquilino=old.id;
END$