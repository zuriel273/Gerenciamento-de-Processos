CREATE OR REPLACE VIEW v_processo_docente AS
SELECT * FROM v_ultima_movimentacao_processo AS v
WHERE v.codigo_movimentacao = 1001

CREATE OR REPLACE VIEW v_ultima_movimentacao_processo AS
SELECT mp.codigo_movimentacao, mp.dataMovimentacao, p.* FROM movimentacao_has_processo AS mp 
INNER JOIN processo AS p ON mp.codigo_processo = p.codigo
GROUP BY mp.codigo_processo
ORDER BY mp.dataMovimentacao desc
