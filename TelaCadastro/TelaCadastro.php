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
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="./style.css">
    <script src="./source.js" defer></script>

</head>

<body>
    <header>
        <h1>Cadastro de Usuário</h1>
    </header>

    <main>

        <form action="#" method="POST">

            <section class="inputs-container">

                <div>
                    <input type="hidden" name="status" id="status" value="user" disabled="">
                </div>

                <div class="">
                    <label>Nome Completo:</label>
                    <input type="text" id="nome" name="nome" min="3" class="">
                </div>

                <div class="">
                    <label>Apelido:</label>
                    <input type="text" id="apelido" name="apelido" maxlength="14" class="">
                </div>

                <div class="">
                    <label>Email:</label><br>
                    <input type="email" name="email" id="email" placeholder="nome@exemplo.com" class="">
                </div>

                <div class="">
                    <label>Sexo:</label><br>
                    <select id="sexo" name="sexo" class="selecionar">
                        <option></option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>

                <div class=''>
                    <label>Data de Nascimento:</label>
                    <input type="date" id="dataNasc" name="dataNasc" class="" placeholder="dd/mm/yyyy">
                </div>

                <div class="">
                    <label>Estado:</label><br>
                    <select id="estado" name="estado" class="selecionar">
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

                <div class="">
                    <label for="inputCidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="">
                </div>


                <!-- <div>
                    <label>Senha:</label>
                    <input type="password" id="senha" name="senha">
                </div>


                <div>
                    <label>Confirmar Senha:</label>
                    <input type="password" id="confirmSenha" name="confirmSenha">
                </div> -->

                <div class="password-container">
                    <input type="password" id="field-password" class="field-password" placeholder="Senha">
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword()"></i>
                </div>

                <div class="password-container">
                    <input type="password" id="field-password2" class="field-password2" placeholder="Confirmar Senha">
                    <!-- <i class="fa-solid fa-eye" id="eye" onclick="showPassword2()"></i> -->
                    <!-- <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword2()"></i> -->
                </div>

                <div class="">
                    <button type="submit" id="btn-login">Cadastrar</button>
                    <button type="button" onclick="voltar()">Cancelar</button>
                </div>
            </section>
        </form>

    </main>

    <footer>

    </footer>
</body>

</html>