<?=$head?>
<div class="edit-conteiner">
    <h2>Editar Obra</h2>
    <div class="edit-form">
        <form action="<?=site_url('/portfolio/update')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$portfolio['id']?>" readonly>
            <label for="name">Nombre de la obra</label>
            <input type="text" name="name" value="<?=$portfolio['name']?>">
            <br>
            <label for="create-date">Fecha creación</label>
            <input type="date" name="create-date" value="<?=$portfolio['create_date']?>">
            <br>
            <label for="artwork">Obra</label>
            <img src="<?=base_url()?>/uploads/<?=$portfolio['artwork'];?>" width="100">
            <br>
            <input type="file" name="artwork">
            <br>
            <div class="btn">
                <button type="submit">Actualizar</button>
                <br>
                <a href="<?=base_url('portfolio/list')?>">Volver</a>
            </div>
        </form>
    </div>
</div>
<?=$footer?>