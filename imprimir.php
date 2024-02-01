<?php
    error_reporting(E_ERROR | E_PARSE);

    require_once('db.php');

    require_once('Candidato.php');

    // if ($_GET['id_candidato'] == ""){
    //     header('Location: cadastro.php');
    // }

    //$lastID = $candidato->getCandidato($conn, $id_candidato);
    $id_candidato = $_GET['id_candidato'];
    $sql = "SELECT * FROM candidato WHERE id_candidato = $id_candidato";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $id_candidato);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de candidato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row text-center border">
        <h2><?php echo $row['nome_candidato']; ?></h2>
        <p class="text-center">
            <?php
                echo $row['end_candidato'] . " - " . $row['bairro_candidato'] . "<br>";

                echo $row['cidade'] . " - " . $row['estado'] . "<br>";
                echo "Telefone: " . $row['tel_candidato'] . "<br>";
                echo "E-mail: " . $row['email_candidato'] ;
                
            ?>
        </p>
    </div>

    <div class="img-fuild rounded">
        <img src="https://img.freepik.com/free-photo/man-with-his-arms-crossed_1368-9618.jpg?size=626&ext=jpg"
            width="150hv" height="150hv" style="position:absolute; margin-top: -155px; margin-left:0px">
    </div>


    <hr>

    <div class="row text-center">
        <div class="h3 mb-3"><b>Informações do Candidato</b></div>
    </div>

    <div class="row">
        <div class=""><b>Objetivo Profissional:</b></div>
    </div>
    <div class="row">
        <div class="mb-3"><?php  echo $row['objetivo_candidato']; ?></div>
    </div>


    <div class="row">
        <div class=""><b>Resumo:</b></div>
    </div>
    <div class="row mb-3">
        <div class=""><?php  echo $row['resumo_candidato']; ?></div>
    </div>

    <hr>

    <div class="row text-center">
        <div class="h3 mb-3"><b>Formação Acadêmica</b></div>
    </div>

    <div class="row">
        <div class="col-md-1"><b>Instituição:</b></div>
        <div class="col-md-11"><?php echo $row['instituicao'];?></div>
    </div>
    
    <div class="row">
        <div class="col-md-1"><b>Curso:</b></div>
        <div class="col-md-11"><?php  echo $row['nome_curso']; ?></div>
    </div>

    <div class="row">
        <div class="col-md-1"><b>Conclusão:</b></div>
        <div class="col-md-11"><?php echo $row['ano_conclusao'];?></div>
    </div>

    <div class="row">
        <div class="col-md-1"><b>Descrição:</b></div>
        <div class="col-md-11"><?php echo $row['descricao_curso']; ?></div>
    </div>

    <hr>

    <div class="row text-center">
        <div class="h3"><b>Experiência Profissional</b></div>
    </div>

    <!-- ultimo emprego -->
    <div class="row">
        <div class="col-md-3 mb-3"><b>Último Emprego</b></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Empresa:</b></div>
        <div class="col-md-11"><?php echo $row['empresa_exp1'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Cargo:</b></div>
        <div class="col-md-11"><?php echo $row['cargo_exp1'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Início:</b></div>
        <div class="col-md-11"><?php echo $row['dt_inicio_exp1']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Termíno:</b></div>
        <div class="col-md-11"><?php echo $row['dt_termino_exp1']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Descrição:</b></div>
        <div class="col-md-11 text-justify"><?php echo $row['desc_exp1']; ?></div>
    </div>

    <br/>

    <!-- penultimo emprego -->
    <div class="row">
        <div class="col-md-3 mb-3"><b>Penúltimo Emprego</b></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Empresa:</b></div>
        <div class="col-md-9"><?php echo $row['empresa_exp2'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Cargo:</b></div>
        <div class="col-md-9"><?php echo $row['cargo_exp2'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Início:</b></div>
        <div class="col-md-9"><?php echo $row['dt_inicio_exp2']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Termíno:</b></div>
        <div class="col-md-9"><?php echo $row['dt_termino_exp2']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Descrição:</b></div>
        <div class="col-md-11 text-justify"><?php echo $row['desc_exp2']; ?></div>
    </div>

    <br/>

    <!-- antepenultimo emprego -->
    <div class="row">
        <div class="col-md-3 mb-3"><b>Antepenúltimo Emprego</b></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Empresa:</b></div>
        <div class="col-md-9"><?php echo $row['empresa_exp3'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Cargo:</b></div>
        <div class="col-md-9"><?php echo $row['cargo_exp3'];?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Início:</b></div>
        <div class="col-md-9"><?php echo $row['dt_inicio_exp3']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Termíno:</b></div>
        <div class="col-md-9"><?php echo $row['dt_termino_exp3']; ?></div>
    </div>
    <div class="row">
        <div class="col-md-1"><b>Descrição:</b></div>
        <div class="col-md-9 text-justify"><?php echo $row['desc_exp3']; ?></div>
    </div>

</div>