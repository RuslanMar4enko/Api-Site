<template>
    <form role="form" @submit.prevent="submitted" @input="input">
        <slot name="alert"></slot>
        <div class="row">
            <div role="form" class="col-md-12" @submit.prevent="save">
                <slot></slot>
            </div>
        </div>
        <br>
        <div class="btn-group">
            <slot name="buttons">
                <button type="button" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary" v-if="canSave">Save</button>
                <button type="button" class="btn btn-default" v-if="canPrint">Print</button>
                <button type="button" class="btn btn-danger" v-if="canDelete" @click="destroy">Delete</button>
            </slot>
        </div>
    </form>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import Form from '../../../../Services/Form.js'
    export default {
        props:{
            canSave:{
                type: Boolean,
                default:false,
            },
            canDelete:{
                type: Boolean,
                default:false,
            },
            canPrint:{
                type: Boolean,
                default:false,
            },
            value: {
                required: true
            }
        },
        data(){
            return {
                form: {}
            }
        },

        computed:{
            canShowButtons(){
                return this.canSave||this.canPrint||this.canDelete
            }
        },
        methods:{
            input(e){
                this.$emit('put', e);
            },
            submitted(){
                this.$emit('submitted');
            },
            destroy(){
                this.$emit('destroy');
            },
            print(){
                this.$emit('print');
            }
        },
        created(){
            this.form = this.value
        }
    }
</script>