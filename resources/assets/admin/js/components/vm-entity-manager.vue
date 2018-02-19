<template>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li :class="{'active': tab.isActive}" v-for="tab in getTabs()" @click.prevent="selectTab(tab)"><a :disabled="tab.$props.disabled" :href="tab.href" aria-expanded="false" v-text="tab.title"></a></li>
            <li class="pull-left header"><i v-show="!isProcessing" class="fa fa-edit"></i><i v-show="isProcessing" class="fa fa-spin fa-circle-o-notch"></i> <span v-text="title"></span>
            </li>
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

    export default {
        props: {
            title: {
                default: null
            },
            isProcessing: {
                default:false
            }
        },
        data(){
            return {
                tabs: [],
                storage: {}
            }
        },

        methods: {
            getTabs(){
                return this.tabs;
            },
            initTabs(){
                this.tabs = this.storage.tabs
            },
            selectTab(tab){
                console.log(tab.$props.disabled)
                if(tab.$props.disabled === true){
                    return
                }
                this.storage.selectedTab = tab;
                this.storage.tabs.forEach(tab => {
                    tab.isActive = (tab.title == this.storage.selectedTab.title);
                })
            }
        },
        mounted(){
            this.initTabs()
        }
    }
</script>