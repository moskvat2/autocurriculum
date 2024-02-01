<?php

class Candidato {
    public $id_candidato, $nome_candidato, $data_nascimento, $tel_candidato, $cidade, $estado, $end_candidato,
            $bairro_candidato, $pais, $resumo_candidato, $foto_candidato,
            $nome_curso, $ano_conclusao, $descricao_curso, $instituicao,
            $empresa_exp1, $dt_inicio_exp1, $dt_termino_exp1, $cargo_exp1, $desc_exp1,
            $empresa_exp2, $dt_inicio_exp2, $dt_termino_exp2, $cargo_exp2, $desc_exp2,
            $empresa_exp3, $dt_inicio_exp3, $dt_termino_exp3, $cargo_exp3, $desc_exp3,
            $objetivo_candidato, $email_candidato;

    public function __construct(
        $id_candidato, $nome_candidato, $data_nascimento, $tel_candidato, $cidade, $estado, $end_candidato,
            $bairro_candidato, $pais, $resumo_candidato, $foto_candidato,
            $nome_curso, $ano_conclusao, $descricao_curso, $instituicao,
            $empresa_exp1, $dt_inicio_exp1, $dt_termino_exp1, $cargo_exp1, $desc_exp1,
            $empresa_exp2, $dt_inicio_exp2, $dt_termino_exp2, $cargo_exp2, $desc_exp2,
            $empresa_exp3, $dt_inicio_exp3, $dt_termino_exp3, $cargo_exp3, $desc_exp3,
            $objetivo_candidato, $email_candidato) {
            $this->id_candidato = $id_candidato;
            $this->nome_candidato = $nome_candidato;
            $this->data_nascimento = $data_nascimento;
            $this->tel_candidato = $tel_candidato;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->end_candidato = $end_candidato;
            $this->bairro_candidato = $bairro_candidato;
            $this->pais = $pais;
            $this->resumo_candidato = $resumo_candidato;
            $this->foto_candidato = $foto_candidato;
            $this->nome_curso = $nome_curso;
            $this->ano_conclusao = $ano_conclusao;
            $this->descricao_curso = $descricao_curso;
            $this->instituicao = $instituicao;
            $this->empresa_exp1 = $empresa_exp1;
            $this->dt_inicio_exp1 = $dt_inicio_exp1;
            $this->dt_termino_exp1 = $dt_termino_exp1;
            $this->cargo_exp1 = $cargo_exp1;
            $this->desc_exp1 = $desc_exp1;
            $this->empresa_exp2 = $empresa_exp2;
            $this->dt_inicio_exp2 = $dt_inicio_exp2;
            $this->dt_termino_exp2 = $dt_termino_exp2;
            $this->cargo_exp2 = $cargo_exp2;
            $this->desc_exp2 = $desc_exp2;
            $this->empresa_exp3 = $empresa_exp3;
            $this->dt_inicio_exp3 = $dt_inicio_exp3;
            $this->dt_termino_exp3 = $dt_termino_exp3;
            $this->cargo_exp3 = $cargo_exp3;
            $this->desc_exp3 = $desc_exp3;
            $this->objetivo_candidato = $objetivo_candidato;
            $this->email_candidato = $email_candidato;
    }

    public function getCandidato($conn, $nome_candidato) {
        //SELECT id FROM tablename ORDER BY id DESC LIMIT 1
        $sql = "SELECT id_candidato FROM candidato WHERE nome_candidato = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome_candidato);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            // Obtém o primeiro registro da consulta
            $row = $result->fetch_assoc();

            // Retorna o ID do candidato
            // echo "<h1>". $row['id_candidato'] . "</h1>";
            return $row["id_candidato"];
        } else {
            // Retorna null
            return null;
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);

    }

    public function getAllCandidato($conn, $data) {
        $sql = "SELECT * FROM candidato;";
        $stmt = $conn->prepare($sql);
        // $stmt->bind_param("i", $id_candidato);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            // Obtém o primeiro registro da consulta
            $row = $result->fetch_assoc();

            // Retorna o ID do candidato
            //echo "<h1>". $row['id_candidato'] . "</h1>";
            // return $row["id_candidato"];
            return $data;
        } else {
            // Retorna null
            return null;
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);

    }

    public function inserirCandidato($conn) {

        // Prepara a consulta SQL
        echo $sql = "INSERT INTO candidato (
            nome_candidato, data_nascimento, tel_candidato, cidade, estado, end_candidato, bairro_candidato, pais, 
            resumo_candidato, foto_candidato,
            nome_curso, ano_conclusao, descricao_curso, instituicao,
            empresa_exp1, dt_inicio_exp1, dt_termino_exp1, cargo_exp1, desc_exp1,
            empresa_exp2, dt_inicio_exp2, dt_termino_exp2, cargo_exp2, desc_exp2,
            empresa_exp3, dt_inicio_exp3, dt_termino_exp3, cargo_exp3, desc_exp3, objetivo_candidato, email_candidato
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Preenche os parâmetros da consulta
        $stmt->bind_param('sssssssssbsssssssssssssssssssss',
            $this->nome_candidato,
            $this->data_nascimento,
            $this->tel_candidato,
            $this->cidade,
            $this->estado,
            $this->end_candidato,
            $this->bairro_candidato,
            $this->pais,
            $this->resumo_candidato,
            $this->foto_candidato,
            $this->nome_curso,
            $this->ano_conclusao,
            $this->descricao_curso,
            $this->instituicao,
            $this->empresa_exp1,
            $this->dt_inicio_exp1,
            $this->dt_termino_exp1,
            $this->cargo_exp1,
            $this->desc_exp1,
            $this->empresa_exp2,
            $this->dt_inicio_exp2,
            $this->dt_termino_exp2,
            $this->cargo_exp2,
            $this->desc_exp2,
            $this->empresa_exp3,
            $this->dt_inicio_exp3,
            $this->dt_termino_exp3,
            $this->cargo_exp3,
            $this->desc_exp3,
            $this->objetivo_candidato,
            $this->email_candidato
        );

        // Executa a consulta
        $stmt->execute();

        // Verifica se a operação foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            $last_id = $conn->insert_id;
            return true;
        } else {
            return false;
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
    }

}

$candidato = new Candidato(
    $id_candidato, $nome_candidato, $data_nascimento, $tel_candidato, $cidade, $estado, $end_candidato, $bairro_candidato, $pais, 
    $resumo_candidato, $foto_candidato,
    $nome_curso, $ano_conclusao, $descricao_curso, $instituicao,
    $empresa_exp1, $dt_inicio_exp1, $dt_termino_exp1, $cargo_exp1, $desc_exp1,
    $empresa_exp2, $dt_inicio_exp2, $dt_termino_exp2, $cargo_exp2, $desc_exp2,
    $empresa_exp3, $dt_inicio_exp3, $dt_termino_exp3, $cargo_exp3, $desc_exp3,
    $objetivo_candidato, $email_candidato

);

// Obtém os dados do formulário
$nome_candidato = $_POST["nome_candidato"];
$data_nascimento = $_POST["data_nascimento"];
$tel_candidato = $_POST["tel_candidato"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$end_candidato = $_POST["end_candidato"];
$bairro_candidato = $_POST["bairro_candidato"];
$pais = $_POST["pais"];
$resumo_candidato = $_POST["resumo_candidato"];
$foto_candidato = $_FILES["foto_candidato"]["name"];

$nome_curso = $_POST["nome_curso"];
$ano_conclusao = $_POST["ano_conclusao"];
$descricao_curso = $_POST["descricao_curso"];
$instituicao = $_POST["instituicao"];

$empresa_exp1 = $_POST["empresa_exp1"];
$dt_inicio_exp1 = $_POST["dt_inicio_exp1"];
$dt_termino_exp1 = $_POST["dt_termino_exp1"];
$cargo_exp1 = $_POST["cargo_exp1"];
$desc_exp1 = $_POST["desc_exp1"];

$empresa_exp2 = $_POST["empresa_exp2"];
$dt_inicio_exp2 = $_POST["dt_inicio_exp2"];
$dt_termino_exp2 = $_POST["dt_termino_exp2"];
$cargo_exp2 = $_POST["cargo_exp2"];
$desc_exp2 = $_POST["desc_exp2"];

$empresa_exp3 = $_POST["empresa_exp3"];
$dt_inicio_exp3 = $_POST["dt_inicio_exp3"];
$dt_termino_exp3 = $_POST["dt_termino_exp3"];
$cargo_exp3 = $_POST["cargo_exp3"];
$desc_exp3  = $_POST["desc_exp3"];
$objetivo_candidato = $_POST["objetivo_candidato"];
$email_candidato = $_POST["email_candidato"];


?>