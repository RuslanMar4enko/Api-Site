<template>
    <section class="breadcrump">
        <div class="container">
            <div class="row">
                <vm-bread-crumps :routes="routes"></vm-bread-crumps>
            </div>
        </div>
    </section>
</template>

<script>
    import vmBreadCrumps from '../components/vue-navbar/src/NavigationBlock.vue'
    import routes from '../router/routes.js'

    export default {
        components: {
            vmBreadCrumps
        },
        data(){
            return {
                routes: routes
            }
        },
    }
</script>