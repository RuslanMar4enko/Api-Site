<template>
    <div class="content-wrapper" style="min-height: 901px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 v-text="$t('Bicycles')"></h1>
            <ol class="breadcrumb">
                <li>
                    <router-link to="/admin"><i class="fa fa-dashboard"></i><span v-text="$t('Admin')"></span></router-link>
                </li>
                <li class="active" v-text="$t('Bicycles')"></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <vm-list-explorer ref="list"  @on-pick="pickItem"></vm-list-explorer>
                </div>
                <div class="col-md-6">
                    <vm-entity-manager ref="manager"  v-show="canShowManager" @on-save="$refs.list.search()"></vm-entity-manager>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    import vmListExplorer from '../components/vm-characteristic-list-explorer.vue'
    import vmEntityManager from '../components/vm-characteristic-entity-manager.vue'

    import Form from '../../../Services/Form.js'
    export default {
        components: {
            vmListExplorer,
            vmEntityManager
        },
        data(){
            return {
                canShowManager: true
            }
        },
        methods: {
            pickItem(item){
                this.canShowManager = true
                this.$refs.manager.pickItem(item)
            }
        },

    }
</script>