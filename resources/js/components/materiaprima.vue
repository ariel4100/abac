<template>
    <div class="">
        <div class="row" style="display: flex; align-items: center; margin-top: 30px;">
            <div class="" style="width: 100px; margin-right: 20px">
                <img :src="url+'/img/number1.png'" class="responsive-img" alt="">
            </div>
            <div class="">
                <p>{{ title.title1 }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col s6" style="margin-bottom: 50px">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" v-model="partidacomponente">
                        <label for="first_name">{{ input.input1 }}</label>
                    </div>
                </div>
                <a class="btn waves-effect waves-light" @click="buscarPartida()" style="background-color: #E1131B;">  {{ input.boton1 }}</a>
            </div>
            <div class="col s12"  v-if="paso2">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card flecha" style="background-color: white; border: 1px solid red;">
                            <div class="card-content  ">
                                <p><b>{{ input.partidat }}</b></p>
                                <p><span style="color: red">  {{ title.partida.toUpperCase() }}:</span> {{ materiaPrima.materia }}</p>
                                <p><span style="color: red">  {{ title.componente.toUpperCase() }}:</span> {{ materiaPrima.articulo }}</p>
                                <p><span style="color: red">  {{ title.descripcion.toUpperCase() }}:</span> {{ materiaPrima.descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center; margin-top: 20px;">
                    <div class="" style=" margin-right: 20px">
                        <img :src="url+'/img/number2.png'" class="responsive-img" alt="">
                    </div>
                    <div class="">
                        <p>
                            {{ title.title2 }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6" style="margin-bottom: 30px">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="first_name1" type="text" class="validate" v-model="materiaprima" v-on:keyup.enter="buscarPartidaMateriaPrima">
                                <label for="first_name1">{{ input.input2 }}</label>
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
                                        <div class="card-content  " style="padding: 15px; display: flex; align-items: center; justify-content: space-between">
                                            <h6>{{ title.ver }} {{ archivo.materia }} </h6>
                                            <a class="btn waves-effect waves-light" @click="descarga()"  style="background-color: #E1131B;">{{ input.boton2 }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="display: flex; align-items: center; margin-top: 30px;">
                        <div class="" style=" margin-right: 20px">
                            <img :src="url+'/img/number3.png'" class="responsive-img" alt="">
                        </div>
                        <div class="">
                            <p>
                                {{ title.title3 }}
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 50px">
                        <div class="col s12 m6">
                            <div class="card flecha" style="background-color: white; border: 1px solid red; color: black">
                                <div class="card-content  " style="padding: 15px; display: flex; align-items: center; justify-content: space-between">
                                    <h6>Registro de Rastreabilidad de Materia Prima </h6>
                                    <a class="btn waves-effect waves-light" @click="descargar()"  style="background-color: #E1131B;">{{ input.boton2 }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>{{ title.last }}</p>
                </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['title','input'],
        data() {
            return {
                paso2: false,
                paso3: false,
                materiaPrima: [],
                partidacomponente: '',
                materiaprima: '',
                archivo: [],
                url : document.__API_URL
            }
        },
        created(){
            //this.saveData();
            /*this.getItemsOrderBy();*/
        },
        methods: {
            buscarPartida() {
                console.log(window.location);
                axios.post(this.url+'/api/buscar', {partidacomponente: this.partidacomponente}).then(res => {
                    console.log(res.data);
                    this.materiaPrima = res.data;
                    this.paso2 = res.data.alert ? false : true;
                    console.log(this.paso2);
                }).catch(e => {
                    console.log(e);
                });
            },
            buscarPartidaMateriaPrima() {

                axios.post(this.url+'/api/materia', {materiaprima: this.materiaprima,partidacomponente: this.partidacomponente}).then(res => {
                    console.log(res.data);
                    this.archivo = res.data;
                    this.paso3 = res.data.alert ? false : true;
                }).catch(e => {
                    console.log(e);
                });
            },
            descargar() {
                console.log('aca');
                axios.get(this.url+'/api/descargar', {
                    params:   this.archivo,
                    responseType: 'blob', // important
                }).then(res => {
                    console.log(res);
                    //$scope.content = $sce.trustAsResourceUrl(fileURL);
                    // It is necessary to create a new blob object with mime-type explicitly set
                    // otherwise only Chrome works like it should
                    /*var newBlob = new Blob([res.data], {type: "application/pdf"});

                    // IE doesn't allow using a blob object directly as link href
                    // instead it is necessary to use msSaveOrOpenBlob
                    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                        window.navigator.msSaveOrOpenBlob(newBlob);
                        return;
                    }
                    console.log(newBlob);
                    // For other browsers:
                    // Create a link pointing to the ObjectURL containing the blob.
                    const data = window.URL.createObjectURL(newBlob);
                    var link = document.createElement('a');
                    link.href = data;
                    link.download="file.pdf";
                    link.click();*/

                        //window.URL.revokeObjectURL(data);
                    let url = window.URL.createObjectURL(new Blob([res.data]));
                    let link = document.createElement('a');
                    link.href = url;
                    //link.setAttribute('d','_blank'); //or any other extension
                    link.setAttribute('download', 'documento.pdf'); //or any other extension
                    document.body.appendChild(link);
                    link.click();
                    /*this.archivo = res.data;
                    this.paso3 = res.data.alert ? false : true;*/
                }).catch(e => {
                    console.log(e);
                });
            },

            descarga() {
                // console.log('descarga');
                axios.get(this.url+'/api/descarga', {
                    params:   this.archivo,
                    responseType: 'blob', // important
                }).then(res => {
                    console.log(res);
                    let url = window.URL.createObjectURL(new Blob([res.data]));
                    let link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', this.archivo.materia + '.pdf'); //or any other extension
                    document.body.appendChild(link);
                    link.click();
                    /*this.archivo = res.data;
                    this.paso3 = res.data.alert ? false : true;*/
                }).catch(e => {
                    console.log(e);
                });
                // axios.get(this.url+'/api/descarga/'+this.archivo.materia+'.pdf').then(res => {
                //     console.log(res);
                //     let url = window.URL.createObjectURL(new Blob([res.data]));
                //     let link = document.createElement('a');
                //     link.href = url;
                //     link.setAttribute('download', this.archivo.materia + '.pdf'); //or any other extension
                //     document.body.appendChild(link);
                //     link.click();
                //     /*this.archivo = res.data;
                //     this.paso3 = res.data.alert ? false : true;*/
                // }).catch(e => {
                //     console.log(e);
                // });
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