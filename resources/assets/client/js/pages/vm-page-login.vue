<template>
    <div>
        <button class="btn btn-success" @click="login">login</button>
        <button class="btn btn-success" @click="logout">logout</button>
    </div>
</template>

<script>
    export default {
        methods:{
            login(){
                axios.post('/api/login', {
                    email:'admin@mail.com',
                    password: 'admin'
                })
            },
            logout(){
                axios.post('/api/logout')
            }
        }
    }
</script>