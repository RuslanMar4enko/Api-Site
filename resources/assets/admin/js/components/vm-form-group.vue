<template>
    <div class="form-group" :class="{'has-error': hasError}">
        <div>
            <label class="control-label text-capitalize" :for="id">
                <slot name="label"></slot>:
            </label>
            <slot name="errors"></slot>
        </div>
        <slot :id="id"></slot>
    </div>
</template>

<script>
    import * as _ from "lodash";
    export default {
        props: {
            hasError: {
                default: false
            }
        },
        data(){
            return {
                id: ''
            }
        },
        mounted(){
            this.id = _.uniqueId('text-input-')
        },
        methods: {
            input(e){
                this.$emit('input', e.target.value)
            }
        },
    }
</script>