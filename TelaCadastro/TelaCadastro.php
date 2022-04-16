<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <h2>Cadastro de Usuário</h2>
    </header>

    <main>

        <div class="div-form">
            <form action="#">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nome Completo:</label>
                        <input type="text" id="nome" name="nome" min="3" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apelido:</label>
                        <input type="text" id="apelido" name="apelido" maxlength="14" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email:</label>
                        <input type="email" name="email" id="email" placeholder="nome@exemplo.com" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputSexo">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-control">
                            <option selected></option>
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>

                    <div class='form-group col-md-6'>
                        <label for="inputDataNasc">Data de Nascimento:</label>
                        <input type="date" id="dataNasc" name="dataNasc" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputCidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputEstado">Estado:</label>
                    <select id="estado" name="estado" class="form-control">
                        <option selected></option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>

                <div class="col-lg-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" style="margin-top: 2em;">Cadastrar</button>
                    <button type="reset" class="btn btn-primary" style="margin-top: 2em;">Cancelar</button>
                </div>

            </form>
        </div>


    </main>

    <footer>

    </footer>
</body>

</html>