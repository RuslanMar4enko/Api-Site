<template>
    <header class="main-header">
        <!-- Logo -->
        <router-link to="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>V</b>E</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Veloman</b>Extreme</span>
        </router-link>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" @click.prevent="logout">
                            <span class="hidden-xs">Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    import axios from 'axios'
    export default {
        methods: {
            logout(){
                axios.post('/logout')
                     .then(() => {
                         window.location = '/'
                     })
                     .catch(() => {
                     })
            }
        },
    }
</script>