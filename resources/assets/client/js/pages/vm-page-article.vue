<template>
    <div>


        <section class="article-wrapper">
            <div class="container">
                <div class="row">
                    <br>
                    <br>
                    <br>
                    <div class="col-xs-12">
                        <h1 class="text-uppercase">{{ article.title }}</h1>
                        <img v-if="article.assets && article.assets[0]" class="article-1img" :src="article.assets[0].article_large_thumbnail" alt="">
                        <p class="article__content"  ><strong v-text="article.sub_title"></strong></p>
                        <p class="article__content text-justify" v-html="article.description"></p>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-8 article__content text-justify" v-html="article.body">

                            </div>
                            <div class="col-sm-4 article__content text-justify">
                                <img v-if="article.assets && article.assets[0]" class="Rectangle299" :src="article.assets[1].article_little_thumbnail" alt="">
                            </div>
                            <div class="col-xs-12 article__content text-justify"  v-html="article.epilog">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="breadcrump">
            <div class="container">
                <div class="row">
                    <!--<a href="#">Главная > Горный > <span>The best Bike In The World</span></a>-->
                </div>
            </div>
        </section>
        <section class="article-3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <a class="pointer" v-if="filter.pagination.canSubPage"> <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i> Previous article</a>
                        <a class="article-right pointer"  v-if="filter.pagination.canAddPage">Next article <i class="fa fa-angle-right fa-2x"
                                                                          aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </section>





    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import Filter from '../../../core/services/Filter'
    import Pagination from '../../../core/services/Pagination'
    import Article from '../../../core/models/Article'
    export default {
        data(){
            return {
                filter: new Filter({
                    url:'/api/articles/get-many',
                    query:{
                        id:null
                    },
                    mapTo: Article,
                    pagination: new Pagination({
                        per_page: 1
                    })
                })
            }
        },
        created(){
            this.fetch()
        },
        computed:{
            article(){
                return this.filter.data && this.filter.data[0]||{}
            }
        },
        methods: {
            fetch(){
                if(this.$route.params.id){
                    this.filter.query.id = this.$route.params.id
                    this.filter.search({cache: false, fetch: true})
                }
            }
        },
    }
</script>