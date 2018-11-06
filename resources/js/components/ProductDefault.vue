<template>

<div>
    <h2 class="title is-size-2">Products List</h2>
<div v-for="product in products" :key="product.id">
    <figure class="image is-128x128">
    <img :src="/images/+product.path" alt="product" >
    </figure>
    <h3 class="title">   {{ product.name }} </h3>
    <p class="subtitle">   {{ product.description }} </p>
    <br>
</div>
</div>
</template>

<script>
    export default{

      //  props:['category_id'],
        data(){
            return {
                category_id : null,
                products : []
            }
        },
        watch: {
            '$route' (to, from) {

                this.loadProductsDefault();
                console.log( this.products);
            },

        },

        created(){
            this.loadProductsDefault();
            console.log( this.products);
            },
        methods:{
            loadProductsDefault(){
                axios.get('/show-products/')
                    .then(({data}) => {

                        this.products = data.data;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
    }

</script>