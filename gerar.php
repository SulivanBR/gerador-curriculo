<?php
require __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

function limpar($txt){ return htmlspecialchars($txt ?? '', ENT_QUOTES, 'UTF-8'); }

$nome = $_POST['nome'] ?? '';
$nascimento = $_POST['nascimento'] ?? '';
$nascimento_original = $_POST['nascimento'] ?? '';

if (!empty($nascimento_original)) {
    // Converte de "aaaa-mm-dd" para "dd/mm/aaaa"
    $nascimento = date("d/m/Y", strtotime($nascimento_original));
} else {
    $nascimento = '';
}

$idade = $_POST['idade'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$habilidades = $_POST['habilidades'] ?? '';
$experiencias = $_POST['experiencias'] ?? [];

$html = '
<style>
body { font-family: Arial, sans-serif; }
h1 { font-size: 18pt; margin-bottom: 0; }
h2 { font-size: 13pt; margin-top: 20px; }
p, li { font-size: 11pt; }
</style>

<h1>'.limpar($nome).'</h1>
<p><b>Email:</b> '.limpar($email).' | <b>Telefone:</b> '.limpar($telefone).'</p>
<p><b>Data de nascimento:</b> '.limpar($nascimento).' ('.limpar($idade).' anos)</p>

<h2>Experiências</h2>
';

if (!empty($experiencias)) {
    foreach ($experiencias as $exp) {
        $html .= '<p><b>'.limpar($exp['cargo']).'</b> - '.limpar($exp['empresa']).'<br>'
            .limpar($exp['inicio']).' até '.limpar($exp['fim']).'<br>'
            .limpar($exp['descricao']).'</p>';
    }
} else {
    $html .= '<p>Nenhuma experiência informada.</p>';
}

$html .= '<h2>Habilidades</h2><p>'.limpar($habilidades).'</p>';

$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new Dompdf($options);
$pdf->loadHtml($html);
$pdf->setPaper('A4', 'portrait');
$pdf->render();
$pdf->stream("Curriculo_".preg_replace('/\s+/','_',$nome).".pdf", ["Attachment" => false]);
exit;
