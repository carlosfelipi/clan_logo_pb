<?php

/**
 * Converte um valor de logo do clã em uma representação formatada para CSS.
 *
 * Converts a clan logo value into a formatted CSS representation.
 *
 * @param int $clanLogo O valor da logo do clã. The clan logo value.
 * @return string A representação formatada para CSS da logo do clã. The formatted CSS representation of the clan logo.
 * @author Dev Feliph3 && Aditya Nugraha
 */
function getlogoClan(int $clanLogo)
{
  // Converte o valor para um número inteiro
  // Convert the value to an integer
  $integerValue = intval($clanLogo);

  // Empacota o valor como um array de quatro bytes
  // Pack the value as a four-byte array
  $fourBytesArray = pack("V", $integerValue);

  // Converte o array de bytes em uma representação hexadecimal
  // Convert the byte array into a hexadecimal representation
  $hexValue = bin2hex($fourBytesArray);

  // Divide a representação hexadecimal em valores decimais de dois dígitos
  // Split the hexadecimal representation into two-digit decimal values
  $decimalValues = array();

  for ($i = 0; $i < strlen($hexValue); $i += 2) {
    $hexChunk = substr($hexValue, $i, 2);
    $decimalValue = hexdec($hexChunk);

    switch (($i / 2) + 1) {
      case 2:
        $label = 'cf';
        break;
      case 1:
        $label = 'cm';
        break;
      case 4:
        $label = 'bp';
        break;
      case 3:
        $label = 'tl';
        break;
      default:
        $label = '';
    }

    // Formata o valor com um rótulo e zero à esquerda, se necessário
    // Format the value with a label and leading zeros if necessary
    $formattedValue = $label . str_pad($decimalValue, 2, '0', STR_PAD_LEFT);
    $decimalValues[] = $formattedValue;
  }

  // Retorna os valores formatados como uma string
  // Return the formatted values as a string
  return implode(' ', $decimalValues);
}

?>
<link rel="stylesheet" href="static/css/clan.css">
<td>
  <div class="logo <?php echo getlogoClan(343606019); ?>">
    <img src="static/clanmark/clanmark_bg_filled_x2.png" class="c_bg">
    <img src="static/clanmark/clanmark_bg_outline_x2.png" class="c_bg_line">
    <img src="static/clanmark/clanmark_symbol_filled_x2.png" class="c_img">
    <img src="static/clanmark/clanmark_symbol_outline_x2.png" class="c_img_line">
  </div>
</td>