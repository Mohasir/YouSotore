<template>
    <div>
        <div class="card">
        <div class="card-header">

            <h2>Listado de Categorías</h2><br/>

            <button class="btn btn-primary btn-md" type="button" @click="showModal('categoria', 'register')">
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
                            <input type="text" @keyup="list()" v-model="find" class="form-control" placeholder="find category">
                            <button type="submit" @click="list()"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
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
                    <tr v-for="categoria in categories" v-bind:key="categoria.id">

                        <td>{{ categoria.nombre }}</td>
                        <td v-text="categoria.description"></td>
                        <td class="td-btn">
                            <button class="btn btn-success btn-md" v-if="categoria.condicion"> Activo </button>
                            <button class="btn btn-danger btn-md" v-else> Desactivado </button>
                        </td>

                        <td class="td-btn">
                            <button type="button" class="btn btn-info btn-md" @click="showModal('categoria','update', categoria)">
                                <i class="fa fa-edit fa-lg"></i>
                            </button>
                        </td>

                        <td class="td-btn">
                            <button type="button" class="btn btn-danger btn-sm" @click="desactivateCategory(categoria.id)" v-if="categoria.condicion">
                                <i class="fa fa-lock"></i> Desactivar
                            </button>
                            <button type="button" class="btn btn-success btn-sm" @click="activateCategory(categoria.id)" v-else>
                                <i class="fa fa-unlock-alt"></i> Activar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- pagination -->
            <nav>
                <ul class="pagination">
                    <li class="page-item" v-show="pagination.prev_page_url" @click="getPreviousPage()">
                        <a class="page-link" href="#">Anterior</a>
                    </li>

                    <li v-for="page in pagination.last_page" :key="page" class="page-item" :class="{'active':pagination.current_page == page}" @click="getPage(page)">
                        <a class="page-link" href="#">{{ page }}</a>
                    </li>

                    <li class="page-item" v-show="pagination.next_page_url" @click="getNextPage()">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" :class="{'mostrar':modal}" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" v-text="modalTitle"></h4>
                    <button type="button" class="close" @click="modal=0">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div v-show="errors" class="alert alert-danger" role="alert">
                        <ul class="m-0">
                            <li v-for="message in errorMessages" :key="message">{{ message }}</li>
                        </ul>
                    </div>

                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label required mr-3" for="name">Categoría</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" v-model="category.nombre" placeholder="Categoría">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 form-control-label mr-3" for="description">Descripción</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="description" v-model="category.descripcion" placeholder="Descripción">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" @click="modal=0"><i class="fa fa-times"></i> Cerrar</button>
                    <button type="submit" v-if="acction" @click="registerCategory()" class="btn btn-success"><i class="fa fa-save"></i> Guardar </button>
                    <button type="submit" v-else @click="updateCategory()" class="btn btn-success"><i class="fa fa-save"></i> Actualizar </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    </div>
</template>

<script>
    export default {

        data(){
            return{
                category:{
                    'id': null,
                    'nombre':'',
                    'descripcion': '',
                    'condition': 1
                },
                categories: [],
                modalTitle: '',
                modal: 0,
                acction: 1,
                errors: 0,
                errorMessages:[],
                pagination: [],
                find: ''
            }
        },

        methods:{

            list(){
                let me = this;
                axios.get('/categories', {
                    params: {
                        'find': this.find
                    }
                }).then(function (response) {
                    me.categories = response.data.data
                    me.pagination = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            showModal(model, acction, category){
                switch(model){
                    case 'categoria':

                        switch (acction) {
                            case 'register':
                                this.modalTitle = 'Registrar categoria';
                                this.modal = 1;
                                this.acction = 1;
                                break;

                            case 'update':
                                this.modalTitle = 'Actualizar categoria';
                                this.modal = 1;
                                this.acction = 0;
                                this.category.nombre = category.nombre;
                                this.category.descripcion = category.description
                                this.category.id = category.id
                                break;

                            default:
                                break;
                        }

                        break;

                    default:
                        break;

                }
            },

            registerCategory(){

                if(this.validateCategory()){
                    console.log(this.errorMessages);
                    return;
                }

                let me = this;
                axios.post('/categories', {

                    'nombre': this.category.nombre,
                    'description': this.category.descripcion,

                }).then(function (response) {
                    me.modal = 0;
                    me.list();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },

            updateCategory(){

                if(this.validateCategory()){
                    console.log(this.errorMessages);
                    return;
                }

                let me = this;
                axios.put('/categories/update', {

                    'nombre': this.category.nombre,
                    'description': this.category.descripcion,
                    'id': this.category.id

                }).then(function (response) {
                    me.modal = 0;
                    me.list();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },

            activateCategory(idCategory){

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Desea activar esta categoria?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Activar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        let me = this;
                        axios.put('/categories/activate', {

                            'id': idCategory

                        }).then(function (response) {
                            me.list();
                            swalWithBootstrapButtons.fire(
                                'Activado!',
                                'El registro ha sido activado.',
                                'success'
                            )
                        })
                        .catch(function (error) {
                            console.log(error);
                        });


                    }
                })

            },

            desactivateCategory(idCategory){

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Desea desactivar esta categoria",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Desactivar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        let me = this;
                        axios.put('/categories/desactivate', {

                            'id': idCategory

                        }).then(function (response) {
                            me.list();
                            swalWithBootstrapButtons.fire(
                                'Desactivado!',
                                'El registro ha sido desactivado.',
                                'success'
                            )
                        })
                        .catch(function (error) {
                            console.log(error);
                        });


                    }
                })
            },

            validateCategory(){
                this.errors = 0;
                this.errorMessages = [];

                if(!this.category.nombre) this.errorMessages.push('El campo Nombre es obligatorio');

                if(this.errorMessages.length) this.errors = 1;

                return this.errors;
            },

            getPage(page){
                let me = this;
                let url_page = 'categories?page=' + page;
                axios.get(url_page).then(function (response) {
                    me.categories = response.data.data
                    me.pagination = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            getPreviousPage(){
                let me = this;
                axios.get(this.pagination.prev_page_url).then(function (response) {
                    me.categories = response.data.data
                    me.pagination = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            getNextPage(){
                let me = this;
                axios.get(this.pagination.next_page_url).then(function (response) {
                    me.categories = response.data.data
                    me.pagination = response.data
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

        },

        mounted() {
            /* console.log('Component mounted.') */
            this.list();
        }
    }
</script>

<style>

    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }

    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
        overflow-y: inherit;
    }

</style>
