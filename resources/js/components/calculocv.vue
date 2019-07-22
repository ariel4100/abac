<template>
    <div class="">
        <div class="row">
            <div class="col s12 m5">
                <div class="row">
                    <div class="input-field col s12  ">
                        <h5>{{ title.title }}</h5>
                        <select v-model="selectedfamilia" @change="moss(selectedfamilia)" class="browser-default" style="width: auto">
                            <option value="" disabled selected>{{ title.selec }}</option>
                            <option :value="fami.id" v-for="fami in familias">
                                <span v-if="fami.title_es">{{ fami.title_es }}</span>
                                <span v-if="fami.title_en">{{ fami.title_en }}</span>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 " style=" margin-top: 0px; ">
                        <h5>{{ title.title1 }}</h5>
                        <div class="" style="display: flex; align-items: center; justify-content: space-between;">
                            <p>{{ title.tipo }}</p>
                            <select v-model="selectedtipo" class="browser-default" style="width: 100px">
                                <option value="todos" selected>{{ title.todo }}</option>
                                <option :value="c.tipo.split(' ',2)[0]" v-for="c in tipo">
                                    {{ c.tipo ? c.tipo.split(' ',2)[1] : '' }}
                                </option>
                            </select>
                        </div>
                        <div class="" style="display: flex; align-items: center; justify-content: space-between;">
                            <p>{{ title.diametro }}</p>
                            <select v-model="selecteddiametro" class="browser-default" style="width: 100px">
                                <option value="todos" selected>{{ title.todo }}</option>
                                <option :value="conex.diametro" v-for="(conex,index) in conexion"  v-bind:selected="index === 0">
                                    {{ conex.diametro }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field col s6 " style=" margin-top: 0px; ">
                        <h5>{{ title.title2 }}</h5>
                        <div class="" style="display: flex; align-items: center; justify-content: space-between;">
                            <p>{{ title.tipo }}</p>
                            <select v-model="selectedtiposalida" class="browser-default" style="width: 100px">
                                <option value="todos" selected>{{ title.todo }}</option>
                                <option :value="c.tipo.split(' ',2)[0]" v-for="c in tipo">
                                    {{ c.tipo ? c.tipo.split(' ',2)[1] : ''  }}
                                </option>
                            </select>
                        </div>
                        <div class="" style="display: flex; align-items: center; justify-content: space-between;">
                            <p>{{ title.diametro }}</p>
                            <select v-model="selecteddiametrosalida" class="browser-default" style="width: 100px">
                                <option value="todos" selected>{{ title.todo }}</option>
                                <option :value="conex.diametro" v-for="conex in conexion">
                                    {{ conex.diametro }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <div class="" v-if="mostrar">
                            <h6>{{ title.tipo1 }}</h6>
                            <div class="" style="margin: 40px">
                                <label>
                                    <input class="with-gap" v-model="tipo1"  type="radio" value="cv" checked/>
                                    <span>CV</span>
                                </label>
                                <label style="margin-left: 30px">
                                    <input class="with-gap" v-model="tipo1" type="radio" value="caudal" />
                                    <span>Caudal</span>
                                </label>
                            </div>
                            <h6>{{ title.tipo2 }}</h6>
                            <div class="" style="margin: 40px">
                                <label>
                                    <input class="with-gap" v-model="tipo2" type="radio" value="liquido"/>
                                    <span>{{ title.liquido }}</span>
                                </label>
                                <label style="margin-left: 30px">
                                    <input class="with-gap" v-model="tipo2" type="radio" value="gas" />
                                    <span>Gas</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m2"></div>
            <div class="col s12 m5" style="display: flex; align-items: flex-end;  height: 350px;">
                <div class="" style=" ">
                    <img :src="url+'/img/esquema.png'" class="responsive-img" style=" " alt="">
                </div>
            </div>
        </div>
        <!---//muestra el producto SIN HACER EL CALCULO------>
        <filtro-sin-calculo  :title="title" v-if="!mostrar" :data="{dsalida: selecteddiametrosalida, tsalida: selectedtiposalida, dentrada:selecteddiametro, tentrada:selectedtipo, familia:selectedfamilia}"></filtro-sin-calculo>
        <div class="row">
            <div class="col s12" v-if="mostrar">
                <div class="row" style="margin-top: 30px">
                    <div class="col m5">
                        <div class="">
                            <label for="first_name">{{ title.presion1 }}</label>
                            <div class="" style="display: flex; ">
                                <input id="first_name" type="number" v-model="calculo.p1" class="validate">
                                <select v-model="selectedp1" class="browser-default">
                                    <option value="" disabled selected>{{ title.p1 }}</option>
                                    <option  v-for="(item, index) in presion" v-bind:value="item.nombre">
                                        {{ item.nombre }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col m2"></div>
                    <div class="col m5">
                        <div class="">
                            <label for="Temperatura">{{ title.temp }}</label>
                            <div class="" style="display: flex; ">
                                <input id="Temperatura" type="number" v-model="calculo.temp" class="validate">
                                <select v-model="selectedtemp" class="browser-default">
                                    <option value="" disabled selected>{{ title.temp }}</option>
                                    <option  v-for="(item, index) in temperatura" :value="item">
                                        {{ item }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col m5">
                        <div class="">
                            <label for="Presion">{{ title.presion2 }}</label>
                            <div class="" style="display: flex; ">
                                <input id="Presion" type="number" v-model="calculo.p2" class="validate">
                                <select v-model="selectedp2" class="browser-default" >
                                    <option value="" disabled selected>{{ title.p2 }}</option>
                                    <option  v-for="(item, index) in presion" v-bind:value="item.nombre"  >
                                        {{ item.nombre  }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col m2"></div>
                    <div class="col m5">
                        <div class="">
                            <label for="Fluido">{{ title.sis }}</label>
                            <div class="row" v-show="tipo2 == 'liquido'">
                                <div class="" style="display: flex">
                                    <select v-model="calculo.pesoliquido" class="browser-default" style="width: auto">
                                        <option value="" disabled selected>{{ title.peso }}</option>
                                        <option  v-for="(item, index) in tipoliquido" v-bind:value="item.valor">
                                            <span v-if="item.peso">{{ item.peso }}</span>
                                            <span v-if="item.peso_en">{{ item.peso_en }}</span>
                                        </option>
                                    </select>
                                    <input id="Fluido" type="number" class="validate" style="margin-left: 15px;" :value="calculo.pesoliquido">
                                </div>

                            </div>
                            <div class="row" v-show="tipo2 == 'gas'">
                                <div class="" style="display: flex;">
                                    <select v-model="calculo.pesogas" class="browser-default" style="width: auto">
                                        <option value="" disabled selected>{{ title.peso }}</option>
                                        <option  v-for="(item, index) in tipogas" :value="item.valor">
                                            <span v-if="item.peso">{{ item.peso }}</span>
                                            <span v-if="item.peso_en">{{ item.peso_en }}</span>
                                        </option>
                                    </select>
                                    <input id="flow" type="number" class="validate" style="margin-left: 15px;" :value="calculo.pesogas">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col m5" >
                        <!---SI ES LIQUIDO   --->
                        <div class="" v-show="tipo1 == 'cv' && tipo2 == 'liquido'">
                            <label>{{ title.caudal }}</label>
                            <div class="" style="display: flex; ">
                                <input  type="text" class="validate" v-model="calculo.indicecaudal">
                                <select v-model="selectedicaudal" class="browser-default">
                                    <option value="" disabled selected>{{ title.unidad }}</option>
                                    <option  v-for="(item, index) in indicecaudalliquido" :value="item">
                                        {{ item }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="" v-show="tipo1 == 'caudal' && tipo2 == 'liquido'">
                            <label>CV</label>
                            <div class="" style="display: flex; ">
                                <input  type="text" class="validate" v-model="calculo.indicecv">
                            </div>
                            <label>{{ title.unidades }}</label>
                            <select v-model="selectedicaudal" class="browser-default">
                                <option value="" disabled selected>{{ title.unidad }}</option>
                                <option  v-for="(item, index) in indicecaudalliquido" :value="item">
                                    {{ item }}
                                </option>
                            </select>
                        </div>
                        <!---SI ES GAS  --->
                        <div class="" v-show="tipo1 == 'cv' && tipo2 == 'gas'">
                            <label>{{ title.caudal }}</label>
                            <div class="" style="display: flex; ">
                                <input  type="text" class="validate" v-model="calculo.indicecvgas">
                                <select v-model="selectedicaudalgas" class="browser-default">
                                    <option value="" disabled selected>{{ title.unidad }}</option>
                                    <option  v-for="(item, index) in indicecaudalgas" :value="item">
                                        {{ item }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="" v-show="tipo1 == 'caudal' && tipo2 == 'gas'">
                            <label>CV</label>
                            <div class="" style="display: flex; ">
                                <input  type="text" class="validate" v-model="calculo.indicecaudalgas">
                            </div>
                            <label>{{ title.unidades }}</label>
                            <select v-model="selectedicaudalgas" class="browser-default">
                                <option value="" disabled selected>{{ title.unidad }}</option>
                                <option  v-for="(item, index) in indicecaudalgas" :value="item">
                                    {{ item }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px; margin-top: 50px; ">
                    <div class=" center" v-if="resultado > 0" style="border: 1px solid darkgray; padding: 30px; background-color: #ededed; width: 200px">
                        <div class="" v-if="tipo1 == 'cv'">
                            CV = {{ resultado.toFixed(4) }}
                        </div>
                        <div class="" v-if="tipo1 == 'caudal'">
                            {{ title.flujo }} (Q) = {{ resultado.toFixed(4) }}
                        </div>
                    </div>
                    <span class="" v-else-if="error" style="border: 1px solid darkgray; padding: 30px; background-color: #ededed;">
                {{ error }}
                </span>
                </div>
                <a @click="calcv(calculo)" class="waves-effect btn" style="background-color: #E1131B; margin-top: 30px; margin-bottom: 30px">{{ title.btn }}</a>
            </div>
        </div>
        <!---//muestra el producto------>
        <div class="row   mb50 mt50" v-if="mostrar">
            <!--<a class="product-item col s12 m6 l4"  :href="'/productos/'+item.producto_id" v-for="item in productos">
          <div class="" style="border: 1px solid #dddddd;  ">
                 <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                     <img :src="'../img/productos/'+item.image" alt=" " class="responsive-img" >
                     <div class="product-overlay">
                         <div class="icon">
                             <i class="material-icons">add</i>
                         </div>
                     </div>
                 </div>
             </div>
             <div style="display:flex; justify-content:center; align-items:center; width:100%; padding: 5%">
                 <div class="product-description rederino center fw6">
                     {{ item.title_es}}
                 </div>
             </div>
              </a>-->
            <div class="col s12 m6 l4" style="display:flex; " v-for="item in productos">
                <a class="product-item "  style="display: flex; " :href="url+'/productos/'+item.id" >
                    <div class="">
                        <div class="" style="border: 1px solid #dddddd;  ">
                            <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                                <img :src="'../img/productos/'+item.image" alt=" " class="responsive-img" >
                                <div class="product-overlay">
                                    <div class="icon">
                                        <i class="material-icons">add</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex; justify-content:center; align-items:center; width:100%; padding: 5%">
                            <div class="product-description rederino center fw6">
                                {{ item.title_es}}
                            </div>
                        </div>
                    </div>
                </a>
                <div class="">

                    <h6 class="center">{{ title.modelo }}</h6>
                    <div class="modelo">
                        <table class="">
                            <tbody>
                            <tr v-for="t in item.c">
                                <td> {{ t }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import 'materialize-css/dist/css/materialize.css'
    import filtroSinCalculo from './filtroSinCalculo.vue'
    export default {
        props: ['title','input'],
        components: {
            filtroSinCalculo,
        },
        data() {
            return {
                // arrays para completar los campos select
                entradaysalida:{
                    entrada:'entrada',
                    salida:'salida',
                },
                conexiontipo:[
                    { nombre: 'H' },
                    { nombre: 'M' },
                    { nombre: 'Tubo' },
                ],
                temperatura:{
                    farenheit:'ºFarenheit',
                    celcius:'ºCelcius',
                    kelvin:'ºkelvin',
                },
                presion:[
                    { nombre: 'PSI' },
                    { nombre: 'Bar' },
                    { nombre: 'MPa' },
                    { nombre: 'KPa' },
                    { nombre: 'Kg/cm^2' },
                ],
                /*presion:{
                    psi:'PSI',
                    bar:'Bar',
                    mpa:'MPa',
                    kpa:'KPa',
                    kgcm:'Kg/cm^2'
                },*/
                indicecaudalliquido:{
                    gpm:'Gpm',
                    m3h:'m^3/h',
                    lh:'l/h',
                    lm:'l/m',
                },
                indicecaudalgas:{
                    scfm:'SCFM',
                    nlh:'Nl/h',
                    nm3h:'Nm^3/h',
                    nlm:'Nl/m',
                },
                mostrar: true,
                //selected para obtener lo seleccionado y calcular
                selecteddiametrosalida:'todos',
                selectedtiposalida:'todos',
                selectedconexion:'todos',
                selectedfamilia:'',
                selectedp1:'',
                selectedp2: '',
                selectedtemp:'',
                selectedicaudal:'',
                selectedicaudalgas:'',
                selectedliquido: '',
                selectedgas: '',
                selecteddiametro:'todos',
                selectedtipo:'todos',
                //tipos
                tipo:[],
                tipo1:'cv',
                tipo2:'liquido',
                //obtenido por api
                productos: [],
                familias: [],
                conexion: [],
                tipogas:[],
                tipoliquido:[],
                calculo:{
                    p1:'',
                    p2:'',
                    temp:'',
                    pesoliquido:'',
                    pesogas:'',
                    indicecaudal:'',
                    indicecv:'',
                    indicecvgas:'',
                    indicecaudalgas:'',
                },
                // variables de cv
                caudaliquido: 0,
                cvliquido: 0,
                caudalgas: 0,
                cvgas: 0,
                resultado: '',
                temp:0,
                p1:0,
                p2:0,
                ap: 0,
                error: '',
                url :  document.__API_URL
            }
        },
        created(){
            this.gettipogas();
            this.gettipoliquido();
            this.getfamilia();
            this.getconexion();
        },
        methods: {
            moss(r){
                let g = true;
                this.familias.forEach(function(element) {
                    if(element.id == r && element.buscado != true){
                        //console.log(element);
                        g =   false;
                    }
                });
                this.mostrar = g;
                console.log(this.mostrar);
            },
            getfamilia(){
                axios.get(this.url+'/api/familia').then(res => {
                    // console.log(res.data);
                    this.familias = res.data;
                    //console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
            },
            getconexion(){
                axios.get(this.url+'/api/conexion').then(res => {
                    //console.log(res.data);
                    this.conexion = res.data.conexion;
                    this.tipo = res.data.tipo;
                    console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
            },
            gettipogas(){
                axios.get(this.url+'/api/gas').then(res => {
                    this.tipogas = res.data;
                    //console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
            },
            gettipoliquido(){
                axios.get(this.url+'/api/liquido').then(res => {
                    this.tipoliquido = res.data;
                    //console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
            },
            // CALCULO DEL CV
            calcv(data){
                console.log(this.selectedconexion);
                //Q [Nl/m] = 6950 * 1,1 * 100 (1-2/300) * SQRT(1/100*2.07*343,15) = 2849,34 Nl/m.
                let nose = (6950 * 1.1 *100)*(1-(2/300)) * Math.sqrt(1/100*2.07*343.15);
                //console.log('original: '+ nose);
                //Temperatura: Kelvin  = (77 F° - 32°)*5/9 + 273,15 = 298,15 K°;
                if(this.selectedtemp == 'ºFarenheit')
                {
                    //PASANDO A KELVIN
                    //ºF = (ºC * 9/5) +32   Kelvin = Cº + 273.15
                    this.temp = (parseInt(data.temp) - 32) * 5/9 + 273.15;
                }
                if(this.selectedtemp == 'ºCelcius')
                {
                    //PASANDO A KELVIN
                    this.temp = parseInt(data.temp) + 273.15;
                }
                if(this.selectedtemp == 'ºkelvin')
                {
                    //PASANDO A KELVIN
                    this.temp = parseInt(data.temp);
                }
                //FLUIDO DES SISTEMA PESO
                let peso = parseFloat(data.pesoliquido); // obtengo de fluidos del sistema del peso su valor
                let pesogas = parseFloat(data.pesogas); // obtengo de fluidos del sistema del peso su valor
                //CONDICIONES DEL INDICE CAUDAL LIQUIDO
                if(this.selectedicaudal == 'Gpm')
                {
                    this.caudaliquido = parseFloat(data.indicecaudal) / 0.2642; //dividir para pasar a litro por minuto (l/m)
                    this.cvliquido = parseFloat(data.indicecv) / 0.2642;
                    //console.log(this.caudaliquido.toFixed(2));
                }
                if(this.selectedicaudal == 'l/h')
                {
                    this.caudaliquido = parseFloat(data.indicecaudal) / 60; //dividir para pasar a litro por minuto (l/m)
                    this.cvliquido = parseFloat(data.indicecv) / 60;
                }
                if(this.selectedicaudal == 'l/m')
                {
                    this.caudaliquido = parseFloat(data.indicecaudal); //dividir para pasar a litro por minuto (l/m)
                    this.cvliquido = parseFloat(data.indicecv);
                }
                if(this.selectedicaudal == 'm^3/h')
                {
                    this.caudaliquido = parseFloat(data.indicecaudal) / 0.06; //dividir para pasar a litro por minuto (l/m)
                    this.cvliquido = parseFloat(data.indicecv) / 0.06;
                }
                //CONDICIONES DEL INDICE CAUDAL GAS
                if(this.selectedicaudalgas == 'SCFM')
                {
                    this.caudalgas = parseFloat(data.indicecaudalgas) / 0.03531; //dividir para pasar a litro por minuto (l/m)
                    this.cvgas = parseFloat(data.indicecvgas) / 0.03531;
                    //console.log(this.caudaliquido.toFixed(2));
                }
                if(this.selectedicaudalgas == 'Nl/h')
                {
                    this.caudalgas = parseFloat(data.indicecaudalgas) / 60; //dividir para pasar a litro por minuto (l/m)
                    this.cvgas = parseFloat(data.indicecvgas) / 60;
                }
                if(this.selectedicaudalgas == 'Nm^3/h')
                {
                    this.caudalgas = parseFloat(data.indicecaudalgas) / 0.06; //dividir para pasar a litro por minuto (l/m)
                    this.cvgas = parseFloat(data.indicecvgas) / 0.06;
                }
                if(this.selectedicaudalgas == 'Nl/m')
                {
                    this.caudalgas = parseFloat(data.indicecaudalgas); //dividir para pasar a NORMAL litro por minuto (l/m)
                    this.cvgas = parseFloat(data.indicecvgas);
                }
                // CONDICIONES EN PRESION P1
                if (this.selectedp1 == 'Bar')
                {
                    //PASAR A BAR
                    this.p1 = parseInt(data.p1); //dividir para pasar a bar
                }
                if (this.selectedp1 == 'PSI')
                {
                    //PASAR A BAR
                    this.p1 = parseFloat(data.p1) / 14.50; //dividir para pasar a bar
                }
                if (this.selectedp1 == 'MPa')
                {
                    //PASAR A BAR
                    this.p1 = parseFloat(data.p1) / 0.1; //dividir para pasar a bar
                }
                if (this.selectedp1 == 'KPa')
                {
                    //PASAR A BAR
                    this.p1 = parseFloat(data.p1) / 100; //dividir para pasar a bar
                }
                if (this.selectedp1 == 'Kg/cm^2')
                {
                    this.p1 = parseFloat(data.p1) / 1.019; //dividir para pasar a bar
                }
                // CONDICIONES EN PRESION P2
                if (this.selectedp2 == 'Bar')
                {
                    //PASAR A BAR
                    this.p2 = parseInt(data.p2); //dividir para pasar a bar
                }
                if (this.selectedp2 == 'PSI')
                {
                    //PASAR A BAR
                    this.p2 = parseFloat(data.p2) / 14.50; //dividir para pasar a bar
                }
                if (this.selectedp2 == 'MPa')
                {
                    //PASAR A BAR
                    this.p2 = parseFloat(data.p2) / 0.1; //dividir para pasar a bar
                }
                if (this.selectedp2 == 'KPa')
                {
                    //PASAR A BAR
                    this.p2 = parseFloat(data.p2) / 100; //dividir para pasar a bar
                }
                if (this.selectedp2 == 'Kg/cm^2')
                {
                    this.p2 = parseFloat(data.p2) / 1.019; //dividir para pasar a bar
                }
                //AP ES IGUAL A PI-P2
                this.ap = this.p1 - this.p2;
                if (this.p2 >= this.p1)
                {
                    this.error = this.title.mensaje;
                    console.log('liquido error p2 no puede ser mayor o igual q p1... p1:'+this.p1+' '+ ' p2 :'+ this.p2)
                }
                //RESULTADO CON SUS FORMULAS
                //liquidos
                if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                {
                    console.log('si es caudal y liquido el res es igual a: ');
                    //PARA HALLAR EL Q
                    this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(this.ap / peso);
                }
                if (this.tipo1 == 'cv' && this.tipo2 == 'liquido')
                {
                    console.log('si es cv y liquido   el res es igual a: ');
                    //PARA HALLAR EL CV
                    this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / this.ap);
                }
                //gases
                if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                {
                    console.log('si es caudal y gas  el res es igual a: ');
                    if (this.p1 < (2*this.p2))
                    {
                        //PARA HALLAR EL Q
                        this.resultado = (6950 * this.caudalgas.toFixed(2) * this.p1) * (1 - ((2*this.ap)/(3*this.p1))) * Math.sqrt(this.ap / (this.p1*pesogas*this.temp));
                    }else{
                        this.error = this.title.mensaje;
                        console.log('error p2 es mayor tiene que ser menor a p1: '+this.p1+' y el p2 :'+ (2*this.p2))
                    }
                    if (this.p1 >= (2*this.p2))
                    {
                        //PARA HALLAR EL Q
                        this.resultado = (3273 * this.caudalgas.toFixed(2) * this.p1) * Math.sqrt(1 / (pesogas*this.temp));
                    }else{
                        this.error = this.title.mensaje;
                        console.log('error p2 es mayor tiene que ser igual o menor q p1: '+this.p1+' y el p2 :'+ (2*this.p2))
                    }
                }
                if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                {
                    console.log('si es cv y gas  el res es igual a: ');
                    if (this.p1 < (2*this.p2))
                    {
                        console.log('temperatura_: ' +pesogas);
                        //PARA HALLAR EL CV
                        //this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*this.p1) - (2*this.ap))) * Math.sqrt(this.p1 * pesogas * this.temp  / this.ap);
                        this.resultado = ((3*this.cvgas.toFixed(2)) / (6950 *((3*this.p1) - (2*this.ap)))) * Math.sqrt((this.p1 * pesogas * this.temp)  / this.ap);
                    }else{
                        console.log('error p2 es mayor tiene que ser menor a p1: '+this.p1+' y el p2 :'+ (2*this.p2))
                    }
                    if (this.p1 >= (2*this.p2))
                    {
                        //PARA HALLAR EL CV
                        //this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*this.p1) - (2*this.ap))) * Math.sqrt(this.p1 * pesogas * this.temp  / this.ap);
                        this.resultado = (this.cvgas.toFixed(2) / (3273 * this.p1)) * Math.sqrt(pesogas * this.temp);
                    }else{
                        console.log('error p2 es mayor tiene que ser igual o menor q p1: '+this.p1+' y el p2 :'+ (2*this.p2))
                    }
                }
                console.log(parseFloat(this.resultado));
                if (this.resultado > 0 && this.p1 && this.tipo1 == 'cv')
                {
                    console.log('hace el post');
                    axios.post(this.url+'/api/resultado', {resultado: this.resultado,p1: this.p1, familia: this.selectedfamilia, diametro: this.selecteddiametro, tipo: this.selectedtipo, diametrosalida: this.selecteddiametrosalida, tiposalida: this.selectedtiposalida}).then(res => {
                        console.log(res.data);
                        this.productos = res.data;
                    }).catch(e => {
                        console.log(e);
                    });
                }
                if (this.resultado > 0 && this.p1 && this.tipo1 == 'caudal' && this.calculo.indicecaudalgas)
                {
                    console.log('hace el post');
                    axios.post(this.url+'/api/resultado', {calculo: this.calculo.indicecaudalgas,p1: this.p1, familia: this.selectedfamilia, diametro: this.selecteddiametro, tipo: this.selectedtipo, diametrosalida: this.selecteddiametrosalida, tiposalida: this.selectedtiposalida}).then(res => {
                        console.log(res.data);
                        this.productos = res.data;
                    }).catch(e => {
                        console.log(e);
                    });
                }
            },
            filterInOut(){
                console.log('dasdasd')
            }
        }
    }
</script>
<style scoped>
    select {
        width: 120px;
    }
    input:not([type]), input[type=text]:not(.browser-default), input[type=password]:not(.browser-default), input[type=email]:not(.browser-default), input[type=url]:not(.browser-default), input[type=time]:not(.browser-default), input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=number]:not(.browser-default), input[type=search]:not(.browser-default), textarea.materialize-textarea {
        width: 200px;
        margin-right: 15px;
    }
    .modelo{
        overflow-y: scroll;
        height: 190px;
    }
</style>