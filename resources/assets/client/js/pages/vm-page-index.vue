<template>
    <div class="wrapper wrapper--fixed">
        <section class="home-section-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 home-section-1-block1">
                        <h1 class="home-section__hero-title">{{ $t('hero_title') }}</h1>
                    </div>
                    <div class="col-sm-6 home-section-1-block2">
                        <img src="../../image/home-1section/Logo_Veloman-03.png" alt="main-logo-veloman-extreme">
                    </div>
                    <div class="col-sm-6 home-section-1-block3">
                        <h2 class="home-section__hero-slogan">{{ $t('hero_slogan') }}</h2>
                        <div class="col-xs-6 home-section-1-button but-1 home-section-1__button">
                            <router-link :to="{name: 'categories'}"><span>{{ $t('Products') }}</span><img src="../../image/home-1section/bike.png" alt=""></router-link>
                        </div>
                        <div class="col-xs-6 home-section-1-button but  home-section-1__button">
                            <router-link :to="{name: 'articles'}"><span>{{ $t('Articles') }}</span><img src="../../image/home-1section/book.png" alt=""></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-section-2" v-if="types && types.length">
            <vm-show-more class="container" :collection="types">
                <template slot="title">
                    <h1 class="home-section__title">{{ $t('Categories') }}</h1>
                    <hr/>
                </template>
                <template scope="props">
                    <vm-preview
                            :title="props.item.title"
                            :link="{name:'products'}"
                            :src="props.item.image&&props.item.image.thumbnail_url"
                    ></vm-preview>
                </template>
            </vm-show-more>
        </section>

        <section class="home-section-3" v-if="articles && articles.length">
            <vm-show-more class="container" :collection="articles">
                <template slot="title">
                    <h1 class="home-section__title">{{ $t('Articles') }}</h1>
                    <hr/>
                </template>
                <template scope="props">
                    <vm-preview
                            :title="props.item.title"
                            :link="{name:'article', params:{id: props.item.id}}"
                            :src="props.item.image&&props.item.image.thumbnail_url"
                    ></vm-preview>
                </template>
            </vm-show-more>
        </section>

    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmPreview from '../components/vm-preview.vue'
    import vmShowMore from '../components/vm-show-more.vue'
    import typeFilter from '../instances/typeFilter'
    import articleFilter from '../instances/articleFilter'
    export default {
        components: {
            vmPreview,
            vmShowMore
        },
        data(){
            return {
                typeFilter: typeFilter,
                articleFilter: articleFilter,
            }
        },
        created(){
            this.fetchTypes()
        },
        computed: {
            types(){
                return this.typeFilter.data
            },
            articles(){
                return this.articleFilter.data
            }
        },
        methods: {
            fetchTypes(){
                this.typeFilter.search({cache: true, fetch: true})
                    .then(() => {
                    })
                    .catch(() => {
                    })
                this.articleFilter.search({cache: true, fetch: true})
                    .then(() => {
                    })
                    .catch(() => {
                    })
            }
        },
    }
</script>