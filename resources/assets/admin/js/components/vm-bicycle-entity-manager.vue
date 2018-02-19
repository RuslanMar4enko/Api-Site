<template>
    <vm-entity-manager title="Name Surname">
        <vm-entity-manager-tabs>
            <vm-entity-manager-tab title="Profile" :selected="true">
                <vm-entity-modifier v-model="form" @put="input" @submitted="submitted">
                    <template slot="alert">
                        <vm-callout :text="'info'" v-model="form" :is-info="true" :is-danger="isDanger" :is-warning="isWarning"></vm-callout>
                    </template>
                    <template>
                        <vm-text-form-input v-model="form.data.name" label="Name" name="name" :error-messages="form.errors.name"></vm-text-form-input>
                        <vm-text-form-input v-model="form.data.surname" label="Surname" name="surname" :error-messages="form.errors.surname"></vm-text-form-input>
                        <vm-text-form-input v-model="form.data.mobile" label="Mobile" name="mobile" :error-messages="form.errors.mobile"></vm-text-form-input>
                    </template>
                    <template slot="buttons">
                        <button type="submit" class="btn btn-primary" :disabled="anyError">Save</button>
                        <button type="button" class="btn btn-default" @click="reset">Reset</button>
                    </template>
                </vm-entity-modifier>
            </vm-entity-manager-tab>
        </vm-entity-manager-tabs>
    </vm-entity-manager>
</template>

<script>
    import vmEntityManager from './entity-manager/vm-entity-manager.vue'
    import vmEntityManagerTabs from './entity-manager/vm-entity-manager-tabs.vue'
    import vmEntityManagerTab from './entity-manager/vm-entity-manager-tab.vue'
    import vmEntityModifier from './entity-modifier/vm-entity-modifier.vue'
    import vmTextFormInput from './inputs/form-iputs/vm-text-form-input.vue'
    import vmCallout from './callout/vm-callout.vue'

    import Form from '../../../Services/Form.js'

    export default {
        props: {
            value: {
                required: true
            }
        },
        data(){
            return {
                form: {

                }
            }
        },
        created(){
            this.form = new Form(this.value)
        },
        computed: {
            anyError(){
                return this.form.hasErrors();
            },
            isDanger(){
                return  this.form.hasException();
            },
            isWarning(){
                return  this.form.hasValidationError();
            }
        },
        methods: {
            input(e){
                this.form.clearErrors(e.target.name);
            },
            reset(e){
                this.form.reset();
            },
            submitted(){
                this.form.send();
            }
        },
        components: {
            vmEntityManager,
            vmEntityManagerTabs,
            vmEntityManagerTab,
            vmEntityModifier,
            vmTextFormInput,
            vmCallout

        },
    }
</script>