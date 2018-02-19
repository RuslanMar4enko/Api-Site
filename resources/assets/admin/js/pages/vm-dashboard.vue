<template>
    <div class="content-wrapper" style="min-height: 901px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 v-text="$t('welcome to the admin panel')"></h1>
            <ol class="breadcrumb">
                <li>
                    <router-link to="/admin"><i class="fa fa-dashboard"></i><span v-text="$t('Admin')"></span></router-link>
                </li>
                <li class="active" v-text="$t('Dashboard')"></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <pre v-text="currentUser"></pre>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        data(){
          return {
              currentUser: null
          }
        },
        created(){
//            axios.get('/api/user').then(({data})=>{
//                this.currentUser = data
//            })
//            axios.get('/test').then(({data})=>{
//                this.currentUser = data
//            })
            axios.get('/api/user').then(({data})=>{
                this.currentUser = data
            })
        }
    }
</script>