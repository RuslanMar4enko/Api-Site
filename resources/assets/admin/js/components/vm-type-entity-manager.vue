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
                    <span slot="label" class="text-capitalize">category</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['category.id']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-categories-select
                                v-model="form.data.category"
                                :id="props.id"
                                @on-open="form.clearErrors('category.id')"
                                :placeholder="form.data.category?form.data.category.title:'Type to search'"
                        ></vm-categories-select>
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
    import vmImages from './images/images.vue'
    import vmErrorLabel from './vm-error-label.vue'
    import vueMultiselect from 'vue-multiselect'
    import vmHtmlEditor from './vm-html-editor.vue'
    import vmCategoriesSelect from './vm-categories-select.vue'
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
            vmCategoriesSelect,
            vmImages,
        },
        props: {
            isProcessing: {
                default: false
            }
        },
        data(){
            return {
                form: new Form({
                    data: new Type({
                        title: null,
                        images: [],
                        category: null,
                    }),
                    errors: new Errors({
                        'en.title': [],
                        'ge.title': [],
                        'ru.title': [],
                        'en.description': [],
                        'ge.description': [],
                        'ru.description': [],
                        "category.id": [],
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
                this.form.data = new Type({...item, type: 'MAIN'})
            },

            save(){
                this.form.save({
                    url:'/api/types/update',
                }).then((data)=>{
                    this.form.data = new Type(data)
                    this.$emit('on-save')
                })
            },
            create(){
                this.form.save({
                    url:'/api/types/create',
                }).then((data)=>{
                    this.form.data = new Type(data)
                    this.$emit('on-save')
                })
            }
        },
    }
</script>