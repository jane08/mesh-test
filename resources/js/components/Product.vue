<template>

<div>
    <h2 class="title">Products List</h2>
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
                this.category_id = to.params.category_id;
               // alert(  this.category_id);
                this.loadProducts();
                console.log( this.products);
            }
        },
        category_id(){
           // var vm = this;
            this.loadProducts();
        },
        created(){
            this.category_id =this.$route.params.category_id;
            this.loadProducts();
            },
        methods:{
            loadProducts(){
                axios.get('/show-products/'+this.category_id)
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