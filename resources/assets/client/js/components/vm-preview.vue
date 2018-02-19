<template>
    <router-link :to="link">
        <a href="#"><img :src="src" :alt="title"></a>
        <a href="#">{{ title | titlePreview }}<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></a>
    </router-link>
</template>

<script>
    export default {
        props: {
            link:{
                required:true
            },
            title:{
                required:true
            },
            src:{
                required:true
            },
        },
    }
</script>