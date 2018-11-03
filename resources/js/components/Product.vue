<template>
    <p>This is the product page {{ products }}</p>
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
                var vm = this;
                axios.get('/show-products/'+vm.category_id)
                    .then(({data}) => {

                        vm.products = data;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
    }

</script>