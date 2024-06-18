
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton ">
    <a class="dashboard__boton " href="/admin/prompts/crear">
        <i class="fa-solid fa-circle-plus"></i>
       Añadir Prompt
    </a>
</div>


<div class="dashboard__contenedor">
    
<!--SI HAY PONENSTE-->

    <?php if (!empty($prompts)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                <th scope="col" class="table__th">Prompts</th>
                <th scope="col" class="table__th"></th>
               </tr>
            </thead>

            <tbody class="table__tbody">

            <?php foreach ($prompts as $prompt) { ?>

                <tr class="table__tr">
                    <td class="table__td">
                        <?php echo $prompt->descripcion; ?>
                    </td>
               
                     <td  class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/admin/prompts/editar?id=<?php echo $prompt->id; ?>">
                        <i class="fa-solid fa-pencil"></i>
                        Editar
                    </a>

                    <form method="POST" action="/admin/prompts/eliminar" class="table__formulario">
                        <input type="hidden" name="id" value="<?php echo $prompt->id; ?>">
                        <button class="table__accion table__accion--eliminar" type="submit">
                            <i class="fa-solid fa-circle-xmark"></i>
                            Eliminar
                        </button>
                    </form> 
                       
                    </td>

                   

                </tr>

                <?php } ?>
            </tbody>
        </table>

<!--SI NO HAY PONENTES-->
    
        <?php } else { ?>
        <p class="text-center">No hay Prompts Registrados </p>
        <?php } ?>
    
</div> 


<?php

echo $paginacion;

?>