<template>
    <vm-page-list v-model="filter" class="all-products-main">
        <template slot="breadcrump">
            <router-link :to="{name: 'index'}" exact> {{ $t('Home') }} </router-link> >
            <span> {{ $t('Categories') }} </span>
        </template>
        <template slot="cards" scope="props">
            <div class="col-md-3 col-sm-4 col-xs-12 bike-block" v-for="card in props.cards">
                <vm-preview
                        :title="card.title"
                        :link="{name:'category', params:{id: card.id}}"
                        :src="card.image&&card.image.thumbnail"
                ></vm-preview>
            </div>
        </template>
    </vm-page-list>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmBreadCrumps from '../components/vm-bread-crumps.vue'
    import vmPageList from '../components/vm-page-list.vue'
    import vmPreview from '../components/vm-preview.vue'
    import categoryFilter from '../instances/categoryFilter.js'

    export default {
        components: {
            vmBreadCrumps,
            vmPreview,
            vmPageList
        },
        data(){
            return {
                filter: categoryFilter
            }
        },


    }
</script>