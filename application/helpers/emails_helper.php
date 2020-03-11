<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function enviar_email($email, $attach = FALSE)
{		
	//if(ENVIRONMENT != "production"){
		$CI =& get_instance();
		
		$CI->load->library('email', unserialize(EMAIL));
		$CI->email->set_newline("\r\n");
			
		if(isset($email['from'])){
			$CI->email->from($email['from'], $email['from_name']);
		}
		else{
			$CI->email->from('marketing@solides.adm.br', 'Solides');
		}

		$CI->email->to( $email['email']);
		
			
		$CI->email->subject( $email['assunto']) ;
		$CI->email->message( $email['mensagem'] );

		if($attach){
			$CI->email->attach($attach);
		}
			
		if(! $CI->email->send(FALSE) ){
			$mail_body = date("d/m/Y H:i:s") ." falhou o emails \n". $CI->email->print_debugger();
			mail("jack@solides.com.br", "erro", $mail_body);
			//file_put_contents("/home/solidesadm2/www/log_teste", "\n\n". date("d/m/Y H:i:s") ." falhou o emails \n". $CI->email->print_debugger() ."\n ", FILE_APPEND);
			return FALSE;
		}
		else{
			$mail_body = date("d/m/Y H:i:s") ." falhou o emails \n". $CI->email->print_debugger();
			
			//file_put_contents("/home/solidesadm2/www/log_teste", "\n\n". date("d/m/Y H:i:s") ." email enviado\n". "\n ", FILE_APPEND);
			return TRUE;
		}
	// }
	// else{

	// 	if(! isset($email['from'])){
	// 		$email['from'] = 'cit@solides.adm.br';
	// 		$email['from_name'] = 'Solides - CIT';
	// 	}
		
	// 	if (is_array($email['email'])) {
	// 		$email_destino = implode(", ", $email['email']); 
	// 	}
	// 	else{
	// 		$email_destino = $email['email'];		
	// 	}

	// 	$reply = isset($email['reply']) ? $email['reply'] : "diego@solides.com.br";
			
		

	// 	// Configuração de envio de email
	//     $headers = "MIME-Version: 1.1\n";
	//     $headers .= "From: {$email['from_name']} <{$email['from']}>\n";
	//     $headers .= "Content-type: text/html; charset=utf-8\n";
	//     // E-mail que receberá a resposta quando se clicar no 'Responder' de seu leitor de e-mails
	//     $headers .= "Reply-To: $reply\n";
	//     // $headers.= "Bcc: suporte@solides.com.br\r\n";    


	//     $envio = mail($email_destino, $email['assunto'], $email['mensagem'], $headers);

	//     if (!$envio) {
	//         echo "falha ao enviar email";
	//         return FALSE;
	//     }

	//     return TRUE;
	// }

}