<form id="brandsForm">
    <div class="back">
        <a href="?c=brands"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">arrow_back</i> Volver</a>
    </div>
    <input type="text" class="hidden" id="id" value="<?php echo $_SESSION['id']?>">
    <h2>
        Formulario para Marca
    </h2>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="name" required>
        <label class="mdl-textfield__label" for="name">Nombre de la Marca</label>
        <span class="mdl-textfield__error">Este campo es requerido</span>
    </div>

    <div class="buttons-row">
        <a href="?c=brands" class="mdl-button mdl-js-button mdl-button--raised cancel" type="button">
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