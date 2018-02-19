<template>
    <div class="form-group" :class="{'has-error': hasError}">
        <div>
            <label v-if="name" class="control-label text-capitalize" :for="id"><span v-text="name"></span>: </label>
            <span class="help-block help-block-inline" v-if="hasError"><span v-text="'required'"></span></span>
        </div>
        <input :value="value" @input="$emit('input', $event.target.value)" type="number" class="form-control" :id="id" placeholder="Enter ...">
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
            hasError: {
                default: false
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