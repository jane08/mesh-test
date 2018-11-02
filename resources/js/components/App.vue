<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'category' }">Home</router-link>
            <router-link :to="{ name: 'about' }">About</router-link> |
            <category :categories="categories" > </category>
        </p>

        <div class="container">
            <router-view></router-view>

        </div>
    </div>
</template>
<script>
    import Category from './Category'
    export default {
        props:['categories'],
        components: { Category },
    }
</script>