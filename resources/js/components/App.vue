<template>
    <div>
            <router-view></router-view>
    </div>
</template>
<script>
    import Category from './Category'
    export default {
        props:['categories'],
        components: { Category },
    }
</script>