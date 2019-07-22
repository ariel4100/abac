<template>
    <div class="" style="position: relative;">
        <div id="buscador" class="" v-if="isLoaded" style=" display: flex; align-items: center">
            <button type="submit" style="cursor: pointer; border: unset;color: #fff;background-color: unset; padding-right: 0;"><i class="fas fa-search"></i></button>
            <input type="search" id="buscar" name="nombre" v-model="search" :placeholder="input+'...'">
            <!--<input type="search" class="" v-model="search" placeholder="Buscar...">-->

        </div>
        <div class="z-depth-3 option" v-if="search" style="">
            <div class="" style=" ">
                <a class="hover px-2" :href="url+'/productos/'+item.id" v-for="(item,index) in buscarLimit"   style="color: #000000 !important; font-size: 12px; line-height: 1.5rem; padding-bottom: 5px; padding-top: 5px">
                    <div v-if="item.title_es">{{ item.title_es.toLowerCase().substr(0,35) }}...</div>
                    <div v-else>{{ item.title_en.toLowerCase().substr(0,35) }}...</div>
                </a>
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
                product: [],
                search:'',
                url :  document.__API_URL,
                isLoaded: false
            }
        },
        created(){
            // console.log(this.input)
            this.getProductos();
        },
        computed: {
            buscarLimit() {
                let results = this.buscar().slice(0,5)
                console.log(results)
                return results
            },
        },
        methods: {

            buscar() {
                return this.product.filter((item) => {
                    //let c = item.c.length > 0 ? item.c : 'dsda';
                    //console.log(c);
                    if (item.title_es){
                        return item.title_es.toLowerCase().includes(this.search.toLowerCase()) ||
                            // item.title_en.toLowerCase().includes(this.search.toLowerCase()) ||
                            //item.c.includes(this.search.toLowerCase()) ||
                            item.text_es.toLowerCase().includes(this.search.toLowerCase());
                    } else{
                        return item.title_en.toLowerCase().includes(this.search.toLowerCase());
                    }

                });
                //return productos;
            },
            getProductos(){
                axios.get(this.url+'/api/productos').then(res => {
                    //console.log(res.data);
                    this.product = res.data;
                    this.isLoaded = true
                }).catch(e => {
                    console.log(e);
                });
            },


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
    a.hover:hover{
        background-color: #ededed;
        color: #000;
    }
    .option{
        height: auto;
        width: 85%;
        background-color: white;
        position: absolute;
        z-index: 1;
        margin-left: 38px;
        top: 55px
    }
    @media only screen and (max-width: 858px) {
        .option{
            height: auto;
            width: 85%;
            background-color: white;
            position: absolute;
            z-index: 1;
            margin-left: 25px;
            top: 55px
        }
    }

</style>