<template>
    <div>
        <label v-if="name" class="control-label text-capitalize" :for="id" v-text="name"></label>
        <input :value="value" @input="$emit('input', $event.target.value)" type="text" class="form-control" :id="id" placeholder="Enter ...">
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import _ from 'lodash'
    export default {
        props: {
            value: {
                required: true
            },
            name: {}
        },
        data(){
            return {
                id:''
            }
        },
        mounted(){
            this.id = _.uniqueId('text-input-')
        }
    }
</script>