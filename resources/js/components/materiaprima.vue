<template>
    <div class="">
        <div class="row" style="display: flex; align-items: center; margin-top: 30px;">
            <div class="" style="width: 100px; margin-right: 20px">
                <img src="/img/number1.png" class="responsive-img" alt="">
            </div>
            <div class="">
                <p>
                    Del Certificado de Calidad del producto ABAC, extraer del cuadro Rastreabilidad de Materiales, el número de partida de cada componente e ingresarlo en la celda. Presione el botón BUSCAR y obtendrá los números de partida de las materias primas relacionadas.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col s6" style="margin-bottom: 50px">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" v-model="body">
                        <label for="first_name">Ingrese partida de Componente</label>
                    </div>
                </div>
                <a class="btn waves-effect waves-light" @click="saveData()" style="background-color: #E1131B;">BUSCAR</a>
            </div>
            <div class="col s12" v-if="paso2">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card" style="background-color: white; border: 1px solid red; color: black">
                            <div class="card-content  ">
                                <h6><b>Partida de Materia Prima</b></h6>
                                <p><b>PARTIDA:</b> {{ materiaPrima.materia }}</p>
                                <p><b>COMPONENTE:</b> {{ materiaPrima.articulo }}</p>
                                <p><b>DESCRIPCION:</b> {{ materiaPrima.descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                paso2: false,
                materiaPrima: [],
                body: ''
            }
        },
        created(){
            //this.saveData();
            /*this.getItemsOrderBy();*/
        },
        methods: {
            saveData() {

                axios.post('/api/buscar', {body: this.body}).then(res => {
                    console.log(res.data);
                    this.materiaPrima = res.data;
                    this.paso2 = res.data.alert ? false : true;
                }).catch(e => {
                    console.log(e);
                });
            }
        }
    }
</script>
