<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
      <th>Age</th>
      <th>ID Number</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">Don Aubrey</td>
      <td>25</td>
      <td>49021</td>
      <td>
        <button id="1" class="mdl-button mdl-js-button mdl-button--icon">
          <i class="material-icons">more_vert</i>
        </button>

        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="1">
          <li class="mdl-menu__item menu-icons" onclick="deleteCategories('Napo')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">delete</i>Eliminar</li>
          <li class="mdl-menu__item menu-icons"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Editar</li>
        </ul>
      </td>
    </tr>
  </tbody>
</table>
<div class="button-content">
    <a class="mdl-button mdl-js-button mdl-button--fab" href="?c=categories&a=add">
        <i class="material-icons">add</i>
    </a>
</div>
