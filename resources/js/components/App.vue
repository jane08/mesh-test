<template>
    <div>

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