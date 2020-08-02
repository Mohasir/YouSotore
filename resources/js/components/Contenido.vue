<template>
    <div class="card">
        <div class="card-header">

            <h2>Listado de Categorías</h2><br/>

            <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar Categoría
            </button>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group flex-beetwen-space">
                        <select class="form-control col-md-3">
                            <option value="nombre">Categoría</option>
                            <option value="descripcion">Descripción</option>
                        </select>
                        <div class="input-find">
                            <input type="text" class="form-control" placeholder="Buscar texto">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr class="bg-primary">

                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Cambiar Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>categoria</td>
                        <td>descripcion</td>
                        <td class="td-btn">
                            <button type="button" class="btn btn-success btn-md"> Activo </button>
                        </td>

                        <td class="td-btn">
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#abrirmodal">
                                <i class="fa fa-edit fa-lg"></i>
                            </button>
                        </td>

                        <td class="td-btn">
                            <button type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-lock"></i> Desactivar
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Anterior</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
