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
            <button class="button is-info" v-on:click="loadProducts(pagination.prev_page)"
                    :disabled="!pagination.prev_page">
                Previous
            </button>
            <span> {{ pagination.current_page }} out of {{ pagination.last_page }} </span>
            <button class="button is-info" v-on:click="loadProducts(pagination.next_page)"
                    :disabled="!pagination.next_page">
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
                url: '/show-products/'
            }
        },
        watch: {
            '$route'(to, from) {
                this.category_id = to.params.category_id;
                this.loadProducts();

            },
            category_id() {
                // var vm = this;
                this.loadProducts();
            }
        },
        created() {
            this.category_id = this.$route.params.category_id;
            this.loadProducts();
        },
        methods: {
            loadProducts(page_url = this.url) {
                var vm = this;
                page_url = page_url || this.url;
                // this.url = '/show-products/';
                if (this.category_id != 'undefined' && this.category_id != null) {
                    this.url = '/show-products/' + this.category_id;
                }
               // alert(this.url);
                axios.get(page_url)
                    .then(({data}) => {
                         //  console.log(data)
                        this.products = data.data;
                        vm.makePagination(data.links, data.meta);
                    })
                    .catch(e => {
                        console.log(e)
                    })
            },
            makePagination(data, meta) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page: data.next,
                    prev_page: data.prev,
                }
                this.pagination = pagination;
            },
            fetchPaginateProducts(url) {
                this.url = url;
                console.log(url)
               // this.loadProducts();
            }
        },
    }

</script>