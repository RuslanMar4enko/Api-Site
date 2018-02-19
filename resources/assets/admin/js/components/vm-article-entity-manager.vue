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
                        sub title en
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.sub_title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.en.sub_title"
                               @input="form.clearErrors('en.sub_title')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        sub title ru
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.sub_title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ru.sub_title"
                               @input="form.clearErrors('ru.sub_title')"
                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        sub title ge
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.sub_title']"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="text"
                               v-model="form.data.ge.sub_title"
                               @input="form.clearErrors('ge.sub_title')"
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
                        <vm-html-editor class="form-control" v-model="form.data.en.description" @on-input="form.clearErrors('en.description')"></vm-html-editor>
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
                        <vm-html-editor class="form-control" v-model="form.data.ru.description" @on-input="form.clearErrors('ru.description')"></vm-html-editor>
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
                        <vm-html-editor class="form-control" v-model="form.data.ge.description" @on-input="form.clearErrors('ge.description')"></vm-html-editor>
                    </template>
                </vm-form-group>

                <vm-form-group>
                    <span slot="label" class="text-capitalize">body en</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.body']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.en.body" @on-input="form.clearErrors('en.body')"></vm-html-editor>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">body ru</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.body']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.ru.body" @on-input="form.clearErrors('ru.body')"></vm-html-editor>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">body ge</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.body']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.ge.body" @on-input="form.clearErrors('ge.body')"></vm-html-editor>
                    </template>
                </vm-form-group>

                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        epilogue en
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['en.epilog']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.en.epilog" @on-input="form.clearErrors('en.epilog')"></vm-html-editor>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        epilogue ru
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ru.epilog']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.ru.epilog" @on-input="form.clearErrors('ru.epilog')"></vm-html-editor>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">
                        epilogue ge
                    </span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['ge.epilog']"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-html-editor class="form-control" v-model="form.data.ge.epilog" @on-input="form.clearErrors('ge.epilog')"></vm-html-editor>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">status</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data.status"
                    ></vm-error-label>
                    <template scope="props">
                        <select v-model="form.data.status" :id="props.id" class="form-control"
                                @change="form.clearErrors('status')"
                        >
                            <option value="PUBLISHED">PUBLISHED</option>
                            <option value="DRAFT">DRAFT</option>
                        </select>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">image</span>

                    <template scope="props">
                        <vm-images
                                :images="form.data.assets"
                                :limit="2"
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
    import Article from '../../../core/models/Article'
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
                    data: new Article({
                    }),
                    errors: new Errors({
                        'en.title': [],
                        'ge.title': [],
                        'ru.title': [],
                        'en.sub_title': [],
                        'ge.sub_title': [],
                        'ru.sub_title': [],
                        'en.description': [],
                        'ge.description': [],
                        'ru.description': [],
                        'en.body': [],
                        'ge.body': [],
                        'ru.body': [],
                        'en.epilog': [],
                        'ge.epilog': [],
                        'ru.epilog': [],
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
                this.form.data = new Article({...item, type: 'MAIN'})
            },

            save(){
                this.form.save({
                    url:'/api/articles/update',
                }).then((data)=>{
                    this.form.data = new Article(data)
                    this.$emit('on-save')
                })
            },
            create(){
                this.form.save({
                    url:'/api/articles/create',
                }).then((data)=>{
                    this.form.data = new Article(data)
                    this.$emit('on-save')
                })
            }
        },
    }
</script>