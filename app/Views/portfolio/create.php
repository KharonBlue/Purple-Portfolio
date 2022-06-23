<?=$head?>
<div class="create-conteiner">
    <h2>Crear Obra</h2>
    <div class="create-form">
        <form action="<?=site_url('/portfolio/save')?>" method="post" enctype="multipart/form-data">
            
            <label for="name">Nombre de la obra</label>
            <input type="text" name="name">
            <br>
            <label for="create-date">Fecha creación</label>
            <input type="date" name="create-date">
            <br>
            <label for="artwork">Obra</label>
            <input type="file" name="artwork">
            <br>
            <div class="btn">
                <button type="submit">Crear</button>
            </div>
        </form>
    </div>
</div>
<?=$footer?>