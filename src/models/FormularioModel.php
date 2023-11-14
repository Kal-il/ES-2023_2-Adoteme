<?php
namespace models;

class FormularioModel{
    private function queryDatabase($connection, $query) {
        $resultado = pg_query($connection, $query);

        if (!$resultado) {
            die("Erro na busca: " . pg_last_error($connection));
        }

        return $resultado;
    }

    public function CreateFormulario($connection, $data){
        $ja_adotou = $data['ja_adotou'];
        $tipo_endereco = $data['tipo_endereco'];
        $num_adultos = $data['num_adultos'];
        $num_criancas = $data['num_criancas'];
        $idade_criancas = $data['idade_criancas'];
        $motivo = $data['motivo'];
        $tipo_casa = $data['tipo_casa'];
        $permissao_proprietario = $data['permissao_proprietario']; # Se o proprietario permite animais na casa
        $areas_casa = $data['areas_casa']; # Areas de atenção da casa (piscina, lareira, etc)
        $ja_teve = $data['ja_teve_gato'];
        $historico_gatos = $data['historico_gatos'];
        $outros_animais = $data['outros_animais'];
        $tempo_planejamento = $data['tempo_planejamento'];
        $consentimento = $data['consentimento']; # Se as pessoas que moram junto consentem com a adoção
        $cuidado_viagem = $data['cuidado_viagem']; # Quem vai cuidar quando o dono viajar
        $gastos = $data['gastos']; # Se o dono está consciente dos gastos
        $alergia = $data['alergia']; # Se o dono tem alergia
        $se_descobrir_alergia = $data['se_descobrir_alergia'];
        $filho_descobrir_alergia = $data['filho_descobrir_alergia'];
        $parceiro_descobrir_alergia = $data['parceiro_descobrir_alergia'];
        $gravidez = $data['gravidez'];
        $se_arranhar = $data['se_arranhar'];
        $se_fugir = $data['se_fugir'];
        $se_nao_puder_cuidar = $data['se_nao_puder_cuidar'];
        $mudanca = $data['mudanca']; # O que será feito em caso de mudança
        $motivos_doacao = $data['motivos_doacao']; # Por quais motivos ele doaria o gato
        $consciente_adaptacao = $data['consciente_adaptacao']; # Se ele tem outro gato, ele sabe que demora prum gato se adaptar a outro
        $quarto_adaptacao = $data['quarto_adaptacao']; # Se ele tem outro gato, ele tem um quarto pra separar os gatos em caso de briga
        $compromisso_idade = $data['compromisso_idade']; # Se ele sabe que o gato pode viver até 15 anos
        $consciente_custo = $data['consciente_custo'];
        $campo_opcional = $data['campo_opcional'];
        $termos_uso = $data['termos_uso'];
        $id_usuario = $data['id_usuario'];
        $id_gato = $data['id_gato'];

        $query = "INSERT INTO formularios(
            ja_adotou_conosco,
            tipo_endereço,
            num_adultos,
            num_criancas,
            idade_criancas,
            motivo,
            tipo_casa,
            permissao_proprietario,
            areas_casa,
            ja_teve,
            historico_gatos,
            outro_animais,
            tempo_planejamento,
            consentimento,
            cuidado_viagem,
            gastos,
            alergia,
            se_descobrir_alergia,
            filho_descobrir_alergia,
            parceiro_descobrir_alergia,
            gravidez,
            se_arranhar,
            se_fugir,
            se_nao_puder_cuidar,
            mudanca,
            motivos_doacao,
            consciente_adaptacao,
            quarto_adaptacao,
            compromisso_idade,
            consciente_custo,
            campo_opcional,
            termos_uso,
            id_usuario,
            id_gato
        ) VALUES (
            '$ja_adotou',
            '$tipo_endereco',
            '$num_adultos',
            '$num_criancas',
            '$idade_criancas',
            '$motivo',
            '$tipo_casa',
            '$permissao_proprietario',
            '$areas_casa',
            '$ja_teve',
            '$historico_gatos',
            '$outros_animais',
            '$tempo_planejamento',
            '$consentimento',
            '$cuidado_viagem',
            '$gastos',
            '$alergia',
            '$se_descobrir_alergia',
            '$filho_descobrir_alergia',
            '$parceiro_descobrir_alergia',
            '$gravidez',
            '$se_arranhar',
            '$se_fugir',
            '$se_nao_puder_cuidar',
            '$mudanca',
            '$motivos_doacao',
            '$consciente_adaptacao',
            '$quarto_adaptacao',
            '$compromisso_idade',
            '$consciente_custo',
            '$campo_opcional',
            '$termos_uso',
            '$id_usuario',
            '$id_gato'
        );
        ";

        $resultado = $this->queryDatabase($connection, $query);

        if(pg_affected_rows($resultado) == 0){
            return false;
        } else {
            return true;
        }  

    }
}

?>
