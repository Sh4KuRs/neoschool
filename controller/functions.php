<?php

function getEstadoCivil($estado) {
    switch ($estado) {
        case "1":
            $result = "Solteiro(a)";
        break;
        case "2":
            $result = "Casado(a)";
        break;
        case "3":
            $result = "Separado(a)";
        break;
        case "4":
            $result = "Divorciado(a)";
        break;
        case "5":
            $result = "Viúvo(a)";
        break;
        default:
            $result = "Não declarado!";
        break;
    }
    return $result;
}

function calcularIdade($data) {
    list($dia, $mes, $ano) = explode('/', $data);
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    return $idade;
}

function getOrgaoExpeditor($orgao) {
    switch ($orgao) {
        case "1":
            $result = "SSP - Secretaria de Segurança Pública";
        break;
        case "2":
            $result = "PM - Polícia Militar";
        break;
        case "3":
            $result = "PC - Policia Civil";
        break;
        case "4":
            $result = "CNT - Carteira Nacional de Habilitação";
        break;
        case "5":
            $result = "DIC - Diretoria de Identificação Civil";
        break;
        case "6":
                $result = "CTPS - Carteira de Trabaho e Previdência Social";
        break;
        case "7":
                $result = "FGTS - Fundo de Garantia do Tempo de Serviço";
        break;
        case "8":
                $result = "IFP - Instituto Félix Pacheco";
        break;
        case "9":
                $result = "DIC - Diretoria de Identificação Civil";
        break;
        case "10":
                $result = "IML - Instituto Médico-Legal";
        break;
        case "11":
                $result = "MTE - Ministério do Trabalho e Emprego";
        break;
        case "12":
                $result = "MMA - Ministério da Marinha";
        break;
        case "13":
                $result = "MAE - Ministério da Aeronáutica";
        break;
        case "14":
                $result = "MEX - Ministério do Exército";
        break;
         case "15":
                $result = "POM - Polícia Militar";
        break;
        case "16":
                $result = "POF - Polícia Federal";
        break;
        case "17":
                $result = "SJS - Secretaria da Justiça e Segurança";
        break;
        case "18":
                $result = "SJTS - Secretaria da Justiça do Trabalho e Segurança";
        break;
        default:
            $result = "Não declarado!";
        break;
    }
    return $result;
}