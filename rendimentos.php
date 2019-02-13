<!-- ESTÁ PAGINA TEM O OBJETIVO DE GEAR A GUIA PARA QUE ELA SEJA IMPRESSA -->

<?php
session_start();
// require_once("../../requires/conecta.php"); // CONEXÃO COM O BANCO DE DADOS



// BUSCA OS DADOS DO FUNCIONÁRIO
/*
$sql = mysql_query("
SELECT den_cargo, num_cart_ident, den_uni_funcio, num_pis, num_cpf, num_cart_prof, num_serie_prof, uf_prof, dat_admis, num_matricula, cod_uni_funcio, num_cbo
FROM funcionarios_sesmt
WHERE nom_funcionario = '{$_GET['func']}';") or die(mysql_error());
$dados = mysql_fetch_array($sql);
*/
// CONDIÇÕES SÃO ANALISADAS PARA DETERMINAR A MARCAÇÃO DA CHECK BOX
// EM CASO DE MUDANÇA DE FUNÇÃO, É REALIZADA UMA BUSCA NAS OPÇÕES MARCADAS NA PÁGINA ANTERIOR

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
		margin: 15mm 0mm 0mm 0mm;   /* this affects the margin in the printer settings */
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
		margin-left: 8px;
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
	<!-- INFORME DE RENDIMENTOS -->
	<fieldset>
		<!-- INICIO: QUADROS DO TOPO -->
		<table border="1" id="cabecalho">
			<tr>
				<td class="negrito font-normal" colspan="3" id="cab_topo" style="border-right: none; width: 50%;">Ministério da Fazenda<br>Secretaria da Receita Federal</td>
				<td class="negrito font-normal" colspan="3" id="cab_topo">Comprovante de Rendimentos Pagos<br> e Retenção de <br>Imposto de Renda na Fonte<br> (Ano Calendário <span style="text-decoration: underline;">2018</span>)</td>
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
				<td class="font-normal" id="sem_borda_baixo_topo">066.964.296-70</td>
				<td class="font-normal" id="sem_borda_baixo_esquerda_topo_direita">JOAQUIM EUNILSON DOS SANTOS</td>
				<td class="font-normal" id="sem_borda_baixo_topo_direita">M</td>
				<td class="font-normal" id="sem_borda_baixo_topo_direita">1007004500</td>
				<td class="font-normal" id="sem_borda_baixo_topo_direita">1</td>
				<td class="font-normal" id="sem_borda_baixo_topo">580</td>
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
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Contribuição previdenciária oficial</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Contribuição a previdência privada e ao fapi</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Pensão alimentícia (informar beneficiário no campo 07)</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. Imposto retido na fonte</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>

			<!-- INICIO PARTE 4 -->
			<tr>
				<td class="negrito font-grande" colspan="5" id="sem_borda_baixo_esquerda_direita">4. Rendimentos Isentos e Não Tributáveis</td>
				<td class="negrito font-grande" id="sem_borda_baixo_esquerda_direita">Valores em reais</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Parcela isenta proventos de aposentadoria, reserva e pensão</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Diárias e ajuda de custo</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Pensão, proventos de aposentadoria ou reforma por moléstia</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Lucro ou dividendo pago por pj (real/presumido/arbitrado)</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. Valores pagos ao titular ou sócio de microempresa</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">06. Indenizações por rescisão contrato de trabalho, pdv e ata</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="6" id="sem_borda_baixo">07. Outros <span class="negrito">(especificar)</span></td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_topo_direita">- Abono de férias</td>
				<td class="font-normal" id="sem_borda_baixo_esquerda_topo">2564,23</td>
			</tr>
			
			<!-- PARTE 5 -->
			<tr>
				<td class="negrito font-grande" colspan="5" id="sem_borda_baixo_esquerda_direita">5. Rendimentos Sujeitos a Tributação Exclusiva (rendimento líquido)</td>
				<td class="negrito font-grande" id="sem_borda_baixo_esquerda_direita">Valores em reais</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">01. Décimo terceiro salário</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. IR sobre a renda retido na fonte sobre 13º Salário</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Outros</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
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
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">02. Exclusão: Despesas com a ação judicial</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">03. Dedução: Contribuição previdenciára oficial</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">04. Pensão alimentícia<span class="negrito">(preencher também o quadro 7)</span></td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">05. imposto sobre a renda retido na fonte</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">06. Rendimentos isentos de pensão, proventos de aposentadoria ou reforma por moléstia 
				<br>grave ou aposentadoria ou reforma por acidente de serviço</td>
				<td class="font-normal" id="sem_borda_baixo">34.643,56</td>
			</tr>
			
			<!-- PARTE 7 -->
			<tr>
				<td class="negrito font-grande" colspan="6" id="sem_borda_baixo_esquerda_direita">7. Informações Complementares</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">O total informado na linha 3 do Quadro 5 já inclui o valor total pago a título de PLR correspondete a</td>
				<td class="font-normal" id="sem_borda_baixo">0,00</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">Despesas medicas</td>
				<td class="font-normal" id="sem_borda_baixo">99,52</td>
			</tr>
			<tr>
				<td class="negrito font-normal" colspan="5" id="sem_borda_baixo_direita">BRADESCO SAUDE SA</td>
				<td class="font-normal" id="sem_borda_baixo">92.693.118/0001-60</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">JOAQUIM EUNILSON DOS SANTOS</td>
				<td class="font-normal" id="sem_borda_baixo">1593,00</td>
			</tr>
			<!-- DEPENDENTES DO PLANO DE SAÚDE -->
			<tr>
				<td class="font-normal" colspan="5" id="sem_borda_baixo_direita">JULIA CAROLINE VASCONCEOS FARIAS</td>
				<td class="font-normal" id="sem_borda_baixo">1593,00</td>
			</tr>
			<tr>
				<td class="negrito font-normal" colspan="5" id="sem_borda_baixo_direita">TOTAL BRADESCO SAUDE SA</td>
				<td class="negrito font-normal" id="sem_borda_baixo">31860</td>
			</tr>
			<tr>
				<td class="negrito font-normal" colspan="2" id="sem_borda_baixo_direita">Beneficiário pensão alimentícia</td>
				<td class="negrito font-normal" id="sem_borda_baixo_direita">CPF</td>
				<td class="negrito font-normal" id="sem_borda_baixo_direita">Vlr. Normal</td>
				<td class="negrito font-normal" id="sem_borda_baixo_direita">Vlr.PLR.</td>
				<td class="negrito font-normal" id="sem_borda_baixo">Vlr.13.Sal.</td>
			</tr>
			<tr>
				<td class="font-normal" colspan="2" id="sem_borda_direita">JULIA CAROLINE VASC.F.SANTOS</td>
				<td class="font-normal" id="sem_borda_direita">149.853.876-96</td>
				<td class="font-normal" id="sem_borda_direita">4,997,81</td>
				<td class="font-normal" id="sem_borda_direita">0,00</td>
				<td class="font-normal" style="border-color: black;">0,00</td>
			</tr>		
		</table>
	</fieldset>
</body>
<footer>
	<!-- PARA IMPRESSÃO DAS GUIAS ASO -->
	<script> // INICIO DO SCRIPT QUE IMPRIME A PAGINA AUTOMATICAMENTE AO ABRIR
		var css = '@page { size: portrait; }',  // CONFIGURA A PAGINA PARA SER IMPRESSA NA HORIZONTAL POR PADRÃO
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
		setTimeout(function () { window.print();}, 200);  // ADICIONA UM DELAY DE 3 SEGUNDOS PARA IMPRIMIR QUANDO A PAGINA CARREGAR

	</script>   
	<!-- FIM DO SCRIPT -->
</footer>
</html>
