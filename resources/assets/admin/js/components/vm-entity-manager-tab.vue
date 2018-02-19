<template>
    <div class="tab-pane" :class="{'active': isActive}">
        <slot></slot>
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    export default {
        props: {
            title: {
                required: true
            },
            selected: {
                default: false
            },
            disabled: {
                default: false
            },
            value: {}
        },
        data(){
            return {
                isActive: false
            }
        },
        computed:{
            href(){
                return '#'+this.title.toLowerCase().replace(/ /g, '-')
            }
        },
        created(){
            this.isActive = this.selected
        },

    }
</script>