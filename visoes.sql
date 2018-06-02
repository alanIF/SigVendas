create view total_rendimento AS
Select u.id,u.nome,sum(m.valor) from usuario u, mensalidade m, propriedade p
where u.id=p.id_proprietario and p.id=m.id_propriedade and m.situacao="Pago" group by u.id;
