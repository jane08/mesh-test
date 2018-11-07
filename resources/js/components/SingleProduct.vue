<template>

<div>
<div v-for="prod in product" :key="prod.id">
    <figure class="image is-128x128">
    <img :src="/images/+prod.path" alt="product" >
    </figure>
    <h3 class="title">   {{ prod.name }} </h3>
    <p class="subtitle">   {{ prod.description }} </p>
    <br>
</div>
</div>
</template>

<script>
    export default{

        data(){
            return {
                product_id : null,
                product : []
            }
        },
        watch: {
            '$route' (to, from) {
                this.product_id = to.params.product_id;
                this.loadSingleProduct();
               // console.log( this.product);
            },

        },
        product_id(){
            this.loadSingleProduct();
        },
        created(){
            this.product_id =this.$route.params.product_id;
            this.loadSingleProduct();
            },
        methods:{
            loadSingleProduct(){
              //  alert(this.product_id);
                axios.get('/show-product/'+this.product_id)
                    .then(({data}) => {
                        console.log( this.product);
                        this.product = data;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
    }

</script>