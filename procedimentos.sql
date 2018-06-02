// total propriedades
DELIMITER $
   CREATE PROCEDURE total_propriedades(idUsu int)
   BEGIN
   SELECT count(*) total from propriedade where id_proprietario=idUsu ;
   END
   $
   call total_propriedades(idUsu);
// total inquilinos
DELIMITER $
   CREATE PROCEDURE total_inquilinos(idUsu int)
   BEGIN
   SELECT count(*) total from iquilino where id_usuario=idUsu ;
   END
   $
   call total_inquilinos(idUsu);
   
   
//grafico 1 : Lucro total por propriedade
 DELIMITER $
   CREATE PROCEDURE lucro_total_por_propriedade(idUsu int)
   BEGIN
   SELECT  p.id, p.rua rua,p.numero numero,p.bairro bairro,p.cidade cidade, sum(m.valor) from propriedade p, mensalidade m  where p.id_proprietario=idUsu
	and p.id=m.id_propriedade and m.situacao="Pago" group by p.id;
   END
   $
 // grafico 2: Lucro medio por propriedade  
  DELIMITER $
   CREATE PROCEDURE lucro_medio_por_propriedade(idUsu int)
   BEGIN
   SELECT  p.id, p.rua rua,p.numero numero,p.bairro bairro,p.cidade cidade, sum(m.valor)/count(m.id_propriedade) lucro_medio from propriedade p, mensalidade m where p.id_proprietario=idUsu
	and p.id=m.id_propriedade and m.situacao="Pago" group by p.id;
   END
   $     
 
 // grafico 3: Grafico da quantidade dos pagamentos "Pagos" e nao "Pagos" por cada inquilino pode ser tabela
 
 
 // grafico 4: Rendimento por mes
 
 
 // grafico 5: Lucro por inquilino
 
 // grafico 6: Lucro medio por inquilino
 