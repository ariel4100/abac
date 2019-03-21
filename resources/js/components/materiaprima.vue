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
                        <input id="first_name" type="text" class="validate" v-model="partidacomponente">
                        <label for="first_name">Ingrese partida de Componente</label>
                    </div>
                </div>
                <a class="btn waves-effect waves-light" @click="buscarPartida()" style="background-color: #E1131B;">BUSCAR</a>
            </div>
            <div class="col s12"  v-if="paso2">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card flecha" style="background-color: white; border: 1px solid red;">
                            <div class="card-content  ">
                                <p><b>Partida de Materia Prima</b></p>
                                <p><span style="color: red">PARTIDA:</span> {{ materiaPrima.materia }}</p>
                                <p><span style="color: red">COMPONENTE:</span> {{ materiaPrima.articulo }}</p>
                                <p><span style="color: red">DESCRIPCION:</span> {{ materiaPrima.descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center; margin-top: 20px;">
                    <div class="" style=" margin-right: 20px">
                        <img src="/img/number2.png" class="responsive-img" alt="">
                    </div>
                    <div class="">
                        <p>
                            Imprima el Certificado de Materias Primas
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6" style="margin-bottom: 30px">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="first_name1" type="text" class="validate" v-model="materiaprima" v-on:keyup.enter="buscarPartidaMateriaPrima">
                                <label for="first_name1">Ingrese Partida de Materia Prima</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="" v-if="paso3 && paso2">
                    <div class="row">
                        <div class="col s12" >
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="card flecha" style="background-color: white; border: 1px solid red; color: black">
                                        <div class="card-content  " style="padding: 15px;">
                                            <h6>Ver Certificado {{ archivo.materia }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: flex; align-items: center; margin-top: 30px;">
                        <div class="" style=" margin-right: 20px">
                            <img src="/img/number3.png" class="responsive-img" alt="">
                        </div>
                        <div class="">
                            <p>
                                Imprima el Registro de Rastreabilidad de Materia Prima (opcional).
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6" style="margin: 30px">
                            <a class="btn waves-effect waves-light" @click="descargar()"  style="background-color: #E1131B;">IMPRIMIR</a>
                        </div>
                    </div>
                    <p>Repita estos pasos para todos los componentes requeridos</p>
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
                paso3: false,
                materiaPrima: [],
                partidacomponente: '',
                materiaprima: '',
                archivo: [],
            }
        },
        created(){
            //this.saveData();
            /*this.getItemsOrderBy();*/
        },
        methods: {
            buscarPartida() {

                axios.post('/api/buscar', {partidacomponente: this.partidacomponente}).then(res => {
                    console.log(res.data);
                    this.materiaPrima = res.data;
                    this.paso2 = res.data.alert ? false : true;
                    console.log(this.paso2);
                }).catch(e => {
                    console.log(e);
                });
            },
            buscarPartidaMateriaPrima() {

                axios.post('/api/materia', {materiaprima: this.materiaprima,partidacomponente: this.partidacomponente}).then(res => {
                    console.log(res.data);
                    this.archivo = res.data;
                    this.paso3 = res.data.alert ? false : true;
                }).catch(e => {
                    console.log(e);
                });
            },
            descargar() {

                axios.get('/api/descargar/' + this.archivo.materia+'.pdf').then(res => {
                    let url = window.URL.createObjectURL(new Blob([res.data]));
                    let link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', this.archivo.materia+'.pdf'); //or any other extension
                    document.body.appendChild(link);
                    link.click();
                    /*this.archivo = res.data;
                    this.paso3 = res.data.alert ? false : true;*/
                }).catch(e => {
                    console.log(e);
                });
            },
        }
    }
</script>
<style>
    .flecha:before {
        content: "";
        position: absolute;
        top: -25px;
        left: 0;
        width: 0;
        height: 0;
        z-index: 0;
        border-width: 0 25px 25px;
        border-style: solid;
        border-color: transparent transparent red;
    }
    .flecha:after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -24px;
        left: 0;
        width: 0;
        height: 0;
        border-width: 0 25px 25px;
        border-style: solid;
        border-color: transparent transparent white;
    }
</style>