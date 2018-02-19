<template>
    <vm-entity-manager :isProcessing="isProcessing">
        <vm-entity-manager-tabs>
            <vm-entity-manager-tab title="Details" :selected="true">
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        title en
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.en.title"
                               @input="form.clearErrors('en.title')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        title ru
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ru.title"
                               @input="form.clearErrors('ru.title')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        title ge
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ge.title"
                               @input="form.clearErrors('ge.title')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        description en
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.description']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.en.description"
                               @input="form.clearErrors('en.description')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        description ru
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.description']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ru.description"
                               @input="form.clearErrors('ru.description')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        description ge
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.description']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ge.description"
                               @input="form.clearErrors('ge.description')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">image</span>

                    <template scope="props">
                        <vm-images
                                :images="form.data.images"
                                :limit="1"
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
    import vmImages from './images/images.vue'
    import vueMultiselect from 'vue-multiselect'
    import vmHtmlEditor from './vm-html-editor.vue'
    import Form from "../../../core/services/Form.js";
    import Errors from '../../../core/services/Errors'
    import Filter from '../../../core/services/Filter'
    import Pagination from '../../../core/services/Pagination'
    import Category from '../../../core/models/Category'
    import Type from '../../../core/models/Type'
    import Widget from '../../../core/models/Widget'
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
                    data: new Widget({
                        title: null,
                        description: null,
                        images: null,
                    }),
                    errors: new Errors({
                        'en.title': [],
                        'ge.title': [],
                        'ru.title': [],
                        'en.description': [],
                        'ge.description': [],
                        'ru.description': [],
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
                this.form.data = new Widget({...item, type: 'MAIN'})
            },

            save(){
                this.form.save({
                    url:'/api/widgets/update',
                }).then((data)=>{
                    this.form.data = new Widget(data)
                    this.$emit('on-save')
                })
            },
            create(){
                this.form.save({
                    url:'/api/widgets/create',
                }).then((data)=>{
                    this.form.data = new Widget(data)
                    this.$emit('on-save')
                })
            }
        },
    }
</script>