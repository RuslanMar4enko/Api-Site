<template>
    <vm-page-list v-model="filter" class="all-products-main">
        <template slot="breadcrump">
            <router-link :to="{name: 'index'}" exact> {{ $t('Home') }} </router-link> >
            <span> {{ $t('Articles') }} </span>
        </template>
        <template slot="cards" scope="props">
            <transition name="show">
                <vm-spinner  v-if="filter.ajax.isProcessing"></vm-spinner>
            </transition>
            <div class="cards__item bike-block" v-for="card in props.cards">
                <vm-preview
                        :title="card.title"
                        :link="{name:'article', params:{id: card.id}}"
                        :src="card.image? card.image.thumbnail_url : ''"
                ></vm-preview>
            </div>
        </template>
    </vm-page-list>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmPageList from '../components/vm-page-list.vue'
    import vmCard from '../components/vm-card.vue'
    import vmSpinner from '../components/vm-spinner.vue'
    import vmPreview from '../components/vm-preview.vue'


    import articlesFilter from '../instances/articlesFilter.js'
    export default {
        components: {
            vmPageList,
            vmCard,
            vmPreview,
            vmSpinner,
        },
        data(){
            return {
                filter: articlesFilter
            }
        },

    }
</script>