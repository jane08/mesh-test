<template>

<div>
    <h2 class="title is-size-2">Products List</h2>
<div v-for="product in products" :key="product.id">
    <figure class="image is-128x128">
    <img :src="/images/+product.path" alt="product" >
    </figure>
    <h3 class="title  is-size-4">   {{ product.name }} </h3>
    <p class="subtitle">   {{ product.description | truncate(100) }} </p>
    <p class="subtitle">  <router-link
            :to="{ name: 'single-product',params : {product_id : product.id}}"> Read More </router-link> </p>
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
                this.category_id = to.params.category_id;
                this.loadProducts();

            },
            category_id(){
                // var vm = this;
                this.loadProducts();
            }
        },
        created(){
            this.category_id =this.$route.params.category_id;
            this.loadProducts();
            },
        methods:{
            loadProducts(){
                var url='/show-products/';
                if(this.category_id != 'undefined' && this.category_id != null){
                    url = '/show-products/'+this.category_id;
                }
                axios.get(url)
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