<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotController extends Controller
{
    //
    /*public function bot(Request $request){
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

    }*/

  public function bot(Request $request) {
    $data = $request->all();
    if ($data['object'] == 'page') {
      $entrys = $data['entry'];

      foreach ($entrys as $entry) {
        $pageID = $entry['id'];
        $messaging = $entry['messaging'];

        foreach ($messaging as $itemMessaging) {
            if (!empty($itemMessaging['message'])) {
              $this->getMessage($itemMessaging);
            } else {
              $senderID = $itemMessaging['sender']['id'];
              $payload = $itemMessaging['postback']['payload'];
              if (!empty($itemMessaging['postback']) && !empty($payload)) {
                //$button = !empty(DB::table('button')->where('type',"postback")->where('payload_postback',$payload)->first());
                if ($payload === "PROBANDO") {
                  $this->sendTextMessage($senderID,"Probando payload");
                }

              }
              /*if (!empty($itemMessaging['postback']) && !empty($payload) && $payload !== 'GET_STARTED_PAYLOAD' && $payload !== 'YES' && $payload !== 'NO' && $payload !== 'CI') {
                $senderID = $itemMessaging['sender']['id'];
                $record = DB::table('opcion')->where('payload', $payload)->get()->first();

                switch ($record->flag) {
                  case 2:
                    $mensajeenviar = DB::table('mensaje')->where('id',$record->mensaje_id)->get()->first();
                    $this->sendTextMessage($senderID,$mensajeenviar->respuesta);
                    break;
                  case 1:
                    $titulo = DB::table('titulo')->where('id',$record->titulo_idf)->get()->first();
                    $opciones = DB::table('opcion')->where('titulo_id',$titulo->id)->get();
                    $this->sendStartButtonTemplate($senderID,$titulo,$opciones);
                    break;
                  default:
                    break;
                }
                return;
            }*/
                /*$senderID = $itemMessaging['sender']['id'];
                switch ($itemMessaging['postback']['payload']){
                  case 'GET_STARTED_PAYLOAD':
                    $senderID = $itemMessaging['sender']['id'];
                    $this->sendTextMessage($senderID,'Hola, Bienvenido a ChatSchool Bolivia!!!');
                    $this->metodoAntonio($senderID);
                    break;
                  case 'YES':
                    DB::table('temp')->insert(['fbid' => $senderID]);
                    $this->sendTextMessage($senderID,'Porfavor introduce tu numero de carnet de identidad');
                    break;
                }*/
            }

        }
      }
    }

  }

  public function metodoAntonio($senderID){
    $data_to_send = array(
      'recipient'=> array('id'=>"$senderID"), //ID to reply
      'message' => array('attachment' => array(
        'type' => "template", 'payload' => array(
          'template_type' => "button",'text' => "Eres estudiante de alguno de nuestros colegios afiliados?",
          'buttons' => [
            $this->buttonTemplatePostback('YES','Si'),
            $this->buttonTemplatePostback('NO','No')
          ])
      )
      )
    );
    $this->callSendApi($data_to_send);
  }
  public function getMessage($event){
    $senderID = $event['sender']['id'];
    $message = $event['message'];
    $messageText = $message['text'];
    if (!empty($messageText)) {

      // strtolower método php para convertir una cadena a minúscula
      if ($this->isContain(strtolower($messageText),"hola")) {
          $this->sendTextMessage($senderID,"¡Hola que tal! Tengo información lista para ti.");
          //$this->buttonType("Aprete aqui",null,"PROBANDO","postback");
          $this->buttonTemplatePostback("PROBANDO","APRETAR AQUI");
      }else if($this->isContain(strtolower($messageText),"tarea")) {
        $this->sendTextMessage($senderID,"¡Estas son todas las materias donde tienes tareas ;).");
      }else {
            if (ctype_digit($messageText)) {
              $persona = DB::table('persona')->where('tipo_persona', '1')->where('ci', $messageText)->get()->first();
              if (isset($persona->id)) {
                $p = Persona::find($persona->id);
                $p->update(['fbid' => $senderID]);
                $p->save();
                DB::table('temp')->where('fbid', $senderID)->delete();
                $this->sendTextMessage($senderID, 'Verificacion de estudiante exitosa!!\n Bienvenido ' );
                return;
              }
              $messageToRespond = $this->chooseRespond($messageText);
              //$titulo = DB::table('titulo')->where('id',1)->get()->first();
              //$opciones = DB::table('opcion')->where('titulo_id',$titulo->id)->get();
              $this->sendTextMessage($senderID, $messageToRespond);
      //        // $this->sendStartButtonTemplate($senderID,$titulo,$opciones;);
              //$this->sendTextMessage($senderID,"Tu mensaje (if) :D es:".$messageText);
            } /*else {
              $this->sendTextMessage($senderID,"Tu mensaje (else) :D es:".$messageText);
            }*/
      }
    }
  }

  public function chooseRespond($text){
//    $text1 = explode(' ',$text);
//    $msg = '';
//    foreach ($text1 as $item) {
//      $materia = DB::table('materia')->where('nombre','like',"%$item%")->get()->first();
//      if (!empty($materia->id)){
//        foreach ($text1 as $value) {
//          $palabras = DB::table('palabras')->where('palabra_key','like',"%$value%")->get()->first();
//          if (!empty($palabras->id)){
//            $sql = "SELECT m.`respuesta` FROM mensaje m, palabras p WHERE p.`palabra_key` LIKE \"%".$palabras->palabra_key."%\"
//            AND m.`palabra_id`=p.`id` AND p.`materiacurso_id` IN(
//            SELECT mc.id FROM  materia m,materia_curso mc, curso c, gestion g
//            WHERE g.`persona_id`=14 AND mc.`curso_id` = c.id AND g.`curso_id`=c.`id`
//            AND m.`id`= mc.`meteria_id` AND m.`nombre` LIKE \"%".$materia->nombre."%\")";
//            $respuesta =DB::select($sql);
//            return $respuesta->respuesta;
//          }
//        }
//
//      }
//    }

    return $text;

    //return 'No puedo ayudarte con esa pregunta ' . $msg;

  }

  public function buttonstart(){
    $startbutton = [
      'get_started' => [
        'payload' => 'GET_STARTED_PAYLOAD',
      ]
    ];
    $this->callSendApiPost($startbutton);
  }

  public function sendStartButtonTemplate($senderID,$titulo,$opciones) {
    $buttons = [];
    foreach ($opciones as $opcione) {
      $buttons[] = $this->buttonTemplatePostback($opcione->payload,$opcione->opcion);
    }
    $data_to_send = array(
      'recipient'=> array('id'=>"$senderID"), //ID to reply
      'message' => array('attachment' => array('type' => "template", 'payload' => array('template_type' => "button",'text' => $titulo->nombre,
        'buttons' => $buttons,
      ))
      ));
    $this->callSendApi($data_to_send);
  }

  public function buttonTemplatePostback($payload,$title) {
    return array('type' => "postback",'title' => "$title",'payload' => "$payload");
  }

  public function buttonTemplate($url,$title) {
    return array('type' => "web_url",'title' => "$title",'url' => "$url");
  }

  public function isContain($text,$word) {
    /*
     * La función PHP strpos()  devuelve la posición de la primera coincidencia de la palabra o carácter buscado en una cadena de texto (string).
     * Es sensible a mayúsculas y minúsculas.
     * */
    $t = strpos($text,$word);
    return $t>=0;
  }

  private function sendTextMessageHelp($recipientId) {
    sleep(5);
    $this->sendTextMessage($recipientId,"¿En qué más puedo ayudarte bro??");
  }

  private function sendTextMessage($recipientId, $messageText) {
    $data_to_send = array(
      'recipient'=> array('id'=>"$recipientId"), //ID to reply
      'message' => array('text'=>"$messageText") //Message to reply
    );
    $this->callSendApi($data_to_send);
  }

  public function callSendApi($messageData) {
    $options_header = array ( //Necessary Headers
      'http' => array(
        'method' => 'POST',
        'content' => json_encode($messageData),
        'header' => "Content-Type: application/json\n"
      )
    );
    $context = stream_context_create($options_header);
    file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=".env('PAGE_ACCESS_TOKEN'),false,$context);
  }


  public function buttonTemplatef($recipientID,$text)
  {
    $data_to_send = [
      "recipient" => [
        "id" => "$recipientID"
      ],
      "message" => [
        "attachment" => [
          "type" => "template",
          "payload" => [
            "template_type" => "button",
            "text"=>"$text",
            "buttons"=>[
                //Aqui mandas a un metodo con el objeto
              //de la base de datos con todos los
              //button type e iterar
                $this->buttonType($title,$url_web_url,$payload,$type)
            ]
          ]
        ]
      ]
    ];
    $this->callSendApi($data_to_send);
  }

  public function genericTemplatef($recipientID,$templateType,$text)
  {
    $data_to_send = [
      "recipient" => [
        "id" => "$recipientID"
      ],
      "message" => [
        "attachment" => [
          "type" => "template",
          "payload" => [
            "template_type" => "generic",
            "elements" => [
              // Mandar e iterar objeto para todos los elementos
              $this->element($title,$image_url_plantilla_generica),
              $this->button()
            ]
          ]
        ]
      ]
    ];
    $this->callSendApi($data_to_send);
  }

  public function element($title,$image_url_plantilla_generica,
    $subtitle){
    return [
      "title"=>"$title",
            "image_url"=>"$image_url_plantilla_generica",
            "subtitle"=>"$subtitle",
            "buttons"=>[
              //Iterar objtos de button desde la DB
                $this->buttonType($title,$url_web_url,$payload_postback,$type)
            ]
    ];
  }

  public function buttonType($title,$url_web_url,$payload_postback,$type) {
    switch ($type) {
      case "web_url":
        return [
          "type"=>"web_url",
                "url"=>"$url_web_url",
                "title"=>"$title"
        ];
        break;
      case "postback":
        return [
          "type"=>"postback",
          "title"=>"$title",
          "payload"=>"$payload_postback"
        ];
        break;
    }
  }

    public function templateType($templateType,$url,$title,$payload,$title) {
      switch ($templateType) {
        case 'button':
            return $this->buttonTemplate($url,$title);
          break;
        case 'generic':
            return $this->buttonTemplatePostback($payload,$title);
          break;
      }
    }
}
