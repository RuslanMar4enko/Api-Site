<template>
    <vm-entity-manager :title="item.id" :isProcessing="isProcessing">
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
                    <span slot="label" class="text-capitalize">description en</span>
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
                    <span slot="label" class="text-capitalize">description ru</span>
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
                    <span slot="label" class="text-capitalize">description ge</span>
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
                    <span slot="label" class="text-capitalize">price</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data.price"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="number"
                               min="0"
                               step="0.01"
                               v-model="form.data.price"
                               @input="form.clearErrors('price')"

                        >
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">old_price</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data.old_price"
                    ></vm-error-label>
                    <template scope="props">
                        <input class="form-control" type="number"
                               min="0"
                               step="0.01"
                               v-model="form.data.old_price"
                               @input="form.clearErrors('old_price')"
                        >
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
                    <span slot="label" class="text-capitalize">Category</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data.category"
                    ></vm-error-label>
                    <template scope="props">
                        <vm-categories-select
                                v-model="typesFilter.query.category"
                                :id="props.id"
                        ></vm-categories-select>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">Type</span>
                    <vm-error-label slot="errors"
                                    :errors="form.errors.data['type.id']"
                    ></vm-error-label>
                    <template scope="props">
                        <vue-multiselect
                                v-model="form.data.type"
                                :id="props.id"
                                label="title"
                                track-by="id"
                                :placeholder="form.data.type?form.data.type.title:'Type to search'"
                                :options="typesFilter.data"
                                :searchable="true"
                                :loading="typesFilter.ajax.isProcessing"
                                :internal-search="false"

                                :options-limit="100"
                                @search-change="searchTypes"
                                @open="initSearchTypes"
                        >
                            <span slot="noResult">Oops! No results found.</span>
                        </vue-multiselect>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">Widgets</span>

                    <template scope="props">
                        <vm-widgets-select :limit="undefined" v-model="form.data.widgets"></vm-widgets-select>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">Characteristics</span>

                    <template scope="props">
                        <vm-characteristics-select :limit="undefined" v-model="form.data.characteristics"></vm-characteristics-select>
                    </template>
                </vm-form-group>
                <vm-form-group>
                    <span slot="label" class="text-capitalize">Is Sale</span>

                    <template scope="props">
                        <input v-model="form.data.is_sale" :id="props.id" type="checkbox" title="Is Sale">
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
                    >Save
                    </button>
                    <button type="submit" class="btn btn-success"
                            v-if="!form.data.id"
                            @click="create"
                            :disabled="form.ajax.isProcessing"
                    >Create
                    </button>
                </div>
            </vm-entity-manager-tab>

            <vm-entity-manager-tab title="Colors" v-if="form.data.id">

                <vm-color-tab :parentId="form.data.id"></vm-color-tab>

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
    import vmCategoriesSelect from './vm-categories-select.vue'
    import vmColorTab from './vm-color-tab.vue'
    import vmHtmlEditor from './vm-html-editor.vue'
    import vmWidgetsSelect from './vm-widgets-multiselect.vue'
    import vmCharacteristicsSelect from './vm-characteristics-multiselect.vue'
    import vmModal from './vm-modal.vue'
    import vmImages from './images/images.vue'
    import Form from "../../../core/services/Form.js";
    import Product from "../../../core/models/Product.js";
    import Errors from '../../../core/services/Errors'
    import Filter from '../../../core/services/Filter'
    import Pagination from '../../../core/services/Pagination'
    import Category from '../../../core/models/Category'
    import Type from '../../../core/models/Type'
    import Color from '../../../core/models/Color'
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
            vmColorTab,
            vmWidgetsSelect,
            vmCharacteristicsSelect,
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
                    data: new Product({
                        ... new Product(),
                        status: 'PUBLISHED',
                        is_sale: false,
                    }),
                    errors: new Errors({
                        'type.id': [],
                        'en.sub_title': [],
                        'ru.sub_title': [],
                        'ge.sub_title': [],
                        'en.title': [],
                        'en.description': [],
                        'en.body': [],
                        'ru.title': [],
                        'ru.description': [],
                        'ru.body': [],
                        'ge.title': [],
                        'ge.description': [],
                        'ge.body': [],
                    })
                }),
                typesFilter: new Filter({
                    url: '/api/types/get-many',
                    query: {
                        title_like: null,
                        category: null
                    },
                    data: [],
                    mapTo: Type,
                    pagination: new Pagination({
                        per_page: null
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
                this.typesFilter.query.category = item && item.type && item.type.category || null
                this.form.data = new Product(item)
            },


            searchTypes(query) {
                this.typesFilter.query.title_like = query
                this.typesFilter.search({holding: true})
            },
            initSearchTypes(query) {
                this.form.clearErrors('type.id')
                this.typesFilter.search({holding: true})
            },
            limitText (count) {
                return `and ${count} other categories`
            },


            save(){
                this.form.save({
                    url: '/api/products/update',
                }).then((data) => {
                    this.form.data = new Product(data)
                    this.$emit('on-save')
                })
            },
            create(){
                this.form.save({
                    url: '/api/products/create',
                }).then((data) => {
                    this.form.data = new Product(data)
                    this.$emit('on-save')
                })
            },
            test(v){
                console.log(v)
            }
        },
    }
</script>