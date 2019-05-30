<form id="categoriesForm">
    <div class="back">
        <a href="?c=categories"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">arrow_back</i> Volver</a>
    </div>
    <input type="text" class="hidden" id="id" value="<?php echo $_SESSION['id']?>">
    <h2>
        Formulario para categoría
    </h2>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" value="<?php echo $_SESSION['name'] ?>" id="name" required>
        <label class="mdl-textfield__label" for="name">Nombre de la categoria</label>
        <span class="mdl-textfield__error">Este campo es requerido</span>
    </div>

    <div class="mdl-textfield mdl-js-textfield">
        <textarea class="mdl-textfield__input" type="text" rows= "3" id="description"><?php echo $_SESSION['description']?></textarea>
        <label class="mdl-textfield__label" for="description">Descripcion</label>
    </div>

    <div class="buttons-row">
        <a href="?c=categories" class="mdl-button mdl-js-button mdl-button--raised cancel" type="button">
            Cancelar
        </a>
        <button class="mdl-button mdl-js-button mdl-button--raised save" type="submit">
            Guardar
        </button>
        <button class="mdl-button mdl-js-button mdl-button--raised reset" type="reset">
            Limpiar
        </button>
    </div>
</form>

<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
</div>