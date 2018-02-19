<template>
    <div class="tab-content">
        <slot></slot>
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import Storage from './instances/Storage.js'
    export default {
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
                this.tabs = this.$children;
                Storage.tabs = this.tabs
            }
        },
        mounted(){
            this.initTabs()
        },
    }
</script>