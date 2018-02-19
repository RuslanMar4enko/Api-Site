<template>
    <section class="product3">
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs product-characteristics__title--active">
                    <li class="active"><a class="comp product-characteristics__comp" data-toggle="tab" href="#panel1">{{ $t('Equipment') }}</a></li>
                    <li><a class="dop product-characteristics__comp" data-toggle="tab" href="#panel2">{{ $t('Add. Equipment') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div id="panel1" class="tab-pane fade in active">
                        <div class="description">
                            <div class="col-sm-6 " v-if="characteristic.type === 'MAIN'" v-for="characteristic in characteristics">
                                <p>{{ characteristic[name] }}:</p>
                                <p>{{ characteristic[description] }}</p>
                                <hr/>
                            </div>
                        </div>
                    </div>
                    <div id="panel2" class="tab-pane fade">
                        <div class="description">
                            <div class="col-sm-6 " v-if="characteristic.type === 'ADDITIONAL'" v-for="characteristic in characteristics">
                                <p>{{ characteristic[name] }}:</p>
                                <p>{{ characteristic[description] }}</p>
                                <hr/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="#"></a>
                    <a href="#"></a>
                </div>


            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            characteristics: {},
            name: {
                default: 'name'
            },
            description: {
                default: 'description'
            },
        },
    }
</script>