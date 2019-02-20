<!-- ESTÁ PAGINA TEM O OBJETIVO DE GEAR A GUIA PARA QUE ELA SEJA IMPRESSA -->

<?php
session_start();
require_once("../../requires/conecta.php"); // CONEXÃO COM O BANCO DE DADOS
?>

<!-- INICIO DA FFOLHA -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style type="text/css" media="print">

	@media print
	{
		body {transform: scale(1);}
		table {page-break-inside: avoid;}
	}

	@page
	{
		size:  auto;   /* auto is the initial value */
		margin: 10mm 0mm 0mm 0mm;   /* this affects the margin in the printer settings */
	}

	html
	{
		background-color: #FFFFFF;
		margin: 0px;  /* this affects the margin on the html before sending to printer */
	}

	body
	{
		-webkit-print-color-adjust: exact;  /* AJUSTA A IMPRESSÃO PARA QUE SAI NA MESMA COR NA PAGINA  */
	}
	#cab_topo
	{
		text-align: center;
		margin-top: auto;
		margin-bottom: auto;
		margin-right: auto;
		margin-left: auto;
	}
	#cabecalho
	{
		border-spacing: 0px;
		border: 1px #AFACAC;
		width: 100%;
	}
	fieldset
	{
		border: 0;
		margin-left: 9px;
		width: 750px;
	}
	#sem_borda_baixo
	{
		border-bottom: none;
		border-color: black;
	}
	#sem_borda_topo
	{
		border-top: none;
		border-color: black;
	}
	#sem_borda_topo_esquerda
	{
		border-top: none;
		border-left: none;
		border-color: black;
	}
	#sem_borda_baixo_esquerda
	{
		border-bottom: none;
		border-left: none;
		border-color: black;
	}
	#sem_borda_baixo_esquerda_topo
	{
		border-bottom: none;
		border-left: none;
		border-top: none;
		border-color: black;
	}
	#sem_borda_baixo_topo
	{
		border-top: none;
		border-bottom: none;
		border-color: black;
	}
	#sem_borda_topo
	{
		border-top: none;
		border-color: black;
	}
	#sem_borda_baixo_direita
	{
		border-bottom: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_topo_direita
	{
		border-top: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_topo_esquerda_direita
	{
		border-top: none;
		border-left: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_baixo_esquerda_direita
	{
		border-bottom: none;
		border-left: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_baixo_esquerda_topo_direita
	{
		border-bottom: none;
		border-left: none;
		border-top: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_baixo_topo_direita
	{
		border-top: none;
		border-bottom: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_topo_direita
	{
		border-top: none;
		border-right: none;
		border-color: black;
	}
	#sem_borda_direita
	{
		border-right: none;
		border-color: black;
	}
	.negrito
	{
		font-weight: bold;
	}
	.font-normal
	{
		font-size: 11px;
	}
	.font-grande
	{
		font-size: 14px;
	}
	</style>
</head>
<body>

	<?php

	$ano = date("Y")-1;

	// QUADRO 1


	$select_q1 = mysql_query("
	SELECT matricula, sum(rendto_bruto) as total_bruto, sum(deducao_inss) as total_inss, sum(deducao_pen_alim) as total_pensao, sum(val_irrf) as total_irrf
	FROM rhu_mov_irrf_folha
	WHERE dat_pagto >= '".$ano."-01-01'
	AND dat_pagto <= '".$ano."-12-31'
	AND matricula = 580
	AND tip_processamento in ('1','7')
	GROUP BY 1
	") or die(mysql_error());

	$result_q1 = mysql_fetch_array($select_q1);


	// QUADRO 2

	// 13º Salário
	$select_q2 = mysql_query("
	SELECT matricula, sum(rendto_bruto) as total_bruto, sum(val_irrf) as total_irrf
	FROM  rhu_mov_irrf_folha
	WHERE dat_pagto >= '".$ano."-01-01'
	AND  dat_pagto <= '".$ano."-12-31'
	AND  matricula  = 580
	AND  tip_processamento  = 4
	GROUP BY 1
	") or die(mysql_error());

	$result_q2 = mysql_fetch_array($select_q2);


	// QUADRO 3

	// ABONO
	$select_q3 = mysql_query("
	SELECT matricula, sum(val_abono) as total_abono
	FROM  rhu_rend_isentos
	WHERE matricula = 580
	AND dat_pagto >= '".$ano."-01-01'
	AND  dat_pagto <= '".$ano."-12-31'
	AND tip_processamento = 7
	GROUP BY 1
	") or die (mysql_error());

	$result_q3 = mysql_fetch_array($select_q3);

	// DESPESAS MEDICAS
	$select_q3_desp_med = mysql_query("
	SELECT matricula, sum(val_desp_medicas) as total_desp_medicas
	FROM  rhu_rend_isentos
	WHERE matricula = 580
	AND dat_pagto >= '".$ano."-01-01'
	AND  dat_pagto <= '".$ano."-12-31'
	AND tip_processamento = 1
	GROUP BY 1
	") or die (mysql_error());

	$result_q3_desp_med = mysql_fetch_array($select_q3_desp_med);


	// QUADRO 4


	$select_q4 = mysql_query("
	SELECT matricula, sum(val_depend) as total_depend, cpf
	FROM  rhu_rend_isen_saud
	WHERE dat_refer >= '".$ano."-01-01'
	AND   dat_refer <= '".$ano."-12-31'
	AND   matricula  = 580
	AND cod_benef = 0
	GROUP BY 1
	") or die (mysql_Error());

	$result_q4 = mysql_fetch_array($select_q4);

	// DEPENDENTE
	$select_q4_depend = mysql_query("
	SELECT  matricula, sum(val_depend) as total_depend, cpf
	FROM  rhu_rend_isen_saud
	WHERE dat_refer >= '".$ano."-01-01'
	AND   dat_refer <= '".$ano."-12-31'
	AND   matricula  = 580
	AND cod_benef = 5
	GROUP BY 1
	") or die (mysql_Error());

	$result_q4_depend = mysql_fetch_array($select_q4_depend);


	// TOTAL
	$select_q4_total = mysql_query("
	SELECT  matricula, sum(val_depend) as total_depend
	FROM  rhu_rend_isen_saud
	WHERE dat_refer >= '".$ano."-01-01'
	AND   dat_refer <= '".$ano."-12-31'
	AND   matricula  = 580
	GROUP BY 1
	") or die (mysql_Error());

	$result_q4_total = mysql_fetch_array($select_q4_total);


	// MASCARÁ CPF FUNCIONARIOS

	$nbr_cpf = $result_q4['cpf'];

	$parte_1 = substr($nbr_cpf, 0, 3);
	$parte_2 = substr($nbr_cpf, 3, 3);
	$parte_3 = substr($nbr_cpf, 6, 3);
	$parte_4 = substr($nbr_cpf, 9, 2);

	$result_q4_cpf = "$parte_1.$parte_2.$parte_3-$parte_4";


	// MASCARÁ CPF DEPENDENTES

	$nbr_cpf = $result_q4_depend['cpf'];

	$parte_1 = substr($nbr_cpf, 0, 3);
	$parte_2 = substr($nbr_cpf, 3, 3);
	$parte_3 = substr($nbr_cpf, 6, 3);
	$parte_4 = substr($nbr_cpf, 9, 2);

	$result_q4_cpf_depend = "$parte_1.$parte_2.$parte_3-$parte_4";

	?>



	<!-- INFORME DE RENDIMENTOS -->
		<fieldset>
		<!-- INICIO: QUADROS DO TOPO -->
			<table border="1" id="cabecalho">
				<tr>
					<td class="negrito font-normal" colspan="3" id="cab_topo" style="border-right: none; width: 50%;">Ministério da Fazenda<br>Secretaria da Receita Federal</td>
					<td class="negrito font-normal" colspan="3" id="cab_topo">Comprovante de Rendimentos Pagos<br> e Retenção de <br>Imposto de Renda na Fonte<br> (Ano Calendário <span style="text-decoration: underline;"><?php echo $ano; ?></span>)</td>
				</tr>

				<!-- PARTE 1 -->
				<tr>
					<td class="negrito font-grande" colspan="6" id="sem_borda_topo_esquerda_direita">1. Fonte Pagadora Pessoa Jurídica ou Pessoa Física</td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="4" id="sem_borda_baixo_topo_direita">Nome Empresarial/Nome</td>
					<td class="negrito font-normal" colspan="2" id="sem_borda_baixo_topo">CNPJ/CPF</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="4" id="sem_borda_baixo_topo_direita">MONTELE INDUSTRIA DE ELEVADORES LTDA</td>
					<td class="font-normal" colspan="2" id="sem_borda_baixo_topo">17.609.256.0001-01</td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="6" id="sem_borda_baixo" >Endereço</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="6" id="sem_borda_baixo_topo">RUA SIMAO ANTONIO, 1200</td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="4" id="sem_borda_baixo_direita">Cidade</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">UF</td>
					<td class="negrito font-normal" id="sem_borda_baixo">Telefone</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="4" id="sem_borda_baixo_topo_direita">CONTAGEM</td>
					<td class="font-normal" id="sem_borda_baixo_topo_direita">MG</td>
					<td class="font-normal" id="sem_borda_baixo_topo">(031) 4000-1044</td>
				</tr>

				<!-- PARTE 2 -->
				<tr>
					<td class="negrito font-grande" colspan="6" id="sem_borda_baixo_esquerda_direita">2. Pessoa Física Beneficiária dos Rendimentos</td>
				</tr>
				<tr>
					<td class="negrito font-normal" id="sem_borda_baixo">CPF</td>
					<td class="negrito font-normal" id="sem_borda_baixo_esquerda_direita">Nome Completo</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">Cat</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">Unid.Func.</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">Turno</td>
					<td class="negrito font-normal" id="sem_borda_baixo">Matrícula</td>
				</tr>
				<tr>
					<td class="font-normal" id="sem_borda_baixo_topo"><?php echo $result_q4_cpf; ?></td>
					<td class="font-normal" id="sem_borda_baixo_esquerda_topo_direita">JOAQUIM EUNILSON DOS SANTOS</td>
					<td class="font-normal" id="sem_borda_baixo_topo_direita">M</td>
					<td class="font-normal" id="sem_borda_baixo_topo_direita">1007004500</td>
					<td class="font-normal" id="sem_borda_baixo_topo_direita">1</td>
					<td class="font-normal" id="sem_borda_baixo_topo"><?php  echo $result_q1['matricula']; ?></td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="6" id="sem_borda_baixo">Natureza do Rendimento</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="6" id="sem_borda_baixo_topo">RENDIMENTOS DO TRABALHO ASSALARIADO</td>
				</tr>

				<!-- PARTE 3 -->
				<tr>
					<td class="negrito font-grande" colspan="5" id="sem_borda_baixo_esquerda_direita">3. Rendimentos Tributáveis, Deduções e Imposto Retido na Fonte</td>
					<td class="negrito font-grande" id="sem_borda_baixo_esquerda_direita">Valores em reais</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Total dos rendimentos (inclusive férias)</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo  number_format($result_q1['total_bruto'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Contribuição previdenciária oficial</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q1['total_inss'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Contribuição a previdência privada e ao fapi</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Pensão alimentícia (informar beneficiário no campo 07)</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q1['total_pensao'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. Imposto retido na fonte</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q1['total_irrf'], 2, ',', '.'); ?></td>
				</tr>

				<!-- INICIO PARTE 4 -->
				<tr>
					<td class="negrito font-grande" colspan="5" id="sem_borda_baixo_esquerda_direita">4. Rendimentos Isentos e Não Tributáveis</td>
					<td class="negrito font-grande" id="sem_borda_baixo_esquerda_direita">Valores em reais</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Parcela isenta proventos de aposentadoria, reserva e pensão</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Diárias e ajuda de custo</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Pensão, proventos de aposentadoria ou reforma por moléstia</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Lucro ou dividendo pago por pj (real/presumido/arbitrado)</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. Valores pagos ao titular ou sócio de microempresa</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">06. Indenizações por rescisão contrato de trabalho, pdv e at.</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="6" id="sem_borda_baixo">07. Outros <span class="negrito">(especificar)</span></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_topo_direita">- Abono de férias</td>
					<td class="font-normal" id="sem_borda_baixo_esquerda_topo"><?php  echo number_format($result_q3['total_abono'], 2, ',', '.'); ?></td>
				</tr>

				<!-- PARTE 5 -->
				<tr>
					<td class="negrito font-grande" colspan="5" id="sem_borda_baixo_esquerda_direita">5. Rendimentos Sujeitos a Tributação Exclusiva (rendimento líquido)</td>
					<td class="negrito font-grande" id="sem_borda_baixo_esquerda_direita">Valores em reais</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Décimo terceiro salário</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q2['total_bruto'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. IR sobre a renda retido na fonte sobre 13º Salário</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q2['total_irrf'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Outros</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>

				<!-- PARTE 6 -->
				<tr>
					<td class="negrito font-grande" colspan="6" id="sem_borda_baixo_esquerda_direita">6. Rendimentos Recebidos Acumuladamente - Art 12-A da Lei nº 7713, de 1988(sujeito á tributação exclusiva)</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_esquerda_topo_direita">Natureza do rendimento:</td>
					<td class="negrito font-grande" id="sem_borda_baixo_esquerda_topo_direita">Valores em reais</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Total dos rendimentos tributáveis (inclusive férias e décimo terceiro salário)</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Exclusão: Despesas com a ação judicial</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Dedução: Contribuição previdenciára oficial</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Pensão alimentícia<span class="negrito">(preencher também o quadro 7)</span></td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. imposto sobre a renda retido na fonte</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">06. Rendimentos isentos de pensão, proventos de aposentadoria ou reforma por moléstia
					<br>grave ou aposentadoria ou reforma por acidente de serviço</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>

					<!-- PARTE 7 -->
				<tr>
					<td class="negrito font-grande" colspan="6" id="sem_borda_baixo_esquerda_direita">7. Informações Complementares</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">O total informado na linha 3 do Quadro 5 já inclui o valor total pago a título de PLR correspondente a</td>
					<td class="font-normal" id="sem_borda_baixo">0</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">Despesas médicas</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q3_desp_med['total_desp_medicas'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="5" id="sem_borda_baixo_direita">BRADESCO SAUDE SA</td>
					<td class="font-normal" id="sem_borda_baixo">92.693.118/0001-60</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">JOAQUIM EUNILSON DOS SANTOS</td>
					<td class="font-normal" id="sem_borda_baixo"><?php  echo number_format($result_q4['total_depend'], 2, ',', '.'); ?></td>
				</tr>
				<!-- DEPENDENTES DO PLANO DE SAÚDE -->
				<tr>
					<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">JULIA CAROLINE VASCONCEOS FARIAS</td>
					<td class="font-normal" id="sem_borda_baixo"><?php echo number_format($result_q4_depend['total_depend'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="5" id="sem_borda_baixo_direita">TOTAL BRADESCO SAUDE SA</td>
					<td class="negrito font-normal" id="sem_borda_baixo"><?php echo number_format($result_q4_total['total_depend'], 2, ',', '.'); ?></td>
				</tr>
				<tr>
					<td class="negrito font-normal" colspan="2" id="sem_borda_baixo_direita">Beneficiário pensão alimentícia</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">CPF</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">Vlr. Normal</td>
					<td class="negrito font-normal" id="sem_borda_baixo_direita">Vlr. PLR.</td>
					<td class="negrito font-normal" id="sem_borda_baixo">Vlr. 13.Sal.</td>
				</tr>
				<tr>
					<td class="font-normal" colspan="2" id="sem_borda_direita">JULIA CAROLINE VASC.F.SANTOS</td>
					<td class="font-normal" id="sem_borda_direita"><?php  echo $result_q4_cpf_depend; ?></td>
					<td class="font-normal" id="sem_borda_direita"><?php // echo $result_q5['total_val_depend']; ?></td>
					<td class="font-normal" id="sem_borda_direita">0</td>
					<td class="font-normal" style="border-color: black;">0</td>
				</tr>
			</table>
		</fieldset>
	</body>
	<footer>
		<!-- PARA IMPRESSÃO DAS GUIAS ASO -->
		<script> // INICIO DO SCRIPT QUE IMPRIME A PAGINA AUTOMATICAMENTE AO ABRIR
		var css = '@page { size: portrait; }',  // CONFIGURA A PAGINA PARA SER IMPRESSA NA VERTICAL POR PADRÃO
		head = document.head || document.getElementsByTagName('head')[0],
		style = document.createElement('style');
		style.type = 'text/css';
		style.media = 'print';
		if (style.styleSheet){
			style.styleSheet.cssText = css;
		}
		else
		{
			style.appendChild(document.createTextNode(css));
		}
		head.appendChild(style);
		setTimeout(function () { window.print();}, 200);  // ADICIONA UM DELAY PARA IMPRIMIR QUANDO A PAGINA CARREGAR
		</script>
		<!-- FIM DO SCRIPT -->
 	</footer>
</html>
