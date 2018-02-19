<template>
    <div class="wrapper">

        <h1 class="text-center" style="margin-top: 200px; height: 100vh;">404: page not found</h1>

    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmPageList from '../components/vm-page-list.vue'
    import vmCard from '../components/vm-card.vue'
    import vmPreview from '../components/vm-preview.vue'


    import articlesFilter from '../instances/articlesFilter.js'
    export default {
        components: {
            vmPageList,
            vmCard,
            vmPreview
        },
        data(){
            return {
                filter: articlesFilter
            }
        },

    }
</script>