<template>
    <vm-entity-manager :isProcessing="isProcessing">
        <vm-entity-manager-tabs>
            <vm-entity-manager-tab title="Details" :selected="true">
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        color en
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.color']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.en.color"
                               @input="form.clearErrors('en.color')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        color ru
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.color']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ru.color"
                               @input="form.clearErrors('ru.color')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        color ge
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.color']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ge.color"
                               @input="form.clearErrors('ge.color')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        Value
                    </span>

                    <template scope="props">
                        <vm-form-group>
                            <span slot="label" class="text-capitalize">value</span>
                            <vm-error-label slot="errors"
                                            :errors="form.errors.data['value']"
                            ></vm-error-label>
                            <template scope="props">
                                <input type="color"
                                       :id="props.id"
                                       v-model="form.data.value"
                                >

                            </template>
                        </vm-form-group>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        Image
                    </span>

                    <template scope="props">
                        <vm-images
                                :images="form.data.images"
                                :limit="20"
                        ></vm-images>
                    </template>
                </vm-form-group>

                <hr>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary"
                            v-if="form.data.id"
                            @click="save"
                            :disabled="form.ajax.isProcessing"
                    >Save</button>
                    <button type="submit" class="btn btn-success"
                            v-if="!form.data.id"
                            @click="create"
                            :disabled="form.ajax.isProcessing"
                    >Create</button>
                </div>
            </vm-entity-manager-tab>
        </vm-entity-manager-tabs>
    </vm-entity-manager>
</template>

<script>
    import vmEntityManager from './vm-entity-manager.vue'
    import vmEntityManagerTabs from './vm-entity-manager-tabs.vue'
    import vmEntityManagerTab from './vm-entity-manager-tab.vue'
    import vmFormGroup from './vm-form-group.vue'
    import vmErrorLabel from './vm-error-label.vue'
    import vueMultiselect from 'vue-multiselect'
    import vmHtmlEditor from './vm-html-editor.vue'
    import vmImages from './images/images.vue'
    import Form from "../../../core/services/Form.js";
    import Errors from '../../../core/services/Errors'
    import Filter from '../../../core/services/Filter'
    import Pagination from '../../../core/services/Pagination'
    import Color from '../../../core/models/Color'
    import Type from '../../../core/models/Type'
    export default {
        components: {
            vmEntityManager,
            vmEntityManagerTabs,
            vmEntityManagerTab,
            vmFormGroup,
            vmErrorLabel,
            vmHtmlEditor,
            vueMultiselect,
            vmImages
        },
        props: {
            isProcessing: {
                default: false
            }
        },
        data(){
            return {
                form: new Form({
                    data: new Color({
                        color: null,
                        value: null,
                    }),
                    errors: new Errors({
                        color: [],
                        value: [],
                        images: [],
                    })
                }),
            }
        },
        computed: {
            item(){
                return this.form.data
            }
        },
        methods: {
            /**
             * @public
             */
            pickItem(item){
                this.form.data = new Color(item)
            },

            save(){
                this.form.save({
                    url:'/api/colors/update',
                }).then((data)=>{
                    this.form.data = new Color(data)
                    this.$emit('on-save')
                })
            },
            create(){
                this.form.save({
                    url:'/api/colors/create',
                }).then((data)=>{
                    this.form.data = new Color(data)
                    this.$emit('on-save')
                })
            }
        },
    }
</script>