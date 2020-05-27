<?php
# Aqui inclu�mos a classe html2pdf.
require_once dirname(__FILE__).'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;

//include('html2pdf/src/html2pdf.php'); 
/* Guardamos na vari�vel $html o html que queremos converter.
 * Linha 13 - Inclu�mos o nosso arquivo css (exemploPdf.css)
 * Linha 15 - Temos uma div de id = logo que formatamos a mesma
 *            com uma altura, largura, uma borda azul e uma imagem
 *            de background.
 * Linha 16 - Temos agora um span de id = texto que formatamos
 *            usando a fonte arial em negrito. */
$html = '

 
    
<div id="logo"></div>
<span id="texto">HTML2PDF</span>';
# Converte o html para pdf.
try
{
    /* Aqui estamos instanciando um novo objeto que ir� criar o
     * pdf. Ent�o vamos aos parametros passados:
     * 1� par�metro: Utilize �P� para exibir o documento no
     *               formato retrato e �L� para o formato
     *               paisagem.
     * 2� par�metro: Formato da folha A4, A5.......
     * 3� par�metro: Caso ocorra alguma exce��o durante a
     *               convers�o. Em qual idioma � para
     *               exibir o erro. No caso o idioma escolhido
     *               foi o portugu�s �pt�.
     * 4� par�metro: Informe TRUE caso o html de entrada esteja
     *               no formato unicode e FALSE caso negativo.
     * 5� par�metro: Codifica��o a ser utilizada. ISO-8859-15, UTF-8 ......
     * 6� par�metro: Margem do documento. Voc� pode informa um
     *               �nico valor como no exemplo acima.
     *               Outra forma � informa um array setando as
     *               margens separadamente.: Exemplo:
     * $html2pdf = new HTML2PDF(
     *   'P',
     *   'A4',
     *   'pt',
     *   false,
     *   'ISO-8859-15',
     *   array(5,5,5,8));
     * Sendo que a primeira posi��o do array representa a margem esquerda depois
     * topo, direita e rodap�. */
    $html2pdf = new HTML2PDF('P','A4','pt', true, 'UTF-8', 2);
    
    # Passamos o html que queremos converte.
    $html = '<html><head><meta charset="UTF-8"><title>teste</title></head><body>estou aqui dentro !</body></html>';
    $html2pdf->writeHTML($html);
    
    /* Exibe o pdf:
     * 1� par�metro: Nome do arquivo pdf. O nome que voc� quer dar ao pdf gerado.
     * 2� par�metro: Tipo de sa�da:
     I: Abre o pdf gerado no navegador.
     D: Abre a janela para voc� realizar o download do pdf.
     F: Salva o pdf em alguma pasta do servidor. */
    $html2pdf->Output('exemploPdf.pdf', 'I');
}
catch(HTML2PDF_exception $e)
{
    $e = 'entrei na exce��o';
    echo $e;
}
?>