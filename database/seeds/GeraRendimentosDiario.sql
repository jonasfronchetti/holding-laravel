CREATE or REPLACE FUNCTION geraRendimentosDiarios( ) RETURNS BOOLEAN
AS $$
DECLARE
    aportes      RECORD;
    vPercRend    NUMERIC;
    vAplicacaoId INTEGER;
    vTempoAplicacao INTEGER;
BEGIN
    vAplicacaoId = 0;
    vTempoAplicacao = 1;
    FOR aportes IN SELECT *
                     FROM fin_aportes FA 
                    WHERE FA.ativo = true
                      AND FA.saldo > 0
                      AND FA.update_rendimento < CURRENT_DATE
                 ORDER BY FA.aplicacao_id, FA.data
    LOOP

        IF vAplicacaoId <> aportes.aplicacao_id THEN
            vAplicacaoId = aportes.aplicacao_id;
            SELECT percrendimento INTO vPercRend FROM fin_aplicacoes WHERE id = aportes.aplicacao_id;  

        END IF;

        UPDATE fin_aportes
           SET rendimento = rendimento + (saldo * (vPercRend / 100)) / ((data + INTERVAL '1 MONTH')::DATE - data), update_rendimento = CURRENT_DATE
         WHERE id=aportes.id;
  
    END LOOP; 
    
    RETURN TRUE;
END;
$$ LANGUAGE plpgsql;


select geraRendimentosDiarios();

SELECT  (data + INTERVAL '1 MONTH')::DATE - data ,
       FA.*
FROM fin_aportes FA;

select * from fin_historicos;

select * from fin_movimentos;

UPDATE fin_aportes
SET rendimento = rendimento + (saldo * (3.00 / 100)) / ((data + INTERVAL '1 MONTH')::DATE - data), update_rendimento = CURRENT_DATE
WHERE id=2;

select * from audits