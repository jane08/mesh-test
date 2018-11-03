<template>
    <ul>
        <li v-for="category in categories"> <router-link :to="{ name: 'about' }"> {{ category['name'] }} </router-link></li>
            <ul>
                <li v-if="category['children']" v-for="cats in category['children']" :key="category['id']"> {{ cats['name'] }}</li>
            </ul>

    </ul>


</template>

<script>
    export default{
        props:['categories']
    }

</script>