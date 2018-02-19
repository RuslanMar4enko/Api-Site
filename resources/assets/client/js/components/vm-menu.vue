<template>
    <section class="top-header-menu">
        <nav class="navbar navbar-toggleable-md">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar__col">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">{{ $t('Toggle navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link to="/" class="header-menu-logo navbar-brand" exact activeClass="no-active"> <img class="navbar__img" src="../../image/logo.png"  alt=""></router-link>
                <ul class="kross-cube-xs">
                    <li class="kross-xs"><img src="../../image/header-menu/kross.png" alt="kross-logo"></li>
                    <li class="cube-xs"><img src="../../image/header-menu/cube.png" alt="cube-logo"></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse navbar__col navbar__items" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav">
                    <li class="hidden-sm">
                        <router-link :to="{name:'index'}" exact>{{ $t('Home') }}</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'sales'}">{{ $t('Sales') }}</router-link>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $t('Products') }}<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <div class="col-md-12 ">
                                <router-link
                                        class="text-capitalize"

                                        v-for="category in categories"
                                        :to="{name:'category', params:{id:category.id}}"
                                        :key="category.id"
                                >
                                    {{ category.title }}

                                </router-link>

                            </div>
                        </ul>
                    </li>
                    <li class="kross hidden-xs"><img src="../../image/header-menu/kross.png" alt=""></li>
                    <li class="cube hidden-xs"><img src="../../image/header-menu/cube.png" alt=""></li>
                    <!--<li class=""><a href="#">{{ $t('Gallery') }}</a></li>-->
                    <li class="">
                        <router-link :to="{name:'contacts'}">{{ $t('Contacts') }}</router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'articles'}">{{ $t('Articles') }}</router-link>
                    </li>
                    <a href="#" class="langs"></a>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown">{{ $t($app.locale) }}<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <div class="col-md-12 ">
                                <a href="#" v-show="$app.locale!=='en'" class="text-capitalize" @click="$app.changeLocale('en', $route.fullPath)">{{ $t('en') }}</a>
                                <a href="#" v-show="$app.locale!=='ru'" class="text-capitalize" @click="$app.changeLocale('ru', $route.fullPath)">{{ $t('ru') }}</a>
                                <a href="#" v-show="$app.locale!=='ge'" class="text-capitalize" @click="$app.changeLocale('ge', $route.fullPath)">{{ $t('ge') }}</a>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </section>
</template>

<script>
    import categoryFilter from '../instances/categoryFilter.js'

    export default {
        data(){
            return {
                categoryFilter: categoryFilter
            }
        },
        created(){

        },
        computed: {
            categories(){
                return this.categoryFilter.data
            }
        },
    }
</script>