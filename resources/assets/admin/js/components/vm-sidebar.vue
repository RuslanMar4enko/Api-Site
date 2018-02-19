<template>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header text-uppercase" v-text="$t('navigation')"></li>
                <router-link tag="li" to="/admin/categories"><a><i class="fa fa-tags"></i> Categories</a></router-link>
                <router-link tag="li" to="/admin/types"><a><i class="fa fa-bookmark"></i> Types</a></router-link>
                <router-link tag="li" to="/admin/widgets"><a><i class="fa fa-cogs"></i> Widgets</a></router-link>
                <router-link tag="li" to="/admin/characteristics"><a><i class="fa fa-puzzle-piece"></i> Characteristics</a></router-link>


                <router-link tag="li" to="/admin/products"><a><i class="fa fa-bicycle"></i> Products</a></router-link>
                <router-link tag="li" to="/admin/articles"><a><i class="fa fa-file-photo-o"></i> Articles</a></router-link>
                <li><a href="/"><i class="fa fa-internet-explorer"></i> Site</a></li>
                <!--<router-link tag="li" to="/admin/clothes"><a><i class="fa fa-shopping-bag"></i>&emsp;<span v-text="$t('Clothes')"></span></a></router-link>-->
                <!--<router-link tag="li" to="/admin/skiing"><a><i class="fa fa-snowflake-o"></i>&emsp;<span v-text="$t('Skiing')"></span></a></router-link>-->
                <!--<router-link tag="li" to="/admin/fastening"><a><i class="fa fa-wrench"></i>&emsp;<span v-text="$t('Fastening')"></span></a></router-link>-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
    export default {}
</script>