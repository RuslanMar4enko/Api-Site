<template>
    <vm-page-list :hasPagination="true" :hasFilters="true" v-model="filter" :isProcessing="typesFilter.ajax.isProcessing">
        <template slot="inputs">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <input class="input-user-name input-velo"
                       name="user-name" type="text"
                       :placeholder="$t('Title')"
                       autofocus="true"
                        v-model="filter.query.title_like"
                       @input="search"
                       autocomplete="off"
                >
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <input class="input-user-name input-velo"
                       name="user-name" type="number"
                       :placeholder="$t('Price from')"
                       autofocus="true"
                        v-model="filter.query.price_from"
                       @input="search"
                       autocomplete="off"
                >
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <select name="" class="single-select"
                        autocomplete="off"
                        v-model="filter.query.type_id"
                        @change="search"
                >
                    <option :value="null">{{ $t('Type') }}</option>
                    <option :value="type.id" v-for="type in typesFilter.data">{{ type.title }}</option>

                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <select name="" class="single-select"
                        autocomplete="off"
                        v-model="sortBy"
                        @change="search"
                >
                    <option :value="null">{{ $t('Sort by') }}</option>
                    <option value="sort_price_asc">{{ $t('Price from lower') }}</option>
                    <option value="sort_price_desc">{{ $t('Price from higher') }}</option>

                </select>
            </div>

        </template>
        <template slot="breadcrump">
            <router-link :to="{name: 'index'}" exact> {{ $t('Home') }} </router-link>
            >
            <router-link :to="{name: 'categories'}" exact> {{ $t('Categories') }} </router-link>
            >
            <span> {{ $route.params.id }} </span>
        </template>
        <template slot="cards" scope="props">
                <transition name="show">
                    <vm-spinner  v-if="filter.ajax.isProcessing"></vm-spinner>
                </transition>
                <vm-card
                        class="cards__item"

                        v-for="card in props.cards"
                        :key="card"


                        :src="card.image? card.image.thumbnail_url : ''"
                        :title="card.title"
                        :typeDescription="card.type.description"
                        :currentPrice="card.price"
                        :oldPrice="card.old_price"
                        :type="card.type.title"
                        :to="{name:'product', params:{id: card.id}}"

                ></vm-card>



        </template>
    </vm-page-list>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmPageList from '../components/vm-page-list.vue'
    import vmCard from '../components/vm-card.vue'
    import vmPreview from '../components/vm-preview.vue'
    import vmSpinner from '../components/vm-spinner.vue'
    import productsFilter from '../instances/productsFilter.js'
    import typeFilter from '../instances/typeFilter'
    export default {
        components: {
            vmPageList,
            vmPreview,
            vmCard,
            vmSpinner,
        },
        data(){
            return {
                filter: productsFilter,
                typesFilter: typeFilter,
            }
        },
        watch:{
            "$route.params.id"(){
                this.filter.query.category_id = this.$route.params.id
                this.filter.query.category.id = this.$route.params.id
                this.typesFilter.query.category_id = this.$route.params.id
                this.filter.search({cache: false, fetch: true})
                this.searchTypes()
            }
        },
        created(){
            this.filter.query.category_id = this.$route.params.id
            this.filter.query.category.id = this.$route.params.id
            this.typesFilter.query.category_id = this.$route.params.id
            this.searchTypes()
        },
        computed: {
            sortBy:{
                get(){
                    if(this.filter.query.sort_price_asc)
                       return 'sort_price_asc'
                    if(this.filter.query.sort_price_desc)
                       return 'sort_price_desc'
                    return null
                },
                set(v){
                    if (v === 'sort_price_asc') {
                        this.filter.query.sort_price_asc = true
                        this.filter.query.sort_price_desc = false
                    }
                    if (v === 'sort_price_desc') {
                        this.filter.query.sort_price_asc = false
                        this.filter.query.sort_price_desc = true
                    }
                }
            }
        },
        methods: {
            search(){
                this.filter.search({cache: false, fetch: true})
            },
            searchTypes(){
                if (!this.typesFilter.ajax.isProcessing)
                    this.typesFilter.search({cache: false, fetch: true})
            }
        },

    }
</script>