<template>
    <div class="form-group" :class="{'has-error': hasError}">
        <div>
            <label v-if="label" class="control-label text-capitalize" :for="id"><span v-text="label"></span>: </label>
            <span class="help-block help-block-inline" v-if="hasError">
                <span v-for="(errorMessage, key) in errorMessages">
                    <span v-if="key > 0">, </span>
                    <span v-text="errorMessage"></span>
                </span>
            </span>
        </div>
        <input :value="value" @input="$emit('input', $event.target.value)" :name="name" type="text" class="form-control" :id="id" placeholder="Enter ...">
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import * as _ from 'lodash'
    export default {
        props: {
            value: {
                required: true
            },
            hasError: {
                default: false
            },
            errorMessages: {},
            name: {},
            label: {},
        },
        data(){
            return {
                id: ''
            }
        },
        mounted(){
            this.id = _.uniqueId('text-input-')
        },
        computed: {
            hasError(){
                return !_.isEmpty(this.errorMessages);
            },

        }
    }
</script>