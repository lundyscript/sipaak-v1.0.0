<?php
$options = ['cost' => 10];
$katasandi= password_hash("lundy",PASSWORD_DEFAULT, $options);
$hash = '$2y$10$No9Ex8x5BHOBQX5gD9TZtO8T.X9VwsPQpbVCHLMdjq1niT6/NL/g2';
if(password_verify("lundy",$hash)){
  echo "cocok";
}else{
  echo "tidak cocok";
  echo $katasandi;
}
?>