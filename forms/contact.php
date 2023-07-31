<?php
/**
 * "PHP Email Form" kütüphanesini gerektirir
 * "PHP Email Form" kütüphanesi yalnızca şablonun pro sürümünde mevcuttur
 * Kütüphane buraya yüklenmelidir: vendor/php-email-form/php-email-form.php
 */

// E-postaların gönderileceği e-posta adresini burada belirleyin
$receiving_email_address = 'yeni_eposta@example.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('"PHP Email Form" Kütüphanesi yüklenemedi!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// E-postaları göndermek için SMTP kullanmak istiyorsanız aşağıdaki kodu yorumdan çıkarın ve doğru SMTP kimlik bilgilerini girin
$contact->smtp = array(
  'host' => 'mail.sinanunver.com', 
  'username' => 'vversoft@sinanunver.com', 
  'password' => 'Sinanunver52',
  'port' => '465' 
);

$contact->add_message($_POST['name'], 'Ad ve Soyad');
$contact->add_message($_POST['email'], 'E-posta');
$contact->add_message($_POST['message'], 'Mesaj', 10);

echo $contact->send();
?>
