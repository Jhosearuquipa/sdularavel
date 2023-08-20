<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
        data-bs-toggle="dropdown" aria-expanded="false">
        Acciones
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="#">Detalle</a>
        </li>
        <li><a class="dropdown-item" href="#">Editar</a>
        </li>
        <li>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="dropdown-item">Eliminar</button>
            </form>
        </li>
    </ul>
</div>
