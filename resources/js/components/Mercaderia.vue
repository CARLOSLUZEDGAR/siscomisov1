<template>
    <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">            
              <h1>
                <i class="far fa-bookmark"></i>
               Mercaderia
              </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Mercaderia</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                     <i class="fas fa-search"></i>
                    Buscar Puesto Aduanero
                  </h3>
                </div>
                <div class="card-body">
                      <div class="form-group row">
                          <div class="col-md-6">
                              <div class="input-group">
                              <!-- select combo patr abuscar-->
                                  <select class="form-control col-md-4" v-model="criterio">
                                      <!-- values como la base de datos -->
                                      <option value="p.per_nombre">Nombre</option>
                                      <option value="p.per_paterno">Ap. Paterno</option>
                                      <option value="p.per_materno">Ap. Materno</option>
                                      <option value="p.per_cm">Carnet Militar</option>
                                      <option value="p.per_ci">C. de Identidad</option>
                                  </select>
                                  <input type="text" v-model="buscar" @keyup="BuscarPersona()" class="form-control" style="text-transform:uppercase" >
                                  <!-- <button type="submit" @click="listarPersonal(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> BUSCAR</button> -->
                              </div>
                          </div>
                          <div class="col-md-3">
                            <button v-if="$auth.can('report-ordest')" type="button" class="btn btn-primary btn-sm form-control" @click="ModalRegistro()">
                              <i class="far fa-file-alt" aria-hidden="true">  Nuevo Puesto</i>
                            </button> &nbsp;
                          </div>
                          <!-- <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-sm" @click="cuadroEfectivos()">
                              <i class="far fa-file-alt" aria-hidden="true">  Cuadro de Efectivos</i>
                            </button> &nbsp;
                          </div> -->
                          
                      </div>
                  <div class="table-wrapper-scroll-y my-custom-scrollbar" id="myTable" style="font-size: 16px;">
                      <table class="table table-bordered table-striped table-sm">
                          <thead>
                              <tr>                                
                                  <th class="text-center">#</th>
                                  <th class="text-center">DESCRIPCION</th>
                                  <th class="text-center">OBSERVACION</th>
                                  <!-- <th class="text-center">Nombres</th>
                                  <th class="text-center">C. Identidad</th>
                                  <th class="text-center">C. Militar</th> -->
                                  <th class="text-center">OPCIONES</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="(p,index) in listarAduana" :key="p.id">
                                  <td style="text-align:center; font-weight:bold;">{{ index + 1 }}</td> 
                                  <td>{{p.descripcion}}</td>
                                  <td> {{p.observacion}} </td>
                                  <!-- <td> {{p.materno}}</td>
                                  <td> {{p.nombre}} </td>
                                  <td class="text-center">{{p.ci}}</td>
                                  <td class="text-center">{{p.cm}}</td> -->
                                  <td style="width:100px; text-align:center">
                                    <button type="button" class="btn btn-success btn-sm" @click="ModalEditar(p)">
                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button> &nbsp;
                                  </td>
                              </tr>
                              
                          </tbody>
                      </table>
                      
                  </div>
                    <div class="form-group row">
                      <nav>
                          <!-- inicio para paginacion -->
                         <ul class="pagination">
                              <li class="page-item" v-if="pagination.current_page > 1">
                                  <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                              </li>
                              <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                  <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                              </li>
                             
                              <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                  <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                              </li>
                          </ul>
                          <!-- fin paginacion -->
                      </nav>
                      </div>
                  </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- ./row -->
        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" id="NuevoPuestoAduanero">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title-registro"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="Cerrar()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-control-label" for="text-input">NOMBRE</label>
                              <input type="text" v-model="aduana" class="form-control" :class="{ 'is-invalid' : $v.aduana.$error, 'is-valid':!$v.aduana.$invalid }" style="text-transform:uppercase">
                              <div class="invalid-feedback">
                                <span v-if="!$v.aduana.required">Este campo es Requerido</span>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-control-label" for="text-input">OBSERVACION</label>
                              <textarea name="textarea" class="form-control" rows="3" v-model="observacion" style="text-transform:uppercase"></textarea>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" @click="RegistrarAduana()">Registrar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" @click="Cerrar(1)">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="EditarPuestoAduanero">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title-registro"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="Cerrar()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-control-label" for="text-input">NOMBRE</label>
                              <input type="text" v-model="aduanaE" class="form-control" :class="{ 'is-invalid' : $v.aduanaE.$error, 'is-valid':!$v.aduanaE.$invalid }" style="text-transform:uppercase">
                              <div class="invalid-feedback">
                                <span v-if="!$v.aduanaE.required">Este campo es Requerido</span>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label class="form-control-label" for="text-input">OBSERVACION</label>
                              <textarea name="textarea" class="form-control" rows="3" v-model="observacionE" style="text-transform:uppercase"></textarea>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" @click="EditarAduana()">Actualizar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" @click="Cerrar()">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </section>
      <!-- /.content -->
    </div>
  </template>
  
  <script>
  import { required, minLength, maxLength, alpha, numeric, email, sameAs} from "vuelidate/lib/validators";
  export default {
    data() {
      return {
          idAduana : '',
          aduana : '',
          observacion : '',
          listarAduana : [],
  
          aduanaE : '',
          observacionE : '',
  
  
        listaPersonal: [],
        criterio: "p.per_cm",
        buscar:"",
        setTiemoutBuscador: '',
       // page : 0,
        pagination : {
            'total' : 0,
            'current_page' : 0,
            'per_page' : 0,
            'last_page' : 0,
            'from' : 0,
            'to' : 0,
        },
        offset : 3,
      }
    },
  
    validations:{
              aduana : { required },
              aduanaE : { required },
             
              validationGroupReg: ['aduana'],
              validationGroupEdit: ['aduanaE']
  
      },
    mounted() {
      this.ListarAduana(1);
    },
          computed:{
              isActived: function(){
                  return this.pagination.current_page;
              },
  
              //Calcuar los elementos de la paginacion
              pagesNumber: function() {
                  if(!this.pagination.to){
                      return [];
                  }
  
                  var from = this.pagination.current_page - this.offset;
                  if(from < 1){
                      from = 1;
                  }
  
                  var to = from + (this.offset *2);
                  if( to >= this.pagination.last_page){
                      to = this.pagination.last_page;
                  }
  
                  var pagesArray = [];
                  while( from <= to){
                      pagesArray.push(from);
                      from ++;
                  }
                  return pagesArray;
              }
          },
    methods: {
      ListarAduana(page){
          let me = this;
          axios
          .post("/aduana/lista", {
              page: page,
              // buscar: me.buscar.toUpperCase(),
              // criterio: me.criterio,
          })
          .then(function (response) {
              me.listarAduana = response.data.aduanas.data;
              me.pagination =response.data.pagination
          })
          .catch(function (error) {
              // handle error
              console.log(error);
          })
      },
  
        Cerrar(opcion){
          this.$v.$reset();
          if(opcion == 1){
            me.aduana = '',
            me.observacion = ''
          }
          if(opcion == 2){
            me.aduana = '',
            me.observacion = ''
          }
        },
  
        ModalRegistro(){
          //   this.$v.$reset(),
              //PONER DE CERO EL MODAL ANTES DE REGISTRAR
              this.aduana = '',
              this.observacion = '',
              //FIN PONER A CERO MODAL
              $('#NuevoPuestoAduanero').modal('show');
              $(".modal-header").css("background-color", "#007bff");
              $(".modal-header").css("color", "white" );
              $(".modal-title-registro").text("Registrar Puesto Aduanero");
              // this.selectbuscarDestinos_nivel4(this.perdest_destn3_codigo)
              // this.selectGrado()
        },
  
        RegistrarAduana(){
          this.$v.$reset();
          if(!this.$v.validationGroupReg.$invalid){
              swal.fire({
                  title: 'Esta seguro de registrar el Puesto Aduanero', // TITULO 
                  icon: 'question', //ICONO (success, warnning, error, info, question)
                  showCancelButton: true, //HABILITACION DEL BOTON CANCELAR
                  confirmButtonColor: 'info', // COLOR DEL BOTON PARA CONFIRMAR
                  cancelButtonColor: '#868077', // CLOR DEL BOTON CANCELAR
                  confirmButtonText: 'Confirmar', //TITULO DEL BOTON CONFIRMAR
                  cancelButtonText: 'Cancelar', //TIUTLO DEL BOTON CANCELAR
                  buttonsStyling: true,
                  reverseButtons: true
                  }).then((result) => {
                  if (result.value) {
                      //CODIGO HA SER VALIDADO
                      let me = this;
                      axios
                      .post("/aduana/registrar", {
                      //NOMBRE ENVIA AL CONTROLADOR : me.NOMBRE V-MODEL O VARIBLE DECLARADA
                          aduana : me.aduana,
                          observacion : me.observacion
                          // perdest_observaciones : me.perdest_observaciones.toUpperCase(),
                      })
                      .then(function (response) {
                          //Respuesta de la peticion
                          // console.log(response);
                          $('#NuevoPuestoAduanero').modal('hide');
                          me.ListarAduana(1);
                      })
                      .catch(function (error) {
                          // handle error
                          console.log(error);
                      });
                  }else{
                      console.log('no empezamos');
                  }
              })  
          }else{
              this.$v.$touch();
              Swal.fire({
                  icon: 'warning',
                  title: 'Ingrese todos los datos requeridos',
                  showConfirmButton: false,
                  timer: 2000
              })
              
          }
        },
  
        ModalEditar(aduana){
          //   this.$v.$reset(),
              //PONER DE CERO EL MODAL ANTES DE REGISTRAR
              this.idAduana = aduana.id,
              this.aduanaE = aduana.descripcion,
              this.observacionE = aduana.observacion,
              //FIN PONER A CERO MODAL
              $('#EditarPuestoAduanero').modal('show');
              $(".modal-header").css("background-color", "#007bff");
              $(".modal-header").css("color", "white" );
              $(".modal-title-registro").text("Editar Puesto Aduanero");
              // this.selectbuscarDestinos_nivel4(this.perdest_destn3_codigo)
              // this.selectGrado()
        },
  
        EditarAduana(){
          this.$v.$reset();
          if(!this.$v.validationGroupEdit.$invalid){
              swal.fire({
                  title: 'Esta seguro de editar el Puesto Aduanero', // TITULO 
                  icon: 'question', //ICONO (success, warnning, error, info, question)
                  showCancelButton: true, //HABILITACION DEL BOTON CANCELAR
                  confirmButtonColor: 'info', // COLOR DEL BOTON PARA CONFIRMAR
                  cancelButtonColor: '#868077', // CLOR DEL BOTON CANCELAR
                  confirmButtonText: 'Confirmar', //TITULO DEL BOTON CONFIRMAR
                  cancelButtonText: 'Cancelar', //TIUTLO DEL BOTON CANCELAR
                  buttonsStyling: true,
                  reverseButtons: true
                  }).then((result) => {
                  if (result.value) {
                      //CODIGO HA SER VALIDADO
                      let me = this;
                      axios
                      .post("/aduana/editar", {
                      //NOMBRE ENVIA AL CONTROLADOR : me.NOMBRE V-MODEL O VARIBLE DECLARADA
                          idAduana : me.idAduana,
                          aduanaE : me.aduanaE,
                          observacionE : me.observacionE
                          // perdest_observaciones : me.perdest_observaciones.toUpperCase(),
                      })
                      .then(function (response) {
                          //Respuesta de la peticion
                          // console.log(response);
                          $('#EditarPuestoAduanero').modal('hide');
                          me.ListarAduana(1);
                      })
                      .catch(function (error) {
                          // handle error
                          console.log(error);
                      });
                  }else{
                      console.log('no empezamos');
                  }
              })  
          }else{
              this.$v.$touch();
              Swal.fire({
                  icon: 'warning',
                  title: 'Ingrese todos los datos requeridos',
                  showConfirmButton: false,
                  timer: 2000
              })
              
          }
        },
  
  
  
      // ListarAduana(page){
      //     let me = this;
      //     axios
      //     .post("/aduana/lista", {
      //         page: page,
      //         buscar: me.buscar.toUpperCase(),
      //         criterio: me.criterio,
      //     })
      //     .then(function (response) {
      //         me.listaPersonal = response.data.personal.data;
      //         me.pagination =response.data.pagination
      //     })
      //     .catch(function (error) {
      //         // handle error
      //         console.log(error);
      //     })
      // },
  
      RegistrarActa(){
        this.$router.push({
              name: "RegistrarActa",
              //ENVIO DE DATOS
              // params:{
              //     d: datos
              // }   
          });
      },
  
  
  
  
  
  
  
  
  
      BuscarPersona(){
          clearTimeout(this.setTiemoutBuscador);
          this.setTiemoutBuscador = setTimeout(() => {
              this.ListarPersonal(1)
          }, 360)
      },
  
      cambiarPagina(page, buscar, criterio){
          let me = this;
          //Actualiza la pagina actual
          me.pagination.current_page= page;
          //Envia la peticion para visualizar la data de esa pagina
          me.ListarPersonal(page, buscar, criterio);
      },
  
      EnvioDatos(datos){
          this.$router.push({
              name: "DestinosPersonal",
              //ENVIO DE DATOS
              params:{
                  d: datos
              }   
          });
      },
      
    },
  };
  
  </script>
  
  <style>
  </style>