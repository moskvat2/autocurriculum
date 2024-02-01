<?php

error_reporting(E_ERROR | E_PARSE);

// Connection database
require_once('db.php');

// Classes
require_once('Candidato.php');


if($nome_candidato != ""){
    $candidato = new Candidato(
        $id_candidato, $nome_candidato, $data_nascimento, $tel_candidato, $cidade, $estado, $end_candidato, $bairro_candidato, $pais, 
        $resumo_candidato, $foto_candidato,
        $nome_curso, $ano_conclusao, $descricao_curso, $instituicao,
        $empresa_exp1, $dt_inicio_exp1, $dt_termino_exp1, $cargo_exp1, $desc_exp1,
        $empresa_exp2, $dt_inicio_exp2, $dt_termino_exp2, $cargo_exp2, $desc_exp2,
        $empresa_exp3, $dt_inicio_exp3, $dt_termino_exp3, $cargo_exp3, $desc_exp3,
        $objetivo_candidato, $email_candidato
    
    );

    if ($candidato->inserirCandidato($conn)) {
        $candidato->getCandidato($conn, $nome_candidato);

        $lastID = $candidato->getCandidato($conn, $nome_candidato);

        header("Location: imprimir.php?id_candidato=".$lastID);
        $msg = "Candidato cadastrado com sucesso!";
    } else {
        echo "Falha ao cadastrar candidato: " . $candidato->getErro();
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de candidato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

                        <!-- INICIO DO FORMULARIO DE CADASTRO DO CANDIDATO -->
  <div class="container">
    <h1 class="text-center">Cadastro do Candidato</h1>
    <h3 class="text-center p-3 mb-2 bg-secondary text-white">Informações do Candidato</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nome_candidato">Nome</label>
            <input type="text" class="form-control" id="nome_candidato" name="nome_candidato" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="end_candidato">Endereço</label>
            <input type="text" class="form-control" id="end_candidato" name="end_candidato" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="bairro_candidato">Bairro</label>
            <input type="text" class="form-control" id="bairro_candidato" name="bairro_candidato" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="tel_candidato">Telefone</label>
            <input type="text" class="form-control" id="tel_candidato" name="tel_candidato" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="pais">País</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="email_candidato">E-mail</label>
              <input type="text" class="form-control" id="email_candidato" name="email_candidato" required>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="objetivo_candidato">Objetivo Candidato</label>
            <textarea class="form-control" id="objetivo_candidato" name="objetivo_candidato" rows="5" required></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="resumo_candidato">Resumo</label>
            <textarea class="form-control" id="resumo_candidato" name="resumo_candidato" rows="5" required></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="foto_candidato">Foto</label>
            <input type="file" class="form-control" id="foto_candidato" name="foto_candidato">
          </div>
        </div>
      </div>
  </div>

  <hr>

                        <!-- INICIO DO FORMULARIO DE FORMACAO ACADEMICA -->
  <div class="container">
    <h1 class="text-center">Formação Acadêmica</h1>
    <h3 class="text-center p-3 mb-2 bg-secondary text-white">Informações Acadêmicas</h3>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nome_curso">Nome do curso</label>
          <input type="text" class="form-control" id="nome_curso" name="nome_curso" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="ano_conclusao">Data da conclusão</label>
          <input type="date" class="form-control" id="ano_conclusao" name="ano_conclusao" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="instituicao">Instituição</label>
          <input type="text" class="form-control" id="instituicao" name="instituicao" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="descricao_curso">Descrição do curso</label>
          <textarea class="form-control" id="descricao_curso" name="descricao_curso" rows="5" required></textarea>
        </div>
      </div>
    </div>
</div>

<hr/>
                        <!-- INICIO DO FORMULARIO EXPERIENCIA PROFISSIONAL -->
<div class="container">
  <h1 class="text-center">Experiência Profissional</h1>
  <h3 class="text-center p-3 mb-2 bg-secondary text-white">Último Trabalho</h3>
        <!-- Experiencia 01 -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="empresa_exp1">Empresa 1</label>
          <input type="text" class="form-control" id="empresa_exp1" name="empresa_exp1" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_inicio_exp1">Data de Entrada</label>
          <input type="date" class="form-control" id="dt_inicio_exp1" name="dt_inicio_exp1" required>
        </div>
       </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_termino_exp1">Data de Saída</label>
          <input type="date" class="form-control" id="dt_termino_exp1" name="dt_termino_exp1" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="cargo_exp1">Cargo</label>
          <input type="text" class="form-control" id="cargo_exp1" name="cargo_exp1" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="desc_exp1">Descrição do Cargo</label>
          <!-- <input type="text" class="form-control" id="desc_exp1" name="desc_exp1" required> -->
          <textarea class="form-control" id="desc_exp1" name="desc_exp1" rows="5" required></textarea>
        </div>
      </div>
    </div>

    <hr>

    
        <!-- Experiencia 02 -->
    <h3 class="text-center p-3 mb-2 bg-secondary text-white">Penúltimo Trabalho</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="empresa_exp2">Empresa 2</label>
          <input type="text" class="form-control" id="empresa_exp2" name="empresa_exp2" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_inicio_exp2">Data de Entrada</label>
          <input type="date" class="form-control" id="dt_inicio_exp2" name="dt_inicio_exp2" required>
        </div>
       </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_termino_exp2">Data de Saída</label>
          <input type="date" class="form-control" id="dt_termino_exp2" name="dt_termino_exp2" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="cargo_exp2">Cargo</label>
          <input type="text" class="form-control" id="cargo_exp2" name="cargo_exp2" required>
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-group">
          <label for="desc_exp2">Descrição do Cargo</label>
          <!-- <input type="text" class="form-control" id="desc_exp2" name="desc_exp2" required> -->
          <textarea class="form-control" id="desc_exp2" name="desc_exp2" rows="5" required></textarea>
        </div>
      </div>
    </div>

    <hr>

    <h3 class="text-center p-3 mb-2 bg-secondary text-white">Antepenúltimo Trabalho</h3>
      <!-- Experiencia 03 -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="empresa_exp3">Empresa 3</label>
          <input type="text" class="form-control" id="empresa_exp3" name="empresa_exp3" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_inicio_exp3">Data de Entrada</label>
          <input type="date" class="form-control" id="dt_inicio_exp3" name="dt_inicio_exp3" required>
        </div>
       </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="dt_termino_exp3">Data de Saída</label>
          <input type="date" class="form-control" id="dt_termino_exp3" name="dt_termino_exp3" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="cargo_exp3">Cargo</label>
          <input type="text" class="form-control" id="cargo_exp3" name="cargo_exp3" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="desc_exp3">Descrição do Cargo</label>
          <!-- <input type="text" class="form-control" id="desc_exp3" name="desc_exp3" required> -->
          <textarea class="form-control" id="desc_exp3" name="desc_exp3" rows="5" required></textarea>
        </div>
      </div>
    </div>

    <br/>
    <!-- <input type="hidden" name="id_candidato" value="<?php echo $_POST["id_candidato"]; ?>"> -->
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Gerar Curriculum</button>
    </div>
  </form>
</div>


</body>
</html>
