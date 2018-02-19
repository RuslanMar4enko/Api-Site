<template>
    <div class="wrapper">
        <vm-header></vm-header>
        <vm-sidebar></vm-sidebar>
        <router-view></router-view>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017.</strong> All rights
            reserved. Additional thanks to <a href="http://almsaeedstudio.com">Almsaeed Studio</a> for free admin panel template.
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
        <div class="control-sidebar-bg"></div>

    </div>
</template>

<script>
    import axios from 'axios'
    import env from '../env.js'
    import vmHeader from '../components/vm-header.vue'
    import vmSidebar from '../components/vm-sidebar.vue'
    export default {
        data(){
            return {
                currentUser: null
            }
        },
        created(){
            console.log(env);
        },
        methods: {
            getUser(){
                axios.get('/api/user').then(({data}) => {
                    this.currentUser = data;
                })
            },
            login(){
                axios.post('/api/login', {
                    email: 'd3-fc@mail.ru',
                    password: 'd3dpatfhbz'
                })
            }
        },
        components: {
            vmHeader,
            vmSidebar
        }

    }
</script>