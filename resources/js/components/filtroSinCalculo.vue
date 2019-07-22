<template>
    <div class="">
        <div class="row" >
            <a @click="filterInOut()" class="waves-effect btn" style="background-color: #E1131B; margin-top: 0px; margin-bottom: 30px">{{ title.btn }}</a>
        </div>
        <!---//muestra el producto------>
        <div class="row  mb50 mt50"  >
            <div class="col s12 m6 l4" style="display:flex; " v-for="item in productos">
                <a class="product-item "  style="display: flex; " :href="url+'/productos/'+item.id" >
                    <div class="" style="height: 370px">
                        <div class="" style="border: 1px solid #dddddd;  ">
                            <div class="product-image" style="border-bottom: 0px solid #dddddd;">
                                <img :src="'../img/productos/'+item.image" alt=" " class="responsive-img" style="height: 250px;">
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
    export default {
        props: ['title','input','data'],
        data() {
            return {
                productos: [],
                url :  document.__API_URL
            }
        },

        created(){

            this.getfamilia();


        },
        methods: {
            getfamilia(){
                axios.get(this.url+'/api/familia').then(res => {
                    console.log(res.data);
                    this.familias = res.data;

                    //console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
            },

            filterInOut(){
                console.log(this.data)
                axios.post(this.url+'/api/solofiltro', this.data).then(res => {
                    console.log(res.data);
                    this.productos = res.data;
                    //console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });

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