<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php


      print '<form method="post" action="shop_form_done.php">';
      print '<input type="hidden" name="onamae" value="'.$onamae.'">';
      print '<input type="hidden" name="email" value="'.$email.'">';
      print '<input type="hidden" name="postal1" value="'.$postal1.'">';
      print '<input type="hidden" name="postal2" value="'.$postal2.'">';
      print '<input type="hidden" name="address" value="'.$address.'">';
      print '<input type="hidden" name="tel" value="'.$tel.'">';
      print '<input type="hidden" name="pass" value="'.$pass.'">';
      print '<input type="hidden" name="danjo" value="'.$danjo.'">';
      print '<input type="hidden" name="birth" value="'.$birth.'">';
      print '<input type="button" onclick="history.back()" value="戻る" />';
      print '<input type="submit" value="OK" /><br />';
      print '</form>';

    ?>
  </body>
</html>
