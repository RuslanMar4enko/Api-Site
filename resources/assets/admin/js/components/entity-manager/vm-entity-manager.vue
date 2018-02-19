<template>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li :class="{'active': tab.isActive}" v-for="tab in getTabs()" @click.prevent="selectTab(tab)"><a :href="tab.href" aria-expanded="false" v-text="tab.title"></a></li>
            <li class="pull-left header"><i class="fa fa-edit"></i><span v-text="title"></span></li>
        </ul>
        <div class="tab-content">
            <slot></slot>
        </div>
        <!-- /.tab-content -->
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import Storage from './instances/Storage.js'
    export default {
        props: {
            title: {
                default: null
            }
        },
        data(){
            return {
                tabs: [],
                storage: Storage
            }
        },

        methods:{
            getTabs(){
                return this.tabs;
            },
            initTabs(){
                this.tabs = Storage.tabs
            },
            selectTab(tab){
                Storage.selectedTab = tab;
                Storage.tabs.forEach(tab=>{
                    console.log(tab.title == Storage.selectedTab.title)
                    tab.isActive = (tab.title == Storage.selectedTab.title);
                })
            }
        },
        mounted(){
            this.initTabs()
        }
    }
</script>