<?php


/*  
*   Validador Multiparams, recebe 2 parametros obrigatórios, o primeiro é o objeto e o segundo é as propriedades do $obj que deseja verificar.
*   Verificação: Passa um array com todos as propriedades, verifica se cada propriedade existe,se é diferente de null e se não é vazia.
*   Caso Passe nas verificações Retorna true, senão false.
*   OBS: PARA VERIFICAR DATAS OBRIGATÓRIO COLOCA-LAS NOS 2 PRIMEIROS INDICES DO ARRAY E DECLARAR $data = true
*   Ao chamar essa função coloca-la dentro de um if e verificar se ela é != 
*  false 
*    exemplo 1 -> if(validator($json, ['propriedade1', 'propriedade2']) != false)    
    exemplo 2 -> if(validador($json, ['DATA_INICIO', 'DATA_FIM'], true) != false)
*   ou 
*     if( validator($json, ['propriedade1', 'propriedade2']) )  
*     if( validator($json, ['DATA_INICIO', 'DATA_FIM'], true) )
*/

namespace App\Core;

class Validator
{

    /* VALIDADOR ADAPTADO PARA DATAS */
    public static function Validator($obj, array $param, $data = false)
    {
        $respostas = [];
        if ($data === true) {
            isset($obj->{$param[0]}) && !empty($obj->{$param[0]}) && isset($obj->{$param[1]}) && !empty($obj->{$param[1]}) ? $respostas = true : $respostas = false;
            return $respostas;
        }
        foreach ($param as $values) {
            isset($obj->{$values}) && !empty($obj->{$values}) ? $respostas[] = true : $respostas[] = false;
        }
        foreach ($respostas as $resposta) {
            if ($resposta === false && $resposta !== 0) {
                return $respostas = false;
            }
        };
        return $respostas = true;
    }
}
