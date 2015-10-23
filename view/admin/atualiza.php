

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <form action="index.php?pages=atualiza&id=<?php echo $paginas['id']; ?>" method="post">

                <h1>Cadastro de usuário</h1>

                <div class="input-group">
                    <span class="input-group-addon">Title:</span>
                    <input class="form-control" type="text" name="title" value="<?php echo $paginas['title']; ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Slug:</span>
                    <input class="form-control" type="text" name="slug" value="<?php echo $paginas['slug']; ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Hora:</span>
                    <input class="form-control" type="text" name="time" value="<?php echo substr($paginas['time'], 0, 2); ?>" maxlength="2">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Body:</span>
                    <textarea class="form-control" name="body" id="" cols="30" rows="10"><?php echo $paginas['body']; ?></textarea>
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
