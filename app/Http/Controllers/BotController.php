<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    //
    public function bot(Request $request){
        $data = $request->all();
        $id = $data['entry'][0]['messaging'][0]['sender']['id'];
        $senderMessage = $data['entry'][0]['messaging'][0]['message'];
        if (!empty($senderMessage)){
            $messageToRespond = '';
            if ($senderMessage['text'] === 'hola'){
                $messageToRespond = "Bienvenido al Chatbot Educativo!!";
            }else if ($senderMessage['text'] === 'adios'){
                $messageToRespond = "Vuelve pronto!!";
            }else{
                $messageToRespond = "No entiendo tu pregunta!!";
            }
            $this->sendTextMessage($id,$messageToRespond);
        }
    }

    public function sendTextMessage($recipientId, $messageText){
        $data_to_send = array(
            'recipient'=> array('id'=>"$recipientId"), //ID to reply
            'message' => array('text'=>"$messageText") //Message to reply
        );

        $options_header = array ( //Necessary Headers
            'http' => array(
                'method' => 'POST',
                'content' => json_encode($data_to_send),
                'header' => "Content-Type: application/json\n"
            )
        );
        $context = stream_context_create($options_header);
        file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=".env('PAGE_ACCESS_TOKEN'),false,$context);

    }
}
