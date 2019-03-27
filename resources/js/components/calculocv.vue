<template>
    <div class="row">
        <div class="col m10">
            <div class="row">
                <div class="col m5">
                    <h6>Tipo de cálculo</h6>
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
                            <input id="first_name" type="text" v-model="calculo.p1" class="validate">
                            <select v-model="selectedp1" class="browser-default">
                                <option  v-for="(item, index) in presion" v-bind:value="item">
                                    {{ item }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col m2"></div>
                <div class="col m5">
                    <div class="">
                        <label for="Temperatura">Temperatura</label>
                        <div class="" style="display: flex; ">
                            <input id="Temperatura" type="text" v-model="calculo.temp" class="validate">
                            <select v-model="selectedtemp" class="browser-default">
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
                        <label for="Presion">Presion de Salida (P2)</label>
                        <div class="" style="display: flex; ">
                            <input id="Presion" type="text" v-model="calculo.p2" class="validate">
                            <select v-model="selectedp2" class="browser-default">
                                <option  v-for="(item, index) in presion" v-bind:value="item">
                                    {{ item }}
                                </option>
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
                                    <select v-model="calculo.pesoliquido" class="browser-default">
                                        <option  v-for="(item, index) in tipoliquido" v-bind:value="item.valor">
                                            {{ item.peso }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s6">
                                <input id="Fluido" type="text" class="validate" style="width: 200px" :value="calculo.pesoliquido">
                            </div>
                        </div>
                        <div class="row" v-show="tipo2 == 'gas'">
                            <div class="col s6">
                                <div class="">
                                    <select v-model="calculo.pesogas" class="browser-default">
                                        <option  v-for="(item, index) in tipogas" :value="item.valor">
                                            {{ item.peso }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s6">
                                <input id="Fluido" type="text" class="validate" style="width: 200px" :value="calculo.pesogas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col m5" >
                    <!---SI ES LIQUIDO   --->
                    <div class="" v-show="tipo1 == 'cv' && tipo2 == 'liquido'">
                        <label>Índice de caudal (Q)</label>
                        <div class="" style="display: flex; ">
                            <input  type="text" class="validate" v-model="calculo.indicecaudal">
                            <select v-model="selectedicaudal" class="browser-default">
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
                        <label>Unidades de caudal</label>
                        <select v-model="selectedicaudal" class="browser-default">
                            <option  v-for="(item, index) in indicecaudalliquido" :value="item">
                                {{ item }}
                            </option>
                        </select>
                    </div>
                    <!---SI ES GAS  --->
                    <div class="" v-show="tipo1 == 'cv' && tipo2 == 'gas'">
                        <label>Índice de caudal (Q)</label>
                        <div class="" style="display: flex; ">
                            <input  type="text" class="validate" v-model="calculo.indicecvgas">
                            <select v-model="selectedicaudalgas" class="browser-default">
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
                        <label>Unidades de caudal</label>
                        <select v-model="selectedicaudalgas" class="browser-default">
                            <option  v-for="(item, index) in indicecaudalgas" :value="item">
                                {{ item }}
                            </option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row" style="margin-bottom: 10px; margin-top: 30px; ">
                 <span class="" v-if="resultado > 0" style="border: 1px solid darkgray; padding: 30px; background-color: #ededed;">
                {{ resultado }}
            </span>
            </div>
            <a @click="calcv(calculo)" class="waves-effect btn" style="background-color: #E1131B; margin-top: 30px; margin-bottom: 30px">CALCULAR</a>
        </div>
        <div class="col m2"></div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                // arrays para completar los campos select
                temperatura:{
                    farenheit:'ºFarenheit',
                    celcius:'ºCelcius',
                    kelvin:'ºkelvin',
                },
                presion:{
                    psi:'PSI',
                    bar:'Bar',
                    mpa:'MPa',
                    kpa:'KPa',
                    kgcm:'Kg/cm^2'
                },
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
                //selected para obtener lo seleccionado y calcular
                selectedp1:'',
                selectedp2:'',
                selectedtemp:'',
                selectedicaudal:'',
                selectedicaudalgas:'',
                selectedliquido: '',
                selectedgas: '',
                //tipos
                tipo1:'cv',
                tipo2:'liquido',
                //obtenido por api
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
                resultado: 0,
                temp:0
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
                    //console.log(res.data);

                }).catch(e => {
                    console.log(e);
                });
            },
            gettipoliquido(){
                axios.get('/api/liquido').then(res => {
                    this.tipoliquido = res.data;
                    //console.log(res.data);

                }).catch(e => {
                    console.log(e);
                });
            },
            // CALCULO DEL CV
            calcv(data){
                console.log(data);
                //Q [Nl/m] = 6950 * 1,1 * 100 (1-2/300) * SQRT(1/100*2.07*343,15) = 2849,34 Nl/m.
                let nose = (6950 * 1.1 *100)*(1-(2/300)) * Math.sqrt(1/100*2.07*343.15);
                console.log('original: '+ nose);
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
                    this.caudaliquido = parseFloat(data.indicecaudal) / 0.2119; //dividir para pasar a litro por minuto (l/m)
                    this.cvliquido = parseFloat(data.indicecv) / 0.2119;
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
                    this.caudalgas = parseFloat(data.indicecaudalgas); //dividir para pasar a litro por minuto (l/m)
                    this.cvgas = parseFloat(data.indicecvgas);
                }

                // CONDICIONES EN PRESION P1 Y P2
                if (this.selectedp1 == 'Bar' && this.selectedp2 == 'Bar')
                {
                    //PASAR A BAR
                    let p1 = parseInt(data.p1); //dividir para pasar a bar
                    let p2 = parseInt(data.p2); //dividir para pasar a bar
                    let ap = p1 - p2;
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES MENOR A 2*P2
                    if (p1 < (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (6950 * this.caudalgas.toFixed(2) * p1) * (1 - ((2*ap)/(3*p1))) * Math.sqrt(ap / p1*pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*p1) - (2*ap))) * Math.sqrt(p1 * pesogas * this.temp  / ap);
                        }
                    }
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES mayor 0 igual A 2*P2
                    if (p1 >= (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (3273 * this.caudalgas.toFixed(2) * p1) * Math.sqrt(1 / pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (this.cvgas.toFixed(2) / (3273 * p1)) * Math.sqrt(pesogas * this.temp);
                        }
                    }
                    //DOS IF PARA LOS DE LIQUIDOS CV Y CAUDAL
                    if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                    {
                        console.log('si es caudal y liquido Y Bar el res es igual a: ');
                        //PARA HALLAR EL Q
                        this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(ap.toFixed(2) / peso);
                    }
                    if (this.tipo1 == 'cv' && this.tipo2 == 'liquido')
                    {
                        console.log('si es cv y liquido Y Bar el res es igual a: ');
                        //PARA HALLAR EL CV
                        this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / ap.toFixed(2));
                    }
                    console.log(parseFloat(this.resultado));
                }

                if (this.selectedp1 == 'PSI' && this.selectedp2 == 'PSI')
                {
                    //PASAR A BAR
                    let p1 = parseFloat(data.p1) / 14.50; //dividir para pasar a bar
                    let p2 = parseFloat(data.p2) / 14.50; //dividir para pasar a bar
                    let ap = p1 - p2;
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES MENOR A 2*P2
                    if (p1 < (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (6950 * this.caudalgas.toFixed(2) * p1) * (1 - ((2*ap)/(3*p1))) * Math.sqrt(ap / p1*pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*p1) - (2*ap))) * Math.sqrt(p1 * pesogas * this.temp  / ap);
                        }
                    }
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES mayor 0 igual A 2*P2
                    if (p1 >= (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (3273 * this.caudalgas.toFixed(2) * p1) * Math.sqrt(1 / pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (this.cvgas.toFixed(2) / (3273 * p1)) * Math.sqrt(pesogas * this.temp);
                        }
                    }
                    if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                    {
                        console.log('si es caudal y liquido Y PSI el res es igual a: ');
                        //PARA HALLAR EL Q
                        this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(ap.toFixed(2) / peso);
                    }
                    if (this.tipo1 == 'cv' && this.tipo2 == 'liquido')
                    {
                        console.log('si es cv y liquido Y PSI el res es igual a: ');
                        //PARA HALLAR EL CV
                        this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / ap.toFixed(2));
                    }
                    console.log(parseFloat(this.resultado));
                }
                if (this.selectedp1 == 'MPa' && this.selectedp2 == 'MPa')
                {
                    //PASAR A BAR
                    let p1 = parseFloat(data.p1) / 0.1; //dividir para pasar a bar
                    let p2 = parseFloat(data.p2) / 0.1; //dividir para pasar a bar
                    let ap = p1 - p2;
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES MENOR A 2*P2
                    if (p1 < (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (6950 * this.caudalgas.toFixed(2) * p1) * (1 - ((2*ap)/(3*p1))) * Math.sqrt(ap / p1*pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*p1) - (2*ap))) * Math.sqrt(p1 * pesogas * this.temp  / ap);
                        }
                    }
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES mayor 0 igual A 2*P2
                    if (p1 >= (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (3273 * this.caudalgas.toFixed(2) * p1) * Math.sqrt(1 / pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (this.cvgas.toFixed(2) / (3273 * p1)) * Math.sqrt(pesogas * this.temp);
                        }
                    }
                    if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                    {
                        console.log('si es caudal y liquido Y MPA el res es igual a: ');
                        //PARA HALLAR EL Q
                        this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(ap.toFixed(2) / peso);
                    }else{
                        console.log('si es cv y liquido Y MPA el res es igual a: ');
                        //PARA HALLAR EL CV
                        this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / ap.toFixed(2));
                    }
                    console.log(parseFloat(this.resultado));
                }
                if (this.selectedp1 == 'KPa' && this.selectedp2 == 'KPa')
                {
                    //PASAR A BAR
                    let p1 = parseFloat(data.p1) / 100; //dividir para pasar a bar
                    let p2 = parseFloat(data.p2) / 100; //dividir para pasar a bar
                    let ap = p1 - p2;
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES MENOR A 2*P2
                    if (p1 < (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (6950 * this.caudalgas.toFixed(2) * p1) * (1 - ((2*ap)/(3*p1))) * Math.sqrt(ap / p1*pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*p1) - (2*ap))) * Math.sqrt(p1 * pesogas * this.temp  / ap);
                        }
                    }
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES mayor 0 igual A 2*P2
                    if (p1 >= (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (3273 * this.caudalgas.toFixed(2) * p1) * Math.sqrt(1 / pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (this.cvgas.toFixed(2) / (3273 * p1)) * Math.sqrt(pesogas * this.temp);
                        }
                    }
                    if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                    {
                        console.log('si es caudal y liquido Y kPA el res es igual a: ');
                        //PARA HALLAR EL Q
                        this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(ap.toFixed(2) / peso);
                    }else{
                        console.log('si es cv y liquido Y kPA el res es igual a: ');
                        //PARA HALLAR EL CV
                        this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / ap.toFixed(2));
                    }
                    console.log(parseFloat(this.resultado));
                }
                if (this.selectedp1 == 'Kg/cm^2' && this.selectedp2 == 'Kg/cm^2')
                {
                    //PASAR A BAR
                    let p1 = parseFloat(data.p1) / 1.019; //dividir para pasar a bar
                    let p2 = parseFloat(data.p2) / 1.019; //dividir para pasar a bar
                    let ap = p1 - p2;
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES MENOR A 2*P2
                    if (p1 < (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (6950 * this.caudalgas.toFixed(2) * p1) * (1 - ((2*ap)/(3*p1))) * Math.sqrt(ap / p1*pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (3*this.cvgas.toFixed(2) / 6950 *((3*p1) - (2*ap))) * Math.sqrt(p1 * pesogas * this.temp  / ap);
                        }
                    }
                    //DOS IF PARA LOS DE GAS CV Y CAUDAL DONDE P1 ES mayor 0 igual A 2*P2
                    if (p1 >= (2*p2))
                    {
                        if (this.tipo1 == 'caudal' && this.tipo2 == 'gas')
                        {
                            console.log('si es caudal y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL Q
                            this.resultado = (3273 * this.caudalgas.toFixed(2) * p1) * Math.sqrt(1 / pesogas*this.temp);
                        }
                        if (this.tipo1 == 'cv' && this.tipo2 == 'gas')
                        {
                            console.log('si es cv y gas Y Bar el res es igual a: ');
                            //PARA HALLAR EL CV
                            this.resultado = (this.cvgas.toFixed(2) / (3273 * p1)) * Math.sqrt(pesogas * this.temp);
                        }
                    }
                    if (this.tipo1 == 'caudal' && this.tipo2 == 'liquido')
                    {
                        console.log('si es caudal y liquido Y KGCM el res es igual a: ');
                        //PARA HALLAR EL Q
                        this.resultado = (14.42 * this.cvliquido.toFixed(2)) * Math.sqrt(ap.toFixed(2) / peso);
                    }else{
                        console.log('si es cv y liquido Y KGCM el res es igual a: ');
                        //PARA HALLAR EL CV
                        this.resultado = (this.caudaliquido.toFixed(2) / 14.42 ) * Math.sqrt(peso / ap.toFixed(2));
                    }
                    console.log(parseFloat(this.resultado));
                }
            },

        }
    }
</script>
<style>

</style>