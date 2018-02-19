<template>
    <div class="wrapper">


        <section class="search-products" v-if="hasFilters">
            <div class=" top-block-content clear">
                    <div class="row">
                        <transition name="show">
                            <div class="dropdown" :class="{'open': canOpenDropdown}" v-show="!isProcessing"
                                 v-on-clickaway="closeDropDown"
                            >
                                <button class="btn-primary dropdown-toggle text-uppercase" type="button"
                                        @click.prevent="canOpenDropdown = !canOpenDropdown"
                                >
                                    {{ $t('Filter') }}
                                    <i class="fa" :class="{'fa-angle-down': !canOpenDropdown, 'fa-angle-up': canOpenDropdown}"></i>
                                </button>
                                <ul class="dropdown-menu filters__content">
                                    <div class="top-block-search col-xs-12">
                                        <form class="main-search-form" action="#" method="post">
                                            <div class="main-search-form__input-group">
                                                <div class="container">
                                                    <slot name="inputs" :filter="filter"></slot>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </ul>
                            </div>
                        </transition>


                </div>
            </div>
        </section>
        <section class="breadcrump">
            <div class="container">
                <div class="row">
                    <slot name="breadcrump"></slot>
                </div>
            </div>
        </section>
        <section class="products-grid">
            <div class="container">
                <div class="cards">

                    <slot name="cards" :cards="products"></slot>


                </div>
                <div class="pagination__wrapper" v-if="hasPagination">
                    <div class="pagination">
                        <ul class="pagination-list">
                            <li v-if="canSubPage"><a href="#" @click.prevent="subPage" class="prev"><</a></li>
                            <!--<li class="active"><a href="#">1</a></li>-->
                            <!--<li><a href="#">2</a></li>-->
                            <!--<li><a href="#">3</a></li>-->
                            <li><a><span>{{ pagination.page }}</span> / <span>{{ pagination.lastPage }}</span></a></li>
                            <!--<li><a href="#">5</a></li>-->
                            <!--<li><a href="#">6</a></li>-->
                            <!--<li><a href="#">7</a></li>-->
                            <!--<li><a href="#">8</a></li>-->
                            <!--<li><a href="#">...</a></li>-->
                            <li v-if="canAddPage"><a href="#" @click.prevent="addPage" class="next">></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import Filter from '../services/Filter'
    import { directive as onClickaway } from 'vue-clickaway';
    export default {

        props: {
            value:{
                required: true,
                type:Filter
            },
            hasFilters: {
                default: false
            },
            hasPagination: {
                default: false
            },
            isProcessing:{
                default: false
            }
        },
        data(){
            return {
                filter: Filter,
                canOpenDropdown: false
            }
        },
        created(){
            this.filter=this.value
            this.fetch()
        },
        computed: {
            products(){
                return this.filter.data
            },
            pagination(){
                return this.filter.pagination
            },
            canAddPage(){
                return this.pagination.canAddPage
            },
            canSubPage(){
                return this.pagination.canSubPage
            },
        },
        methods: {
            fetch(){
                this.filter.search({cache: false, fetch: true}).then((data) => {

                }).catch(() => {
                })
            },
            addPage(){
                if(this.pagination.canAddPage){
                    this.pagination.addPage()
                    this.fetch()
                }
            },
            subPage(){
                if(this.pagination.canSubPage){
                    this.pagination.subPage()
                    this.fetch()
                }
            },
            closeDropDown(){
                this.canOpenDropdown = false
            }
        },
        directives: {
            onClickaway: onClickaway,
        },
    }
</script>
