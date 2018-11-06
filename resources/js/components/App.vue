<template>
    <div>
            <router-view></router-view>
    </div>
</template>
<script>
    import Category from './Category'
    import Product from './Product'
    export default {
        components: { Category, Product },
    }
</script>