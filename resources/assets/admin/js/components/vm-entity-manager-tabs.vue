<template>
    <div class="tab-content">
        <slot></slot>
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    export default {

        data(){
            return {
                tabs: [],
                storage: {}
            }
        },
        created(){
        },
        methods:{
            getTabs(){
                return this.tabs;
            },
            initTabs(){
                this.tabs = this.$children;
                this.storage.tabs = this.tabs
            }
        },
        mounted(){
            this.initTabs()
            this.$parent.$data.storage = this.storage
        },
    }
</script>