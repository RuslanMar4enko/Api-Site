<template>
    <span class="text-danger" v-if="errors">
        <span v-for="(error, index) in errors"><span v-if="index===0">{{ error }}</span><span v-else="index===0">, {{ error }}</span></span>
    </span>
</template>

<script>
    export default {
        props: {
            errors:{}
        },
    }
</script>