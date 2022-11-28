<template>
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                <div class="row">            
                    <h1>
                        <i class="far fa-bookmark"></i>
                        Registrar Acta
                    </h1>&nbsp; &nbsp;
                    <button class="btn btn-sm btn-danger float-sm-right" @click="atras()">
                        <i class="fas fa-undo"></i> &nbsp;
                        CANCELAR
                    </button>
                </div>
          </div>
          <!-- <div class="col-sm-6"> -->
              
                
              
          <!-- </div> -->
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
                  <div class="row">
                    <h3 class="card-title">
                    <i class="fas fa-search"></i>
                    Acta de Comiso
                    </h3>
                  </div>
              </div>
              <div class="card-body">
                    <div class="form-group row">
                      <div class="col-md-3">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">NRO. ACTA:</label>
                        <input type="text" v-model="nroActa" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.nroActa.$error, 'is-valid':!$v.nroActa.$invalid }">
                        <div class="invalid-feedback">
                                    <span v-if="!$v.nroActa.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      <div class="col-md-3">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">CODIGO:</label>
                        <select class="form-control" v-model="codigo" :class="{ 'is-invalid' : $v.codigo.$error, 'is-valid':!$v.codigo.$invalid }">
                          <option value="p.per_nombre">ALFA</option>
                          <option value="p.per_paterno">BRAVO</option>
                          <option value="p.per_materno">CHARLY</option>
                          <option value="p.per_cm">DELTA</option>
                          <option value="p.per_ci">ECHO</option>
                        </select>
                        <div class="invalid-feedback">
                                    <span v-if="!$v.codigo.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      <div class="col-md-3">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">FUERZA DE TAREA:</label>
                        <select class="form-control" v-model="fzaTarea" :class="{ 'is-invalid' : $v.fzaTarea.$error, 'is-valid':!$v.fzaTarea.$invalid }">
                          <option value="p.per_nombre">ALFA</option>
                          <option value="p.per_paterno">BRAVO</option>
                          <option value="p.per_materno">CHARLY</option>
                          <option value="p.per_cm">DELTA</option>
                          <option value="p.per_ci">ECHO</option>
                        </select>
                        <div class="invalid-feedback">
                                    <span v-if="!$v.fzaTarea.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      <div class="col-md-3">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">CMDO:</label>
                        <input type="text" v-model="comando" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.comando.$error, 'is-valid':!$v.comando.$invalid }">
                        <div class="invalid-feedback">
                                    <span v-if="!$v.comando.required">Este campo es Requerido</span>
                                </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">GRUPO DE TAREA:</label>
                        <input type="text" v-model="grupoTarea" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.grupoTarea.$error, 'is-valid':!$v.grupoTarea.$invalid }">
                        <div class="invalid-feedback">
                                    <span v-if="!$v.grupoTarea.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">GRI:</label>
                        <input type="text" v-model="gri" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.gri.$error, 'is-valid':!$v.gri.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.gri.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">TIPO:</label>
                        <select class="form-control" v-model="tipo" :class="{ 'is-invalid' : $v.tipo.$error, 'is-valid':!$v.tipo.$invalid }">
                          <option value="p.per_nombre">LIVIANO</option>
                          <option value="p.per_paterno">MEDIANO</option>
                          <option value="p.per_materno">PESADO</option>
                        </select>
                        <div class="invalid-feedback">
                            <span v-if="!$v.tipo.required">Este campo es Requerido</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">MARCA:</label>
                        <select class="form-control" v-model="marca" :class="{ 'is-invalid' : $v.marca.$error, 'is-valid':!$v.marca.$invalid }">
                          <option value="p.per_nombre">TOYOTA</option>
                          <option value="p.per_paterno">NISSAN</option>
                          <option value="p.per_materno">FOTTON</option>
                        </select>
                        <div class="invalid-feedback">
                            <span v-if="!$v.marca.required">Este campo es Requerido</span>
                        </div>                      
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">MODELO:</label>
                        <input type="text" v-model="modelo" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.modelo.$error, 'is-valid':!$v.modelo.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.modelo.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">PLACA:</label>
                        <input type="text" v-model="placa" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.placa.$error, 'is-valid':!$v.placa.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.placa.required">Este campo es Requerido</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">COLOR 1:</label>
                        <input type="text" v-model="color1" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.color1.$error, 'is-valid':!$v.color1.$invalid }">
                        <div class="invalid-feedback">
                                    <span v-if="!$v.color1.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">COLOR 2:</label>
                        <input type="text" v-model="color2" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.color2.$error, 'is-valid':!$v.color2.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.color2.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">FECHA:</label>
                        <input type="date" v-model="fecha" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.fecha.$error, 'is-valid':!$v.fecha.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.fecha.required">Este campo es Requerido</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">TIPO DE MERCANCIA:</label>
                        <select class="form-control" v-model="tipoMercancia" :class="{ 'is-invalid' : $v.tipoMercancia.$error, 'is-valid':!$v.tipoMercancia.$invalid }">
                          <option value="p.per_nombre">MERCADERIA</option>
                          <option value="p.per_paterno">SIN MERCADERIA</option>
                        </select>
                        <div class="invalid-feedback">
                            <span v-if="!$v.tipoMercancia.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">ADUANA NACIONAL:</label>
                        <select class="form-control" v-model="aduana" :class="{ 'is-invalid' : $v.aduana.$error, 'is-valid':!$v.aduana.$invalid }">
                          <option value="p.per_nombre">LA PAZ</option>
                          <option value="p.per_paterno">PASTO GRANDE</option>
                          <option value="p.per_paterno">BERMEJO</option>
                        </select>
                        <div class="invalid-feedback">
                            <span v-if="!$v.aduana.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">LUGAR:</label>
                        <select class="form-control" v-model="lugar" :class="{ 'is-invalid' : $v.lugar.$error, 'is-valid':!$v.lugar.$invalid }">
                          <option value="p.per_nombre">SANTIAGO DE MACHACA</option>
                          <option value="p.per_paterno">CHARAÑA</option>
                          <option value="p.per_paterno">LOS PATOS</option>
                        </select>
                        <div class="invalid-feedback">
                                    <span v-if="!$v.lugar.required">Este campo es Requerido</span>
                                </div>
                      </div>
                      
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">CONCILACION:</label>
                        <input type="text" v-model="concilacion" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.concilacion.$error, 'is-valid':!$v.concilacion.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.concilacion.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">CANTIDAD:</label>
                        <input type="text" v-model="cantidad" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.cantidad.$error, 'is-valid':!$v.cantidad.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.cantidad.required">Este campo es Requerido</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">MERCANCIA:</label>
                        <input type="text" v-model="mercancia" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.mercancia.$error, 'is-valid':!$v.mercancia.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.mercancia.required">Este campo es Requerido</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label class="form-control-label col-md-12" for="text-input" style="text-align:left; font-weight:bold;">DETALLE MERCANCIA:</label>
                        <input type="text" v-model="detalleMercancia" class="form-control" style="text-transform:uppercase" :class="{ 'is-invalid' : $v.detalleMercancia.$error, 'is-valid':!$v.detalleMercancia.$invalid }">
                        <div class="invalid-feedback">
                            <span v-if="!$v.detalleMercancia.required">Este campo es Requerido</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <button v-if="$auth.can('report-ordest')" type="button" class="btn btn-primary btn-sm form-control" @click="FirmasOGD()">
                            <i class="far fa-file-alt" aria-hidden="true">  AUMENTAR MERCANCIA</i>
                          </button> &nbsp;
                      </div>
                      <div class="col-md-4">
                        <button v-if="$auth.can('report-ordest')" type="button" class="btn btn-primary btn-sm form-control" @click="RegistrarActa()">
                            <i class="far fa-file-alt" aria-hidden="true">  REGISTRAR</i>
                          </button> &nbsp;
                      </div>
                      <div class="col-md-4">
                        <button v-if="$auth.can('report-ordest')" type="button" class="btn btn-danger btn-sm form-control" @click="FirmasOGD()">
                            <i class="far fa-file-alt" aria-hidden="true">  CANCELAR</i>
                          </button> &nbsp;
                      </div>
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
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import { required, minLength, maxLength, alpha, numeric, email, sameAs} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      nroActa : '',
      codigo : '',
      fzaTarea : '',
      comando : '',
      grupoTarea : '',
      gri : '',
      tipo : '',
      marca : '',
      modelo : '',
      placa : '',
      color1 : '',
      color2 : '',
      tipoMercancia : '',
      lugar : '',
      fecha : '',
      aduana : '',
      concilacion : '',
      detalleMercancia : '',
      cantidad : '',
      mercancia : '',




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
            nroActa : { required },
            codigo : { required },
            fzaTarea : { required },
            comando : { required },
            grupoTarea : { required },
            gri : { required },
            tipo : { required },
            marca : { required },
            modelo : { required },
            placa : { required },
            color1 : { required },
            color2 : { required },
            tipoMercancia : { required },
            lugar : { required },
            fecha : { required },
            aduana : { required },
            concilacion : { required },
            detalleMercancia : { required },
            cantidad : { required },
            mercancia : { required },
           
            validationGroupReg: ['nroActa', 'codigo', 'fzaTarea', 'comando','grupoTarea','gri','tipo','marca','modelo','placa','color1','color2','tipoMercancia','lugar','fecha','aduana','concilacion','detalleMercancia','cantidad'],
            validationGroupEdit: ['perdest_nro_docA', 'perdest_tipo_docA', 'perdest_fechadestinoA', 'perdest_gradoA', 'perdest_destn1_codigoA', 'perdest_destn2_codigoA', 'perdest_destn3_codigoA', 'perdest_destn4_codigoA','perdest_cargo1A']

    },

  mounted() {
    this.ListarPersonal(1);
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
    ListarPersonal(page){
        let me = this;
        axios
        .post("/listadorPersonal", {
            page: page,
            buscar: me.buscar.toUpperCase(),
            criterio: me.criterio,
        })
        .then(function (response) {
            me.listaPersonal = response.data.personal.data;
            me.pagination =response.data.pagination
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    },

    RegistrarActa(){
        this.$v.$reset();
        if(!this.$v.validationGroupReg.$invalid){
            swal.fire({
                title: 'Esta seguro de registrar el Acta', // TITULO 
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
                    .post("/registrarDestino", {
                    //NOMBRE ENVIA AL CONTROLADOR : me.NOMBRE V-MODEL O VARIBLE DECLARADA
                        nroActa : me.nroActa,
                        codigo : me.codigo,
                        fzaTarea : me.fzaTarea,
                        comando : me.comando,
                        grupoTarea : me.grupoTarea,
                        gri : me.gri,
                        tipo : me.tipo,
                        marca : me.marca,
                        modelo : me.modelo,
                        placa : me.placa,
                        color1 : me.color1,
                        color2 : me.color2,
                        tipoMercancia : me.tipoMercancia,
                        lugar : me.lugar,
                        fecha : me.fecha,
                        aduana : me.aduana,
                        concilacion : me.concilacion,
                        detalleMercancia : me.detalleMercancia,
                        cantidad : me.cantidad
                        // perdest_observaciones : me.perdest_observaciones.toUpperCase(),
                    })
                    .then(function (response) {
                        //Respuesta de la peticion
                        console.log(response);
                        $('#NuevoDestino').modal('hide');
                        me.listarPersonalDestinos(me.per_codigo);
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