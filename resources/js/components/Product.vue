<template>

    <div>
        <h2 class="title is-size-2">Products List</h2>
        <div v-for="product in products" :key="product.id">
            <figure class="image is-128x128">
                <img :src="/images/+product.path" alt="product">
            </figure>
            <h3 class="title  is-size-4"> {{ product.name }} </h3>
            <p class="subtitle"> {{ product.description | truncate(100) }} </p>
            <p class="subtitle">
                <router-link
                        :to="{ name: 'single-product',params : {product_id : product.id}}"> Read More
                </router-link>
            </p>

            <br>
        </div>
        <div>
            <button class="button is-info" v-on:click="prevPage()"
                    :disabled="current_page <= 1">
                Previous
            </button>
            <span> {{ current_page }} out of {{ last_page }} </span>
            <button class="button is-info" v-on:click="nextPage()"
                    :disabled="current_page == last_page">
                Next
            </button>

        </div>
    </div>
</template>

<script>
    export default {

        //  props:['category_id'],
        data() {
            return {
                category_id: null,
                products: [],
                pagination: [],
                url: '/api/get-product/',
                current_page : 0,
                last_page : 0,
            }
        },
        watch: {
            '$route'(to, from) {
                this.current_page = 0;
                this.last_page = 0;
                this.category_id = to.params.category_id;
                this.loadProducts();

            },

        },
        created() {
            this.category_id = this.$route.params.category_id;
            this.loadProducts();
        },
        methods: {
            nextPage(){
              if(this.current_page < this.last_page){
                  this.current_page += 1;
                  this.loadProducts();
              }
            },
            prevPage(){
                if(this.current_page){
                    this.current_page -= 1;
                    this.loadProducts();
                }
            },
            loadProducts() {
                this.url = '/api/get-product/' + (this.category_id ? this.category_id : '');
                axios.get(this.url+'?page='+this.current_page)
                    .then(({data}) => {
                        this.products = data.data;
                        this.current_page = data.meta.current_page;
                        this.last_page = data.meta.last_page;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
    }

</script>