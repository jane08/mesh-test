<template>

<div>
    <h2 class="title is-size-2">Products List</h2>
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
                console.log( to.params.product_id)
                this.product_id = to.params.product_id;
                this.loadSingleProduct();
                console.log( this.product);
            },

        },
        product_id(){
            // var vm = this;
            this.loadSingleProduct();
        },
        created(){
            this.loadSingleProduct();
            this.product_id =this.$route.params.product_id;
            console.log( this.product);
            },
        methods:{
            loadSingleProduct(){
                axios.get('/show-product/'+this.product_id)
                    .then(({data}) => {

                        this.product = data.data;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
    }

</script>