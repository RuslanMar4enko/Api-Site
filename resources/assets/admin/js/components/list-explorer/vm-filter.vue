<template>
    <form role="form" @input="search">
        <div class="form-group">
            <slot></slot>
        </div>
    </form>
</template>
<!--<style>-->

<!--</style>-->
<script>
    export default {
        props:{

        },
        methods: {
            search(){
                this.$emit('requested');
                this.$emit('searched');
                this.$emit('search');
            }
        }
    }
</script>