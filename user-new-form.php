<h1>NOVO USUÁRIO</h1>
<form action="user-new.php" method="post">
    <table>
        <tr><td>USUÁRIO <td> <input type="text" name="usuario" id="usuario" size="10" maxlength="10">
        <tr><td>NOME <td><input type="text" name="nome" id="nome" size="30" maxlength="30">
        <tr><td>TIPO<td><select name="tipo" id="tipo">
            <option value="admin">ADMINISTRADOR</option>
            <option value="editor" selected>EDITOR</option>
        </select>
        <tr><td>SENHA<td><input type="password" name="senha1" size="10" maxlength="10">
        <tr><td>CONFIRME A SENHA<td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="SALVAR">
    </table>
</form>