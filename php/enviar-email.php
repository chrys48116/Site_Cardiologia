<?php
  //Variáveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "chrys481@gmail.com";
  $assunto = "Contato pelo Site - CCOR";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  if(mail($destino, $assunto, $arquivo, $headers)){
    // echo("Email enviado com sucesso!!");
    "<span>Email enviado com sucesso</span>";
    echo "<meta http-equiv='refresh' content='3;URL=../contato.html'>";
  }else{
    echo("O email não pôde ser enviado, talvez esteja faltando alguma informação.");
    echo "<meta http-equiv='refresh' content='3;URL=../contato.html'>";
  }
?>