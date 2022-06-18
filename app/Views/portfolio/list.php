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
                        <td><?=$portfolio['artwork']?></td>
                        <td>Editar/Borrar</td>
                    </tr>
                <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>
    <?=$footer?>