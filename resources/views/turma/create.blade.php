<html>
    <head>
        <title>Cadastro de turma</title>
    </head>
    <body>
        <form action="">
            <label for="professor">Professor:</label><br>
            <select name="professor">
                <option value="">---</option>
            </select>
            <label for="idioma">Idioma:</label><br>
            <select>
                <option value="ingles">Inglês</option>
                <option value="espanhol">Espanhol</option>
                <option value="italiano">Italiano</option>
                <option value="alemao">Alemão</option>
                <option value="frances">Francês</option>
                <option value="chines">Chinês</option>
                <option value="japones">Japonês</option>
                <option value="portugues">Português para estrangeiros</option>
            </select>
            <label for="livro">Livro:</label><br>
            <select name="livro">
                <option value="">---</option>
            </select>
            <label for="">Dia(s) da semana:</label><br>
            <!--CHECKBOX-->
            <input type="checkbox" name="diadasemana" value="segunda">
            <label for="segunda">S</label>
            <input type="checkbox" name="diadasemana" value="terca">
            <label for="terca">T</label>
            <input type="checkbox" name="diadasemana" value="quarta">
            <label for="quarta">Q</label>
            <input type="checkbox" name="diadasemana" value="quinta">
            <label for="quinta">Q</label>
            <input type="checkbox" name="diadasemana" value="sexta">
            <label for="sexta">S</label>
            <input type="checkbox" name="diadasemana" value="sabado">
            <label for="sabado">S</label>
            <label for="">Horário:</label><br>
            <input type="text" name="horario"/>
            <label for="">Modalidade:</label><br>
            <input type="radio" name="modalidade" value="connections"/>Connections
            <input type="radio" name="modalidade" value="interactive"/>Interactive

            <h2>Matricular alunos:</h2>
        </form>
    </body>
</html>