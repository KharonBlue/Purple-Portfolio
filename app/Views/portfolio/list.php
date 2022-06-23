    <?=$head?>
    <div class="list-conteiner">
        <h2>Portafolio</h2>

        <div class="table-artwork">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha Creación</th>
                        <th>Obra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($portfolios as $portfolio): ?>
                    <tr>
                        <td><?=$portfolio['id']?></td>
                        <td><?=$portfolio['name']?></td>
                        <td><?=$portfolio['create_date']?></td>
                        <td>
                            <img src="<?=base_url()?>/uploads/<?=$portfolio['artwork'];?>" width="100">
                        </td>
                        <td>
                            <a href="<?=site_url('portfolio/delete/'.$portfolio['id'])?>">Borrar</a>
                            <a href="<?=site_url('portfolio/edit/'.$portfolio['id'])?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>
    <?=$footer?>