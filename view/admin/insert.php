

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <form action="index.php?pages=insert" method="post">

                <h1>Cadastro de usuário</h1>

                <div class="input-group">
                    <span class="input-group-addon">Title:</span>
                    <input class="form-control" type="" name="title">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Hora:</span>
                    <input class="form-control" type="text" maxlength="2" name="time">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Body:</span>
                    <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                </div>

                <hr/>

                <div class="input-group">
                    <input class="btn btn-primary" type="submit" value="Enviar">
                    <a class="btn btn-danger" href="index.php">Voltar</a>
                </div>

            </form>

        </div>
    </div>
</div>
