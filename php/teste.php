<?php
		
		
  //Variáveis
  
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $msg = $_POST['mensagem'];
  $sobrenome = $_POST['sobrenome'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');



  
   // Verifique se os dados foram enviados para o mailer. 
   if ( empty($nome) OR empty($sobrenome) OR empty($email) ) {
   
   //http_response_code(400);
   echo "Por favor complete o formulário e tente novamente.";
   echo "<meta http-equiv='refresh' content='5;URL=../contato.html'>";
   
  exit;}  

  //Corpo do E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$msg</p>
      <p><b>sobrenome: </b>$sobrenome</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "chrys481@gmail.com";
  $assunto = "Contato pelo Site";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <chrys481@gmail.com>";

  //Enviar
  //mail($destino, $assunto, $arquivo, $headers);

  if (mail($destino, $assunto, $arquivo, $headers)) {
    // Set a 200 (okay) response code.
       
          //http_response_code(200); 
    echo ("Email enviado com sucesso!");
    echo "<meta http-equiv='refresh' content='5;URL=../contato.html'>";			
        die();
        }
      

    else {  
    // Defina um código de resposta 500 (erro interno do servidor).
    //http_response_code(500);
    echo "Ops! Ocorreu um erro e sua mensagem não foi enviada.";} 
    echo "<meta http-equiv='refresh' content='5;URL=../contato.html'>";

?>