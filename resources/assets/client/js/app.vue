<template>
    <div class="wreeep">
        <vm-menu></vm-menu>
        <transition name="fade">
            <router-view></router-view>
        </transition>
        <!--<vm-footer></vm-footer>-->
    </div>
</template>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .25s ease;
    }

    .fade-enter-active {
        transition-delay: .25s;
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }
    .show-enter-active, .show-leave-active {
        transition: opacity .25s ease;
    }

    .show-enter, .show-leave-active {
        opacity: 0
    }
</style>
<script>
    import vmMenu from './components/vm-menu.vue'
    import vmFooter from './components/vm-footer.vue'
    import categoryFilter from './instances/categoryFilter.js'

    export default {
        components: {
            vmMenu,
            vmFooter
        },
        data(){
            return {
                categoryFilter: categoryFilter
            }
        },
        mounted(){
            this.categoryFilter.search({cache:true, fetch:true}).then(() => {}).catch(() => {})
        },
    }
</script>

