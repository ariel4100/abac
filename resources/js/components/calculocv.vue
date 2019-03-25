<template>
    <div class="row">
        <div class="col m10">
            <div class="row">
                <div class="col m5">
                    <h6>Tipo de cálculo</h6>
                    <div class="" style="margin: 40px">
                        <label>
                            <input class="with-gap" v-model="tipo1" @click="cv()" type="radio" value="cv" checked/>
                            <span>CV</span>
                        </label>
                        <label style="margin-left: 30px">
                            <input class="with-gap" v-model="tipo1" type="radio" value="caudal" />
                            <span>Caudal</span>
                        </label>
                    </div>
                    <h6>Tipo de fluido</h6>
                    <div class="" style="margin: 40px">
                        <label>
                            <input class="with-gap" v-model="tipo2" type="radio" value="liquido"/>
                            <span>Líquido</span>
                        </label>
                        <label style="margin-left: 30px">
                            <input class="with-gap" v-model="tipo2" type="radio" value="gas" />
                            <span>Gas</span>
                        </label>
                    </div>
                </div>
                <div class="col m2"></div>
                <div class="col m5">
                    <img src="/../img/calculocv.png" class="responsive-img" alt="">
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col m5">
                    <div class="">
                        <label for="first_name">Presion de Entrada (P1)</label>
                        <div class="" style="display: flex; ">
                            <input id="first_name" type="text" class="validate">
                            <select>
                                <option value="1">PSI</option>
                                <option value="2">bar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col m2"></div>
                <div class="col m5">
                    <div class="">
                        <label for="Temperatura">Temperatura</label>
                        <div class="" style="display: flex; ">
                            <input id="Temperatura" type="text" class="validate">
                            <select>
                                <option value="1">Farenheit</option>
                                <option value="2">Celcius</option>
                                <option value="2">Kelvin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col m5">
                    <div class="">
                        <label for="Presion">Presion de Salida (P2)</label>
                        <div class="" style="display: flex; ">
                            <input id="Presion" type="text" class="validate">
                            <select>
                                <option value="1">PSI</option>
                                <option value="2">bar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col m2"></div>
                <div class="col m5">
                    <div class="">
                        <label for="Fluido">Fluido del sistema</label>
                        <div class="row" v-show="tipo2 == 'liquido'">
                            <div class="col s6">
                                <div class="" >
                                    <select v-model="selectedliquido" class="browser-default">
                                        <option  v-for="(item, index) in tipoliquido" v-bind:value="item.valor">
                                            {{ item.peso }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s6">
                                <input id="Fluido" type="text" class="validate" style="width: 200px" :value="selectedliquido">
                            </div>
                        </div>
                        <div class="row" v-show="tipo2 == 'gas'">
                            <div class="col s6">
                                <div class="">
                                    <select v-model="selectedgas" class="browser-default">
                                        <option  v-for="(item, index) in tipogas" :value="item.valor">
                                            {{ item.peso }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s6">
                                <input id="Fluido" type="text" class="validate" style="width: 200px" :value="selectedgas">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col m5" >
                    <div class="" v-show="tipo1 == 'cv'">
                        <label>Índice de caudal (Q)</label>
                        <div class="" style="display: flex; ">
                            <input  type="text" class="validate">
                            <select>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="" v-show="tipo1 == 'caudal'">
                        <label>CV</label>
                        <div class="" style="display: flex; ">
                            <input  type="text" class="validate">
                        </div>
                        <label>Unidades de caudal</label>
                        <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>

            </div>
            <a @click="calcv(tipo1)" class="waves-effect btn" style="background-color: #E1131B; margin-top: 30px; margin-bottom: 30px">CALCULAR</a>
        </div>
        <div class="col m2"></div>
    </div>
</template>

<script>
    import axios from 'axios';
    import 'materialize-css/dist/js/materialize.js'
    export default {
        data() {
            return {
                selectedliquido: '',
                selectedgas: '',
                tipogas:[],
                tipoliquido:[],
                tipo1:'cv',
                tipo2:'liquido',
                calculo:{
                    p1:'',
                    p2:'',
                    temp:'',
                    peso:'',
                    indicecaudal:'',
                }
            }
        },

        created(){
            this.gettipogas();
            this.gettipoliquido();

        },
        methods: {
            gettipogas(){
                axios.get('/api/gas').then(res => {
                    this.tipogas = res.data;
                    console.log(res.data);
                    let self = this
                    Vue.nextTick(function () {
                        $(self.$el).find('select').formSelect();
                    })
                }).catch(e => {
                    console.log(e);
                });
            },
            gettipoliquido(){
                axios.get('/api/liquido').then(res => {
                    this.tipoliquido = res.data;
                    console.log(res.data);
                    let self = this
                    Vue.nextTick(function () {
                        $(self.$el).find('select').formSelect();
                    })
                }).catch(e => {
                    console.log(e);
                });
            },
            cv(){
                if (this.tipo1 == 'cv')
                {
                    console.log('fdsfs');
                    $('select').formSelect();
                }
            },
        }
    }
</script>
<style>

</style>